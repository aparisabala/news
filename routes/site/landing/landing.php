<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Landing\SiteLandingController;
//vpx_imports
    Route::get('/', [SiteLandingController::class,'index'])->name('site.index');
    Route::get('menus/{slug}', [SiteLandingController::class,'menus']);
//vpx_attach
