<?php

namespace App\Http\Controllers\Admin\MainMenu\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainMenu\Crud\ValidateStoreDynMainMenu;
use App\Models\DynCategory;
use App\Models\DynMainMenuCategory;
use App\Models\DynPage;
use App\Repositories\Admin\MainMenu\Crud\IDynMainMenuCrudRepository;
use App\Traits\BaseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class DynMainMenuCrudController  extends Controller {

    use BaseTrait;
    public function __construct(private IDynMainMenuCrudRepository $iDynMainMenuCrudRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth']);
        $this->lang= 'admin.main-menu.crud';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });
        $this->pages = DynPage::select(['id','name'])->get();
        $this->categories =  DynCategory::select(['id','name'])->get();

    }

    /**
     * Index page for dynmainmenu crud
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data = $this->iDynMainMenuCrudRepo->index($request);
        $data['lang'] = $this->lang;
        $data['pages'] = $this->pages;
        $data['categories'] = $this->categories;
        return view('admin.pages.main-menu.crud.index',compact('data'));
    }

    /**
     * List items for yajra datatable for dynmainmenu crud
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request) : JsonResponse
    {
        return  $this->iDynMainMenuCrudRepo->list($request);
    }

    /**
     * Store procedure for comapany crud
     *
     * @param ValidateStoreDynMainMenu $request
     * @return JsonResponse
     */
    public function store(ValidateStoreDynMainMenu $request): JsonResponse
    {
        return $this->iDynMainMenuCrudRepo->store($request);
    }

    /**
     * Index page for view
     *
     * @param integer|string $id
     * @param Request $request
     * @return view
     */
    public function edit($id,Request $request) : view
    {
        $data = $this->iDynMainMenuCrudRepo->index($request,$id);
        $data['lang'] = $this->lang;
        $data['pages'] = $this->pages;
        $data['categories'] = $this->categories;
        $data['categoryTaken'] = DynMainMenuCategory::where([['dyn_main_menu_id','=',$data['item']?->id]])->pluck('dyn_category_id')->toArray();
        return view('admin.pages.main-menu.crud.index', compact('data'));
    }

    /**
     * Update procedure for dynmainmenu
     *
     * @param Request $request
     * @param integer|string $id
     * @return JsonResponse
     */
    public function update(Request $request, $id) : JsonResponse
    {
        return $this->iDynMainMenuCrudRepo->update($request,$id);
    }

    /**
     * Bulk delete list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function deleteList(Request $request) : JsonResponse
    {
       return $this->iDynMainMenuCrudRepo->deleteList($request);
    }


    /**
     * Bulk update list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function updateList(Request $request) : JsonResponse
    {
       return $this->iDynMainMenuCrudRepo->updateList($request);
    }

}
