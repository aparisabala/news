<?php

namespace App\Http\Controllers\Admin\Pages\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\Crud\ValidateStoreDynPage;
use App\Repositories\Admin\Pages\Crud\IDynPageCrudRepository;
use App\Traits\BaseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class DynPageCrudController  extends Controller {

    use BaseTrait;
    public function __construct(private IDynPageCrudRepository $iDynPageCrudRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth']);
        $this->lang= 'admin.pages.crud';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });

    }

    /**
     * Index page for dynpage crud
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data = $this->iDynPageCrudRepo->index($request);
        $data['lang'] = $this->lang;
        return view('admin.pages.pages.crud.index',compact('data'));
    }

    /**
     * List items for yajra datatable for dynpage crud
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request) : JsonResponse
    {
        return  $this->iDynPageCrudRepo->list($request);
    }

    /**
     * Store procedure for comapany crud
     *
     * @param ValidateStoreDynPage $request
     * @return JsonResponse
     */
    public function store(ValidateStoreDynPage $request): JsonResponse
    {
        return $this->iDynPageCrudRepo->store($request);
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
        $data = $this->iDynPageCrudRepo->index($request,$id);
        $data['lang'] = $this->lang;
        return view('admin.pages.pages.crud.index', compact('data'));
    }

    /**
     * Update procedure for dynpage
     *
     * @param Request $request
     * @param integer|string $id
     * @return JsonResponse
     */
    public function update(Request $request, $id) : JsonResponse
    {
        return $this->iDynPageCrudRepo->update($request,$id);
    }

    /**
     * Bulk delete list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function deleteList(Request $request) : JsonResponse
    {
       return $this->iDynPageCrudRepo->deleteList($request);
    }


    /**
     * Bulk update list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function updateList(Request $request) : JsonResponse
    {
       return $this->iDynPageCrudRepo->updateList($request);
    }

}