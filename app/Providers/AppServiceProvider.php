<?php

namespace App\Providers;

use App\Models\AppData;
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
            $data['menus'] = DynMainMenu::with(['page'=>function($q){$q->select(['id','slug']);}])->select(['id','name','dyn_page_id'])->get();
            $view->with('data',$data);
        });
    }
}
