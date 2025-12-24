<?php

function uploadsDir()
{
    return [
        'uploads',
        'uploads/' . config('i.service_domain'),
        'uploads/' . config('i.service_domain') . '/summernote',
        "uploads/app/" . config('i.service_domain') . "/dyn",
        "uploads/app/" . config('i.service_domain') . "/dyn/images",
    ];
}

function imagePaths()
{
    return [
        'summernote' => 'uploads/app/' . config('i.service_domain') . '/summernote/',
        "dyn_image" => "uploads/app/" . config('i.service_domain') . "/dyn/images/",
    ];
}

function imageExists($row,$ext='80X80'){
    $path = imagePaths()['dyn_image'].$row?->image.'_'.$ext.'.'.$row?->extension;
    return ($row?->image == null || !file_exists($path)) ? false : true;
}

function getRowImage($row,$col="image",$ext='80X80'){
    $path = imagePaths()['dyn_image'].$row?->{$col}.'_'.$ext.'.'.$row?->extension;
    return ($row?->{$col} == "" || !file_exists($path)) ? url('images/system/img.jpg') : url($path);
}

function getDirectImage($row,$col="image"){
    $path = imagePaths()['dyn_image'].'/'.$row?->{$col};
    return ($row?->{$col} == "" || !file_exists($path)) ? url('images/system/img.jpg') : url($path);
}

if (! function_exists('pxLang')) {
    function pxLang($key='',$value='',$common='') {
        return app(\App\Services\PxCommandService::class)->pxLang($key,$value,$common);
    }
}

function getPolicyKey($Str,$key) {
    return $Str::lower($Str::replace(' ','_',$key));
}

function getArticleView($str, $limit = 70) {
    if (empty($str)) {
        return '';
    }
    $str = strip_tags($str);
    $str = html_entity_decode($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $str = preg_replace('/\s+/', ' ', $str);
    $str = trim($str);
    if (mb_strlen($str) <= $limit) {
        return $str;
    }
    $truncated = mb_substr($str, 0, $limit);
    $lastSpace = mb_strrpos($truncated, ' ');
    if ($lastSpace !== false) {
        $truncated = mb_substr($truncated, 0, $lastSpace);
    }
    return $truncated . '…';
}
