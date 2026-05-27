@extends('page.layouts.page')
@section('title', 'Danh sách Tours | Travel')

@section('style')
<link rel="stylesheet" href="{{ asset('page/css/home-custom.css') }}">
<style>
/* ============================================================
   PAGE HERO (breadcrumb banner)
   ============================================================ */
.page-hero {
    position: relative;
    height: 380px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    overflow: hidden;
}

.page-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(15,23,42,0.60) 0%,
        rgba(30,58,138,0.40) 45%,
        rgba(15,23,42,0.80) 100%
    );
    z-index: 1;
}

.page-hero__body {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 0 20px;
}

.page-hero__breadcrumb {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 13px;
    margin-bottom: 18px;
    flex-wrap: wrap;
}

.page-hero__breadcrumb a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
    transition: color 0.2s;
}
.page-hero__breadcrumb a:hover { color: var(--primary); }
.page-hero__breadcrumb .sep {
    color: rgba(255,255,255,0.45);
    font-size: 11px;
}
.page-hero__breadcrumb .current {
    color: var(--primary);
    font-weight: 600;
}

.page-hero__tag {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: rgba(233,30,140,0.18);
    border: 1px solid rgba(233,30,140,0.45);
    color: #ffb3d9;
    padding: 5px 18px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 16px;
    backdrop-filter: blur(8px);
}

.page-hero__title {
    font-size: 48px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    text-shadow: 0 2px 20px rgba(0,0,0,0.5);
    line-height: 1.15;
}

.page-hero__title span {
    color: var(--primary);
}

.page-hero__subtitle {
    color: rgba(255,255,255,0.82);
    font-size: 16px;
    margin-top: 12px;
    text-shadow: 0 1px 8px rgba(0,0,0,0.4);
}

@media (max-width: 767px) {
    .page-hero { height: 280px; background-attachment: scroll; }
    .page-hero__title { font-size: 30px; }
}

/* ============================================================
   SEARCH BOX (tour page)
   ============================================================ */
.tour-search-wrap {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 8px 40px rgba(30,58,138,0.12), 0 2px 10px rgba(233,30,140,0.06);
    border: 1px solid rgba(233,30,140,0.1);
    overflow: hidden;
    margin-bottom: 0;
}

.tour-search-wrap .search-property-1 .form-group {
    border-left: 1px solid rgba(233,30,140,0.1) !important;
}

.tour-search-wrap .search-property-1 .form-group:first-child {
    border-left: none !important;
}

.tour-search-wrap .search-property-1 .form-group label {
    color: var(--primary) !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.tour-search-wrap .btn.btn-primary {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary, #2563eb) 100%) !important;
    border: none !important;
    font-weight: 700 !important;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.tour-search-wrap .btn.btn-primary:hover {
    background: linear-gradient(135deg, var(--primary-dark) 0%, #1e3a8a 100%) !important;
    transform: none;
    box-shadow: 0 4px 16px rgba(233,30,140,0.35) !important;
}

/* ============================================================
   TOURS LISTING SECTION
   ============================================================ */
.tours-listing {
    padding: 60px 0 80px;
    background: linear-gradient(180deg, #f0f4ff 0%, #f8f0f7 100%);
}

/* Match cùng khoảng cách card với home page */
.tours-listing .row.cards-row {
    margin-left: -14px;
    margin-right: -14px;
}
.tours-listing .row.cards-row > [class*="col-"] {
    padding-left: 14px;
    padding-right: 14px;
}

/* Section header */
.tours-listing .listing-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 36px;
    flex-wrap: wrap;
    gap: 12px;
}

.tours-listing .listing-count {
    font-size: 14px;
    color: #64748b;
}

.tours-listing .listing-count strong {
    color: var(--primary);
    font-weight: 700;
}

/* ============================================================
   PAGINATION — style lại theo theme hồng/xanh
   ============================================================ */
.tour-pagination {
    margin-top: 48px;
    display: flex;
    justify-content: center;
}

.block-27 ul {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 0;
    margin: 0;
    list-style: none;
    flex-wrap: wrap;
    justify-content: center;
}

.block-27 ul li a,
.block-27 ul li span {
    display: flex !important;
    align-items: center;
    justify-content: center;
    width: 42px !important;
    height: 42px !important;
    line-height: 1 !important;
    border-radius: 12px !important;
    border: 1.5px solid #e2e8f0 !important;
    color: #334155 !important;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.25s ease;
    background: #fff;
}

.block-27 ul li a:hover {
    border-color: var(--primary) !important;
    color: var(--primary) !important;
    background: rgba(233,30,140,0.06);
}

.block-27 ul li.active a,
.block-27 ul li.active span {
    background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%) !important;
    border-color: transparent !important;
    color: #fff !important;
    box-shadow: 0 4px 14px rgba(233,30,140,0.35);
}
</style>
@stop

@section('content')

{{-- ================================================================
     PAGE HERO
     ================================================================ --}}
<section class="page-hero" style="background-image: url('https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=1920&h=600&fit=crop&auto=format&q=85');">
    <div class="page-hero__overlay"></div>
    <div class="container">
        <div class="page-hero__body">
            <nav class="page-hero__breadcrumb">
                <a href="{{ route('page.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                <span class="sep"><i class="fa fa-chevron-right"></i></span>
                <span class="current">Danh sách Tours</span>
            </nav>
            <div class="page-hero__tag">
                <i class="fa fa-plane"></i> Travel
            </div>
            <h1 class="page-hero__title ftco-animate">
                Khám phá <span>Tours</span> Du Lịch
            </h1>
            <p class="page-hero__subtitle ftco-animate">
                Hàng trăm tour hấp dẫn — tìm hành trình hoàn hảo dành cho bạn
            </p>
        </div>
    </div>
</section>

{{-- ================================================================
     SEARCH BOX
     ================================================================ --}}
<section style="background: linear-gradient(180deg, #f0f4ff 0%, #f0f4ff 100%); padding: 40px 0 0;">
    <div class="container">
        <div class="tour-search-wrap ftco-animate">
            @include('page.common.searchTour')
        </div>
    </div>
</section>

{{-- ================================================================
     TOURS LISTING
     ================================================================ --}}
<section class="tours-listing">
    <div class="container">

        <div class="listing-header ftco-animate">
            <div class="sec-head mb-0">
                <span class="sec-tag">Tours</span>
                <h2 class="mb-0" style="font-size:26px;">Tất cả chuyến đi</h2>
            </div>
            <span class="listing-count">
                Tìm thấy <strong>{{ $tours->total() }}</strong> tour
            </span>
        </div>

        <div class="row cards-row">
            @if($tours->count() > 0)
                @foreach($tours as $tour)
                    @include('page.common.itemTour', compact('tour'))
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fa fa-search" style="font-size:48px; color:#cbd5e1; margin-bottom:16px; display:block;"></i>
                    <h4 style="color:#94a3b8;">Không tìm thấy tour nào</h4>
                    <p style="color:#94a3b8;">Hãy thử thay đổi bộ lọc tìm kiếm</p>
                </div>
            @endif
        </div>

        <div class="tour-pagination">
            <div class="block-27">
                {{ $tours->links('page.pagination.default') }}
            </div>
        </div>

    </div>
</section>

@stop
@section('script')
@stop
