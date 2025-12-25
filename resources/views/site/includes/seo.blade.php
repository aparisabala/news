<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{config('i.service_name')}}" />
@php
    $keywards = ['Construction','Engineering','Engineering ExcellenceBuilding Trust'];
@endphp
@if(isset($data['article']) && $data['article'] != "")
@php
    $blogKeywords = ($data['article']?->seo != null) ? explode(',',$data['article']?->seo) : [];
    $keywards = [$data['article']->name,...$blogKeywords];
@endphp
<meta name="robots" content="index, article/{{$data['article']->slug}}">
<meta property="og:title" content="{{ $data['article']->name }}" />
<meta property="og:description" content="{{ getArticleView($data['article']->content,1000) }}" />
<meta property="og:url" content="{{ url('article/'.$data['article']->slug) }}" />
<meta property="og:image" content="{{getRowImage(row: $data['article'],col:'feature_image', ext: '1280X720')}}" />
@else
<meta name="robots" content="index">
<meta property="og:title" content="{{config('i.keywords')}}" />
<meta property="og:description" content="{{config('i.keywords')}}" />
<meta property="og:url" content="https://www.{{ config('i.service_domain') }}/" />
<meta property="og:image" content="{{config('i.meta_image')}}" />
@endif
<meta name="keywords" content="{{join(", ",$keywards)}}">
