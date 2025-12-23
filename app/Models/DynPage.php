<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;
//vpx_imports
//crudDone
class DynPage extends Model
{
    use BaseTrait;
    protected $table = "dyn_pages";
    protected $fillable = [
        'name',
        'feature_image',
        'extension',
        'content'
        //'serial'
    ];
    //vpx_attach
}
