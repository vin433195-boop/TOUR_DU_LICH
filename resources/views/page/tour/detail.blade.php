@extends('page.layouts.page')
@section('title', $tour->t_title)

@php
    // === CÙNG BỘ ẢNH & CÔNG THỨC VỚI itemTour.blade.php ===
    $tourImages = [
        'https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1573843981267-be1999ff37cd?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1488085061387-422e29b40080?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1530841344095-9ec5ad8c4e54?w=1920&h=1080&fit=crop&auto=format&q=85',
        'https://images.unsplash.com/photo-1519451241324-20b4ea2c4220?w=1920&h=1080&fit=crop&auto=format&q=85',
    ];
    $tourImgSrc = $tour->t_image
        ? asset(pare_url_file($tour->t_image))
        : $tourImages[$tour->id % count($tourImages)];

    $remaining   = $tour->t_number_guests - $tour->t_number_registered;
    $isFull      = $tour->t_number_registered >= $tour->t_number_guests;
    $isNearlyFull= !$isFull && $remaining <= 3;
    $discountedPriceAdult    = $tour->t_price_adults   - ($tour->t_price_adults   * $tour->t_sale / 100);
    $discountedPriceChildren = $tour->t_price_children - ($tour->t_price_children * $tour->t_sale / 100);
@endphp

@section('style')
<style>
/* =========================================
   TOUR DETAIL — tuân theo pattern của theme
   ========================================= */

/* Hero overlay đậm hơn để text rõ */
.td-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,.30) 0%,
        rgba(0,0,0,.15) 50%,
        rgba(0,0,0,.65) 100%
    );
}

/* Nội dung trong hero */
.td-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    padding-bottom: 20px;
}
.td-breadcrumbs {
    font-size: 13px;
    color: rgba(255,255,255,.8);
    margin-bottom: 14px;
}
.td-breadcrumbs a { color: rgba(255,255,255,.8); text-decoration: none; transition: color .2s; }
.td-breadcrumbs a:hover { color: #fff; }
.td-breadcrumbs .sep { margin: 0 6px; opacity: .6; font-size: 10px; }
.td-tour-title {
    font-size: clamp(24px, 4.5vw, 42px);
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    text-shadow: 0 2px 16px rgba(0,0,0,.5);
    margin: 0 0 20px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}
.td-badges {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center;
}
.td-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 18px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
    color: #fff;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,.25);
    background: rgba(255,255,255,.15);
    letter-spacing: .2px;
}
.td-badge i { font-size: 12px; }
.td-badge--sale   { background: rgba(233,30,140,.8);  border-color: rgba(233,30,140,.5); }
.td-badge--full   { background: rgba(220,53,69,.8);   border-color: rgba(220,53,69,.5); }
.td-badge--hot    { background: rgba(230,126,34,.8);  border-color: rgba(230,126,34,.5); }

/* === MAIN CONTENT === */
.td-section { padding: 50px 0 70px; }

/* Tour image card ở top content */
.td-img-card {
    width: 100%;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0,0,0,.12);
    margin-bottom: 36px;
    position: relative;
    background: #1a2a3a;
}
.td-img-card img {
    width: 100%;
    height: 380px;
    object-fit: cover;
    display: block;
    transition: transform .6s ease;
}
.td-img-card:hover img { transform: scale(1.03); }
.td-img-card__overlay {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    padding: 20px 22px 18px;
    background: linear-gradient(to top, rgba(0,0,0,.7) 0%, transparent 100%);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}
