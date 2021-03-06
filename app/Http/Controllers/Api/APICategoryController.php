<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Transformers\CategoryTransformer;
use App\Http\Controllers\Api\BaseApiController;
use App\Repositories\Category\EloquentCategoryRepository;

class APICategoryController extends BaseApiController
{
    /**
     * Category Transformer
     *
     * @var Object
     */
    protected $categoryTransformer;

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
    protected $primaryKey = 'category_id';

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->repository                       = new EloquentCategoryRepository();
        $this->categoryTransformer = new CategoryTransformer();
    }

    /**
     * List of All Category
     *
     * @param Request $request
     * @return json
     */
    public function index(Request $request)
    {
        $paginate   = $request->get('paginate') ? $request->get('paginate') : false;
        $productCount= $request->get('product_count') ? $request->get('product_count') : 10000;

        $orderBy    = $request->get('orderBy') ? $request->get('orderBy') : 'id';
        $order      = $request->get('order') ? $request->get('order') : 'ASC';
        $items      = $paginate ? $this->repository->model->with('products')->orderBy($orderBy, $order)->paginate($paginate)->items() : $this->repository->getAll($orderBy, $order);

        if(isset($items) && count($items))
        {
            $itemsOutput = $this->categoryTransformer->getCategories($items, $productCount);

            return $this->successResponse($itemsOutput);
        }

        return $this->setStatusCode(400)->failureResponse([
            'message' => 'Unable to find Category!'
            ], 'No Category Found !');
    }

    /**
     * Filter Categories
     * 
     * @param Request $request
     * @return json
     */
    public function filterCategories(Request $request)
    {
        if($request->get('title'))
        {
            $paginate   = $request->get('paginate') ? $request->get('paginate') : false;
            $orderBy    = $request->get('orderBy') ? $request->get('orderBy') : 'id';
            $order      = $request->get('order') ? $request->get('order') : 'ASC';
            $title      = $request->get('title') ? $request->get('title') : '';
            $items      = $paginate ? $this->repository->model->with('products')->where('title', 'LIKE', $title)
                ->orderBy($orderBy, $order)->paginate($paginate)->items() : $this->repository->getFilteredCategories($title, $orderBy, $order);

            if(isset($items) && count($items))
            {
                $itemsOutput = $this->categoryTransformer->transformCollection($items);

                return $this->successResponse($itemsOutput);
            }
        }

        return $this->setStatusCode(400)->failureResponse([
            'message' => 'Unable to find Category!'
            ], 'No Category Found !');
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
            $responseData = $this->categoryTransformer->transform($model);

            return $this->successResponse($responseData, 'Category is Created Successfully');
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
                $responseData = $this->categoryTransformer->transform($itemData);

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
                $responseData   = $this->categoryTransformer->transform($itemData);

                return $this->successResponse($responseData, 'Category is Edited Successfully');
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
                    'success' => 'Category Deleted'
                ], 'Category is Deleted Successfully');
            }
        }

        return $this->setStatusCode(404)->failureResponse([
            'reason' => 'Invalid Inputs'
        ], 'Something went wrong !');
    }
}