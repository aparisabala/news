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
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
