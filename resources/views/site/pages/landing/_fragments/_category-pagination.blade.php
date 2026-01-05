<div class="row g-5">
    <div class="col-md-8">

        <h3 class="border-bottom mb-4">
            {{ ucwords($data['category']->name) }}
        </h3>

        <div class="row">
            @foreach ($data['articles'] as $item)
                <div class="col-md-4 mb-4">
                    <div class="card blog-card">
                        <img src="{{ getRowImage(row: $item->article, col: 'feature_image', ext: '360X240') }}">
                        <div class="p-2">
                            <h6>{{ $item->article->name }}</h6>
                            <p class="fs-12">{{ $item->created_at->format('d M Y') }}</p>
                            <p>{{ getArticleView($item->article->content) }}</p>
                            <a href="{{ url('article/'.$item->article->slug) }}">
                                Continue reading →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $data['articles']->links() }}
        </div>

    </div>

    <div class="col-md-4">
        @include('site.pages.landing._fragments._side-bar')
    </div>
</div>
