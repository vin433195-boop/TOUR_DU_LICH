@if($tour->t_status < 2)
@php
    $tourUrl = route('tour.detail', ['id' => $tour->id, 'slug' => safeTitle($tour->t_title)]);
    // Bộ ảnh du lịch thực tế — phong cảnh Việt Nam & Châu Á theo xu hướng
    $tourImages = [
        'https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=800&h=500&fit=crop&auto=format&q=80', // Vịnh Hạ Long
        'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=800&h=500&fit=crop&auto=format&q=80', // Hội An đèn lồng
        'https://images.unsplash.com/photo-1573843981267-be1999ff37cd?w=800&h=500&fit=crop&auto=format&q=80', // Ruộng bậc thang Sapa
        'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&h=500&fit=crop&auto=format&q=80', // Bãi biển nhiệt đới
        'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=800&h=500&fit=crop&auto=format&q=80', // Hồ núi xanh
        'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=800&h=500&fit=crop&auto=format&q=80', // Leo núi phiêu lưu
        'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=800&h=500&fit=crop&auto=format&q=80', // Santorini Hy Lạp
        'https://images.unsplash.com/photo-1488085061387-422e29b40080?w=800&h=500&fit=crop&auto=format&q=80', // Thành phố về đêm
        'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=800&h=500&fit=crop&auto=format&q=80', // Đường phượt hoàng hôn
        'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800&h=500&fit=crop&auto=format&q=80', // Con đường ven núi
        'https://images.unsplash.com/photo-1530841344095-9ec5ad8c4e54?w=800&h=500&fit=crop&auto=format&q=80', // Du thuyền biển
        'https://images.unsplash.com/photo-1519451241324-20b4ea2c4220?w=800&h=500&fit=crop&auto=format&q=80', // Rừng nhiệt đới
    ];
    $imgSrc = $tourImages[$tour->id % count($tourImages)];
    $remaining = $tour->t_number_guests - $tour->t_number_registered;
    $isFull = $tour->t_number_registered >= $tour->t_number_guests;
    $isNearlyFull = !$isFull && ($remaining - $tour->t_follow) < 2;
    $discountedPrice = $tour->t_price_adults - ($tour->t_price_adults * $tour->t_sale / 100);
@endphp

<div class="{{ !isset($itemTour) ? 'col-md-6 col-lg-4' : '' }} mb-4 ftco-animate {{ isset($itemTour) ? $itemTour : '' }}">
    <div class="tour-card">

        {{-- IMAGE --}}
        <div class="tour-card__img-wrap">
            <a href="{{ $tourUrl }}">
                <img src="{{ $imgSrc }}"
                     alt="{{ $tour->t_title }}"
                     class="tour-card__img"
                     loading="lazy"
                     onerror="this.src='{{ asset('admin/dist/img/no-image.png') }}'">
            </a>

            {{-- BADGES --}}
            <div class="tour-card__badges">
                @if($tour->t_sale > 0)
                    <span class="tc-badge tc-badge--sale">-{{ $tour->t_sale }}%</span>
                @endif
                @if($isFull)
                    <span class="tc-badge tc-badge--full">Hết chỗ</span>
                @elseif($isNearlyFull)
                    <span class="tc-badge tc-badge--hot">Sắp hết</span>
                @endif
            </div>

            {{-- SCHEDULE PILL --}}
            <div class="tour-card__schedule">
                <i class="fa fa-clock-o"></i> {{ $tour->t_schedule }}
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="tour-card__body">
            {{-- TITLE --}}
            <h3 class="tour-card__title">
                <a href="{{ $tourUrl }}" title="{{ $tour->t_title }}">
                    {{ the_excerpt($tour->t_title, 75) }}
                </a>
            </h3>

            {{-- META --}}
            <ul class="tour-card__meta">
                @if($tour->t_starting_gate)
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span>Từ: {{ $tour->t_starting_gate }}</span>
                </li>
                @endif
                <li>
                    <i class="fa fa-calendar"></i>
                    <span>Khởi hành: {{ $tour->t_start_date }}</span>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <span>
                        Chỗ trống:
                        <strong style="color: {{ $remaining <= 3 ? '#e74c3c' : '#27ae60' }}">
                            {{ $remaining }}
                        </strong>
                        / {{ $tour->t_number_guests }}
                    </span>
                </li>
            </ul>

            {{-- FOOTER: PRICE + BUTTON --}}
            <div class="tour-card__footer">
                <div class="tour-card__price">
                    @if($tour->t_sale > 0)
                        <span class="price-old">{{ number_format($tour->t_price_adults, 0, ',', '.') }}đ</span>
                    @endif
                    <span class="price-new">{{ number_format($discountedPrice, 0, ',', '.') }}đ</span>
                    <span class="price-unit">/người</span>
                </div>
                @if(!$isFull)
                    <a href="{{ $tourUrl }}" class="tour-card__btn">
                        Xem chi tiết <i class="fa fa-arrow-right"></i>
                    </a>
                @else
                    <span class="tour-card__btn tour-card__btn--disabled">Đã hết chỗ</span>
                @endif
            </div>
        </div>

    </div>
</div>
@endif
