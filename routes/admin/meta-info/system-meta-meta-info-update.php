<?php

use App\Http\Controllers\Admin\MetaInfo\Form\Update\SystemMetaMetaInfoUpdateController;
use Illuminate\Support\Facades\Route;
//vpx_imports
Route::prefix('admin')->group(function(){
    Route::get('meta-info/update',[SystemMetaMetaInfoUpdateController::class,'index']);
    Route::post('meta-info/update',[SystemMetaMetaInfoUpdateController::class,'update']);
    //vpx_attach
});
