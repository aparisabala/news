<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;
//vpx_imports
//crudDone
class DynCategory extends Model
{
    use BaseTrait;
    protected $table = "dyn_categories";
    protected $fillable = [
        'name',
        'serial'
    ];

    public function components()
    {
        return $this->hasMany(DynArticleComponent::class,'dyn_category_id','id');
    }
    //vpx_attach
}