.td-img-card__schedule {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,.18);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 20px;
    padding: 5px 14px;
    font-size: 13px;
    color: #fff;
    font-weight: 600;
}
.td-img-card__badges { display: flex; gap: 6px; }
.td-img-card__badge {
    border-radius: 6px;
    padding: 4px 10px;
    font-size: 12px;
    font-weight: 700;
    color: #fff;
}
.td-img-card__badge--sale { background: #e91e8c; }
.td-img-card__badge--hot  { background: #e67e22; }
.td-img-card__badge--full { background: #e74c3c; }

/* Section title */
.td-title {
    font-size: 17px;
    font-weight: 700;
    color: #1a202c;
    margin: 0 0 18px;
    padding: 12px 16px;
    background: #f8fafc;
    border-radius: 10px;
    border-left: 4px solid #e91e8c;
    display: flex;
    align-items: center;
    gap: 10px;
}
.td-title i {
    width: 32px; height: 32px;
    background: rgba(233,30,140,.1);
    color: #e91e8c;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; flex-shrink: 0;
}

/* Info table */
.td-info {
    width: 100%;
    border-collapse: collapse;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,.07);
    margin-bottom: 32px;
}
.td-info tr { border-bottom: 1px solid #f0f2f5; }
.td-info tr:last-child { border-bottom: none; }
.td-info td {
    padding: 12px 16px;
    font-size: 14.5px;
    vertical-align: middle;
}
.td-info td:first-child {
    width: 36%;
    background: #f8fafc;
    font-weight: 600;
    color: #374151;
}
.td-info td:first-child i {
    margin-right: 8px;
    color: #e91e8c;
    width: 16px;
    text-align: center;
}
.td-info td:last-child { color: #374151; background: #fff; }
.td-price-val {
    font-size: 16px;
    font-weight: 700;
    color: #e91e8c;
}
.td-price-old {
    font-size: 12px;
    color: #9ca3af;
    text-decoration: line-through;
    margin-left: 6px;
}
.td-slots {
    display: inline-block;
    width: 70px; height: 5px;
    background: #e5e7eb;
    border-radius: 3px;
    margin-left: 8px;
    vertical-align: middle;
    position: relative;
    overflow: hidden;
}
.td-slots__fill {
    position: absolute; left:0; top:0; bottom:0;
    border-radius: 3px;
    background: linear-gradient(90deg,#27ae60,#2ecc71);
}
.td-slots__fill--warn   { background: linear-gradient(90deg,#e67e22,#f39c12); }
.td-slots__fill--danger { background: linear-gradient(90deg,#e74c3c,#c0392b); }

/* Rich content */
.td-content-body {
    font-size: 15px;
    line-height: 1.9;
    color: #374151;
    margin-bottom: 28px;
}

/* === SIDEBAR BOOKING CARD === */
.td-book-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 28px rgba(0,0,0,.1);
    overflow: hidden;
    margin-top: 8px;
}
.td-book-card__img {
    width: 100%;
    height: 195px;
    object-fit: cover;
    display: block;
}
.td-book-card__body {
    padding: 20px 20px 24px;
}
.td-book-card__label {
    font-size: 11px;
    font-weight: 700;
    color: #9ca3af;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-bottom: 3px;
}
.td-book-card__price {
    font-size: 26px;
    font-weight: 800;
    color: #e91e8c;
    line-height: 1;
}
.td-book-card__price small {
    font-size: 13px;
    color: #9ca3af;
    font-weight: 400;
}
.td-book-card__strike {
    font-size: 13px;
    color: #9ca3af;
    text-decoration: line-through;
    margin-bottom: 14px;
}
.td-book-card__sale-badge {
    display: inline-block;
    background: #e91e8c;
    color: #fff;
    border-radius: 5px;
    padding: 1px 8px;
    font-size: 11px;
    font-weight: 700;
    margin-left: 6px;
}
.td-book-card__hr {
    border: none;
    border-top: 1px solid #f0f2f5;
    margin: 16px 0;
}
.td-book-card__meta {
    list-style: none;
    padding: 0; margin: 0 0 18px;
    display: flex; flex-direction: column; gap: 9px;
}
.td-book-card__meta li {
    display: flex; align-items: center; gap: 10px;
    font-size: 13px; color: #4b5563;
}
.td-book-card__meta li i {
    width: 28px; height: 28px;
    background: rgba(233,30,140,.08);
    color: #e91e8c;
    border-radius: 7px;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px; flex-shrink: 0;
}
.td-book-card__meta li strong { color: #1a202c; }

/* Book button */
.td-book-btn {
    display: block;
    text-align: center;
    padding: 13px 20px;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    letter-spacing: .3px;
    background: linear-gradient(135deg, #e91e8c 0%, #c2185b 100%);
    color: #fff !important;
    box-shadow: 0 6px 18px rgba(233,30,140,.35);
    transition: all .25s;
    border: none;
    cursor: pointer;
    width: 100%;
}
.td-book-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(233,30,140,.45);
    color: #fff !important;
    text-decoration: none;
}
.td-book-btn--disabled {
    background: #e5e7eb !important;
    color: #9ca3af !important;
    box-shadow: none !important;
    cursor: not-allowed;
    transform: none !important;
}

/* Related title */
.td-related-title {
    font-size: 15px; font-weight: 700; color: #1a202c;
    margin: 28px 0 14px;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0f2f5;
}
.td-related-title i { color: #e91e8c; margin-right: 6px; }

/* Comments */
.td-comments {
    margin-top: 44px;
    padding-top: 32px;
    border-top: 2px solid #f0f2f5;
}
.td-comments__title {
    font-size: 19px; font-weight: 700; color: #1a202c;
    margin-bottom: 24px; display: flex; align-items: center; gap: 8px;
}
.td-comments__title i { color: #e91e8c; }
.td-comment-form {
    background: #f8fafc;
    border-radius: 14px;
    padding: 22px;
    margin-top: 28px;
}
.td-comment-form h5 { font-size: 15px; font-weight: 700; margin-bottom: 14px; color: #1a202c; }
.td-comment-form .form-control {
    border-radius: 10px;
    border: 1.5px solid #e5e7eb;
    font-size: 14px;
    resize: vertical;
}
.td-comment-form .form-control:focus {
    border-color: #e91e8c;
    box-shadow: 0 0 0 3px rgba(233,30,140,.1);
}
.td-login-prompt {
    background: #fff8f0;
    border: 1px solid #fde8cc;
    border-radius: 12px;
    padding: 14px 18px;
    font-size: 14px;
    color: #92400e;
    margin-top: 20px;
}
.td-login-prompt a { color: #e91e8c; font-weight: 600; }

@media (max-width: 991px) {
    .td-img-card img { height: 280px; }
    .td-book-card { margin-top: 28px; }
}
@media (max-width: 575px) {
    .td-img-card img { height: 220px; }
    .td-section { padding: 32px 0 50px; }
}
</style>
@stop

@section('seo')@stop

@section('content')

{{-- ===== HERO — dùng đúng pattern js-fullheight của theme ===== --}}
<section class="hero-wrap hero-wrap-2 js-fullheight"
         style="background-image: url('{{ $tourImgSrc }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-10 col-lg-8 pb-5 td-hero-content">
                <p class="td-breadcrumbs">
                    <a href="{{ route('page.home') }}">Trang chủ</a>
                    <span class="sep"><i class="fa fa-chevron-right"></i></span>
                    <a href="{{ route('tour') }}">Tours</a>
                    <span class="sep"><i class="fa fa-chevron-right"></i></span>
                    <span style="color:#fff;">Chi tiết tour</span>
                </p>
                <h1 class="td-tour-title">{{ $tour->t_title }}</h1>
                <div class="td-badges">
                    @if($tour->t_sale > 0)
                        <span class="td-badge td-badge--sale">
                            <i class="fa fa-tag"></i> Giảm {{ $tour->t_sale }}%
                        </span>
                    @endif
                    @if($isFull)
                        <span class="td-badge td-badge--full">
                            <i class="fa fa-times-circle"></i> Hết chỗ
                        </span>
                    @elseif($isNearlyFull)
                        <span class="td-badge td-badge--hot">
                            <i class="fa fa-fire"></i> Sắp hết — còn {{ $remaining }} chỗ
                        </span>
                    @else
                        <span class="td-badge">
                            <i class="fa fa-users"></i> Còn {{ $remaining }} chỗ trống
                        </span>
                    @endif
                    <span class="td-badge">
                        <i class="fa fa-clock-o"></i> {{ $tour->t_schedule }}
                    </span>
                    @if($tour->t_starting_gate)
                        <span class="td-badge">
                            <i class="fa fa-map-marker"></i> {{ $tour->t_starting_gate }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== MAIN CONTENT ===== --}}
<section class="td-section">
    <div class="container">
        <div class="row">

            {{-- ===== CỘT TRÁI — NỘI DUNG TOUR ===== --}}
            <div class="col-lg-8">

                {{-- Ảnh tour — khớp với listing card --}}
                <div class="td-img-card">
                    <img src="{{ $tourImgSrc }}"
                         alt="{{ $tour->t_title }}"
                         onerror="this.src='{{ asset('admin/dist/img/no-image.png') }}'">
                    <div class="td-img-card__overlay">
                        <span class="td-img-card__schedule">
                            <i class="fa fa-clock-o"></i> {{ $tour->t_schedule }}
                        </span>
                        <div class="td-img-card__badges">
                            @if($tour->t_sale > 0)
                                <span class="td-img-card__badge td-img-card__badge--sale">-{{ $tour->t_sale }}%</span>
                            @endif
                            @if($isFull)
                                <span class="td-img-card__badge td-img-card__badge--full">Hết chỗ</span>
                            @elseif($isNearlyFull)
                                <span class="td-img-card__badge td-img-card__badge--hot">Sắp hết</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Thông tin hành trình --}}
                <div class="td-title">
                    <i class="fa fa-info-circle"></i> Thông tin hành trình
                </div>
                <table class="td-info">
                    @if($tour->t_journeys)
                    <tr>
                        <td><i class="fa fa-road"></i>Hành trình</td>
                        <td>{{ $tour->t_journeys }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td><i class="fa fa-clock-o"></i>Lịch trình</td>
                        <td>{{ $tour->t_schedule }}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-calendar"></i>Ngày khởi hành</td>
                        <td>{{ $tour->t_start_date }}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-calendar-check-o"></i>Ngày về</td>
                        <td>{{ $tour->t_end_date }}</td>
                    </tr>
                    @if($tour->t_move_method)
                    <tr>
                        <td><i class="fa fa-plane"></i>Vận chuyển</td>
                        <td>{{ $tour->t_move_method }}</td>
                    </tr>
                    @endif
                    @if($tour->t_starting_gate)
                    <tr>
                        <td><i class="fa fa-map-marker"></i>Điểm xuất phát</td>
                        <td>{{ $tour->t_starting_gate }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td><i class="fa fa-users"></i>Chỗ trống</td>
                        <td>
                            <strong style="color:{{ $remaining <= 3 ? '#e74c3c' : '#27ae60' }}">
                                {{ $remaining }}
                            </strong> / {{ $tour->t_number_guests }} người
                            @php
                                $pct       = $tour->t_number_guests > 0 ? ($tour->t_number_registered / $tour->t_number_guests * 100) : 0;
                                $barClass  = $pct >= 90 ? 'td-slots__fill--danger' : ($pct >= 70 ? 'td-slots__fill--warn' : '');
                            @endphp
                            <span class="td-slots">
                                <span class="td-slots__fill {{ $barClass }}" style="width:{{ min($pct,100) }}%"></span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-ticket"></i>Giá người lớn</td>
                        <td>
                            <span class="td-price-val">{{ number_format($discountedPriceAdult, 0, ',', '.') }} đ</span>
                            @if($tour->t_sale > 0)
                                <span class="td-price-old">{{ number_format($tour->t_price_adults, 0, ',', '.') }} đ</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-child"></i>Giá trẻ em</td>
                        <td>
                            <span class="td-price-val">{{ number_format($discountedPriceChildren, 0, ',', '.') }} đ</span>
                            @if($tour->t_sale > 0)
                                <span class="td-price-old">{{ number_format($tour->t_price_children, 0, ',', '.') }} đ</span>
                            @endif
                        </td>
                    </tr>
                </table>

                {{-- Lịch trình chi tiết --}}
                @if($tour->t_description)
                <div class="td-title">
                    <i class="fa fa-list-alt"></i> Lịch trình chi tiết
                </div>
                <div class="td-content-body">{!! $tour->t_description !!}</div>
                @endif

                {{-- Giới thiệu tour --}}
                @if($tour->t_content)
                <div class="td-title">
                    <i class="fa fa-map-o"></i> Giới thiệu tour
                </div>
                <div class="td-content-body">{!! $tour->t_content !!}</div>
                @endif

                {{-- Bình luận --}}
                <div class="td-comments">
                    <div class="td-comments__title">
                        <i class="fa fa-comments"></i>
                        Bình luận
                        @if($tour->comments->count() > 0)
                            <span style="font-size:14px;font-weight:400;color:#9ca3af;">
                                ({{ $tour->comments->count() }})
                            </span>
                        @endif
                    </div>

                    @if($tour->comments->count() > 0)
                        <ul class="comment-list">
                            @foreach($tour->comments as $comment)
                                @include('page.common.itemComment', compact('comment'))
                            @endforeach
                        </ul>
                    @else
                        <p style="color:#9ca3af;font-size:14px;margin:0;">
                            Chưa có bình luận nào. Hãy là người đầu tiên!
                        </p>
                    @endif

                    @if(Auth::guard('users')->check())
                        <div class="td-comment-form">
                            <h5>Viết bình luận</h5>
                            <div class="form-group">
                                <textarea id="message" rows="4" class="form-control"
                                          placeholder="Chia sẻ trải nghiệm của bạn về tour này..."></textarea>
                                <span class="text-errors-comment text-danger"
                                      style="display:none;font-size:13px;margin-top:4px;">
                                    Vui lòng nhập nội dung bình luận!
                                </span>
                            </div>
                            <input type="button"
                                   value="Gửi bình luận"
                                   class="td-book-btn btn-comment"
                                   tour_id="{{ $tour->id }}"
                                   style="width:auto;padding:10px 26px;font-size:14px;">
                        </div>
                    @else
                        <div class="td-login-prompt">
                            <i class="fa fa-lock" style="margin-right:6px;"></i>
                            <a href="{{ route('page.user.account') }}">Đăng nhập</a>
                            để bình luận về tour này.
                        </div>
                    @endif
                </div>

            </div>{{-- /.col-lg-8 --}}

            {{-- ===== CỘT PHẢI — BOOKING + TOUR LIÊN QUAN ===== --}}
            <div class="col-lg-4">

                {{-- Booking card --}}
                <div class="td-book-card">
                    <img src="{{ $tourImgSrc }}"
                         alt="{{ $tour->t_title }}"
                         class="td-book-card__img"
                         onerror="this.src='{{ asset('admin/dist/img/no-image.png') }}'">
                    <div class="td-book-card__body">
                        <div class="td-book-card__label">Giá từ</div>
                        <div class="td-book-card__price">
                            {{ number_format($discountedPriceAdult, 0, ',', '.') }} đ
                            <small>/người lớn</small>
                        </div>
                        @if($tour->t_sale > 0)
                            <div class="td-book-card__strike">
                                {{ number_format($tour->t_price_adults, 0, ',', '.') }} đ
                                <span class="td-book-card__sale-badge">-{{ $tour->t_sale }}%</span>
                            </div>
                        @endif

                        <hr class="td-book-card__hr">

                        <ul class="td-book-card__meta">
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <span>Lịch trình: <strong>{{ $tour->t_schedule }}</strong></span>
                            </li>
                            <li>
                                <i class="fa fa-calendar"></i>
                                <span>Khởi hành: <strong>{{ $tour->t_start_date }}</strong></span>
                            </li>
                            @if($tour->t_starting_gate)
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>Từ: <strong>{{ $tour->t_starting_gate }}</strong></span>
                            </li>
                            @endif
                            <li>
                                <i class="fa fa-users"></i>
                                <span>
                                    Chỗ trống:
                                    <strong style="color:{{ $remaining <= 3 ? '#e74c3c' : '#27ae60' }}">
                                        {{ $remaining }}
                                    </strong> / {{ $tour->t_number_guests }}
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-child"></i>
                                <span>Trẻ em: <strong>{{ number_format($discountedPriceChildren, 0, ',', '.') }} đ</strong></span>
                            </li>
                        </ul>

                        @if(!$isFull)
                            <a href="{{ route('book.tour', ['id' => $tour->id, 'slug' => safeTitle($tour->t_title)]) }}"
                               class="td-book-btn">
                                <i class="fa fa-calendar-check-o" style="margin-right:7px;"></i>Đặt tour ngay
                            </a>
                        @else
                            <span class="td-book-btn td-book-btn--disabled">
                                <i class="fa fa-times-circle" style="margin-right:7px;"></i>Đã hết chỗ
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Tour liên quan --}}
                @if($tours->count() > 0)
                    <div class="mt-3">
                        <div class="td-related-title">
                            <i class="fa fa-map-signs"></i>Tour liên quan
                        </div>
                        @php $itemTour = 'item-related-tour' @endphp
                        @foreach($tours as $relatedTour)
                            @include('page.common.itemTour', ['tour' => $relatedTour, 'itemTour' => $itemTour])
                        @endforeach
                    </div>
                @endif

            </div>{{-- /.col-lg-4 --}}

        </div>{{-- /.row --}}
    </div>{{-- /.container --}}
</section>

@stop
@section('script')@stop
