<style>
    .mall-title-cn {
        color: #00ff00;
        font-size: 1.15rem;
        font-weight: bold;
        margin-right: 10px;
    }

    .mall-title-en {
        color: #666;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: sans-serif;
    }

    .mall-card {
        background-color: #1a1a1a;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #333;
        height: 100%;
    }

    .mall-card img {
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }

    .mall-info {
        padding: 8px;
    }

    .product-name {
        font-size: 0.8rem;
        font-weight: bold;
        color: #fff;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 4px;
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 5px;
    }

    .price-tag {
        color: #ffc107;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .sales-count {
        font-size: 0.65rem;
        color: #666;
    }

    .rating-stars {
        font-size: 0.65rem;
        color: #ffc107;
        margin-top: 2px;
    }
</style>

<div class="px-3 py-3 mb-5">
    <div class="mall-header">
        <span class="mall-title-cn">情趣商城</span>
        <span class="mall-title-en">SEX MALL</span>
    </div>

    <div class="row g-3">
        @foreach (range(1, 2) as $prod)
            <div class="col-6 mb-2">
                <div class="mall-card shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset('images/card-image.jpg') }}" alt="Premium Pen">
                        <span class="position-absolute top-0 start-0 m-2 badge bg-success bg-opacity-75"
                            style="font-size: 0.5rem;">New</span>
                    </div>

                    <div class="mall-info">
                        <div class="product-name">Premium Fountain Ink - Deep Blue Edition</div>

                        <div class="price-row">
                            <span class="price-tag">¥ 500</span>
                            <span class="sales-count">Sold 59k+</span>
                        </div>

                        <div class="rating-row d-flex justify-content-between align-items-center">
                            <div class="rating-stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <span class="text-secondary">37k+ Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
