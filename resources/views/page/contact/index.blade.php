@extends('page.layouts.page')
@section('title', 'Liên Hệ | Travel')
@section('style')
<link rel="stylesheet" href="{{ asset('page/css/subpage.css') }}">
<style>
.contact-form-wrap {
    background: #fff;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 8px 40px rgba(30,58,138,0.10), 0 2px 10px rgba(233,30,140,0.06);
    border: 1px solid rgba(233,30,140,0.10);
}
.contact-form-wrap .form-group label {
    font-size: 13px;
    font-weight: 700;
    color: #334155;
    margin-bottom: 6px;
    display: block;
    letter-spacing: 0.3px;
}
.contact-form-wrap .form-control {
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 14px;
    color: #0f172a;
    transition: border-color 0.2s, box-shadow 0.2s;
    height: auto;
    font-family: var(--font-vn, 'Be Vietnam Pro', sans-serif);
}
.contact-form-wrap .form-control:focus {
    border-color: #e91e8c;
    box-shadow: 0 0 0 3px rgba(233,30,140,0.10);
    outline: none;
}
.contact-form-wrap textarea.form-control { resize: vertical; min-height: 130px; }
.btn-send {
    background: linear-gradient(135deg, #e91e8c 0%, #2563eb 100%);
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: 13px 36px;
    font-weight: 700;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 4px 16px rgba(233,30,140,0.30);
    width: 100%;
}
.btn-send:hover {
    background: linear-gradient(135deg, #c2185b 0%, #1e3a8a 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(233,30,140,0.40);
}
.working-hours-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px dashed #e2e8f0;
    font-size: 14px;
}
.working-hours-item:last-child { border-bottom: none; }
.working-hours-item .day { color: #334155; font-weight: 600; }
.working-hours-item .time { color: #e91e8c; font-weight: 700; }
.social-links { display: flex; gap: 12px; margin-top: 10px; }
.social-link {
    width: 42px; height: 42px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; text-decoration: none;
    transition: all 0.3s;
}
.social-link.fb  { background: rgba(24,119,242,0.12); color: #1877F2; }
.social-link.yt  { background: rgba(255,0,0,0.10); color: #FF0000; }
.social-link.zl  { background: rgba(0,104,183,0.10); color: #0068b7; }
.social-link.tiktok { background: rgba(0,0,0,0.08); color: #010101; }
.social-link:hover { transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,0,0,0.12); }
.faq-item {
    background: #fff;
    border-radius: 14px;
    border: 1px solid rgba(233,30,140,0.10);
    margin-bottom: 12px;
    overflow: hidden;
}
.faq-item summary {
    padding: 18px 24px;
    font-weight: 700;
    font-size: 15px;
    color: #0f172a;
    cursor: pointer;
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background 0.2s;
}
.faq-item summary:hover { background: rgba(233,30,140,0.04); color: #e91e8c; }
.faq-item summary::after { content: '+'; font-size: 20px; color: #e91e8c; font-weight: 400; }
.faq-item[open] summary::after { content: '−'; }
.faq-item .faq-body { padding: 0 24px 18px; color: #64748b; font-size: 14px; line-height: 1.8; }
</style>
@stop
@section('content')

{{-- HERO --}}
<section class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1920&h=600&fit=crop&auto=format&q=85');">
    <div class="page-hero__overlay"></div>
    <div class="container">
        <div class="page-hero__body">
            <nav class="page-hero__breadcrumb">
                <a href="{{ route('page.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                <span class="sep"><i class="fa fa-chevron-right"></i></span>
                <span class="current">Liên Hệ</span>
            </nav>
            <div class="page-hero__tag"><i class="fa fa-envelope"></i> Travel</div>
            <h1 class="page-hero__title ftco-animate">Liên Hệ <span>Với Chúng Tôi</span></h1>
            <p class="page-hero__subtitle ftco-animate">Đội ngũ tư vấn chuyên nghiệp — sẵn sàng hỗ trợ bạn 24/7</p>
        </div>
    </div>
</section>

{{-- CONTACT INFO CARDS --}}
<section style="padding: 70px 0 50px; background: linear-gradient(180deg,#f0f4ff 0%,#f8f0f7 100%);">
    <div class="container">
        <div class="text-center mb-5 ftco-animate">
            <span class="sec-tag">Kết nối</span>
            <h2 style="font-size:32px;font-weight:800;color:#0f172a;margin-top:10px;">Thông tin liên hệ</h2>
            <p style="color:#64748b;font-size:15px;margin-top:8px;">Chúng tôi luôn lắng nghe và sẵn sàng giải đáp mọi thắc mắc của bạn</p>
        </div>
        <div class="row" style="margin-left:-14px;margin-right:-14px;">
            <div class="col-md-3 ftco-animate" style="padding:0 14px;margin-bottom:28px;">
                <div class="contact-info-card h-100 text-center">
                    <div class="contact-info-card__icon"><i class="fa fa-map-marker"></i></div>
                    <h3>Văn phòng</h3>
                    <p>Đường 3/2, Phường Xuân Khánh<br>Ninh Kiều, Cần Thơ</p>
                    <p style="font-size:12px;color:#94a3b8;margin-top:8px;"><i class="fa fa-clock-o mr-1"></i> T2–T6: 8:00 – 17:30</p>
                </div>
            </div>
            <div class="col-md-3 ftco-animate" style="padding:0 14px;margin-bottom:28px;">
                <div class="contact-info-card h-100 text-center">
                    <div class="contact-info-card__icon"><i class="fa fa-phone"></i></div>
                    <h3>Hotline</h3>
                    <p><a href="tel:19001234" style="font-size:18px;font-weight:700;color:#e91e8c;">1900 1234</a></p>
                    <p><a href="tel:0292123456" style="font-size:14px;">0292 123 456</a></p>
                    <p style="font-size:12px;color:#94a3b8;margin-top:6px;"><i class="fa fa-circle" style="color:#22c55e;font-size:8px;margin-right:4px;"></i> Hỗ trợ 24/7</p>
                </div>
            </div>
            <div class="col-md-3 ftco-animate" style="padding:0 14px;margin-bottom:28px;">
                <div class="contact-info-card h-100 text-center">
                    <div class="contact-info-card__icon"><i class="fa fa-envelope"></i></div>
                    <h3>Email</h3>
                    <p><a href="mailto:booking@vhdtravel.vn">booking@vhdtravel.vn</a></p>
                    <p><a href="mailto:support@vhdtravel.vn" style="font-size:13px;">support@vhdtravel.vn</a></p>
                    <p style="font-size:12px;color:#94a3b8;margin-top:6px;"><i class="fa fa-reply mr-1"></i> Phản hồi trong 2 giờ</p>
                </div>
            </div>
            <div class="col-md-3 ftco-animate" style="padding:0 14px;margin-bottom:28px;">
                <div class="contact-info-card h-100 text-center">
                    <div class="contact-info-card__icon"><i class="fa fa-share-alt"></i></div>
                    <h3>Mạng xã hội</h3>
                    <p style="color:#64748b;font-size:13px;margin-bottom:12px;">Theo dõi để nhận ưu đãi mới nhất!</p>
                    <div class="social-links" style="justify-content:center;">
                        <a href="#" class="social-link fb"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social-link yt"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" class="social-link zl"><i class="fa fa-comment"></i></a>
                        <a href="#" class="social-link tiktok"><i class="fa fa-music"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CONTACT FORM + WORKING HOURS --}}
<section style="padding: 60px 0; background: #fff;">
    <div class="container">
        <div class="row align-items-start" style="gap-y:32px;">

            {{-- Form gửi yêu cầu --}}
            <div class="col-lg-7 ftco-animate mb-5 mb-lg-0">
                <div class="contact-form-wrap">
                    <div class="mb-4">
                        <span class="sec-tag">Liên hệ</span>
                        <h3 style="font-size:24px;font-weight:800;color:#0f172a;margin-top:10px;">Gửi yêu cầu tư vấn</h3>
                        <p style="color:#64748b;font-size:14px;margin-top:6px;">Điền thông tin bên dưới — chúng tôi sẽ liên hệ lại trong vòng 2 giờ.</p>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Họ và tên <span style="color:#e91e8c;">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Nguyễn Văn A" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Số điện thoại <span style="color:#e91e8c;">*</span></label>
                                    <input type="tel" class="form-control" name="phone" placeholder="0901 234 567" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Dịch vụ quan tâm</label>
                                    <select class="form-control" name="service">
                                        <option>Đặt tour du lịch</option>
                                        <option>Đặt phòng khách sạn</option>
                                        <option>Tour theo nhóm / công ty</option>
                                        <option>Tour nước ngoài</option>
                                        <option>Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label>Điểm đến mong muốn</label>
                            <input type="text" class="form-control" name="destination" placeholder="VD: Đà Nẵng, Phú Quốc, Hội An...">
                        </div>
                        <div class="form-group mb-4">
                            <label>Nội dung yêu cầu <span style="color:#e91e8c;">*</span></label>
                            <textarea class="form-control" name="message" rows="4" placeholder="Mô tả chi tiết nhu cầu của bạn — số người, ngày khởi hành, ngân sách dự kiến..." required></textarea>
                        </div>
                        <button type="submit" class="btn-send">
                            <i class="fa fa-paper-plane mr-2"></i> Gửi yêu cầu tư vấn
                        </button>
                    </form>
                </div>
            </div>

            {{-- Giờ làm việc + FAQ --}}
            <div class="col-lg-5 ftco-animate">

                {{-- Giờ làm việc --}}
                <div style="background:#f8f0f7;border-radius:20px;padding:32px;margin-bottom:24px;border:1px solid rgba(233,30,140,0.10);">
                    <h4 style="font-size:18px;font-weight:800;color:#0f172a;margin-bottom:20px;">
                        <i class="fa fa-clock-o mr-2" style="color:#e91e8c;"></i> Giờ làm việc
                    </h4>
                    <div class="working-hours-item">
                        <span class="day">Thứ Hai — Thứ Sáu</span>
                        <span class="time">08:00 – 17:30</span>
                    </div>
                    <div class="working-hours-item">
                        <span class="day">Thứ Bảy</span>
                        <span class="time">08:00 – 12:00</span>
                    </div>
                    <div class="working-hours-item">
                        <span class="day">Chủ Nhật</span>
                        <span class="time" style="color:#94a3b8;">Nghỉ</span>
                    </div>
                    <div class="working-hours-item">
                        <span class="day">Hotline hỗ trợ</span>
                        <span class="time">24/7</span>
                    </div>
                    <div style="margin-top:18px;padding:14px;background:rgba(233,30,140,0.06);border-radius:10px;border-left:3px solid #e91e8c;">
                        <p style="font-size:13px;color:#64748b;margin:0;line-height:1.7;">
                            <strong style="color:#e91e8c;">Lưu ý:</strong> Ngoài giờ làm việc, vui lòng liên hệ qua Hotline hoặc email — đội ngũ trực tuyến sẽ phản hồi trong thời gian sớm nhất.
                        </p>
                    </div>
                </div>

                {{-- FAQ --}}
                <div>
                    <h4 style="font-size:18px;font-weight:800;color:#0f172a;margin-bottom:16px;">
                        <i class="fa fa-question-circle mr-2" style="color:#e91e8c;"></i> Câu hỏi thường gặp
                    </h4>
                    <details class="faq-item">
                        <summary>Tôi có thể đặt tour trước bao lâu?</summary>
                        <div class="faq-body">Bạn có thể đặt tour trước 3-6 tháng để có mức giá tốt nhất và đảm bảo chỗ. Chúng tôi hỗ trợ đặt tour trước tối đa 12 tháng với nhiều ưu đãi đặc biệt.</div>
                    </details>
                    <details class="faq-item">
                        <summary>Chính sách hoàn tiền khi hủy tour?</summary>
                        <div class="faq-body">Hủy trước 15 ngày: hoàn 90%. Hủy trước 7 ngày: hoàn 70%. Hủy trước 3 ngày: hoàn 50%. Hủy dưới 3 ngày: hoàn 30%. Chi tiết xem tại điều khoản dịch vụ.</div>
                    </details>
                    <details class="faq-item">
                        <summary>Có tour thiết kế riêng theo yêu cầu không?</summary>
                        <div class="faq-body">Có! Chúng tôi thiết kế tour theo yêu cầu cho cặp đôi, gia đình, nhóm bạn và đoàn doanh nghiệp. Liên hệ trực tiếp để được tư vấn chương trình phù hợp nhất.</div>
                    </details>
                    <details class="faq-item">
                        <summary>Hình thức thanh toán được chấp nhận?</summary>
                        <div class="faq-body">Chuyển khoản ngân hàng, thẻ tín dụng/ghi nợ Visa/Mastercard, ví điện tử MoMo, ZaloPay, VNPay. Đặt cọc tối thiểu 30% để giữ chỗ.</div>
                    </details>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- MAP --}}
<section style="padding: 0 0 70px; background: #f0f4ff;">
    <div class="container">
        <div class="text-center mb-4 ftco-animate pt-5">
            <span class="sec-tag">Vị trí</span>
            <h3 style="font-size:24px;font-weight:800;color:#0f172a;margin-top:10px;">Tìm chúng tôi trên bản đồ</h3>
        </div>
        <div class="ftco-animate" style="border-radius:20px;overflow:hidden;box-shadow:0 8px 40px rgba(30,58,138,0.12);border:1px solid rgba(233,30,140,0.1);">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5132741062075!2d106.69907491462253!3d10.771944792324629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40b9124b2b%3A0x8582d6b6cebc0918!2zNjUgxJDGsOG7nW5nIEh14buzbmggVGjDumMgS2jDoW5nLCBC4bq_biBOZ2jDqSwgUXXhuq1uIDEsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1626710237153!5m2!1svi!2s"
                width="100%" height="460" style="border:0;display:block;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-band">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7 ftco-animate">
                <h2>Sẵn sàng cho chuyến đi tiếp theo?</h2>
                <p>Hơn 10 năm kinh nghiệm — chúng tôi đã đồng hành cùng hàng chục nghìn du khách trên mọi hành trình. Để chúng tôi lo tất cả!</p>
                <div>
                    <a href="{{ route('tour') }}" class="btn-white">
                        <i class="fa fa-search mr-2"></i> Tìm tour ngay
                    </a>
                    <a href="{{ route('hotel') }}" class="btn-white-outline">
                        <i class="fa fa-building mr-2"></i> Đặt khách sạn
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
@section('script')@stop
