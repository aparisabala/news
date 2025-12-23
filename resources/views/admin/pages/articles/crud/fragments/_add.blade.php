<div class="bg-info pl-2 page-fragment-bar">
    <span class="text-light"> <a href=""><span class="badge badge-info cursor-pointer"> <i class='fa-solid fa-arrow-left fs-16'></i></span></a> <span class="pt-1">{{pxLang($data['lang'],'add')}}  </span> </span>
</div>
<div class="mt-4 p-3">
    @can('dyn_article_crud_store')
        <form id="frmStoreDynArticle" autocomplete="off">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card p-2 shadow-card card-border">
                                 <div class="form-group text-left mb-3">
                                    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.name')}}</b> <em class="required">*</em> <span id="name_error"></span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                                <div class="form-group text-left mb-3">
                                    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.feature_image')}}</b> <em class="required"></em> <span id="feature_image_error"></span></label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="feature_image" id="feature_image">
                                    </div>
                                </div>
                                <div class="form-group text-left mb-3">
                                    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.content')}}</b> <em class="required"></em> <span id="content_error"></span></label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="content" id="content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5> In Components </h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" value="slider" name="components[]" /> Slider
                                </div>
                                 <div class="col-md-4">
                                    <input type="checkbox" value="featured" name="components[]" /> Featured
                                </div>
                                 <div class="col-md-4">
                                    <input type="checkbox" value="side_bar" name="components[]" /> Side Bar
                                </div>
                            </div>
                            <hr>
                            <h5 class="mt-3"> In Categories </h5>
                            <div class="row">
                                @foreach ($data['categories'] as $item)
                                    <div class="col-md-4">
                                        <input type="checkbox" value="{{$item?->id}}" name="categories[]" /> {{$item?->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-3 text-end">
                        <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-plus"></i> {{pxLang($data['lang'],'','common.btns.crud_action_add')}} </button>
                    </div>
                </div>
            </div>
        </form>
    @else
        @include('common.view.fragments.-item-403')
    @endcan
</div>

