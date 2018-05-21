<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Transformers\CartTransformer;
use App\Http\Controllers\Api\BaseApiController;
use App\Repositories\Cart\EloquentCartRepository;
use Illuminate\Support\Facades\Validator;

class APICartController extends BaseApiController
{
    /**
     * Cart Transformer
     *
     * @var Object
     */
    protected $cartTransformer;

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
    protected $primaryKey = 'cartId';

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->repository                       = new EloquentCartRepository();
        $this->cartTransformer = new CartTransformer();
    }

    /**
     * List of All Cart
     *
     * @param Request $request
     * @return json
     */
    public function index(Request $request)
    {
        $paginate   = $request->get('paginate') ? $request->get('paginate') : false;
        $orderBy    = $request->get('orderBy') ? $request->get('orderBy') : 'id';
        $order      = $request->get('order') ? $request->get('order') : 'ASC';
        $items      = $paginate ? $this->repository->model->orderBy($orderBy, $order)->paginate($paginate)->items() : $this->repository->getAll($orderBy, $order);

        if(isset($items) && count($items))
        {
            $itemsOutput = $this->cartTransformer->transformCollection($items);

            return $this->successResponse($itemsOutput);
        }

        return $this->setStatusCode(400)->failureResponse([
            'message' => 'Unable to find Cart!'
            ], 'No Cart Found !');
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
            $responseData = $this->cartTransformer->transform($model);

            return $this->successResponse($responseData, 'Cart is Created Successfully');
        }

        return $this->setStatusCode(400)->failureResponse([
            'reason' => 'Invalid Inputs'
            ], 'Something went wrong !');
    }

    /**
     * Add To Cart
     *
     * @param Request $request
     * @return string
     */
    public function add(Request $request)
    {
        if($request->get('product_id'))
        {
            $productId  = $request->get('product_id');   
            $input      = $request->all();
            $userInfo   = $this->getAuthenticatedUser();
            $input      = array_merge($input, ['user_id' => $userInfo->id]);
            $status     = $this->repository->addToCart($userInfo->id, $productId, $input);

            if($status)
            {
                $items          = $this->repository->model->with(['product', 'user'])->where('user_id', $userInfo->id)->get();
                $itemsOutput    = $this->cartTransformer->showCart($items);
                return $this->successResponse($itemsOutput);
            }
        }

        return $this->setStatusCode(400)->failureResponse([
            'reason' => 'Invalid Inputs'
            ], 'Something went wrong !');
    }

    /**
     * Remove From Cart
     *
     * @param Request $request
     * @return string
     */
    public function removeFromCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id'     => 'required'
        ]);

        if($validator->fails()) 
        {
            $messageData = '';

            foreach($validator->messages()->toArray() as $message)
            {
                $messageData = $message[0];
            }
            return $this->failureResponse($validator->messages(), $messageData);
        }

        $product_id = $request->get('product_id');   
        $userInfo   = $this->getAuthenticatedUser();
        $status     = $this->repository->removeFromCart($userInfo->id, $product_id);

        if($status)
        {
            $items          = $this->repository->model->with(['product', 'user'])->where('user_id', $userInfo->id)->get();
            $itemsOutput    = $this->cartTransformer->showCart($items);
            return $this->successResponse($itemsOutput);
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
                $responseData = $this->cartTransformer->transform($itemData);

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
                $responseData   = $this->cartTransformer->transform($itemData);

                return $this->successResponse($responseData, 'Cart is Edited Successfully');
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
                    'success' => 'Cart Deleted'
                ], 'Cart is Deleted Successfully');
            }
        }

        return $this->setStatusCode(404)->failureResponse([
            'reason' => 'Invalid Inputs'
        ], 'Something went wrong !');
    }
}