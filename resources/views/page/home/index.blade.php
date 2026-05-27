@extends('page.layouts.page')
@section('title', 'Cuộc đời là những chuyến đi | Travel')
@section('style')
<link rel="stylesheet" href="{{ asset('page/css/home-custom.css') }}">
@stop
@section('content')

{{-- ================================================================
     HERO SECTION
     ================================================================ --}}
<div class="hero-wrap js-fullheight position-relative overflow-hidden">
    <iframe
        class="bg-video"
        src="https://www.youtube.com/embed/k8m0SaGQ_1c?autoplay=1&mute=1&loop=1&playlist=k8m0SaGQ_1c&controls=0&showinfo=0&modestbranding=1"
        frameborder="0"
        allow="autoplay; fullscreen"
        allowfullscreen>
    </iframe>
    <div class="overlay"></div>

    <div class="container hero-body">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <div class="hero-badge ftco-animate">
                    <i class="fa fa-plane"></i> Chào mừng bạn đến với chúng tôi
                </div>
                <h1 class="hero-title ftco-animate">
                    Khám phá những<br>
                    <span class="accent">điểm đến tuyệt vời</span><br>
                    cùng chúng tôi
                </h1>
                <p class="hero-subtitle ftco-animate">
                    Du lịch đến bất kỳ nơi nào trên thế giới — chúng tôi lo tất cả cho bạn.
                    Trải nghiệm dịch vụ hàng đầu với giá cả hợp lý và đội ngũ chuyên nghiệp.
                </p>
                <div class="hero-cta ftco-animate">
                    <a href="{{ route('tour') }}" class="btn-cta-fill">
                        <i class="fa fa-compass"></i> Khám phá tours
                    </a>
                    <a href="{{ route('hotel') }}" class="btn-cta-ghost">
                        <i class="fa fa-building"></i> Đặt khách sạn
                    </a>
                </div>
                <div class="hero-numbers ftco-animate">
                    <div class="hero-number-item">
                        <div class="num">{{ $tours->count() }}<sup>+</sup></div>
                        <div class="lbl">Tours nổi bật</div>
                    </div>
                    <div class="hero-number-item">
                        <div class="num">{{ $locations->count() }}<sup>+</sup></div>
                        <div class="lbl">Địa điểm</div>
                    </div>
                    <div class="hero-number-item">
                        <div class="num">10K<sup>+</sup></div>
                        <div class="lbl">Khách hàng</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-scroll">
        <a href="#search-section"><i class="fa fa-angle-down"></i></a>
    </div>
</div>

{{-- ================================================================
     SEARCH SECTION
     ================================================================ --}}
<section id="search-section" class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ftco-search d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">
                                    <i class="fa fa-compass mr-1"></i> Tìm kiếm Tour
                                </a>
                                <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">
                                    <i class="fa fa-building mr-1"></i> Tìm kiếm khách sạn
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12 tab-wrap">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                    @include('page.common.searchTour')
                                </div>
                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                                    @include('page.common.searchHotel', compact('locations'))
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     STATS BAND
     ================================================================ --}}
<section class="stats-band">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-box">
                    <div class="sicon"><i class="fa fa-map-marker"></i></div>
                    <div class="svalue">{{ $locations->count() }}<span class="accent">+</span></div>
                    <div class="slabel">Địa điểm</div>
                    <div class="sline"></div>
                </div>
            </div>
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-box">
                    <div class="sicon"><i class="fa fa-plane"></i></div>
                    <div class="svalue">{{ $tours->count() }}<span class="accent">+</span></div>
                    <div class="slabel">Tours nổi bật</div>
                    <div class="sline"></div>
                </div>
            </div>
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-box">
                    <div class="sicon"><i class="fa fa-users"></i></div>
                    <div class="svalue">10K<span class="accent">+</span></div>
                    <div class="slabel">Khách hàng</div>
                    <div class="sline"></div>
                </div>
            </div>
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-box">
                    <div class="sicon"><i class="fa fa-star"></i></div>
                    <div class="svalue">4.9<span class="accent">/5</span></div>
                    <div class="slabel">Đánh giá</div>
                    <div class="sline"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     SERVICES SECTION
     ================================================================ --}}
