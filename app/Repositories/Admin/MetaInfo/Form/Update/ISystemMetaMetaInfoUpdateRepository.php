<?php

namespace App\Repositories\Admin\MetaInfo\Form\Update;

use Illuminate\Http\JsonResponse;

interface ISystemMetaMetaInfoUpdateRepository {

    public function index($request) : array;
    public function update($request) : JsonResponse;
}
