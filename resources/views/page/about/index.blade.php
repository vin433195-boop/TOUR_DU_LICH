@extends('page.layouts.page')
@section('title', 'Giới Thiệu | Travel')
@section('style')
<link rel="stylesheet" href="{{ asset('page/css/home-custom.css') }}">
<link rel="stylesheet" href="{{ asset('page/css/subpage.css') }}">
<style>
/* ── Stats band ── */
.about-stats {
    background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 60%, #e91e8c22 100%);
    padding: 60px 0;
}
.stat-item {
    text-align: center;
    color: #fff;
    padding: 20px 0;
}
.stat-item .stat-number {
    font-size: 52px;
    font-weight: 800;
    line-height: 1;
    background: linear-gradient(135deg, #e91e8c, #f97316);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.stat-item .stat-label {
    font-size: 14px;
    color: rgba(255,255,255,0.72);
    margin-top: 8px;
    font-weight: 500;
    letter-spacing: 0.5px;
}
.stat-divider {
    width: 1px;
    background: rgba(255,255,255,0.12);
    align-self: stretch;
    margin: 10px 0;
}

/* ── Mission / Story ── */
.about-story {
    padding: 80px 0 60px;
    background: #fff;
}
.about-story__img {
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    height: 480px;
    box-shadow: 0 24px 60px rgba(30,58,138,0.18);
}
.about-story__img img {
    width: 100%; height: 100%;
    object-fit: cover;
}
.about-story__badge {
    position: absolute;
    bottom: 30px;
    right: -20px;
    background: linear-gradient(135deg, #e91e8c, #c2185b);
    color: #fff;
    border-radius: 18px;
    padding: 20px 28px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(233,30,140,0.4);
    min-width: 140px;
}
.about-story__badge .badge-num {
    font-size: 38px;
    font-weight: 800;
    line-height: 1;
}
.about-story__badge .badge-text {
    font-size: 12px;
    font-weight: 600;
    margin-top: 4px;
    opacity: 0.9;
}

/* ── Values cards ── */
.values-section {
    padding: 70px 0 80px;
    background: linear-gradient(180deg, #f0f4ff 0%, #fdf0f8 100%);
}
.value-card {
    background: #fff;
    border-radius: 20px;
    padding: 36px 28px;
    height: 100%;
    box-shadow: 0 6px 30px rgba(30,58,138,0.08);
    border: 1px solid rgba(233,30,140,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
}
.value-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(233,30,140,0.15);
}
.value-card__icon {
    width: 70px; height: 70px;
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    margin: 0 auto 22px;
}
.value-card__icon.c1 { background: linear-gradient(135deg,#fde68a,#f97316); color:#fff; }
.value-card__icon.c2 { background: linear-gradient(135deg,#a78bfa,#7c3aed); color:#fff; }
.value-card__icon.c3 { background: linear-gradient(135deg,#6ee7b7,#059669); color:#fff; }
.value-card__icon.c4 { background: linear-gradient(135deg,#fbcfe8,#e91e8c); color:#fff; }
.value-card__icon.c5 { background: linear-gradient(135deg,#bae6fd,#0284c7); color:#fff; }
.value-card__icon.c6 { background: linear-gradient(135deg,#fca5a5,#dc2626); color:#fff; }
.value-card h4 {
    font-size: 17px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 10px;
}
.value-card p {
    font-size: 14px;
    color: #64748b;
    line-height: 1.7;
    margin: 0;
}

/* ── Services showcase ── */
.services-showcase {
    padding: 70px 0 80px;
    background: #fff;
}
.service-showcase-card {
    border-radius: 18px;
    overflow: hidden;
    position: relative;
    height: 300px;
    display: flex;
    align-items: flex-end;
    text-decoration: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    transition: transform 0.35s, box-shadow 0.35s;
}
.service-showcase-card:hover { transform: translateY(-6px); box-shadow: 0 22px 55px rgba(0,0,0,0.2); }
.service-showcase-card img {
    position: absolute; inset: 0;
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.6s;
}
.service-showcase-card:hover img { transform: scale(1.06); }
.service-showcase-card .ssc-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(10,10,30,0.82) 0%, transparent 60%);
}
.service-showcase-card .ssc-body {
    position: relative; z-index: 2;
    padding: 24px 26px;
    width: 100%;
}
.service-showcase-card .ssc-icon {
    width: 46px; height: 46px;
    border-radius: 14px;
    background: rgba(233,30,140,0.85);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: #fff;
    margin-bottom: 12px;
}
.service-showcase-card h4 {
    font-size: 18px; font-weight: 700;
    color: #fff; margin-bottom: 6px;
}
.service-showcase-card p {
    font-size: 13px; color: rgba(255,255,255,0.78);
    margin: 0; line-height: 1.55;
}

/* ── Team CTA ── */
.about-cta {
    padding: 80px 0;
    background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
    position: relative; overflow: hidden;
}
.about-cta::before {
    content: '';
    position: absolute; inset: 0;
    background: url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=1600&h=500&fit=crop&auto=format&q=60') center/cover;
    opacity: 0.07;
}
</style>
@stop
@section('content')

{{-- HERO --}}
<section class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=1920&h=600&fit=crop&auto=format&q=85');">
    <div class="page-hero__overlay"></div>
    <div class="container">
        <div class="page-hero__body">
            <nav class="page-hero__breadcrumb">
                <a href="{{ route('page.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                <span class="sep"><i class="fa fa-chevron-right"></i></span>
                <span class="current">Giới thiệu</span>
            </nav>
            <div class="page-hero__tag"><i class="fa fa-info-circle"></i> Về Chúng Tôi</div>
            <h1 class="page-hero__title ftco-animate">Câu chuyện <span>Travel</span></h1>
            <p class="page-hero__subtitle ftco-animate">Đồng hành cùng bạn trên mọi hành trình khám phá thế giới</p>
        </div>
    </div>
</section>

{{-- STATS BAND --}}
<section class="about-stats">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Năm kinh nghiệm</div>
                </div>
            </div>
            <div class="d-none d-md-block stat-divider"></div>
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Tour du lịch</div>
                </div>
            </div>
            <div class="d-none d-md-block stat-divider"></div>
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Điểm đến</div>
                </div>
            </div>
            <div class="d-none d-md-block stat-divider"></div>
            <div class="col-6 col-md-3 ftco-animate">
                <div class="stat-item">
                    <div class="stat-number">20K+</div>
                    <div class="stat-label">Khách hài lòng</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STORY / MISSION --}}
<section class="about-story">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 ftco-animate">
                <div class="about-story__img">
                    <img src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=900&h=600&fit=crop&auto=format&q=85"
                         alt="Câu chuyện Travel">
                    <div class="about-story__badge">
                        <div class="badge-num">2014</div>
                        <div class="badge-text">Thành lập</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pl-lg-5 ftco-animate">
                <span class="sec-tag">Câu chuyện của chúng tôi</span>
                <h2 style="font-size:32px;font-weight:800;color:#0f172a;margin:14px 0 22px;line-height:1.3;">
                    Hơn một thập kỷ <br>mang lại những hành trình đáng nhớ
                </h2>
                <p style="color:#475569;font-size:15px;line-height:1.85;margin-bottom:18px;">
                    Được thành lập năm 2014, Travel ra đời từ niềm đam mê khám phá và mong muốn chia sẻ vẻ đẹp của đất nước Việt Nam cùng thế giới. Xuất phát từ những chuyến đi nhỏ quanh miền Tây sông nước, chúng tôi từng bước mở rộng ra khắp 63 tỉnh thành và hơn 20 quốc gia.
                </p>
                <p style="color:#475569;font-size:15px;line-height:1.85;margin-bottom:28px;">
                    Với đội ngũ hướng dẫn viên giàu kinh nghiệm, hệ thống đối tác khách sạn và hàng không uy tín, chúng tôi cam kết mang đến mỗi hành trình sự thoải mái, an toàn và những trải nghiệm chân thực nhất.
                </p>
                <div class="row g-3">
                    <div class="col-6">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#e91e8c22,#e91e8c44);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fa fa-check" style="color:#e91e8c;font-size:16px;"></i>
                            </div>
                            <span style="font-size:14px;font-weight:600;color:#334155;">Tour đa dạng</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#e91e8c22,#e91e8c44);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fa fa-check" style="color:#e91e8c;font-size:16px;"></i>
                            </div>
                            <span style="font-size:14px;font-weight:600;color:#334155;">Giá minh bạch</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#e91e8c22,#e91e8c44);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fa fa-check" style="color:#e91e8c;font-size:16px;"></i>
                            </div>
                            <span style="font-size:14px;font-weight:600;color:#334155;">Hỗ trợ 24/7</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#e91e8c22,#e91e8c44);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fa fa-check" style="color:#e91e8c;font-size:16px;"></i>
                            </div>
                            <span style="font-size:14px;font-weight:600;color:#334155;">Bảo hiểm toàn trình</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('tour') }}" class="btn btn-primary mt-4 py-3 px-5"
                   style="border-radius:50px;font-weight:700;background:linear-gradient(135deg,#e91e8c,#2563eb);border:none;">
                    <i class="fa fa-plane mr-2"></i> Xem tất cả tours
                </a>
            </div>
        </div>
    </div>
</section>

{{-- VALUES / WHY US --}}
<section class="values-section">
    <div class="container">
        <div class="text-center mb-5 ftco-animate">
            <span class="sec-tag">Giá trị cốt lõi</span>
            <h2 style="font-size:30px;font-weight:800;color:#0f172a;margin-top:12px;">Tại sao chọn Travel?</h2>
            <p style="color:#64748b;font-size:15px;max-width:560px;margin:12px auto 0;">
                Chúng tôi không chỉ bán tour — chúng tôi kiến tạo những kỷ niệm không thể quên trên mỗi hành trình
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="value-card">
                    <div class="value-card__icon c1"><i class="fa fa-shield"></i></div>
                    <h4>An toàn tuyệt đối</h4>
                    <p>Mọi chuyến đi đều được trang bị bảo hiểm du lịch toàn diện và đội ngũ hỗ trợ khẩn cấp 24/7.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="value-card">
                    <div class="value-card__icon c2"><i class="fa fa-star"></i></div>
                    <h4>Dịch vụ 5 sao</h4>
                    <p>Đối tác là những khách sạn và resort 4-5 sao hàng đầu, đảm bảo mỗi đêm nghỉ là một trải nghiệm.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="value-card">
                    <div class="value-card__icon c3"><i class="fa fa-leaf"></i></div>
                    <h4>Du lịch bền vững</h4>
                    <p>Cam kết bảo vệ môi trường, hỗ trợ cộng đồng địa phương và thúc đẩy du lịch có trách nhiệm.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="value-card">
                    <div class="value-card__icon c4"><i class="fa fa-heart"></i></div>
                    <h4>Tận tâm phục vụ</h4>
                    <p>Đội ngũ hơn 50 hướng dẫn viên được đào tạo bài bản, nhiệt tình và am hiểu văn hóa địa phương.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="value-card">
                    <div class="value-card__icon c5"><i class="fa fa-tag"></i></div>
                    <h4>Giá cả minh bạch</h4>
                    <p>Không phát sinh chi phí ẩn — mọi khoản phí được niêm yết rõ ràng ngay từ khi đặt tour.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="value-card">
                    <div class="value-card__icon c6"><i class="fa fa-refresh"></i></div>
                    <h4>Hoàn tiền dễ dàng</h4>
                    <p>Chính sách hủy linh hoạt và hoàn tiền nhanh chóng trong vòng 48 giờ khi có yêu cầu hợp lệ.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES SHOWCASE --}}
<section class="services-showcase">
    <div class="container">
        <div class="text-center mb-5 ftco-animate">
            <span class="sec-tag">Dịch vụ</span>
            <h2 style="font-size:30px;font-weight:800;color:#0f172a;margin-top:12px;">Những gì chúng tôi cung cấp</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="service-showcase-card">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600&h=400&fit=crop&auto=format&q=85" alt="Thám hiểm">
                    <div class="ssc-overlay"></div>
                    <div class="ssc-body">
                        <div class="ssc-icon"><i class="fa fa-flag"></i></div>
                        <h4>Thám hiểm</h4>
                        <p>Trekking, leo núi và khám phá thiên nhiên hoang dã</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="service-showcase-card">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&h=400&fit=crop&auto=format&q=85" alt="Biển đảo">
                    <div class="ssc-overlay"></div>
                    <div class="ssc-body">
                        <div class="ssc-icon"><i class="fa fa-umbrella"></i></div>
                        <h4>Biển & Đảo</h4>
                        <p>Phú Quốc, Côn Đảo, Nha Trang, Đà Nẵng và hơn thế</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="service-showcase-card">
                    <img src="https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=600&h=400&fit=crop&auto=format&q=85" alt="Nghỉ dưỡng">
                    <div class="ssc-overlay"></div>
                    <div class="ssc-body">
                        <div class="ssc-icon"><i class="fa fa-building"></i></div>
                        <h4>Nghỉ dưỡng</h4>
                        <p>Resort 5 sao, overwater villa và spa cao cấp</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="service-showcase-card">
                    <img src="https://images.unsplash.com/photo-1573843981267-be1999ff37cd?w=600&h=400&fit=crop&auto=format&q=85" alt="Văn hóa">
                    <div class="ssc-overlay"></div>
                    <div class="ssc-body">
                        <div class="ssc-icon"><i class="fa fa-camera"></i></div>
                        <h4>Văn hóa</h4>
                        <p>Ẩm thực địa phương, lễ hội và di sản văn hóa thế giới</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA BAND --}}
<section class="about-cta">
    <div class="container" style="position:relative;z-index:2;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7 ftco-animate">
                <span class="sec-tag" style="background:rgba(233,30,140,0.22);border-color:rgba(233,30,140,0.45);color:#ffb3d9;">Sẵn sàng khởi hành?</span>
                <h2 style="color:#fff;font-size:34px;font-weight:800;margin:16px 0 14px;line-height:1.3;">
                    Hãy để chúng tôi tạo nên <br>hành trình trong mơ của bạn
                </h2>
                <p style="color:rgba(255,255,255,0.75);font-size:15px;margin-bottom:32px;line-height:1.7;">
                    Liên hệ ngay hôm nay để nhận tư vấn miễn phí và ưu đãi độc quyền dành riêng cho chuyến đi của bạn.
                </p>
                <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
                    <a href="{{ route('tour') }}" class="btn btn-primary py-3 px-5"
                       style="border-radius:50px;font-weight:700;background:linear-gradient(135deg,#e91e8c,#c2185b);border:none;font-size:15px;">
                        <i class="fa fa-plane mr-2"></i> Khám phá tours
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn py-3 px-5"
                       style="border-radius:50px;font-weight:700;background:rgba(255,255,255,0.12);border:1.5px solid rgba(255,255,255,0.4);color:#fff;font-size:15px;backdrop-filter:blur(8px);">
                        <i class="fa fa-phone mr-2"></i> Liên hệ ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- COMMENTS --}}
@include('page.common.listCommentHot', compact('comments'))

@stop
@section('script')
@stop
