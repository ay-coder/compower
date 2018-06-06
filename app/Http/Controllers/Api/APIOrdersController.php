<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Transformers\OrdersTransformer;
use App\Http\Controllers\Api\BaseApiController;
use App\Repositories\Orders\EloquentOrdersRepository;
use App\Repositories\Cart\EloquentCartRepository;
use App\Models\Orders\Orders;
use Cartalyst\Stripe\Stripe;

class APIOrdersController extends BaseApiController
{
    /**
     * Orders Transformer
     *
     * @var Object
     */
    protected $ordersTransformer;

    /**
     * Repository
     *
     * @var Object
     */
    protected $repository;

    /**
     * PrimaryKey
     *
     * @var string
     */
    protected $primaryKey = 'ordersId';

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->repository                       = new EloquentOrdersRepository();
        $this->ordersTransformer = new OrdersTransformer();
    }

    /**
     * List of All Orders
     *
     * @param Request $request
     * @return json
     */
    public function index(Request $request)
    {
        $orderStatus= [
            'Pending',
            'Shipping',
            'Processing',
        ];
        $userInfo   = $this->getAuthenticatedUser();
        $paginate   = $request->get('paginate') ? $request->get('paginate') : false;
        $orderBy    = $request->get('orderBy') ? $request->get('orderBy') : 'id';
        $order      = $request->get('order') ? $request->get('order') : 'ASC';
        $items      = $paginate ? $this->repository->model->whereIn('order_status', $orderStatus)->where('user_id', $userInfo->id)->with(['order_items', 'order_items.product'])->orderBy($orderBy, $order)->paginate($paginate)->items() : $this->repository->getAll($userInfo->id, $orderStatus, $orderBy, $order);

        if(isset($items) && count($items))
        {
            $itemsOutput = $this->ordersTransformer->orderTransform($items);

            return $this->successResponse($itemsOutput);
        }

        return $this->setStatusCode(400)->failureResponse([
            'message' => 'Unable to find Orders!'
            ], 'No Orders Found !');
    }

    public function pastOrders(Request $request)
    {
        $orderStatus= [
            'Completed',
            'Cancelled',
            'Rejected',
            'Delievered'
        ];
        $userInfo   = $this->getAuthenticatedUser();
        $paginate   = $request->get('paginate') ? $request->get('paginate') : false;
        $orderBy    = $request->get('orderBy') ? $request->get('orderBy') : 'id';
        $order      = $request->get('order') ? $request->get('order') : 'ASC';
        $items      = $paginate ? $this->repository->model->where('user_id', $userInfo->id)
        ->whereIn('order_status', $orderStatus)->with(['order_items', 'order_items.product'])->orderBy($orderBy, $order)->paginate($paginate)->items() : $this->repository->getAll($userInfo->id, $orderStatus,$orderBy, $order);

        if(isset($items) && count($items))
        {
            $itemsOutput = $this->ordersTransformer->orderTransform($items);

            return $this->successResponse($itemsOutput);
        }

        return $this->setStatusCode(400)->failureResponse([
            'message' => 'Unable to find Orders!'
            ], 'No Orders Found !');
    }

    /**
     * Create
     *
     * @param Request $request
     * @return string
     */
    public function create(Request $request)
    {
        if($request->get('payment_token'))
        {
            $cartObj    = new EloquentCartRepository;
            $userInfo   = $this->getAuthenticatedUser();
            $userCart   = $cartObj->getUserCart($userInfo->id);
            $order      = new Orders;

            if(isset($userCart) && count($userCart))
            {
                $orderItems = [];
                $orderTotal = 0;

                foreach($userCart as $item)
                {
                    $orderTotal = $orderTotal + ($item->qty * $item->product->price);

                    $orderItems[] = [
                        'product_id'                => $item->product->id,
                        'qty'                       => $item->qty,
                        'price'                     => $item->product->price,
                        'shipping_date'             => date('Y-m-d'),
                        'expected_shipping_date'    => date('Y-m-d')
                    ];
                }

                $orderInfo = [
                    'user_id'           => $userInfo->id,
                    'order_number'      => rand(11111, 99999),
                    'order_total'       => $orderTotal,
                    'description'       => 'This is test ',
                    'order_status'      => 'Pending'
                ];

                $orderInfo = $order->create($orderInfo);

                $orderItems = array_map(function($item) use($orderInfo) {
                    $item['order_id'] = $orderInfo->id;
                    return $item;
                }, $orderItems);

                $status = $orderInfo->order_items()->insert($orderItems);

                if($status)
                {
                    $stripe = new Stripe('sk_test_HULXDAd7QAL1mZjpQhKpdIg7');

                    $charge = $stripe->charges()->create([
                        'amount'            => $orderTotal,
                        'currency'          => 'usd',
                        'description'       => 'Payment Clear by Client',
                        'source'            => $request->get('payment_token'),
                        'statement_descriptor' =>'Test Payment'
                    ]);


                    // Clear Cart Object
                    $cartObj->clearUserCart($userInfo->id);

                    $orderInfo->stripe_id           = $charge['id'];
                    $orderInfo->balance_transaction = $charge['balance_transaction'];
                    $orderInfo->statement_descriptor = $charge['statement_descriptor'];
                    $orderInfo->save();

                    $itemsOutput = $this->ordersTransformer->singleOrderTransform($orderInfo);
                    

                    return $this->successResponse($itemsOutput, 'Orders is Created Successfully');
                }
            }
           
            return $this->setStatusCode(400)->failureResponse([
                'reason' => 'No Products found for Order Process !'
                ], 'User Cart Empty');
        }

        return $this->setStatusCode(400)->failureResponse([
            'reason' => 'Invalid Inputs'
            ], 'Something went wrong !');
    }

    /**
     * View
     *
     * @param Request $request
     * @return string
     */
    public function show(Request $request)
    {
        $itemId = (int) hasher()->decode($request->get($this->primaryKey));

        if($itemId)
        {
            $itemData = $this->repository->getById($itemId);

            if($itemData)
            {
                $responseData = $this->ordersTransformer->transform($itemData);

                return $this->successResponse($responseData, 'View Item');
            }
        }

        return $this->setStatusCode(400)->failureResponse([
            'reason' => 'Invalid Inputs or Item not exists !'
            ], 'Something went wrong !');
    }

    /**
     * Edit
     *
     * @param Request $request
     * @return string
     */
    public function edit(Request $request)
    {
        $itemId = (int) hasher()->decode($request->get($this->primaryKey));

        if($itemId)
        {
            $status = $this->repository->update($itemId, $request->all());

            if($status)
            {
                $itemData       = $this->repository->getById($itemId);
                $responseData   = $this->ordersTransformer->transform($itemData);

                return $this->successResponse($responseData, 'Orders is Edited Successfully');
            }
        }

        return $this->setStatusCode(400)->failureResponse([
            'reason' => 'Invalid Inputs'
        ], 'Something went wrong !');
    }

    /**
     * Delete
     *
     * @param Request $request
     * @return string
     */
    public function delete(Request $request)
    {
        $itemId = (int) hasher()->decode($request->get($this->primaryKey));

        if($itemId)
        {
            $status = $this->repository->destroy($itemId);

            if($status)
            {
                return $this->successResponse([
                    'success' => 'Orders Deleted'
                ], 'Orders is Deleted Successfully');
            }
        }

        return $this->setStatusCode(404)->failureResponse([
            'reason' => 'Invalid Inputs'
        ], 'Something went wrong !');
    }
}