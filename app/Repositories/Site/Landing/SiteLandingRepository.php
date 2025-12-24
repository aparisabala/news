<?php

namespace App\Repositories\Site\Landing;

use App\Models\DynArticleComponent;
use App\Models\DynCategory;
use App\Models\DynMainMenu;
use App\Models\DynMainMenuCategory;
use App\Models\DynPage;
use App\Repositories\BaseRepository;

class SiteLandingRepository  extends BaseRepository implements ISiteLandingRepository
{

    /**
     * Landing  data
     *
     * @param Request $request
     * @return array
     */
    public function display($request) : array
    {
        $data['featured'] = DynArticleComponent::where([['type','=','featured']])->latest()->take(2)->get();
        $data['categories'] = DynCategory::with(['components'=>function($q){$q->take(3);}])->select(['id','name'])->get();
        return $data;
    }

    public function menus($request) : array
    {
        $data['menu'] = DynMainMenu::with(['page'])->where([['slug','=',$request->slug]])->first();
        $categoryIds = DynMainMenuCategory::where([['dyn_main_menu_id','=',$data['menu']?->id]])->pluck('dyn_category_id')->toArray();
        $data['categories'] = DynCategory::whereIn('id',$categoryIds)->with(['components'=>function($q){$q->take(3);}])->select(['id','name'])->get();
        return $data;
    }
}