<section class="services-new">
    <div class="container">
        <div class="sec-head text-center">
            <span class="sec-tag">Dịch vụ</span>
            <h2>Đã đến lúc bắt đầu cuộc phiêu lưu</h2>
            <div class="sec-divider center">
                <div class="line"></div><div class="dot"></div><div class="line"></div>
            </div>
            <p>Xách balo lên và đi với chúng tôi — bạn sẽ có những trải nghiệm tuyệt vời cùng dịch vụ hàng đầu!</p>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 ftco-animate">
                <div class="svc-card">
                    <div class="svc-icon c1"><span class="flaticon-paragliding"></span></div>
                    <h3>Các hoạt động</h3>
                    <p>Hoạt động dã ngoại, thể thao mạo hiểm và khám phá thiên nhiên trong suốt hành trình.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 ftco-animate">
                <div class="svc-card">
                    <div class="svc-icon c2"><span class="flaticon-route"></span></div>
                    <h3>Sắp xếp chuyến đi</h3>
                    <p>Chúng tôi lên kế hoạch hoàn hảo với lịch trình linh hoạt và đa dạng sự lựa chọn phù hợp.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 ftco-animate">
                <div class="svc-card">
                    <div class="svc-icon c3"><span class="flaticon-tour-guide"></span></div>
                    <h3>Hướng dẫn riêng</h3>
                    <p>Đội ngũ hướng dẫn viên chuyên nghiệp, am hiểu văn hóa và luôn tận tâm phục vụ bạn.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 ftco-animate">
                <div class="svc-card">
                    <div class="svc-icon c4"><span class="flaticon-map"></span></div>
                    <h3>Quản lý vị trí</h3>
                    <p>Khám phá hàng trăm địa điểm trên khắp Việt Nam và quốc tế với thông tin cập nhật nhất.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     DESTINATIONS SECTION
     ================================================================ --}}
<section class="dest-section img ftco-select-destination" style="background-image: url({{ asset('page/images/bg_3.jpg') }});">
    <div class="container">
        <div class="sec-head">
            <span class="sec-tag">Địa điểm</span>
            <h2 style="color:#1a1a2e;">Địa điểm du lịch nổi bật</h2>
            <div class="sec-divider">
                <div class="line"></div><div class="dot"></div><div class="line"></div>
            </div>
            <p style="margin:0;">Khám phá những điểm đến hấp dẫn nhất — từ biển xanh đến núi cao, từ rừng già đến phố cổ.</p>
        </div>
    </div>
    <div class="container container-2">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-destination owl-carousel ftco-animate">
                    @if ($locations->count() > 0)
                        @foreach($locations as $location)
                            <div class="item">
                                <a href="{{ route('tour') }}?location={{ $location->id }}" class="dest-card">
                                    <div class="d-bg" style="background-image: url({{ asset('page/images/place-1.jpg') }});"></div>
                                    <div class="d-overlay"></div>
                                    <div class="d-info">
                                        <div class="d-name">{{ $location->l_name }}</div>
                                        <div class="d-count">
                                            <i class="fa fa-map-marker"></i>
                                            {{ $location->tours ? $location->tours->count() : 0 }} Tours
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     TOURS SECTION
     ================================================================ --}}
<section class="tours-new">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap" style="gap:16px;">
            <div class="sec-head mb-0">
                <span class="sec-tag">Tour</span>
                <h2 class="mb-0">Tour Du Lịch Mới Nhất</h2>
            </div>
            <a href="{{ route('tour') }}" class="btn-view-all ftco-animate">
                Xem tất cả <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="row">
            @if($tours->count() > 0)
                @foreach($tours as $tour)
                    @include('page.common.itemTour', compact('tour'))
                @endforeach
            @endif
        </div>
    </div>
</section>

{{-- ================================================================
     VIDEO SECTION
     ================================================================ --}}
