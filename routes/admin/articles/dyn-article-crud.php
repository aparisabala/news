<?php

use App\Http\Controllers\Admin\Articles\Crud\DynArticleCrudController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::resource('articles',DynArticleCrudController::class)->except(['destroy', 'show']);
    Route::post('articles/list',[DynArticleCrudController::class,'list']);
    Route::post('articles/delete-list',[DynArticleCrudController::class,'deleteList']);
    Route::post('articles/update-list',[DynArticleCrudController::class,'updateList']);
    //vpx_attach
});
