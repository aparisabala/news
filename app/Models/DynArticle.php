<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;
//vpx_imports
//crudDone
class DynArticle extends Model
{
    use BaseTrait;
    protected $table = "dyn_articles";
    protected $fillable = [
        'name',
        'meta_description',
        'meta_keywords',
        'slug',
        'feature_image',
        'extension',
        'content'
        //'serial'
    ];
    //vpx_attach
}
