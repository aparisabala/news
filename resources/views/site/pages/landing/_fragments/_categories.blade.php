<div class="row g-5">
    <div class="col-md-8">
        @foreach ($data['categories'] as $category)
        <div class="pb-4 mb-4 ">
            <h3 class="fst-italic border-bottom">
                {{ucwords($category?->name)}}
            </h3>
            <div class="row">
                @foreach ($category?->components as $item)
                    <div class="col-md-4">
                        <div class="card blog-card">
                            <img src="{{getRowImage(row: $item?->article, col: 'feature_image', ext: '360X240')}}" />
                            <div class="p-1">
                                <h2 class="fs-16">{{$item?->article?->name}}</h2>
                                <p class="blog-post-meta fs-12">{{\Carbon\Carbon::parse($item?->created_at)->format('d M Y')}}</p>
                                <p>{{getArticleView($item?->article?->content)}}</p>
                                <p class="lead mb-0"><a href="{{url('article/'.$item?->article?->slug)}}" class=" fw-bold fs-13">Continue reading...</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-4">
        @include('site.pages.landing._fragments._side-bar')
    </div>
  </div>
