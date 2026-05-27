@extends('page.layouts.page')
@section('title', 'Tin Tức Du Lịch | Travel')
@section('style')
<link rel="stylesheet" href="{{ asset('page/css/home-custom.css') }}">
<link rel="stylesheet" href="{{ asset('page/css/subpage.css') }}">
<style>
/* ── Featured article ── */
.featured-article {
    border-radius: 22px;
    overflow: hidden;
    position: relative;
    height: 460px;
    display: flex;
    align-items: flex-end;
    text-decoration: none;
    box-shadow: 0 16px 50px rgba(30,58,138,0.16);
    transition: transform 0.35s ease, box-shadow 0.35s ease;
}
.featured-article:hover { transform: translateY(-6px); box-shadow: 0 28px 70px rgba(30,58,138,0.22); }
.featured-article__img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.featured-article:hover .featured-article__img { transform: scale(1.04); }
.featured-article__overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(10,10,30,0.88) 0%, rgba(10,10,30,0.30) 55%, transparent 100%);
}
.featured-article__body {
    position: relative; z-index: 2;
    padding: 36px 40px;
    width: 100%;
}
.featured-article__cat {
    display: inline-block;
    background: #e91e8c;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 4px 14px;
    border-radius: 30px;
    margin-bottom: 14px;
}
.featured-article__title {
    font-size: 26px;
    font-weight: 800;
    color: #fff;
    line-height: 1.35;
    margin-bottom: 12px;
    text-shadow: 0 2px 12px rgba(0,0,0,0.4);
}
.featured-article__meta {
    display: flex; gap: 18px;
    font-size: 13px;
    color: rgba(255,255,255,0.75);
}
.featured-article__meta i { color: #e91e8c; margin-right: 5px; }

/* ── Trending topics ── */
.topic-pill {
    display: inline-flex; align-items: center; gap: 6px;
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 30px;
    padding: 7px 16px;
    font-size: 13px;
    font-weight: 600;
    color: #334155;
    text-decoration: none;
    transition: all 0.25s;
    margin: 0 6px 10px 0;
}
.topic-pill:hover, .topic-pill.active {
    background: linear-gradient(135deg, #e91e8c, #2563eb);
    border-color: transparent;
    color: #fff;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(233,30,140,0.28);
}
.topic-pill i { font-size: 12px; }
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
                <span class="current">Tin Tức</span>
            </nav>
            <div class="page-hero__tag"><i class="fa fa-newspaper-o"></i> Travel Blog</div>
            <h1 class="page-hero__title ftco-animate">Tin Tức & <span>Cẩm Nang</span> Du Lịch</h1>
            <p class="page-hero__subtitle ftco-animate">Kinh nghiệm, bí quyết và điểm đến hấp dẫn nhất cập nhật hàng tuần</p>
        </div>
    </div>
</section>

{{-- SEARCH + TOPICS --}}
<section style="background: linear-gradient(180deg,#f0f4ff 0%,#fff 100%); padding: 40px 0 0;">
    <div class="container">

        {{-- Search --}}
        <div class="subpage-search-wrap ftco-animate">
            <form action="{{ route('articles.index') }}" class="search-property-1">
                <div class="row no-gutters">
                    <div class="col-md-9">
                        <div class="form-group p-4 border-0">
                            <label>Tìm kiếm bài viết</label>
                            <div class="form-field">
                                <div class="icon"><span class="fa fa-search"></span></div>
                                <input type="text" name="key_search" value="{{ Request::get('key_search') }}"
                                    class="form-control" placeholder="Nhập tên điểm đến, chủ đề, kinh nghiệm...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="form-group d-flex w-100 border-0">
                            <div class="form-field w-100 align-items-center d-flex">
                                <input type="submit" value="Tìm kiếm" class="align-self-stretch form-control btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- Trending topics --}}
        <div class="ftco-animate" style="padding: 28px 0 10px;">
            <p style="font-size:13px;font-weight:700;color:#94a3b8;letter-spacing:1px;text-transform:uppercase;margin-bottom:12px;">
                <i class="fa fa-fire mr-2" style="color:#e91e8c;"></i> Chủ đề nổi bật
            </p>
            <a href="{{ route('articles.index') }}" class="topic-pill {{ !Request::get('key_search') ? 'active' : '' }}">
                <i class="fa fa-th-list"></i> Tất cả
            </a>
            <a href="{{ route('articles.index') }}?key_search=Phú+Quốc" class="topic-pill"><i class="fa fa-umbrella"></i> Phú Quốc</a>
            <a href="{{ route('articles.index') }}?key_search=Đà+Nẵng" class="topic-pill"><i class="fa fa-sun-o"></i> Đà Nẵng</a>
            <a href="{{ route('articles.index') }}?key_search=Sapa" class="topic-pill"><i class="fa fa-leaf"></i> Sapa</a>
            <a href="{{ route('articles.index') }}?key_search=vé+máy+bay" class="topic-pill"><i class="fa fa-plane"></i> Vé máy bay</a>
            <a href="{{ route('articles.index') }}?key_search=resort" class="topic-pill"><i class="fa fa-building"></i> Resort</a>
            <a href="{{ route('articles.index') }}?key_search=xanh" class="topic-pill"><i class="fa fa-tree"></i> Du lịch xanh</a>
            <a href="{{ route('articles.index') }}?key_search=2026" class="topic-pill"><i class="fa fa-calendar"></i> 2026</a>
        </div>
    </div>
</section>

{{-- FEATURED + LISTING --}}
<section class="listing-section" style="padding-top:48px;">
    <div class="container">

        @php $firstArticle = $articles->first(); @endphp

        {{-- Bài viết nổi bật --}}
        @if($firstArticle && !Request::get('key_search'))
        <div class="mb-5 ftco-animate">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <span class="sec-tag">Nổi bật</span>
                    <h2 style="font-size:22px;font-weight:800;color:#0f172a;margin:8px 0 0;">Bài viết đáng đọc</h2>
                </div>
            </div>
            @php
                $featuredImgList = [
                    'https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=1200&h=600&fit=crop&auto=format&q=85',
                    'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=1200&h=600&fit=crop&auto=format&q=85',
                    'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200&h=600&fit=crop&auto=format&q=85',
                ];
                $featuredImg = $featuredImgList[$firstArticle->id % count($featuredImgList)];
            @endphp
            <a href="{{ route('articles.detail', ['id' => $firstArticle->id, 'slug' => $firstArticle->a_slug]) }}"
               class="featured-article d-block">
                <img src="{{ $featuredImg }}" alt="{{ $firstArticle->a_title }}" class="featured-article__img">
                <div class="featured-article__overlay"></div>
                <div class="featured-article__body">
                    <span class="featured-article__cat"><i class="fa fa-star mr-1"></i> Nổi bật</span>
                    <h2 class="featured-article__title">{{ $firstArticle->a_title }}</h2>
                    <div class="featured-article__meta">
                        <span><i class="fa fa-calendar"></i> {{ $firstArticle->created_at ? date('d/m/Y', strtotime($firstArticle->created_at)) : '' }}</span>
                        <span><i class="fa fa-eye"></i> {{ number_format($firstArticle->a_view ?? 0) }} lượt xem</span>
                        <span><i class="fa fa-clock-o"></i> 5 phút đọc</span>
                    </div>
                </div>
            </a>
        </div>
        @endif

        {{-- Listing header --}}
        <div class="listing-header ftco-animate">
            <div class="sec-head mb-0">
                <span class="sec-tag">Tất cả bài viết</span>
                <h2 class="mb-0" style="font-size:24px;">
                    {{ Request::get('key_search') ? 'Kết quả tìm kiếm: "' . Request::get('key_search') . '"' : 'Bài viết mới nhất' }}
                </h2>
            </div>
            <span class="listing-count">
                Tìm thấy <strong>{{ $articles->total() }}</strong> bài viết
            </span>
        </div>

        {{-- Articles grid --}}
        <div class="row" style="margin-left:-14px;margin-right:-14px;">
            @if($articles->count() > 0)
                @foreach($articles as $article)
                    @include('page.common.itemArticle', compact('article'))
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fa fa-search" style="font-size:48px;color:#cbd5e1;display:block;margin-bottom:16px;"></i>
                    <h4 style="color:#94a3b8;">Không tìm thấy bài viết nào</h4>
                    <p style="color:#94a3b8;">Hãy thử từ khóa khác hoặc duyệt tất cả bài viết</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-primary mt-2" style="border-radius:30px;padding:10px 28px;">
                        Xem tất cả bài viết
                    </a>
                </div>
            @endif
        </div>

        {{-- Pagination --}}
        <div style="margin-top:48px;display:flex;justify-content:center;">
            <div class="block-27">{{ $articles->links('page.pagination.default') }}</div>
        </div>

    </div>
</section>

{{-- Newsletter CTA --}}
<section style="padding:70px 0;background:linear-gradient(135deg,#0f172a 0%,#1e3a8a 100%);position:relative;overflow:hidden;">
    <div style="position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=1600&h=400&fit=crop&auto=format&q=60') center/cover no-repeat;opacity:0.08;"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 ftco-animate">
                <span class="sec-tag" style="background:rgba(233,30,140,0.25);border-color:rgba(233,30,140,0.4);color:#ffb3d9;">Newsletter</span>
                <h2 style="color:#fff;font-size:30px;font-weight:800;margin:14px 0 10px;">Nhận cẩm nang du lịch miễn phí</h2>
                <p style="color:rgba(255,255,255,0.75);font-size:15px;margin-bottom:28px;line-height:1.7;">
                    Đăng ký nhận bản tin hàng tuần — ưu đãi độc quyền, kinh nghiệm du lịch và điểm đến hot nhất được cập nhật mỗi tuần.
                </p>
                <div style="display:flex;gap:10px;max-width:480px;margin:0 auto;">
                    <input type="email" placeholder="Nhập địa chỉ email của bạn..."
                        style="flex:1;padding:13px 20px;border-radius:50px;border:none;font-size:14px;outline:none;font-family:inherit;">
                    <button style="background:linear-gradient(135deg,#e91e8c,#c2185b);color:#fff;border:none;border-radius:50px;padding:13px 24px;font-weight:700;font-size:14px;cursor:pointer;white-space:nowrap;transition:all 0.3s;"
                        onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
                        <i class="fa fa-paper-plane mr-1"></i> Đăng ký
                    </button>
                </div>
                <p style="color:rgba(255,255,255,0.45);font-size:12px;margin-top:12px;">
                    <i class="fa fa-lock mr-1"></i> Chúng tôi cam kết không spam. Hủy đăng ký bất cứ lúc nào.
                </p>
            </div>
        </div>
    </div>
</section>

@stop
@section('script')@stop
