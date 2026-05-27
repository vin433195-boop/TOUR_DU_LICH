@extends('page.layouts.page')
@section('title', 'Đăng Ký | Travel')
@section('style')
<link rel="stylesheet" href="{{ asset('page/css/subpage.css') }}">
@stop
@section('content')

{{-- HERO --}}
<section class="page-hero" style="background-image: url({{ asset('page/images/tour4.jpg') }});">
    <div class="page-hero__overlay"></div>
    <div class="container">
        <div class="page-hero__body">
            <nav class="page-hero__breadcrumb">
                <a href="{{ route('page.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                <span class="sep"><i class="fa fa-chevron-right"></i></span>
                <span class="current">Đăng Ký</span>
            </nav>
            <div class="page-hero__tag"><i class="fa fa-user-plus"></i> Tài khoản</div>
            <h1 class="page-hero__title ftco-animate">Tạo <span>Tài Khoản</span> Mới</h1>
            <p class="page-hero__subtitle ftco-animate">Đăng ký để bắt đầu hành trình tuyệt vời cùng chúng tôi</p>
        </div>
    </div>
</section>

{{-- REGISTER FORM --}}
<section style="padding: 70px 0 80px; background: linear-gradient(180deg,#f0f4ff 0%,#f8f0f7 100%);">
    <div class="container">
        <div class="auth-card ftco-animate" style="max-width:560px;">
            <div class="auth-card__header">
                <div class="auth-icon"><i class="fa fa-user-plus"></i></div>
                <h2>Đăng ký tài khoản</h2>
                <p>Điền thông tin để tạo tài khoản mới</p>
            </div>
            <div class="auth-card__body">
                @if(session('error'))
                    <div class="alert" style="background:rgba(233,30,140,0.08);border:1px solid rgba(233,30,140,0.25);color:#c2185b;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:14px;">
                        <i class="fa fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('post.account.register') }}" method="POST" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label><i class="fa fa-user" style="color:#e91e8c;margin-right:6px;"></i> Họ và tên <sup style="color:#e74c3c;">*</sup></label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" value="{{ old('name') }}">
                        @if($errors->first('name'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-envelope" style="color:#e91e8c;margin-right:6px;"></i> Email <sup style="color:#e74c3c;">*</sup></label>
                        <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email" value="{{ old('email') }}">
                        @if($errors->first('email'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-phone" style="color:#e91e8c;margin-right:6px;"></i> Số điện thoại <sup style="color:#e74c3c;">*</sup></label>
                        <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                        @if($errors->first('phone'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-map-marker" style="color:#e91e8c;margin-right:6px;"></i> Địa chỉ <sup style="color:#e74c3c;">*</sup></label>
                        <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value="{{ old('address') }}">
                        @if($errors->first('address'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('address') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-lock" style="color:#e91e8c;margin-right:6px;"></i> Mật khẩu <sup style="color:#e74c3c;">*</sup></label>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu (tối thiểu 6 ký tự)">
                        @if($errors->first('password'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-lock" style="color:#e91e8c;margin-right:6px;"></i> Nhập lại mật khẩu <sup style="color:#e74c3c;">*</sup></label>
                        <input type="password" name="r_password" class="form-control" placeholder="Nhập lại mật khẩu">
                        @if($errors->first('r_password'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('r_password') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fa fa-user-plus mr-2"></i> Tạo tài khoản
                    </button>
                </form>
            </div>
            <div class="auth-card__footer">
                Đã có tài khoản?
                <a href="{{ route('page.user.account') }}">Đăng nhập ngay</a>
            </div>
        </div>
    </div>
</section>

@stop
@section('script')@stop
