@php
    $hotelUrl  = route('hotel.detail', ['id' => $hotel->id, 'slug' => safeTitle($hotel->h_name)]);
    // Ảnh khách sạn xu hướng 2024–2025: overwater, eco-resort, infinity pool, boutique, rooftop
    $hotelImgs = [
        'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800&h=500&fit=crop&auto=format&q=85', // Infinity pool nhìn ra biển Maldives
        'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800&h=500&fit=crop&auto=format&q=85', // Overwater villa - biệt thự trên mặt nước
        'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800&h=500&fit=crop&auto=format&q=85', // Resort hồ bơi hoàng hôn vàng
        'https://images.unsplash.com/photo-1615460549969-36fa19521a4f?w=800&h=500&fit=crop&auto=format&q=85', // Biệt thự pool villa riêng tư
        'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=800&h=500&fit=crop&auto=format&q=85', // Suite tối giản view thành phố
        'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800&h=500&fit=crop&auto=format&q=85', // Phòng hiện đại cửa kính panorama
        'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800&h=500&fit=crop&auto=format&q=85', // Boutique hotel kiến trúc độc đáo
        'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800&h=500&fit=crop&auto=format&q=85', // Sảnh grand hotel sang trọng
        'https://images.unsplash.com/photo-1606402179428-a57976d71fa4?w=800&h=500&fit=crop&auto=format&q=85', // Eco resort giữa thiên nhiên
        'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=800&h=500&fit=crop&auto=format&q=85', // Resort bãi biển nhiệt đới
        'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&h=500&fit=crop&auto=format&q=85', // Rooftop infinity pool đêm đô thị
        'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800&h=500&fit=crop&auto=format&q=85', // Sân thượng view núi rừng xanh
    ];
    $imgSrc = $hotel->h_image
        ? asset(pare_url_file($hotel->h_image))
        : $hotelImgs[$hotel->id % count($hotelImgs)];
@endphp

<div class="{{ !isset($itemHotel) ? 'col-md-6 col-lg-4' : '' }} mb-4 ftco-animate {{ isset($itemHotel) ? $itemHotel : '' }}"
     style="padding-left:14px;padding-right:14px;">
    <div class="hotel-card">

        {{-- IMAGE --}}
        <div class="hotel-card__img-wrap">
            <a href="{{ $hotelUrl }}">
                <img src="{{ $imgSrc }}"
                     alt="{{ $hotel->h_name }}"
                     class="hotel-card__img"
                     loading="lazy"
                     onerror="this.src='{{ asset('admin/dist/img/no-image.png') }}'">
            </a>
            <div class="hotel-card__price">
                {{ number_format($hotel->h_price, 0, ',', '.') }}đ
                <span style="font-size:10px;font-weight:400;opacity:0.85;">/đêm</span>
            </div>
        </div>

        {{-- BODY --}}
        <div class="hotel-card__body">
            <h3 class="hotel-card__title">
                <a href="{{ $hotelUrl }}">{{ the_excerpt($hotel->h_name, 80) }}</a>
            </h3>

            @if(isset($hotel->location) && $hotel->location)
            <div class="hotel-card__location">
                <i class="fa fa-map-marker"></i>
                <span>{{ $hotel->location->l_name }}</span>
            </div>
            @endif

            <p class="hotel-card__desc">{!! the_excerpt($hotel->h_description, 120) !!}</p>

            <div class="hotel-card__footer">
                <a href="{{ $hotelUrl }}" class="hotel-card__btn">
                    <i class="fa fa-eye"></i> Xem chi tiết <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

    </div>
</div>
