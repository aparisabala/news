<?php

namespace App\Repositories\Site\Landing;

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
        $data['item'] = null;
        return $data;
    }
}
