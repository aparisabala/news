<?php

namespace App\Http\Controllers\Admin\Articles\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Articles\Crud\ValidateStoreDynArticle;
use App\Models\DynArticleComponent;
use App\Models\DynCategory;
use App\Repositories\Admin\Articles\Crud\IDynArticleCrudRepository;
use App\Traits\BaseTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class DynArticleCrudController  extends Controller {

    use BaseTrait;
    public function __construct(private IDynArticleCrudRepository $iDynArticleCrudRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth']);
        $this->lang= 'admin.articles.crud';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });
        $this->categories =  DynCategory::select(['id','name'])->get();

    }

    /**
     * Index page for dynarticle crud
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data = $this->iDynArticleCrudRepo->index($request);
        $data['lang'] = $this->lang;
        $data['categories'] = $this->categories;
        return view('admin.pages.articles.crud.index',compact('data'));
    }

    /**
     * List items for yajra datatable for dynarticle crud
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request) : JsonResponse
    {
        return  $this->iDynArticleCrudRepo->list($request);
    }

    /**
     * Store procedure for comapany crud
     *
     * @param ValidateStoreDynArticle $request
     * @return JsonResponse
     */
    public function store(ValidateStoreDynArticle $request): JsonResponse
    {
        return $this->iDynArticleCrudRepo->store($request);
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
        $data = $this->iDynArticleCrudRepo->index($request,$id);
        $data['lang'] = $this->lang;
        $data['categories'] = $this->categories;
        $data['componentTaken'] = DynArticleComponent::where([['dyn_article_id','=',$data['item']?->id]])
        ->whereIn('componet_type',['components'])
        ->pluck('type')->toArray();
        $data['categoryTaken'] = DynArticleComponent::where([['dyn_article_id','=',$data['item']?->id]])->pluck('dyn_category_id')->toArray();
        return view('admin.pages.articles.crud.index', compact('data'));
    }

    /**
     * Update procedure for dynarticle
     *
     * @param Request $request
     * @param integer|string $id
     * @return JsonResponse
     */
    public function update(Request $request, $id) : JsonResponse
    {
        return $this->iDynArticleCrudRepo->update($request,$id);
    }

    /**
     * Bulk delete list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function deleteList(Request $request) : JsonResponse
    {
       return $this->iDynArticleCrudRepo->deleteList($request);
    }


    /**
     * Bulk update list resources
     *
     * @param Request $request
     * @return JsonResponse
     */
     public function updateList(Request $request) : JsonResponse
    {
       return $this->iDynArticleCrudRepo->updateList($request);
    }

}
