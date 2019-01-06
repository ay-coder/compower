<?php namespace App\Repositories\Distributors;

/**
 * Class EloquentDistributorsRepository
 *
 * @author Anuj Jaha ( er.anujjaha@gmail.com)
 */

use App\Models\Distributors\Distributors;
use App\Repositories\DbRepository;
use App\Models\DistributorCountries\DistributorCountries;
use App\Exceptions\GeneralException;

class EloquentDistributorsRepository extends DbRepository
{
    /**
     * Distributors Model
     *
     * @var Object
     */
    public $model;

    /**
     * Distributors Title
     *
     * @var string
     */
    public $moduleTitle = 'Distributors';

    /**
     * Table Headers
     *
     * @var array
     */
    public $tableHeaders = [
        'id'            => 'Id',
        'country_title' => 'Country Title',
        'title'         => 'Title',
        'contact'        => 'Contact',
        'email'        => 'Email',
        'phone'        => 'Phone',
        'fax'        => 'Fax',
        'website'        => 'Website',
        'skype'        => 'Skype',
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
		'country_title' =>   [
                'data'          => 'country_title',
                'name'          => 'country_title',
                'searchable'    => true,
                'sortable'      => true
            ],
		'title' =>   [
                'data'          => 'title',
                'name'          => 'title',
                'searchable'    => true,
                'sortable'      => true
            ],
		'contact' =>   [
                'data'          => 'contact',
                'name'          => 'contact',
                'searchable'    => true,
                'sortable'      => true
            ],
        'email' =>   [
                'data'          => 'email',
                'name'          => 'email',
                'searchable'    => true,
                'sortable'      => true
            ],
		'phone' =>   [
                'data'          => 'phone',
                'name'          => 'phone',
                'searchable'    => true,
                'sortable'      => true
            ],
		'fax' =>   [
                'data'          => 'fax',
                'name'          => 'fax',
                'searchable'    => true,
                'sortable'      => true
            ],
		'website' =>   [
                'data'          => 'website',
                'name'          => 'website',
                'searchable'    => true,
                'sortable'      => true
            ],
		
		'skype' =>   [
                'data'          => 'skype',
                'name'          => 'skype',
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
        'listRoute'     => 'distributors.index',
        'createRoute'   => 'distributors.create',
        'storeRoute'    => 'distributors.store',
        'editRoute'     => 'distributors.edit',
        'updateRoute'   => 'distributors.update',
        'deleteRoute'   => 'distributors.destroy',
        'dataRoute'     => 'distributors.get-list-data'
    ];

    /**
     * Module Views
     *
     * @var array
     */
    public $moduleViews = [
        'listView'      => 'distributors.index',
        'createView'    => 'distributors.create',
        'editView'      => 'distributors.edit',
        'deleteView'    => 'distributors.destroy',
    ];

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model                    = new Distributors;
        $this->distributorCountryModel   = new DistributorCountries;
    }

    /**
     * Create Distributors
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
     * Update Distributors
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
     * Destroy Distributors
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
            $this->model->getTable().'.*',
            $this->distributorCountryModel->getTable().'.title as country_title'
        ];
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model->select($this->getTableFields())
            ->leftjoin($this->distributorCountryModel->getTable(), $this->distributorCountryModel->getTable().'.id', '=', $this->model->getTable().'.country_id')
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