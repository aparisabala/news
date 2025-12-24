<?php

namespace App\Repositories\Site\Landing;

use Illuminate\Http\JsonResponse;

interface ISiteLandingRepository {

    public function display($request) : array;
    public function menus($request) : array;
    public function article($request) : array;
}
