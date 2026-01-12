<meta property="og:locale" content="zh-CN" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{config('i.service_name')}}" />
@php
    $keywards = ['家匠DIY','家居DIY','家居装饰DIY','卧室DIY','卧室软装','灯光DIY','家居改造','DIY教程','家庭装饰','手工DIY'];
@endphp
@if(isset($data['article']) && $data['article'] != "")
@php
    $blogKeywords = ($data['article']?->meta_keywords != null) ? explode(',',$data['article']?->meta_keywords) : [];
    $keywards = [$data['article']->name,...$blogKeywords];
@endphp
<meta name="robots" content="index, article/{{$data['article']->slug}}">
{{-- <meta property="og:title" content="{{ $data['article']->name }}" /> --}}
{{-- <meta property="og:description" content="{{ ($data['article']->meta_description != null) ? $data['article']->meta_description : getArticleView($data['article']->content,1000) }}" /> --}}
<meta property="og:url" content="{{ url('article/'.$data['article']->slug) }}" />
{{-- <meta property="og:image" content="{{getRowImage(row: $data['article'],col:'feature_image', ext: '1280X720')}}" /> --}}
@else
<meta name="robots" content="index, follow">
<meta name="baidu-site-verification" content="e0af1619a778adbfae7dbfcd7874a98e">
<meta property="og:title" content="{{config('i.keywords')}}" />
<meta property="og:description" content="{{config('i.keywords')}}" />
<meta property="og:url" content="https://www.{{ config('i.service_domain') }}/" />
<meta property="og:image" content="{{config('i.meta_image')}}" />
@endif
<meta name="keywords" content="{{join(", ",$keywards)}}">
