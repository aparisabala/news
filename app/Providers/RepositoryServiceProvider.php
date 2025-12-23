<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\IBaseRepository;
use Illuminate\Support\ServiceProvider;
//vpx_imports
use App\Repositories\Site\Landing\ISiteLandingRepository;
use App\Repositories\Site\Landing\SiteLandingRepository;
use App\Repositories\Admin\Articles\Crud\IDynArticleCrudRepository;
use App\Repositories\Admin\Articles\Crud\DynArticleCrudRepository;
use App\Repositories\Admin\MainMenu\Crud\IDynMainMenuCrudRepository;
use App\Repositories\Admin\MainMenu\Crud\DynMainMenuCrudRepository;
use App\Repositories\Admin\Category\Crud\IDynCategoryCrudRepository;
use App\Repositories\Admin\Category\Crud\DynCategoryCrudRepository;
use App\Repositories\Admin\Pages\Crud\IDynPageCrudRepository;
use App\Repositories\Admin\Pages\Crud\DynPageCrudRepository;
use App\Repositories\Admin\System\User\Policy\IAdminUserPolicyRepository;
use App\Repositories\Admin\System\User\Policy\AdminUserPolicyRepository;
use App\Repositories\Admin\System\User\UserRole\Crud\IAdminUserRoleCrudRepository;
use App\Repositories\Admin\System\User\UserRole\Crud\AdminUserRoleCrudRepository;
use App\Repositories\Admin\System\User\Crud\IAdminUserCrudRepository;
use App\Repositories\Admin\System\User\Crud\AdminUserCrudRepository;
class RepositoryServiceProvider extends ServiceProvider
{
        /**
         * Register any application services.
         */
        public function register(): void
        {
            $this->app->bind(abstract: IBaseRepository::class, concrete: BaseRepository::class);
            //vpx_attach
            $this->app->bind(abstract: ISiteLandingRepository::class, concrete: SiteLandingRepository::class);
            $this->app->bind(abstract: IDynArticleCrudRepository::class, concrete: DynArticleCrudRepository::class);
            $this->app->bind(abstract: IDynMainMenuCrudRepository::class, concrete: DynMainMenuCrudRepository::class);
            $this->app->bind(abstract: IDynCategoryCrudRepository::class, concrete: DynCategoryCrudRepository::class);
            $this->app->bind(abstract: IDynPageCrudRepository::class, concrete: DynPageCrudRepository::class);
            $this->app->bind(abstract: IAdminUserPolicyRepository::class, concrete: AdminUserPolicyRepository::class);
            $this->app->bind(abstract: IAdminUserRoleCrudRepository::class, concrete: AdminUserRoleCrudRepository::class);
            $this->app->bind(abstract: IAdminUserCrudRepository::class, concrete: AdminUserCrudRepository::class);
        }
}
