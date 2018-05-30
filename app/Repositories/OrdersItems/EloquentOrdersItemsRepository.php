<?php namespace App\Repositories\OrdersItems;

/**
 * Class EloquentOrdersItemsRepository
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\OrdersItems\OrdersItems;
use App\Repositories\DbRepository;
use App\Exceptions\GeneralException;

class EloquentOrdersItemsRepository extends DbRepository
{
    /**
     * OrdersItems Model
     *
     * @var Object
     */
    public $model;

    /**
     * OrdersItems Title
     *
     * @var string
     */
    public $moduleTitle = 'OrdersItems';

    /**
     * Table Headers
     *
     * @var array
     */
    public $tableHeaders = [
        'id'        => 'Id',
'order_id'        => 'Order_id',
'product_id'        => 'Product_id',
'qty'        => 'Qty',
'price'        => 'Price',
'shipping_date'        => 'Shipping_date',
'expected_shipping_date'        => 'Expected_shipping_date',
'status'        => 'Status',
'created_at'        => 'Created_at',
'updated_at'        => 'Updated_at',
"actions"         => "Actions"
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
		'order_id' =>   [
                'data'          => 'order_id',
                'name'          => 'order_id',
                'searchable'    => true,
                'sortable'      => true
            ],
		'product_id' =>   [
                'data'          => 'product_id',
                'name'          => 'product_id',
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
		'shipping_date' =>   [
                'data'          => 'shipping_date',
                'name'          => 'shipping_date',
                'searchable'    => true,
                'sortable'      => true
            ],
		'expected_shipping_date' =>   [
                'data'          => 'expected_shipping_date',
                'name'          => 'expected_shipping_date',
                'searchable'    => true,
                'sortable'      => true
            ],
		'status' =>   [
                'data'          => 'status',
                'name'          => 'status',
                'searchable'    => true,
                'sortable'      => true
            ],
		'created_at' =>   [
                'data'          => 'created_at',
                'name'          => 'created_at',
                'searchable'    => true,
                'sortable'      => true
            ],
		'updated_at' =>   [
                'data'          => 'updated_at',
                'name'          => 'updated_at',
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
        'listRoute'     => 'ordersitems.index',
        'createRoute'   => 'ordersitems.create',
        'storeRoute'    => 'ordersitems.store',
        'editRoute'     => 'ordersitems.edit',
        'updateRoute'   => 'ordersitems.update',
        'deleteRoute'   => 'ordersitems.destroy',
        'dataRoute'     => 'ordersitems.get-list-data'
    ];

    /**
     * Module Views
     *
     * @var array
     */
    public $moduleViews = [
        'listView'      => 'ordersitems.index',
        'createView'    => 'ordersitems.create',
        'editView'      => 'ordersitems.edit',
        'deleteView'    => 'ordersitems.destroy',
    ];

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new OrdersItems;
    }

    /**
     * Create OrdersItems
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
     * Update OrdersItems
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
     * Destroy OrdersItems
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
        return $this->model->orderBy($orderBy, $sort)->get();
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
            $this->model->getTable().'.*'
        ];
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model->select($this->getTableFields())->get();
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