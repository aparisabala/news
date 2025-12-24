@extends('admin.layouts.main-layout',["tabTitle" => config('i.service_name')." | ".pxLang($data['lang'],'breadCum.title') ])
@section('page')
    <div class="row">
        <div class="col-md-12">
            @can('system_meta_meta_info_update_view')
                @if($data['item'] != null)
                    <div class="">
                        @include('admin.pages.meta-info.form.update.fragments._breadcum')

                        <div class="card rounded page-block">

                            <div class="mt-4 p-3">
                                @can('system_meta_meta_info_update_update')
                                    <form id="frmSystemMetaMetaInfoUpdate" autocomplete="off">
                                        <input type="hidden" name="id" value="{{$data['item']?->id}}" />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card p-2 shadow-card card-border">
                                                            @include('admin.pages.meta-info.form.update.fragments._update')
                                                            <div class="mb-3 mt-3 text-end">
                                                                <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-save"></i> {{pxLang($data['lang'],'','common.btns.crud_action_update')}} </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    @include('common.view.fragments.-item-403')
                                @endcan
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card rounded page-block">
                        @include('common.view.fragments.-item-404')
                    </div>
                @endif
            @else
                @include('common.view.fragments.-item-403')
            @endcan
        </div>
    </div>
@endsection

