<?php namespace App\Repositories\Pages;

/**
 * Class EloquentPagesRepository
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\Pages\Pages;
use App\Repositories\DbRepository;
use App\Exceptions\GeneralException;

class EloquentPagesRepository extends DbRepository
{
    /**
     * Pages Model
     *
     * @var Object
     */
    public $model;

    /**
     * Pages Title
     *
     * @var string
     */
    public $moduleTitle = 'Pages';

    /**
     * Table Headers
     *
     * @var array
     */
    public $tableHeaders = [
        'id'                => 'Id',
        'data_key'          => 'Identity',
        'title'             => 'Title',
        'slug'              => 'Slug',
        'meta_title'        => 'Meta Title',
        'meta_description'  => 'Meta Description',
        'short_description' => 'Short Description',
        'full_description'  => 'Full Description',
        'icon'              => 'Icon',
        'image'             => 'Image',
        'status'            => 'Status',
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
        'data_key' =>   [
                'data'          => 'data_key',
                'name'          => 'data_key',
                'searchable'    => true,
                'sortable'      => true
            ],
        'title' =>   [
                'data'          => 'title',
                'name'          => 'title',
                'searchable'    => true,
                'sortable'      => true
            ],
		'slug' =>   [
                'data'          => 'slug',
                'name'          => 'slug',
                'searchable'    => true,
                'sortable'      => true
            ],
		'meta_title' =>   [
                'data'          => 'meta_title',
                'name'          => 'meta_title',
                'searchable'    => true,
                'sortable'      => true
            ],
		'meta_description' =>   [
                'data'          => 'meta_description',
                'name'          => 'meta_description',
                'searchable'    => true,
                'sortable'      => true
            ],
		'short_description' =>   [
                'data'          => 'short_description',
                'name'          => 'short_description',
                'searchable'    => true,
                'sortable'      => true
            ],
		'full_description' =>   [
                'data'          => 'full_description',
                'name'          => 'full_description',
                'searchable'    => true,
                'sortable'      => true
            ],
		'icon' =>   [
                'data'          => 'icon',
                'name'          => 'icon',
                'searchable'    => true,
                'sortable'      => true
            ],
		'image' =>   [
                'data'          => 'image',
                'name'          => 'image',
                'searchable'    => true,
                'sortable'      => true
            ],
		'status' =>   [
                'data'          => 'status',
                'name'          => 'status',
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
        'listRoute'     => 'pages.index',
        'createRoute'   => 'pages.create',
        'storeRoute'    => 'pages.store',
        'editRoute'     => 'pages.edit',
        'updateRoute'   => 'pages.update',
        'deleteRoute'   => 'pages.destroy',
        'dataRoute'     => 'pages.get-list-data'
    ];

    /**
     * Module Views
     *
     * @var array
     */
    public $moduleViews = [
        'listView'      => 'pages.index',
        'createView'    => 'pages.create',
        'editView'      => 'pages.edit',
        'deleteView'    => 'pages.destroy',
    ];

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new Pages;
    }

    /**
     * Create Pages
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
     * Update Pages
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
     * Destroy Pages
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