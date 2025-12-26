<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-12 text-center">
        <div class="mb-2">
            <img src="{{config('i.logo')}}" style="max-width: 150px;"/>
        </div>
        <a class="blog-header-logo text-dark" href="{{url('/')}}">{{config('i.service_name')}}</a>
      </div?>
    </div>
  </header>
  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-start">
      <a class="p-2 link-secondary" href="{{url('/')}}">家</a>
      @foreach ($data['menus'] as $item)
        <a class="p-2 link-secondary" href="{{url('menus/'.$item?->slug)}}">{{$item?->name}}</a>
      @endforeach
    </nav>
  </div>
</div>

