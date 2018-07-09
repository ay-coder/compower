<?php namespace App\Repositories\Orders;

/**
 * Class EloquentOrdersRepository
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\Orders\Orders;
use App\Repositories\DbRepository;
use App\Exceptions\GeneralException;
use App\Models\OrdersItems\OrdersItems;
use App\Models\Access\User\User;

class EloquentOrdersRepository extends DbRepository
{
    /**
     * Orders Model
     *
     * @var Object
     */
    public $model;

    /**
     * Orders Title
     *
     * @var string
     */
    public $moduleTitle = 'Orders';

    /**
     * Table Headers
     *
     * @var array
     */
    public $tableHeaders = [
        'id'                => 'Id',
        'order_number'      => 'Order Number',
        'username'          => 'Customer Name',
        'created_at'        => 'Order Items',
        'order_total'       => 'Order Total',
        'description'       => 'Description',
        'order_status'      => 'Order Status',
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
		'order_number' =>   [
                'data'          => 'order_number',
                'name'          => 'order_number',
                'searchable'    => true,
                'sortable'      => true
            ],
        'username' =>   [
                'data'          => 'username',
                'name'          => 'username',
                'searchable'    => true,
                'sortable'      => true
            ],
        'created_at' =>   [
                'data'          => 'created_at',
                'name'          => 'created_at',
                'searchable'    => false,
                'sortable'      => false
            ],
		'order_total' =>   [
                'data'          => 'order_total',
                'name'          => 'order_total',
                'searchable'    => true,
                'sortable'      => true
            ],
		'description' =>   [
                'data'          => 'description',
                'name'          => 'description',
                'searchable'    => true,
                'sortable'      => true
            ],
		'order_status' =>   [
                'data'          => 'order_status',
                'name'          => 'order_status',
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
        'listRoute'     => 'orders.index',
        'createRoute'   => 'orders.create',
        'storeRoute'    => 'orders.store',
        'editRoute'     => 'orders.edit',
        'updateRoute'   => 'orders.update',
        'deleteRoute'   => 'orders.destroy',
        'dataRoute'     => 'orders.get-list-data'
    ];

    /**
     * Module Views
     *
     * @var array
     */
    public $moduleViews = [
        'listView'      => 'orders.index',
        'createView'    => 'orders.create',
        'editView'      => 'orders.edit',
        'deleteView'    => 'orders.destroy',
    ];

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model            = new Orders;
        $this->userModel        = new User;
        $this->orderItemModel   = new OrdersItems;
    }

    /**
     * Create Orders
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
            return $model;
        }

        return false;
    }

    /**
     * Update Orders
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
     * Destroy Orders
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
    public function getAll($userId = null, $allowedOrders = array(), $orderBy = 'id', $sort = 'asc')
    {
        if($userId)
        {
            return $this->model->whereIn('order_status', $allowedOrders)->where('user_id', $userId)->with(['order_items', 'order_items.product'])->orderBy($orderBy, $sort)->get();
        }
        return false;
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
            $this->userModel->getTable().'.name as username'
        ];
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model->select($this->getTableFields())
                ->leftjoin($this->userModel->getTable(), $this->userModel->getTable().'.id', '=', $this->model->getTable().'.user_id')
                ->leftjoin($this->orderItemModel->getTable(), $this->orderItemModel->getTable().'.order_id', '=', $this->model->getTable().'.id')
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
}