<?php

namespace App\Providers;

use App\Models\AppData;
use App\Models\DynArticle;
use App\Models\DynArticleComponent;
use App\Models\DynMainMenu;
use App\Models\Institute;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
//vpx_imports
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //vpx_app_register_service_providers
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //vpx_binds
        Paginator::useBootstrapFive();
        View::composer('site.includes.header', function ($view) {
            $data['menus'] = DynMainMenu::with(['page'=>function($q){$q->select(['id','slug']);}])->select(['id','name','dyn_page_id','slug'])->get();
            $view->with('data',$data);
        });
        View::composer('site.pages.landing._fragments._slider', function ($view) {
            $data['sliders'] = DynArticleComponent::where([['type','=','slider']])->latest()->take(5)->get();
            $view->with('data',$data);
        });
         View::composer('site.pages.landing._fragments._side-bar', function ($view) {
            $data['articles'] = DynArticle::latest()->orderBy('page_view','DESC')->take(12)->select(['id','slug','name'])->get();
            $view->with('data',$data);
        });
    }
}
