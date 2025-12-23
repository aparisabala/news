<?php

use App\Http\Controllers\Admin\Pages\Crud\DynPageCrudController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::resource('pages',DynPageCrudController::class)->except(['destroy', 'show']);
    Route::post('pages/list',[DynPageCrudController::class,'list']);
    Route::post('pages/delete-list',[DynPageCrudController::class,'deleteList']);
    Route::post('pages/update-list',[DynPageCrudController::class,'updateList']);
    //vpx_attach
});
