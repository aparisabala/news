<?php

use App\Http\Controllers\Admin\MainMenu\Crud\DynMainMenuCrudController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::resource('main-menu',DynMainMenuCrudController::class)->except(['destroy', 'show']);
    Route::post('main-menu/list',[DynMainMenuCrudController::class,'list']);
    Route::post('main-menu/delete-list',[DynMainMenuCrudController::class,'deleteList']);
    Route::post('main-menu/update-list',[DynMainMenuCrudController::class,'updateList']);
    //vpx_attach
});
