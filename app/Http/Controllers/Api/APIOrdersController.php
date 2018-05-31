<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Transformers\OrdersTransformer;
use App\Http\Controllers\Api\BaseApiController;
use App\Repositories\Orders\EloquentOrdersRepository;

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
        $model = $this->repository->create($request->all());

        if($model)
        {
            $responseData = $this->ordersTransformer->transform($model);

            return $this->successResponse($responseData, 'Orders is Created Successfully');
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