<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Landing\SiteLandingController;
//vpx_imports
    Route::get('/', [SiteLandingController::class,'index'])->name('site.index');
//vpx_attach
