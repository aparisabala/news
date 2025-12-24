<?php

namespace App\Http\Controllers\Site\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\View\View;
use App\Traits\BaseTrait;
use App\Repositories\Site\Landing\ISiteLandingRepository;
//vpx_imports
class SiteLandingController extends Controller
{
    use BaseTrait;
    public function __construct(private ISiteLandingRepository $iSiteLandingRepo)
    {
        $this->lang = 'site.landing.index';
    }

    /**
     * View Site lading page
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        $data['lang'] = $this->lang;
        $data = [...$data,...$this->iSiteLandingRepo->display($request)];
        return view('site.pages.landing.index')->with('data',$data);
    }


    public function menus(Request $request)
    {
        $data['lang'] = $this->lang;
        $data = [...$data,...$this->iSiteLandingRepo->menus($request)];
        return view('site.pages.menus.index')->with('data',$data);
    }

    public function article(Request $request)
    {
        $data['lang'] = $this->lang;
        $data = [...$data,...$this->iSiteLandingRepo->article($request)];
        if($data['article'] != null) {
            $data['article']->page_view += 1;
            $data['article']->save();
        }
        return view('site.pages.article.index')->with('data',$data);
    }


    //vpx_attach
}
