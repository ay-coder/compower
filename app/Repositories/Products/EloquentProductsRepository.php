<?php namespace App\Repositories\Products;

/**
 * Class EloquentProductsRepository
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\Products\Products;
use App\Models\Category\Category;
use App\Repositories\DbRepository;
use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Library\Push\PushNotification;

class EloquentProductsRepository extends DbRepository
{
    /**
     * Products Model
     *
     * @var Object
     */
    public $model;

    /**
     * Products Title
     *
     * @var string
     */
    public $moduleTitle = 'Products';

    /**
     * Table Headers
     *
     * @var array
     */
    public $tableHeaders = [
        'id'                => 'Id',
        'category_title'    => 'Product Category',
        'title'             => 'Title',
        'model'             => 'Model',
        'qty'               => 'Qty',
        'price'             => 'Price',
        'image_1'           => 'Product Image',
        "actions"           => "Actions"
    ];

    /**
     * Table Columns
     *
     * @var array
     */
    public $tableColumns = [
        'id' =>   [
                'data'          => 'id',
                'name'          => 'id',
                'searchable'    => true,
                'sortable'      => true
            ],
		'category_title' =>   [
                'data'          => 'category_title',
                'name'          => 'category_title',
                'searchable'    => true,
                'sortable'      => true
            ],
		'title' =>   [
                'data'          => 'title',
                'name'          => 'title',
                'searchable'    => true,
                'sortable'      => true
            ],
		'model' =>   [
                'data'          => 'model',
                'name'          => 'model',
                'searchable'    => true,
                'sortable'      => true
            ],
		'qty' =>   [
                'data'          => 'qty',
                'name'          => 'qty',
                'searchable'    => true,
                'sortable'      => true
            ],
		'price' =>   [
                'data'          => 'price',
                'name'          => 'price',
                'searchable'    => true,
                'sortable'      => true
            ],
		'image_1' =>   [
                'data'          => 'image_1',
                'name'          => 'image_1',
                'searchable'    => true,
                'sortable'      => true
            ],
		'actions' => [
            'data'          => 'actions',
            'name'          => 'actions',
            'searchable'    => false,
            'sortable'      => false
        ]
    ];

    /**
     * Is Admin
     *
     * @var boolean
     */
    protected $isAdmin = false;

    /**
     * Admin Route Prefix
     *
     * @var string
     */
    public $adminRoutePrefix = 'admin';

    /**
     * Client Route Prefix
     *
     * @var string
     */
    public $clientRoutePrefix = 'frontend';

    /**
     * Admin View Prefix
     *
     * @var string
     */
    public $adminViewPrefix = 'backend';

    /**
     * Client View Prefix
     *
     * @var string
     */
    public $clientViewPrefix = 'frontend';

    /**
     * Module Routes
     *
     * @var array
     */
    public $moduleRoutes = [
        'listRoute'     => 'products.index',
        'createRoute'   => 'products.create',
        'storeRoute'    => 'products.store',
        'editRoute'     => 'products.edit',
        'updateRoute'   => 'products.update',
        'deleteRoute'   => 'products.destroy',
        'dataRoute'     => 'products.get-list-data'
    ];

    /**
     * Module Views
     *
     * @var array
     */
    public $moduleViews = [
        'listView'      => 'products.index',
        'createView'    => 'products.create',
        'editView'      => 'products.edit',
        'deleteView'    => 'products.destroy',
    ];

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model            = new Products;
        $this->categoryModel    = new Category;
    }

    /**
     * Create Products
     *
     * @param array $input
     * @return mixed
     */
    public function create($input)
    {
        $input = $this->prepareInputData($input, true);
        $model = $this->model->create($input);

        if($model)
        {
            $this->createNewProductNotification($model);
            return $model;
        }

        return false;
    }

    /**
     * Create NewProduct Notification
     * 
     * @param object $model
     */
    public function createNewProductNotification($model)
    {
        $users = User::where('status', 1)->get();

        foreach($users as $user)
        {
            if(isset($user->device_token) && strlen($user->device_token) > 4 && $user->device_type == 1)
            {
                $payload = [
                    'mtitle'    => 'Compower',
                    'mdesc'     => $model->title . " Added by Admin."
                ];

                PushNotification::iOS($payload, $user->device_token);
            }

            if(isset($user->device_token) && strlen($user->device_token) > 4 && $user->device_type == 0)
            {
                $payload = [
                    'mtitle'    => 'Compower',
                    'mdesc'     => $model->title . " Added by Admin."
                ];

                PushNotification::android($payload, $user->device_token);
            }
        }
    }

    /**
     * Update Products
     *
     * @param int $id
     * @param array $input
     * @return bool|int|mixed
     */
    public function update($id, $input)
    {
        $model = $this->model->find($id);

        if($model)
        {
            $input = $this->prepareInputData($input);

            return $model->update($input);
        }

        return false;
    }

    /**
     * Destroy Products
     *
     * @param int $id
     * @return mixed
     * @throws GeneralException
     */
    public function destroy($id)
    {
        $model = $this->model->find($id);

        if($model)
        {
            return $model->delete();
        }

        return  false;
    }

    /**
     * Get All
     *
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getAll($orderBy = 'id', $sort = 'asc')
    {
        return $this->model->with('category')->orderBy($orderBy, $sort)->get();
    }

    /**
     * Get by Id
     *
     * @param int $id
     * @return mixed
     */
    public function getById($id = null)
    {
        if($id)
        {
            return $this->model->find($id);
        }

        return false;
    }

    /**
     * Get Table Fields
     *
     * @return array
     */
    public function getTableFields()
    {
        return [
            $this->model->getTable().'.*',
            $this->categoryModel->getTable().'.title as category_title'
        ];
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model->select($this->getTableFields())
            ->leftjoin($this->categoryModel->getTable(), $this->categoryModel->getTable().'.id', '=', $this->model->getTable().'.category_id')
            ->get();
    }

    /**
     * Set Admin
     *
     * @param boolean $isAdmin [description]
     */
    public function setAdmin($isAdmin = false)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Prepare Input Data
     *
     * @param array $input
     * @param bool $isCreate
     * @return array
     */
    public function prepareInputData($input = array(), $isCreate = false)
    {
        if($isCreate)
        {
            $input = array_merge($input, ['user_id' => access()->user()->id]);
        }

        return $input;
    }

    /**
     * Get Table Headers
     *
     * @return string
     */
    public function getTableHeaders()
    {
        if($this->isAdmin)
        {
            return json_encode($this->setTableStructure($this->tableHeaders));
        }

        $clientHeaders = $this->tableHeaders;

        unset($clientHeaders['username']);

        return json_encode($this->setTableStructure($clientHeaders));
    }

    /**
     * Get Table Columns
     *
     * @return string
     */
    public function getTableColumns()
    {
        if($this->isAdmin)
        {
            return json_encode($this->setTableStructure($this->tableColumns));
        }

        $clientColumns = $this->tableColumns;

        unset($clientColumns['username']);

        return json_encode($this->setTableStructure($clientColumns));
    }

    /**
     * Get Filtered Products
     *
     * @param string $title
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getFilteredProducts($title = '', $orderBy = 'id', $sort = 'asc')
    {
        return $this->model->where('title', 'LIKE', '%'. $title .'%')->with('category')->orderBy($orderBy, $sort)->get();
    }
}