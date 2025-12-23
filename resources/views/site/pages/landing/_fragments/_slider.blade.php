@if(count($data['sliders']) > 0)
<div id="carouselExample" class="carousel slide"  data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
        @foreach ($data['sliders'] as $key => $item)
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{$key}}" class="{{($key==1) ? 'active':''}}" aria-current="true" aria-label="Slide {{$key+1}}"></button>
        @endforeach
    </div>
  <div class="carousel-inner">
    @foreach ($data['sliders'] as $key =>  $item)
        <div class="carousel-item {{($key == 0) ? 'active':''}}">
            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="display-4 fst-italic">{{$item?->article?->name}}</h1>
                        <p class="lead my-3">{{getArticleView($item?->article?->content)}}</p>
                        <p class="lead mb-0"><a href="{{url('article/'.$item?->article?->slug)}}" class="text-white fw-bold">Continue reading...</a></p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{getRowImage(row: $item?->article, col: 'feature_image', ext: '360X240')}}" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
  </div>
</div>
@endif
