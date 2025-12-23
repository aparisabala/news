<?php

namespace App\Repositories\Site\Landing;

use App\Models\DynArticleComponent;
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
        $data['sliders'] = DynArticleComponent::where([['type','=','slider']])->latest()->take(5)->get();
        $data['featured'] = DynArticleComponent::where([['type','=','featured']])->latest()->take(2)->get();
        return $data;
    }
}
