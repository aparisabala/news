<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;
//vpx_imports
//crudDone
class DynMainMenu extends Model
{
    use BaseTrait;
    protected $table = "dyn_main_menus";
    protected $fillable = [
        'name',
        'dyn_page_id',
        'serial'
    ];
    //vpx_attach
}
