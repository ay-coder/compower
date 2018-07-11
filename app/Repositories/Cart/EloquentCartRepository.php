<?php namespace App\Repositories\Cart;

/**
 * Class EloquentCartRepository
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\Cart\Cart;
use App\Repositories\DbRepository;
use App\Exceptions\GeneralException;

class EloquentCartRepository extends DbRepository
{
    /**
     * Cart Model
     *
     * @var Object
     */
    public $model;

    /**
     * Cart Title
     *
     * @var string
     */
    public $moduleTitle = 'Cart';

    /**
     * Table Headers
     *
     * @var array
     */
    public $tableHeaders = [
        'id'        => 'Id',
'user_id'        => 'User_id',
'product_id'        => 'Product_id',
'qty'        => 'Qty',
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
		'user_id' =>   [
                'data'          => 'user_id',
                'name'          => 'user_id',
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
        'listRoute'     => 'cart.index',
        'createRoute'   => 'cart.create',
        'storeRoute'    => 'cart.store',
        'editRoute'     => 'cart.edit',
        'updateRoute'   => 'cart.update',
        'deleteRoute'   => 'cart.destroy',
        'dataRoute'     => 'cart.get-list-data'
    ];

    /**
     * Module Views
     *
     * @var array
     */
    public $moduleViews = [
        'listView'      => 'cart.index',
        'createView'    => 'cart.create',
        'editView'      => 'cart.edit',
        'deleteView'    => 'cart.destroy',
    ];

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new Cart;
    }

    /**
     * Create Cart
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
     * Update Cart
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
     * Destroy Cart
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

    /**
     * Add To Cart
     * 
     * @param int $userId
     * @param int $productId
     * @param array $input
     * @return bool
     */
    public function addToCart($userId = null, $productId = null, $input = array())
    {
        if($userId && $productId)
        {
            $this->model->where(['user_id' => $userId, 'product_id' => $productId])->delete();
            return $this->model->create($input);
        }
        
        return false;
    }   

    /**
     * Add To Bag
     * 
     * @param int $userId
     * @param int $productId
     * @param array $input
     */
    public function addToBag($userId = null, $productId = null, $input = array())
    {
        if($userId && $productId)
        {
            $cartObj = $this->model->where(['user_id' => $userId, 'product_id' => $productId])->first();

            if($cartObj)
            {
                $cartObj->qty = $cartObj->qty + 1;
                return $cartObj->save();
            }
            return $this->model->create($input);
        }
        
        return false;
    }

    

    /**
     * Remove FromCart
     * 
     * @param int $userId
     * @param int $product_id
     * @return json
     */
    public function removeFromCart($userId = null, $product_id = null)
    {
        if($userId && $product_id)
        {
            return $this->model->where(['user_id' => $userId, 'product_id' => $product_id])->delete();
        }
        
        return false;
    }

    /**
     * Get User Cart description]
     * @param  [type] $userId [description]
     * @return [type]         [description]
     */
    public function getUserCart($userId = null)
    {
        if($userId)
        {
            return $this->model->with('product')->where('user_id', $userId)->get();           
        }

        return false;
    }


    /**
     * Clear User Cart
     * 
     * @param int $userId
     * @return bool
     */
    public function clearUserCart($userId = null)
    {
        if($userId)
        {
            return $this->model->where('user_id', $userId)->delete();           
        }

        return false;
    }
}