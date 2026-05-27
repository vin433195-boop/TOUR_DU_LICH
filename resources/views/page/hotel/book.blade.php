@extends('page.layouts.page')
@section('title', 'Đặt phòng - ' . $hotel->h_name)
@section('style')
@stop
@section('seo')
@stop
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('/page/images/bg_1.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('page.home') }}">Trang chủ <i class="fa fa-chevron-right"></i></a></span>
                        <span class="mr-2"><a href="{{ route('hotel') }}">Khách sạn <i class="fa fa-chevron-right"></i></a></span>
                        <span>Đặt phòng</span>
                    </p>
                    <h1 class="mb-0 bread">Đặt Phòng Khách Sạn</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb contact-section mb-4">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <h3 class="mb-2">Địa chỉ</h3>
                        <p>{{ $hotel->h_address ?: 'Liên hệ để biết thêm' }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <h3 class="mb-2">Số điện thoại</h3>
                        <p>{{ $hotel->h_phone ?: 'Liên hệ để biết thêm' }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-building"></span>
                        </div>
                        <h3 class="mb-2">Khách sạn</h3>
                        <p>{{ $hotel->h_name }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-tag"></span>
                        </div>
                        <h3 class="mb-2">Giá từ</h3>
                        <p>{{ number_format($hotel->h_price - ($hotel->h_price * $hotel->h_sale / 100), 0, ',', '.') }} vnđ/đêm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pt">
        <div class="container">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row block-9">
                <div class="col-md-6 order-md-last">
                    <form action="{{ route('post.book.hotel', $hotel->id) }}" method="POST" class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Họ và tên <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="bh_name" value="{{ old('bh_name', isset($user) ? $user->name : '') }}" class="form-control" placeholder="Họ và tên">
                            @if ($errors->first('bh_name'))
                                <span class="text-danger">{{ $errors->first('bh_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="bh_email" value="{{ old('bh_email', isset($user) ? $user->email : '') }}" class="form-control" placeholder="Email">
                            @if ($errors->first('bh_email'))
                                <span class="text-danger">{{ $errors->first('bh_email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số điện thoại <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="bh_phone" value="{{ old('bh_phone', isset($user) ? $user->phone : '') }}" class="form-control" placeholder="Số điện thoại">
                            @if ($errors->first('bh_phone'))
                                <span class="text-danger">{{ $errors->first('bh_phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Địa chỉ <sup class="text-danger">(*)</sup></label>
                            <input type="text" name="bh_address" value="{{ old('bh_address', isset($user) ? $user->address : '') }}" class="form-control" placeholder="Địa chỉ">
                            @if ($errors->first('bh_address'))
                                <span class="text-danger">{{ $errors->first('bh_address') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ngày nhận phòng <sup class="text-danger">(*)</sup></label>
                            <input type="date" name="bh_check_in" value="{{ old('bh_check_in') }}" class="form-control">
                            @if ($errors->first('bh_check_in'))
                                <span class="text-danger">{{ $errors->first('bh_check_in') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ngày trả phòng <sup class="text-danger">(*)</sup></label>
                            <input type="date" name="bh_check_out" value="{{ old('bh_check_out') }}" class="form-control">
                            @if ($errors->first('bh_check_out'))
                                <span class="text-danger">{{ $errors->first('bh_check_out') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số phòng <sup class="text-danger">(*)</sup></label>
                            <input type="number" name="bh_number_rooms" value="{{ old('bh_number_rooms', 1) }}" min="1" class="form-control" placeholder="Số phòng">
                            @if ($errors->first('bh_number_rooms'))
                                <span class="text-danger">{{ $errors->first('bh_number_rooms') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ghi chú</label>
                            <textarea name="bh_note" placeholder="Yêu cầu thêm hoặc thông tin chi tiết..." cols="20" rows="4" class="form-control">{{ old('bh_note') }}</textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <input type="submit" value="Đặt Phòng" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6 text-center">
                    <div class="col-md-12">
                        <h2 class="mb-3 title-book">{{ $hotel->h_name }}</h2>
                        <h2 class="mb-3">{{ isset($hotel->location) ? $hotel->location->l_name : '' }}</h2>
                        @if ($hotel->h_address)
                            <p>Địa chỉ: {{ $hotel->h_address }}</p>
                        @endif
                        @if ($hotel->h_phone)
                            <p>Điện thoại: {{ $hotel->h_phone }}</p>
                        @endif
                        <div class="mt-4">
                            <table style="border-collapse: collapse; width: 100%;" border="1">
                                <tbody>
                                    <tr>
                                        <td style="padding:8px; width:50%;">Giá gốc</td>
                                        <td style="padding:8px;">{{ number_format($hotel->h_price, 0, ',', '.') }} vnđ/đêm</td>
                                    </tr>
                                    @if ($hotel->h_sale > 0)
                                    <tr>
                                        <td style="padding:8px;">Giảm giá</td>
                                        <td style="padding:8px; color:red;">{{ $hotel->h_sale }}%</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td style="padding:8px; font-weight:bold;">Giá sau giảm</td>
                                        <td style="padding:8px; font-weight:bold; color:#e74c3c;">{{ number_format($hotel->h_price - ($hotel->h_price * $hotel->h_sale / 100), 0, ',', '.') }} vnđ/đêm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        @php
                            $bookImgs = [
                                'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=600&h=400&fit=crop&auto=format&q=80',
                                'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600&h=400&fit=crop&auto=format&q=80',
                                'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=600&h=400&fit=crop&auto=format&q=80',
                            ];
                            $bookSrc = $hotel->h_image
                                ? asset(pare_url_file($hotel->h_image))
                                : $bookImgs[$hotel->id % count($bookImgs)];
                        @endphp
                        <img src="{{ $bookSrc }}" alt="{{ $hotel->h_name }}" class="img-fluid" style="border-radius:8px;max-height:300px;object-fit:cover;width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
@stop
