<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="家匠DIY是一个专注于家居装饰与卧室改造的DIY教程平台，提供简单实用的家居DIY步骤、卧室软装、灯光布置与创意改造方案，帮助新手轻松打造温馨舒适的家。" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="_token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@include('site.includes.seo')
<title> {!! $tabTitle ?? 'Site Title' !!} </title>
<link rel="shortcut icon" href="{{ config('i.favicon') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
{!! $appStyles ?? '' !!}
@include('site.includes.theme')
