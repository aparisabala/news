<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.service_name')}}</b> <em class="required">*</em> <span id="service_name_error"></span></label>
    <div class="input-group">
        <input type="text" class="form-control" name="service_name" id="service_name" value="{{$data['item']?->service_name}}">
    </div>
</div>
<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.service_name')}}</b> <em class="required">*</em> <span id="service_domain_error"></span></label>
    <div class="input-group">
        <input type="text" class="form-control" name="service_domain" id="service_domain" value="{{$data['item']?->service_domain}}">
    </div>
</div>

<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.main_meta')}}</b> <em class="required">*</em> <span id="main_meta_error"></span></label>
    <div class="input-group">
        <textarea rows="4"  class="form-control" name="main_meta" id="main_meta" >{{$data['item']?->main_meta}}</textarea>
    </div>
</div>

<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.keywords')}}</b> <em class="required">*</em> <span id="keywords_error"></span></label>
    <div class="input-group">
        <textarea rows="4"  class="form-control" name="keywords" id="keywords" >{{$data['item']?->keywords}}</textarea>
    </div>
</div>

<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.logo')}}</b> <em class="required">*</em> <span id="logo_error"></span></label>
    <div class="input-group">
        <input type="file"  class="form-control" name="logo" id="logo" >
    </div>
</div>
<div>
    <img src="{{getDirectImage(row: $data['item'],col: 'logo')}}" class="img-fluid" />
</div>

<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.favicon')}}</b> <em class="required">*</em> <span id="favicon_error"></span></label>
    <div class="input-group">
        <input type="file"  class="form-control" name="favicon" id="favicon" >
    </div>
</div>
<div>
    <img src="{{getDirectImage(row: $data['item'],col: 'favicon')}}" class="img-fluid" />
</div>
<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.meta_image')}}</b> <em class="required">*</em> <span id="meta_image_error"></span></label>
    <div class="input-group">
        <input type="file"  class="form-control" name="meta_image" id="meta_image" >
    </div>
</div>
<div>
    <img src="{{getDirectImage(row: $data['item'],col: 'meta_image')}}" class="img-fluid" />
</div>
<div class="form-group text-left mb-3">
    <label class="form-label"> <b>{{pxLang($data['lang'],'fields.meta_tags')}}</b> <em class="required">*</em> <span id="meta_tags_error"></span></label>
    <div class="input-group">
        <textarea rows="4"  class="form-control" name="meta_tags" id="meta_tags" >{{$data['item']?->meta_tags}}</textarea>
    </div>
</div>

