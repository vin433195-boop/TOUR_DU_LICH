@extends('page.layouts.page')
@section('title', 'Khách Sạn | Travel')
@section('style')
<link rel="stylesheet" href="{{ asset('page/css/home-custom.css') }}">
<link rel="stylesheet" href="{{ asset('page/css/subpage.css') }}">
@stop
@section('content')

{{-- HERO --}}
<section class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=1920&h=700&fit=crop&auto=format&q=90');">
    <div class="page-hero__overlay"></div>
    <div class="container">
        <div class="page-hero__body">
            <nav class="page-hero__breadcrumb">
                <a href="{{ route('page.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                <span class="sep"><i class="fa fa-chevron-right"></i></span>
                <span class="current">Khách Sạn</span>
            </nav>
            <div class="page-hero__tag"><i class="fa fa-building"></i> Travel</div>
            <h1 class="page-hero__title ftco-animate">Đặt <span>Khách Sạn</span> Tốt Nhất</h1>
            <p class="page-hero__subtitle ftco-animate">Hàng trăm khách sạn chất lượng — giá tốt nhất cho chuyến đi của bạn</p>
        </div>
    </div>
</section>

{{-- SEARCH --}}
<section style="background: #f0f4ff; padding: 40px 0 0;">
    <div class="container">
        <div class="subpage-search-wrap ftco-animate">
            @include('page.common.searchHotel', compact('locations'))
        </div>
    </div>
</section>

{{-- LISTING --}}
<section class="listing-section">
    <div class="container">
        <div class="listing-header ftco-animate">
            <div class="sec-head mb-0">
                <span class="sec-tag">Khách Sạn</span>
                <h2 class="mb-0" style="font-size:26px;">Tất cả khách sạn</h2>
            </div>
            <span class="listing-count">Tìm thấy <strong>{{ $hotels->total() }}</strong> khách sạn</span>
        </div>
        <div class="row" style="margin-left:-14px;margin-right:-14px;">
            @if($hotels->count())
                @foreach($hotels as $hotel)
                    @include('page.common.itemHotel', compact('hotel'))
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fa fa-building" style="font-size:48px;color:#cbd5e1;display:block;margin-bottom:16px;"></i>
                    <h4 style="color:#94a3b8;">Không tìm thấy khách sạn nào</h4>
                </div>
            @endif
        </div>
        <div style="margin-top:48px;display:flex;justify-content:center;">
            <div class="block-27">{{ $hotels->links('page.pagination.default') }}</div>
        </div>
    </div>
</section>

@stop
@section('script')@stop
