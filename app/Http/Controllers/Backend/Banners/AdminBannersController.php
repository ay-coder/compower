<?php namespace App\Http\Controllers\Backend\Banners;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Banners\EloquentBannersRepository;
use App\Models\Category\Category;
use Html;

/**
 * Class AdminBannersController
 */
class AdminBannersController extends Controller
{
    /**
     * Banners Repository
     *
     * @var object
     */
    public $repository;

    /**
     * Create Success Message
     *
     * @var string
     */
    protected $createSuccessMessage = "Banners Created Successfully!";

    /**
     * Edit Success Message
     *
     * @var string
     */
    protected $editSuccessMessage = "Banners Edited Successfully!";

    /**
     * Delete Success Message
     *
     * @var string
     */
    protected $deleteSuccessMessage = "Banners Deleted Successfully";

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->repository = new EloquentBannersRepository;
    }

    /**
     * Banners Listing
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
     * Banners View
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $categories = Category::pluck('title', 'id')->toArray();
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository' => $this->repository,
            'categories' => $categories
        ]);
    }

    /**
     * Banners Store
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($request->file('image'))
        {
            $imageName  = rand(11111, 99999) . '_banner.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path() . '/public/uploads/banner/', $imageName);
            $input = array_merge($input, ['image' => $imageName]);
        }

        $this->repository->create($input);

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->createSuccessMessage);
    }

    /**
     * Banners Edit
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $item       = $this->repository->findOrThrowException($id);
        $categories = Category::pluck('title', 'id')->toArray();

        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $item,
            'categories'    => $categories,
            'repository'    => $this->repository
        ]);
    }

    /**
     * Banners Show
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
     * Banners Update
     *
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        if($request->file('image'))
        {
            $imageName  = rand(11111, 99999) . '_banner.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path() . '/public/uploads/banner/', $imageName);
            $input = array_merge($input, ['image' => $imageName]);
        }

        $status = $this->repository->update($id, $input);

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * Banners Destroy
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
            ->addColumn('image', function ($item) {
                if(file_exists(public_path('uploads/banner/'.$item->image)))
                {
                    return  Html::image('/uploads/banner/'.$item->image, 'Image', ['width' => 60, 'height' => 60]);
                }

                return '';
            })
            ->addColumn('actions', function ($item) {
                return $item->admin_action_buttons;
            })
            ->make(true);
    }
}