@extends('site.layouts.main-layout',["tabTitle" => config('i.service_name')." | Dashboard" ])
@section('page')
@include('site.pages.landing._fragments._slider')
@if($data['page'] != null)
    @if($data['page']?->content != null)
        {!! $data['page']?->content !!}
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
