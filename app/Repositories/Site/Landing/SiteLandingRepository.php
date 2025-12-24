<?php

namespace App\Repositories\Site\Landing;

use App\Models\DynArticleComponent;
use App\Models\DynCategory;
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

    public function page($request) : array
    {
        $data['page'] = DynPage::where([['slug','=',$request->slug]])->first();
        return $data;
    }
}
