<?php namespace App\Repositories\Notifications;

/**
 * Class EloquentNotificationsRepository
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\Notifications\Notifications;
use App\Repositories\DbRepository;
use App\Exceptions\GeneralException;
use App\Library\Push\PushNotification;

class EloquentNotificationsRepository extends DbRepository
{
    /**
     * Notifications Model
     *
     * @var Object
     */
    public $model;

    /**
     * Notifications Title
     *
     * @var string
     */
    public $moduleTitle = 'Notifications';

    /**
     * Table Headers
     *
     * @var array
     */
    public $tableHeaders = [
        'id'        => 'Id',
'user_id'        => 'User_id',
'description'        => 'Description',
'icon'        => 'Icon',
'is_read'        => 'Is_read',
'read_time'        => 'Read_time',
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
		'description' =>   [
                'data'          => 'description',
                'name'          => 'description',
                'searchable'    => true,
                'sortable'      => true
            ],
		'icon' =>   [
                'data'          => 'icon',
                'name'          => 'icon',
                'searchable'    => true,
                'sortable'      => true
            ],
		'is_read' =>   [
                'data'          => 'is_read',
                'name'          => 'is_read',
                'searchable'    => true,
                'sortable'      => true
            ],
		'read_time' =>   [
                'data'          => 'read_time',
                'name'          => 'read_time',
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
        'listRoute'     => 'notifications.index',
        'createRoute'   => 'notifications.create',
        'storeRoute'    => 'notifications.store',
        'editRoute'     => 'notifications.edit',
        'updateRoute'   => 'notifications.update',
        'deleteRoute'   => 'notifications.destroy',
        'dataRoute'     => 'notifications.get-list-data'
    ];

    /**
     * Module Views
     *
     * @var array
     */
    public $moduleViews = [
        'listView'      => 'notifications.index',
        'createView'    => 'notifications.create',
        'editView'      => 'notifications.edit',
        'deleteView'    => 'notifications.destroy',
    ];

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new Notifications;
    }

    /**
     * Create Notifications
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
     * Update Notifications
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
     * Destroy Notifications
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
    public function getAll($userId = null, $orderBy = 'id', $sort = 'asc')
    {
        if($userId)
        {
            return $this->model->where('user_id', $userId)->orderBy($orderBy, $sort)->get();
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

    public function itemShippingPushNotification($item = null)
    {
        if(isset($item))
        {
            $notificationText   =  $item->product->title . ' Shipping Status updated.';
            $payload            = [
                    'mtitle'    => '',
                    'mdesc'     => $notificationText
                ];
            $notificationData   = [
                'user_id'           => $item->order->user->id,
                'product_id'        => $item->product_id,
                'description'       => $notificationText,
                'is_read'           => 0,
                'icon'              => 'Shipping_Status_Updated.png',
                'notification_type' => 'Shipping_Status_Updated'
            ];

            if(isset($item->order->user->device_token) && $item->order->user->device_type == 1)
            {
                PushNotification::iOS($payload, $item->order->user->device_token);
            }
            else if(isset($item->order->user->device_token))
            {
                PushNotification::android($payload, $user->device_token);
            }

            return $this->model->create($notificationData);
        }

        return true;
    }
}