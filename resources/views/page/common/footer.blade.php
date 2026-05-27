<footer class="site-footer">
<style>
/* ── Footer ── */
.site-footer {
    background: linear-gradient(160deg, #0c1220 0%, #0f172a 50%, #1a1030 100%);
    color: rgba(255,255,255,0.72);
    font-size: 14px;
    position: relative;
    overflow: hidden;
}
.site-footer::before {
    content: '';
    position: absolute;
    top: -180px; right: -180px;
    width: 450px; height: 450px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(233,30,140,0.12) 0%, transparent 70%);
    pointer-events: none;
}
.site-footer::after {
    content: '';
    position: absolute;
    bottom: 60px; left: -120px;
    width: 320px; height: 320px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(37,99,235,0.10) 0%, transparent 70%);
    pointer-events: none;
}
.footer-top {
    padding: 70px 0 50px;
    border-bottom: 1px solid rgba(255,255,255,0.07);
    position: relative; z-index: 1;
}
.footer-brand .brand-logo {
    font-size: 28px;
    font-weight: 800;
    color: #fff;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
}
.footer-brand .brand-logo span {
    background: linear-gradient(135deg, #e91e8c, #f97316);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.footer-brand .brand-logo .logo-icon {
    width: 42px; height: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, #e91e8c, #2563eb);
    display: flex; align-items: center; justify-content: center;
    -webkit-text-fill-color: #fff;
    font-size: 20px;
    flex-shrink: 0;
}
.footer-brand p {
    color: rgba(255,255,255,0.58);
    line-height: 1.75;
    font-size: 13.5px;
    max-width: 280px;
    margin-bottom: 22px;
}
.footer-social {
    display: flex; gap: 10px;
    list-style: none; padding: 0; margin: 0;
}
.footer-social a {
    width: 40px; height: 40px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.12);
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,0.65);
    font-size: 16px;
    text-decoration: none;
    transition: all 0.25s;
    background: rgba(255,255,255,0.04);
}
.footer-social a:hover {
    background: linear-gradient(135deg, #e91e8c, #2563eb);
    border-color: transparent;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(233,30,140,0.35);
}
.footer-col h5 {
    font-size: 13px;
    font-weight: 700;
    color: #fff;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid rgba(233,30,140,0.35);
    display: inline-block;
}
.footer-links {
    list-style: none; padding: 0; margin: 0;
}
.footer-links li {
    margin-bottom: 10px;
}
.footer-links a {
    color: rgba(255,255,255,0.58);
    text-decoration: none;
    font-size: 13.5px;
    transition: all 0.22s;
    display: flex; align-items: center; gap: 8px;
}
.footer-links a i {
    font-size: 10px;
    color: #e91e8c;
    opacity: 0.7;
    transition: transform 0.22s;
}
.footer-links a:hover {
    color: #e91e8c;
    padding-left: 4px;
}
.footer-links a:hover i {
    opacity: 1;
    transform: translateX(3px);
}
.footer-contact-item {
    display: flex; gap: 12px;
    align-items: flex-start;
    margin-bottom: 16px;
}
.footer-contact-item .fci-icon {
    width: 36px; height: 36px;
    border-radius: 10px;
    background: rgba(233,30,140,0.14);
    border: 1px solid rgba(233,30,140,0.25);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    color: #e91e8c;
    font-size: 14px;
}
.footer-contact-item .fci-text {
    font-size: 13.5px;
    color: rgba(255,255,255,0.65);
    line-height: 1.6;
}
.footer-contact-item .fci-text a {
    color: rgba(255,255,255,0.72);
    text-decoration: none;
    transition: color 0.2s;
    font-weight: 600;
}
.footer-contact-item .fci-text a:hover { color: #e91e8c; }
.footer-contact-item .fci-label {
    font-size: 11px;
    color: rgba(255,255,255,0.38);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 2px;
}
/* Newsletter */
.footer-newsletter {
    margin-top: 6px;
}
.footer-newsletter p {
    font-size: 13px;
    color: rgba(255,255,255,0.55);
    margin-bottom: 14px;
    line-height: 1.6;
}
.footer-newsletter-form {
    display: flex; flex-direction: column; gap: 8px;
}
.footer-newsletter-form input {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 10px;
    padding: 10px 14px;
    color: #fff;
    font-size: 13px;
    outline: none;
    transition: border-color 0.2s;
    font-family: inherit;
}
.footer-newsletter-form input::placeholder { color: rgba(255,255,255,0.35); }
.footer-newsletter-form input:focus { border-color: rgba(233,30,140,0.5); }
.footer-newsletter-form button {
    background: linear-gradient(135deg, #e91e8c, #c2185b);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.25s;
    display: flex; align-items: center; justify-content: center; gap: 6px;
    font-family: inherit;
}
.footer-newsletter-form button:hover {
    background: linear-gradient(135deg, #c2185b, #ad1457);
    box-shadow: 0 6px 18px rgba(233,30,140,0.45);
    transform: translateY(-2px);
}
/* Bottom bar */
.footer-bottom {
    padding: 18px 0;
    position: relative; z-index: 1;
}
.footer-bottom-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}
.footer-copyright {
    font-size: 13px;
    color: rgba(255,255,255,0.38);
}
.footer-copyright a {
    color: rgba(255,255,255,0.55);
    text-decoration: none;
}
.footer-copyright a:hover { color: #e91e8c; }
.footer-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 30px;
    padding: 5px 14px;
    font-size: 12px;
    color: rgba(255,255,255,0.45);
}
.footer-badge i { color: #e91e8c; }
.back-to-top {
    width: 40px; height: 40px;
    border-radius: 12px;
    background: linear-gradient(135deg, #e91e8c, #2563eb);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 16px;
    cursor: pointer;
    transition: all 0.25s;
    border: none;
    box-shadow: 0 4px 14px rgba(233,30,140,0.4);
    text-decoration: none;
}
.back-to-top:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 22px rgba(233,30,140,0.55);
    color: #fff;
}
@media (max-width: 767px) {
    .footer-top { padding: 50px 0 40px; }
    .footer-brand p { max-width: 100%; }
    .footer-bottom-inner { justify-content: center; text-align: center; }
}
</style>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                {{-- Brand column --}}
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0 footer-brand">
                    <a href="{{ route('page.home') }}" class="brand-logo">
                        <div class="logo-icon"><i class="fa fa-plane"></i></div>
                        <span>Travel</span>
                    </a>
                    <p>Đồng hành cùng bạn trên mọi hành trình — từ núi rừng Tây Bắc đến biển xanh Phú Quốc và khắp thế giới.</p>
                    <ul class="footer-social">
                        <li>
                            <a href="https://www.facebook.com" title="Facebook" target="_blank" rel="noopener">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com" title="YouTube" target="_blank" rel="noopener">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com" title="Instagram" target="_blank" rel="noopener">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="TikTok" target="_blank" rel="noopener">
                                <i class="fa fa-music"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Quick links --}}
                <div class="col-lg-2 col-md-6 mb-5 mb-lg-0 footer-col">
                    <h5>Điều hướng</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('page.home') }}"><i class="fa fa-chevron-right"></i> Trang chủ</a></li>
                        <li><a href="{{ route('tour') }}"><i class="fa fa-chevron-right"></i> Danh sách tours</a></li>
                        <li><a href="{{ route('hotel') }}"><i class="fa fa-chevron-right"></i> Khách sạn</a></li>
                        <li><a href="{{ route('articles.index') }}"><i class="fa fa-chevron-right"></i> Tin tức & Blog</a></li>
                        <li><a href="{{ route('about.us') }}"><i class="fa fa-chevron-right"></i> Giới thiệu</a></li>
                        <li><a href="{{ route('contact.index') }}"><i class="fa fa-chevron-right"></i> Liên hệ</a></li>
                    </ul>
                </div>

                {{-- Services --}}
                <div class="col-lg-2 col-md-6 mb-5 mb-lg-0 footer-col">
                    <h5>Dịch vụ</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('tour') }}"><i class="fa fa-chevron-right"></i> Tour trong nước</a></li>
                        <li><a href="{{ route('tour') }}"><i class="fa fa-chevron-right"></i> Tour nước ngoài</a></li>
                        <li><a href="{{ route('tour') }}"><i class="fa fa-chevron-right"></i> Tour biển đảo</a></li>
                        <li><a href="{{ route('tour') }}"><i class="fa fa-chevron-right"></i> Tour nghỉ dưỡng</a></li>
                        <li><a href="{{ route('hotel') }}"><i class="fa fa-chevron-right"></i> Resort 5 sao</a></li>
                        <li><a href="{{ route('articles.index') }}"><i class="fa fa-chevron-right"></i> Cẩm nang du lịch</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div class="col-lg-2 col-md-6 mb-5 mb-lg-0 footer-col">
                    <h5>Liên hệ</h5>
                    <div class="footer-contact-item">
                        <div class="fci-icon"><i class="fa fa-map-marker"></i></div>
                        <div class="fci-text">
                            <div class="fci-label">Địa chỉ</div>
                            Đường 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="fci-icon"><i class="fa fa-phone"></i></div>
                        <div class="fci-text">
                            <div class="fci-label">Hotline</div>
                            <a href="tel:19001234">1900 1234</a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="fci-icon"><i class="fa fa-envelope"></i></div>
                        <div class="fci-text">
                            <div class="fci-label">Email</div>
                            <a href="mailto:booking@travel.vn">booking@travel.vn</a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="fci-icon"><i class="fa fa-clock-o"></i></div>
                        <div class="fci-text">
                            <div class="fci-label">Giờ làm việc</div>
                            T2–T6: 8:00 – 17:30<br>T7: 8:00 – 12:00
                        </div>
                    </div>
                </div>

                {{-- Newsletter --}}
                <div class="col-lg-3 col-md-6 footer-col">
                    <h5>Nhận ưu đãi</h5>
                    <div class="footer-newsletter">
                        <p>Đăng ký nhận bản tin du lịch — ưu đãi độc quyền và điểm đến hot mỗi tuần.</p>
                        <div class="footer-newsletter-form">
                            <input type="text" placeholder="Họ và tên của bạn">
                            <input type="email" placeholder="Địa chỉ email">
                            <button type="button">
                                <i class="fa fa-paper-plane"></i> Đăng ký ngay
                            </button>
                        </div>
                        <p style="font-size:11px;color:rgba(255,255,255,0.28);margin-top:10px;margin-bottom:0;">
                            <i class="fa fa-lock mr-1"></i> Cam kết không spam. Hủy đăng ký bất kỳ lúc nào.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <p class="footer-copyright mb-0">
                    &copy; <script>document.write(new Date().getFullYear());</script> <a href="{{ route('page.home') }}">Travel</a>.
                    Tất cả quyền được bảo lưu. Made with <i class="fa fa-heart" style="color:#e91e8c;"></i> in Vietnam.
                </p>
                <div class="d-flex align-items-center gap-3" style="gap:12px;">
                    <span class="footer-badge">
                        <i class="fa fa-shield"></i> Thanh toán bảo mật
                    </span>
                    <a href="#" class="back-to-top" title="Lên đầu trang" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
