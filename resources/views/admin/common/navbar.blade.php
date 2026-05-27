<nav class="main-header navbar navbar-expand navbar-dark" style="background: linear-gradient(135deg,#1a3c5e,#2980b9); box-shadow:0 2px 10px rgba(0,0,0,.15);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="font-size:18px;">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-md-flex align-items-center ml-2">
            <span style="color:rgba(255,255,255,.7);font-size:13px;">
                <i class="fas fa-map-marked-alt mr-1"></i>Hệ thống quản lý Tour Du Lịch
            </span>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Quick links -->
        <li class="nav-item d-none d-md-flex align-items-center mr-2">
            <a href="{{ route('tour.create') }}" class="btn btn-sm" style="background:rgba(255,255,255,.15);color:#fff;border-radius:8px;border:1px solid rgba(255,255,255,.25);font-size:12px;">
                <i class="fas fa-plus mr-1"></i>Thêm tour
            </a>
        </li>

        <li class="nav-item dropdown user-menu">
            @php $user = Auth::user(); @endphp
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown" style="padding:6px 10px;">
                <img src="{{ asset('/admin/dist/img/avatar5.png') }}"
                     class="user-image img-circle elevation-2"
                     alt="User Image"
                     style="width:32px;height:32px;margin-right:8px;">
                <span class="d-none d-md-inline" style="font-size:13.5px;">{!! $user->name !!}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius:12px;overflow:hidden;border:none;box-shadow:0 8px 30px rgba(0,0,0,.15);">
                <li class="user-header" style="background:linear-gradient(135deg,#1a3c5e,#2980b9);padding:20px;text-align:center;">
                    <img src="{{ asset('/admin/dist/img/avatar5.png') }}"
                         class="img-circle elevation-2"
                         alt="User Image"
                         style="width:70px;height:70px;margin-bottom:10px;">
                    <p style="margin:0;">
                        <strong style="font-size:15px;">{!! isset($user->name) ? $user->name : '' !!}</strong><br>
                        <small style="opacity:.8;">{!! isset($user->email) ? $user->email : '' !!}</small>
                    </p>
                </li>
                <li class="user-footer" style="padding:12px 16px;display:flex;justify-content:flex-end;">
                    <a href="{{ route('admin.logout') }}"
                       class="btn btn-danger btn-sm"
                       style="border-radius:8px;padding:6px 16px;">
                        <i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
