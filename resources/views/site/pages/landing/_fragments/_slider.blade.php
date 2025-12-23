@if(count($data['sliders']) > 0)
<div id="carouselExample" class="carousel slide">
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
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endif
