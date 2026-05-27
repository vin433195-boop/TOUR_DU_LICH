@extends('page.layouts.page')
@section('title', 'Đăng Nhập | Travel')
@section('style')
<link rel="stylesheet" href="{{ asset('page/css/subpage.css') }}">
@stop
@section('content')

{{-- HERO --}}
<section class="page-hero" style="background-image: url({{ asset('page/images/bg_4.jpg') }});">
    <div class="page-hero__overlay"></div>
    <div class="container">
        <div class="page-hero__body">
            <nav class="page-hero__breadcrumb">
                <a href="{{ route('page.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                <span class="sep"><i class="fa fa-chevron-right"></i></span>
                <span class="current">Đăng Nhập</span>
            </nav>
            <div class="page-hero__tag"><i class="fa fa-lock"></i> Tài khoản</div>
            <h1 class="page-hero__title ftco-animate">Đăng <span>Nhập</span></h1>
            <p class="page-hero__subtitle ftco-animate">Chào mừng trở lại — đăng nhập để tiếp tục hành trình của bạn</p>
        </div>
    </div>
</section>

{{-- LOGIN FORM --}}
<section style="padding: 70px 0 80px; background: linear-gradient(180deg,#f0f4ff 0%,#f8f0f7 100%);">
    <div class="container">
        <div class="auth-card ftco-animate">
            <div class="auth-card__header">
                <div class="auth-icon"><i class="fa fa-user"></i></div>
                <h2>Đăng nhập tài khoản</h2>
                <p>Nhập thông tin để truy cập hệ thống</p>
            </div>
            <div class="auth-card__body">
                @if(session('error'))
                    <div class="alert" style="background:rgba(233,30,140,0.08);border:1px solid rgba(233,30,140,0.25);color:#c2185b;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:14px;">
                        <i class="fa fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('account.login') }}" method="POST" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label><i class="fa fa-envelope" style="color:#e91e8c;margin-right:6px;"></i> Email <sup style="color:#e74c3c;">*</sup></label>
                        <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email" value="{{ old('email') }}">
                        @if($errors->first('email'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-lock" style="color:#e91e8c;margin-right:6px;"></i> Mật khẩu <sup style="color:#e74c3c;">*</sup></label>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                        @if($errors->first('password'))
                            <small style="color:#e74c3c;margin-top:4px;display:block;">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fa fa-sign-in mr-2"></i> Đăng nhập
                    </button>
                </form>
            </div>
            <div class="auth-card__footer">
                Chưa có tài khoản?
                <a href="{{ route('user.register') }}">Đăng ký ngay</a>
            </div>
        </div>
    </div>
</section>

@stop
@section('script')@stop
