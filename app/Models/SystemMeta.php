<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Model;
//vpx_imports
class SystemMeta extends Model
{
    use BaseTrait;
    protected $table = "system_metas";
    protected $fillable = [
        'service_name',
        'main_meta',
        'keywords',
        'logo',
        'favicon',
        'meta_tags',
        'about_us'
    ];
    //vpx_attach
}
