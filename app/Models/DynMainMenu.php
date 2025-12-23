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

    public function page()
    {
        return $this->hasOne(DynPage::class,'id','dyn_page_id');
    }
    //vpx_attach
}
