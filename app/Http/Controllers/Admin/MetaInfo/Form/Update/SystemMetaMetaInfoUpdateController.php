<?php

namespace App\Http\Controllers\Admin\MetaInfo\Form\Update;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\MetaInfo\Form\Update\ISystemMetaMetaInfoUpdateRepository;
use App\Traits\BaseTrait;
use App\Models\SystemMeta;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SystemMetaMetaInfoUpdateController extends Controller {

    use BaseTrait;
    public function __construct(private ISystemMetaMetaInfoUpdateRepository $iSystemMetaMetaInfoUpdateRepo) {
        $this->middleware(['auth:admin','HasAdminUserPassword','HasAdminUserAuth']);
        $this->lang= 'admin.meta-info.form.update';
        $this->middleware(function ($request, $next) {
            $request->merge(['lang' => $this->lang]);
            return $next($request);
        });
    }

    /**
     * View systemmeta update form
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data = $this->iSystemMetaMetaInfoUpdateRepo->index($request);
        $data['lang'] = $this->lang;
        $data['item'] = SystemMeta::find(1);
        return view('admin.pages.meta-info.form.update.index')->with('data',$data);
    }

    /**
     * Update systemmeta form
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
       return $this->iSystemMetaMetaInfoUpdateRepo->update($request);
    }
}
