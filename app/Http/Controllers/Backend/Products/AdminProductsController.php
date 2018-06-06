<?php namespace App\Http\Controllers\Backend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Products\EloquentProductsRepository;
use App\Repositories\Category\EloquentCategoryRepository;
use Html;
use Cartalyst\Stripe\Stripe;

/**
 * Class AdminProductsController
 */
class AdminProductsController extends Controller
{
    /**
     * Products Repository
     *
     * @var object
     */
    public $repository;

    /**
     * Create Success Message
     *
     * @var string
     */
    protected $createSuccessMessage = "Products Created Successfully!";

    /**
     * Edit Success Message
     *
     * @var string
     */
    protected $editSuccessMessage = "Products Edited Successfully!";

    /**
     * Delete Success Message
     *
     * @var string
     */
    protected $deleteSuccessMessage = "Products Deleted Successfully";

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->repository           = new EloquentProductsRepository;
        $this->categoryRepository   = new EloquentCategoryRepository;
    }

    /**
     * Products Listing
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
     * Products View
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository'            => $this->repository,
            'categoryRepository'    => $this->categoryRepository
        ]);
    }

    /**
     * Products Store
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input = array_merge($input, ['image_1' => 'default.png']);

        if($request->file('pdf_1'))
        {
            $imageName  = rand(11111, 99999) . '_pdf.' . $request->file('pdf_1')->getClientOriginalExtension();
            $request->file('pdf_1')->move(base_path() . '/public/uploads/pdf/', $imageName);
            $input = array_merge($input, ['pdf_1' => $imageName]);
        }

        if($request->file('pdf_2'))
        {
            $imageName  = rand(11111, 99999) . '_pdf.' . $request->file('pdf_2')->getClientOriginalExtension();
            $request->file('pdf_2')->move(base_path() . '/public/uploads/pdf/', $imageName);
            $input = array_merge($input, ['pdf_2' => $imageName]);
        }

        if($request->file('pdf_3'))
        {
            $imageName  = rand(11111, 99999) . '_pdf.' . $request->file('pdf_3')->getClientOriginalExtension();
            $request->file('pdf_3')->move(base_path() . '/public/uploads/pdf/', $imageName);
            $input = array_merge($input, ['pdf_3' => $imageName]);
        }

        if($request->file('chart_1'))
        {
            $imageName  = rand(11111, 99999) . '_chart.' . $request->file('chart_1')->getClientOriginalExtension();
            $request->file('chart_1')->move(base_path() . '/public/uploads/charts/', $imageName);
            $input = array_merge($input, ['chart_1' => $imageName]);
        }

        if($request->file('chart_2'))
        {
            $imageName  = rand(11111, 99999) . '_chart.' . $request->file('chart_2')->getClientOriginalExtension();
            $request->file('chart_2')->move(base_path() . '/public/uploads/charts/', $imageName);
            $input = array_merge($input, ['chart_2' => $imageName]);
        }

        if($request->file('chart_3'))
        {
            $imageName  = rand(11111, 99999) . '_chart.' . $request->file('chart_3')->getClientOriginalExtension();
            $request->file('chart_3')->move(base_path() . '/public/uploads/charts/', $imageName);
            $input = array_merge($input, ['chart_3' => $imageName]);
        }

        if($request->file('image_1'))
        {
            $imageName  = rand(11111, 99999) . '_product.' . $request->file('image_1')->getClientOriginalExtension();
            $request->file('image_1')->move(base_path() . '/public/uploads/products/', $imageName);
            $input = array_merge($input, ['image_1' => $imageName]);
        }

        if($request->file('image_2'))
        {
            $imageName  = rand(11111, 99999) . '_product.' . $request->file('image_2')->getClientOriginalExtension();
            $request->file('image_2')->move(base_path() . '/public/uploads/products/', $imageName);
            $input = array_merge($input, ['image_2' => $imageName]);
        }

        if($request->file('image_3'))
        {
            $imageName  = rand(11111, 99999) . '_product.' . $request->file('image_3')->getClientOriginalExtension();
            $request->file('image_3')->move(base_path() . '/public/uploads/products/', $imageName);
            $input = array_merge($input, ['image_3' => $imageName]);
        }

        if($request->file('image_4'))
        {
            $imageName  = rand(11111, 99999) . '_product.' . $request->file('image_4')->getClientOriginalExtension();
            $request->file('image_4')->move(base_path() . '/public/uploads/products/', $imageName);
            $input = array_merge($input, ['image_4' => $imageName]);
        }

        if($request->file('image_5'))
        {
            $imageName  = rand(11111, 99999) . '_product.' . $request->file('image_5')->getClientOriginalExtension();
            $request->file('image_5')->move(base_path() . '/public/uploads/products/', $imageName);
            $input = array_merge($input, ['image_5' => $imageName]);
        }


        $this->repository->create($input);

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->createSuccessMessage);
    }

    /**
     * Products Edit
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $item = $this->repository->findOrThrowException($id);

        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'                  => $item,
            'repository'            => $this->repository,
            'categoryRepository'    => $this->categoryRepository
        ]);
    }

    /**
     * Products Show
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
     * Products Update
     *
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * Products Destroy
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
            ->addColumn('image_1', function ($item) 
            {
                if(file_exists(public_path('uploads/products/'.$item->image_1)))
                {
                    return  Html::image('/uploads/products/'.$item->image_1, 'Image', ['width' => 60, 'height' => 60]);    
                }

                return '';
            })
            ->addColumn('price', function ($item) 
            {
                return '$ ' . $item->price;
            })
            ->addColumn('status', function ($item) 
            {
                return $item->status == 1 ? 'Active' : 'InActive';
            })
            ->addColumn('actions', function ($item) {
                return $item->admin_action_buttons;
            })
            ->make(true);
    }
}