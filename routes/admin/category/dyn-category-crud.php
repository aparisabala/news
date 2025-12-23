<?php

use App\Http\Controllers\Admin\Category\Crud\DynCategoryCrudController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::resource('category',DynCategoryCrudController::class)->except(['destroy', 'show']);
    Route::post('category/list',[DynCategoryCrudController::class,'list']);
    Route::post('category/delete-list',[DynCategoryCrudController::class,'deleteList']);
    Route::post('category/update-list',[DynCategoryCrudController::class,'updateList']);
    //vpx_attach
});
