@extends('site.layouts.main-layout',["tabTitle" => config('i.service_name')])
@section('page')
@include('site.pages.landing._fragments._slider')
@if($data['article'] != null)
    @if($data['article']?->content != null)
        <div class="row">
            <div class="col-md-9">
                <div class="pt-2 pb-2">
                    <a href="{{url()->previous()}}">
                        <span class="badge bg-warning">
                            <i class="fa fa-arrow-circle-left"></i> Back
                        </span>
                    </a>
                </div>
                <img src="{{getRowImage(row: $data['article'],col:'feature_image', ext: '1280X720')}}" class="img-fluid" />
                <div class="mt-3 mb-3 word-wrap">
                    {!! $data['article']?->content !!}
                </div>
            </div>
            <div class="col-md-3">
                @include('site.pages.landing._fragments._side-bar')
            </div>
        </div>
    @endif
@else
    <div class='row'>
        <div class='col-md-12'>
            <div id='defaultPage' class='pages'>
                <div class='card rounded-0 pb-3'>
                    @include('common.view.fragments.-item-404')
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
