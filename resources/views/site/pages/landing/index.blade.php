@extends('site.layouts.main-layout',["tabTitle" => config('i.service_name')." | Dashboard" ])
@section('page')
  @include('site.pages.landing._fragments._slider')
  @include('site.pages.landing._fragments._featured')
  @include('site.pages.landing._fragments._categories')
@endsection
