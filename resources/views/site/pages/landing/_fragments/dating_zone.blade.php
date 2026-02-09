<style>
    /* Section Header Styling */
    .dating-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    .dating-title-cn {
        color: #00ff00; /* Neon Green */
        font-size: 1.1rem;
        font-weight: bold;
        margin-right: 8px;
    }
    .dating-title-en {
        color: #777;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Card Styling */
    .dating-card {
        background-color: #1a1a1a;
        border-radius: 15px;
        overflow: hidden;
        border: none;
        position: relative;
    }
    
    .dating-img {
        width: 100%;
        height: 240px; /* Taller aspect ratio like the image */
        object-fit: cover;
    }

    /* Top Right Like Badge */
    .like-count-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.65rem;
        display: flex;
        align-items: center;
    }

    /* Floating Heart Action Button */
    .heart-action-btn {
        position: absolute;
        bottom: 85px; /* Positioned above the text area */
        right: 10px;
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, #ff1493, #ff69b4);
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: 0 4px 10px rgba(255, 20, 147, 0.4);
        z-index: 2;
    }

    /* Content Area Styling */
    .dating-body {
        padding: 12px 10px;
    }
    .dating-name {
        color: #fff;
        font-size: 0.9rem;
        font-weight: bold;
        margin-bottom: 6px;
    }
    .info-row {
        margin-bottom: 4px;
        display: flex;
        align-items: center;
    }
    .label-green {
        color: #00ff00;
        font-size: 0.75rem;
        font-weight: bold;
        margin-right: 5px;
        flex-shrink: 0;
    }
    .info-text-white {
        color: #fff;
        font-size: 0.75rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .info-text-grey {
        color: #00ff00; /* Matching the labels in image */
        font-size: 0.75rem;
        font-weight: bold;
        margin-right: 5px;
    }
    .sub-info-text {
        color: #777;
        font-size: 0.75rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="px-3 py-3">
    <div class="dating-header">
        <span class="dating-title-cn">同城交友</span>
        <span class="dating-title-en">DATING ZONE</span>
    </div>

    <div class="row g-3">
        @php
            $girls = [
                ['name' => '娜娜 (172/50kg/C)', 'likes' => '1845', 'project' => '口爆.毒龙漫游.69爱爱', 'tags' => '年龄22 身高172 体重5...'],
                ['name' => '木子 (165/48kg/C)', 'likes' => '78416', 'project' => '制服.高跟丝袜.足交', 'tags' => '年龄21 体重48kg 身高...']
            ];
        @endphp

        @foreach($girls as $girl)
        <div class="col-6">
            <div class="dating-card shadow">
                <div class="like-count-badge">
                    <i class="bi bi-heart-fill text-white me-1" style="font-size: 0.6rem;"></i>
                    {{ $girl['likes'] }}人喜欢
                </div>

                <img src="{{ asset('images/card-image.jpg') }}" class="dating-img" alt="featured">

                <button class="heart-action-btn">
                    <i class="fa-solid fa-heart"></i>
                </button>

                <div class="dating-body">
                    <div class="dating-name">{{ $girl['name'] }}</div>
                    
                    <div class="info-row">
                        <span class="label-green">项目</span>
                        <span class="info-text-white">{{ $girl['project'] }}</span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-text-grey">特点</span>
                        <span class="sub-info-text">{{ $girl['tags'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>