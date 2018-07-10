<?php namespace App\Http\Controllers\Backend\OrdersItems;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\OrdersItems\EloquentOrdersItemsRepository;
use App\Repositories\Notifications\EloquentNotificationsRepository;

/**
 * Class AdminOrdersItemsController
 */
class AdminOrdersItemsController extends Controller
{
    /**
     * OrdersItems Repository
     *
     * @var object
     */
    public $repository;

    /**
     * Create Success Message
     *
     * @var string
     */
    protected $createSuccessMessage = "OrdersItems Created Successfully!";

    /**
     * Edit Success Message
     *
     * @var string
     */
    protected $editSuccessMessage = "OrdersItems Edited Successfully!";

    /**
     * Delete Success Message
     *
     * @var string
     */
    protected $deleteSuccessMessage = "OrdersItems Deleted Successfully";

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->repository = new EloquentOrdersItemsRepository;
    }

    /**
     * OrdersItems Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view($this->repository->setAdmin(true)->getModuleView('listView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * OrdersItems View
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * OrdersItems Store
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->createSuccessMessage);
    }

    /**
     * OrdersItems Edit
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $item = $this->repository->findOrThrowException($id);

        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $item,
            'repository'    => $this->repository
        ]);
    }

    /**
     * OrdersItems Show
     *
     * @return \Illuminate\View\View
     */
    public function show($id, Request $request)
    {
        $item = $this->repository->findOrThrowException($id);

        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $item,
            'repository'    => $this->repository
        ]);
    }


    /**
     * OrdersItems Update
     *
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * OrdersItems Destroy
     *
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $status = $this->repository->destroy($id);

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->deleteSuccessMessage);
    }

    /**
     * Get Table Data
     *
     * @return json|mixed
     */
    public function getTableData()
    {
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['id', 'sort'])
            ->addColumn('actions', function ($item) {
                return $item->admin_action_buttons;
            })
            ->make(true);
    }

    public function updateShippingDate(Request $request)
    {
        $notificationRepo = new EloquentNotificationsRepository;

        if($request->get('itemId') && $request->get('shippingDate'))
        {
            $model = $this->repository->model->with(['order', 'product', 'order.user'])->where('id', $request->get('itemId'))->first();

            if(isset($model->id))
            {
                $model->shipping_date = date('Y-m-d', strtotime($request->get('shippingDate')));
                $model->shipping_status = $request->get('shippingStatus');
                
                if($model->save())
                {
                    $notificationRepo->itemShippingPushNotification($model);

                    $response = [
                        'status'    => true,
                        'message'   => 'Shipping Status and Date successfully updated !'
                    ];

                    return response()->json((object)$response,200);
                }

            }
        }

        $response = [
            'status'    => false,
            'message'   => 'Product not Found - Invalid Inputs!'
        ];
        
        return response()->json((object)$response,200);
    }
}