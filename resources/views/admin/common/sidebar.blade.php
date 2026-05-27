<aside class="main-sidebar elevation-4" style="background:linear-gradient(180deg,#1a3c5e 0%,#1e4d78 60%,#1a3c5e 100%);">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link" style="border-bottom:1px solid rgba(255,255,255,.1);padding:14px 16px;display:flex;align-items:center;gap:10px;">
        <div style="width:36px;height:36px;background:linear-gradient(135deg,#2980b9,#3498db);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="fas fa-map-marked-alt" style="color:#fff;font-size:16px;"></i>
        </div>
        <span class="brand-text" style="color:#fff;font-weight:700;font-size:15px;letter-spacing:.3px;">Tour Du Lịch</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="overflow-y:auto;">
        @php $user = Auth::user(); @endphp

        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center" style="border-bottom:1px solid rgba(255,255,255,.1);">
            <div class="image">
                <img src="{{ asset('/admin/dist/img/avatar5.png') }}"
                     class="img-circle elevation-2"
                     alt="User Image"
                     style="width:38px;height:38px;">
            </div>
            <div class="info" style="margin-left:10px;">
                <a href="#" class="d-block" style="color:#fff;font-weight:600;font-size:13.5px;">{!! $user->name !!}</a>
                <small style="color:rgba(255,255,255,.55);font-size:11px;">
                    <i class="fas fa-circle" style="color:#2ecc71;font-size:8px;margin-right:3px;"></i>Trực tuyến
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"
                style="--nav-link-color:rgba(255,255,255,.75);--nav-link-hover-bg:rgba(255,255,255,.1);">

                @if(Auth::user()->can(['full-quyen-quan-ly', 'truy-cap-he-thong']))
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ isset($home_active) ? 'active' : '' }}"
                       style="{{ isset($home_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>
                @endif

                <li style="padding:10px 16px 4px;font-size:10px;font-weight:700;letter-spacing:1px;color:rgba(255,255,255,.35);text-transform:uppercase;">
                    Nội dung
                </li>

                @if(Auth::user()->can(['full-quyen-quan-ly', 'danh-sach-danh-muc']))
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ isset($category_active) ? 'active' : '' }}"
                       style="{{ isset($category_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Danh mục</p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can(['full-quyen-quan-ly', 'danh-sach-bai-viet']))
                <li class="nav-item">
                    <a href="{{ route('article.index') }}" class="nav-link {{ isset($article_active) ? 'active' : '' }}"
                       style="{{ isset($article_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Bài viết</p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can(['full-quyen-quan-ly', 'danh-sach-dia-diem']))
                <li class="nav-item">
                    <a href="{{ route('location.index') }}" class="nav-link {{ isset($location_active) ? 'active' : '' }}"
                       style="{{ isset($location_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>Địa điểm</p>
                    </a>
                </li>
                @endif

                <li style="padding:10px 16px 4px;font-size:10px;font-weight:700;letter-spacing:1px;color:rgba(255,255,255,.35);text-transform:uppercase;">
                    Tours & Khách sạn
                </li>

                @if(Auth::user()->can(['full-quyen-quan-ly', 'danh-sach-tour']))
                <li class="nav-item">
                    <a href="{{ route('tour.index') }}" class="nav-link {{ isset($tour_active) ? 'active' : '' }}"
                       style="{{ isset($tour_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>Tours</p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can(['full-quyen-quan-ly', 'danh-sach-khach-san']))
                <li class="nav-item">
                    <a href="{{ route('hotel.index') }}" class="nav-link {{ isset($hotel_active) ? 'active' : '' }}"
                       style="{{ isset($hotel_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>Khách sạn</p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can(['full-quyen-quan-ly', 'quan-ly-dat-tour']))
                <li class="nav-item">
                    <a href="{{ route('book.tour.index') }}" class="nav-link {{ isset($book_tour_active) ? 'active' : '' }}"
                       style="{{ isset($book_tour_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Đặt tour</p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('book.hotel.index') }}" class="nav-link {{ isset($book_hotel_active) ? 'active' : '' }}"
                       style="{{ isset($book_hotel_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>Đặt phòng KS</p>
                    </a>
                </li>

                <li style="padding:10px 16px 4px;font-size:10px;font-weight:700;letter-spacing:1px;color:rgba(255,255,255,.35);text-transform:uppercase;">
                    Hệ thống
                </li>

                @if(Auth::user()->can(['full-quyen-quan-ly', 'quan-ly-binh-luan']))
                <li class="nav-item">
                    <a href="{{ route('comment.index') }}" class="nav-link {{ isset($comment_active) ? 'active' : '' }}"
                       style="{{ isset($comment_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Bình luận</p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can(['full-quyen-quan-ly', 'danh-sach-vai-tro']))
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link {{ isset($role_active) ? 'active' : '' }}"
                       style="{{ isset($role_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Vai trò</p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can(['full-quyen-quan-ly', 'danh-sach-nguoi-dung']))
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ isset($user_active) ? 'active' : '' }}"
                       style="{{ isset($user_active) ? 'background:linear-gradient(135deg,#2980b9,#3498db);color:#fff;border-radius:8px;' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Người dùng</p>
                    </a>
                </li>
                @endif

                <li class="nav-item mt-2">
                    <a href="{{ route('admin.logout') }}" class="nav-link"
                       style="color:rgba(255,100,100,.8);"
                       onclick="return confirm('Bạn có chắc muốn đăng xuất?')">
                        <i class="nav-icon fas fa-sign-out-alt" style="color:rgba(255,100,100,.8);"></i>
                        <p>Đăng xuất</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
