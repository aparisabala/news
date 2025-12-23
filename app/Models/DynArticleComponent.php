<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;

class DynArticleComponent extends Model
{
    use BaseTrait;
    protected $table = "dyn_article_components";

    public function article()
    {
        return $this->hasOne(DynArticle::class,'id','dyn_article_id');
    }
}
