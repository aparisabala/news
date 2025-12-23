<?php

namespace App\Repositories\Site\Landing;

use Illuminate\Http\JsonResponse;

interface ISiteLandingRepository {

    public function display($request) : array;
}