<section class="vid-section ftco-about img" style="background-image: url({{ asset('page/images/bg_4.jpg') }});">
    <div class="overlay"></div>
    <div class="container py-5">
        <div class="row py-md-4 justify-content-center">
            <div class="col-md-7 vid-inner ftco-animate">
                <span class="vid-tag">Travel</span>
                <h2>Những khoảnh khắc đáng nhớ cùng chúng tôi</h2>
                <a href="https://www.youtube.com/watch?v=04Kf_0kppPM" class="play-btn popup-vimeo">
                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     ABOUT / WHY CHOOSE US
     ================================================================ --}}
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0 ftco-animate">
                <div class="about-img" style="background-image: url({{ asset('page/images/about-1.jpg') }});">
                    <div class="badge-card">
                        <div class="bnum">10+</div>
                        <div class="btxt">Năm kinh<br>nghiệm</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 pl-lg-5 ftco-animate">
                <div class="sec-head mb-4">
                    <span class="sec-tag">Giới thiệu</span>
                    <h2>Hãy làm cho chuyến tham quan của bạn <span style="color:#f15d30">đáng nhớ</span> hơn</h2>
                </div>
                <p style="color:#6c757d; font-size:15px; line-height:1.8; margin-bottom:30px;">
                    Những chuyến đi luôn để lại trong chúng ta những kỉ niệm đặc biệt. Hãy trân trọng từng khoảnh khắc vui vẻ và hạnh phúc. Chúng tôi đồng hành cùng bạn để những trải nghiệm ấy càng thêm tuyệt vời hơn.
                </p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="why-item">
                            <div class="wi-icon"><i class="fa fa-shield"></i></div>
                            <div>
                                <h4>An toàn & Đảm bảo</h4>
                                <p>Mọi tour đều được bảo hiểm và kiểm duyệt kỹ càng trước khi khởi hành.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="why-item">
                            <div class="wi-icon"><i class="fa fa-tag"></i></div>
                            <div>
                                <h4>Giá tốt nhất</h4>
                                <p>Cam kết giá cạnh tranh nhất thị trường với nhiều ưu đãi hấp dẫn.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="why-item">
                            <div class="wi-icon"><i class="fa fa-headphones"></i></div>
                            <div>
                                <h4>Hỗ trợ 24/7</h4>
                                <p>Đội ngũ tư vấn luôn sẵn sàng hỗ trợ bạn mọi lúc mọi nơi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="why-item">
                            <div class="wi-icon"><i class="fa fa-trophy"></i></div>
                            <div>
                                <h4>Kinh nghiệm dày dặn</h4>
                                <p>Hơn 10 năm tổ chức tour chất lượng cao trong và ngoài nước.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     TESTIMONIALS
     ================================================================ --}}
<section class="testimonials-wrap">
    <div class="container">
        <div class="sec-head text-center">
            <span class="sec-tag">Đánh giá</span>
            <h2>Khách hàng nói gì về chúng tôi</h2>
            <div class="sec-divider center">
                <div class="line"></div><div class="dot"></div><div class="line"></div>
            </div>
        </div>
    </div>
    @include('page.common.listCommentHot', compact('comments'))
</section>

{{-- ================================================================
     ARTICLES SECTION
     ================================================================ --}}
<section class="articles-wrap">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap" style="gap:16px;">
            <div class="sec-head mb-0">
                <span class="sec-tag">Tin tức</span>
                <h2 class="mb-0">Bài Đăng Gần Đây</h2>
            </div>
            <a href="{{ route('articles.index') }}" class="btn-view-all ftco-animate">
                Xem tất cả <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="row d-flex">
            @if ($articles->count() > 0)
                @foreach($articles as $article)
                    @include('page.common.itemArticle', compact('article'))
                @endforeach
            @endif
        </div>
    </div>
</section>

{{-- ================================================================
     CTA BAND
     ================================================================ --}}
<section class="cta-band">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7 ftco-animate">
                <h2>Sẵn sàng cho chuyến đi tiếp theo?</h2>
                <p>Liên hệ với chúng tôi ngay hôm nay — chúng tôi sẽ tư vấn và lên kế hoạch chuyến đi hoàn hảo nhất cho bạn!</p>
                <div>
                    <a href="{{ route('contact.index') }}" class="btn-white">
                        <i class="fa fa-envelope mr-2"></i> Liên hệ ngay
                    </a>
                    <a href="{{ route('tour') }}" class="btn-white-outline">
                        <i class="fa fa-search mr-2"></i> Tìm tour
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
@section('script')
@stop
