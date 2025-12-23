 @if(count($data['featured']) > 0)
  <div class="row mb-2">
    @foreach ($data['featured'] as $item)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-md-8 p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">{{$item?->article?->name}}</h3>
          <div class="mb-1 text-muted">{{\Carbon\Carbon::parse($item?->created_at)->format('M Y')}}</div>
          <p class="card-text mb-auto">{{getArticleView($item?->article?->content)}}</p>
          <a href="{{url('article/'.$item?->article?->slug)}}" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-md-4 p-4 d-flex flex-column position-static">
           <img src="{{getRowImage(row: $item?->article, col: 'feature_image', ext: '360X240')}}" class="img-fluid" />
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif
