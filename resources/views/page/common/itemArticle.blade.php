@php
    $articleUrl = route('articles.detail', ['id' => $article->id, 'slug' => safeTitle($article->a_title)]);
    $articleImg = $article->a_avatar ? asset(pare_url_file($article->a_avatar)) : asset('admin/dist/img/no-image.png');
    $months = ['Jan'=>'Th.1','Feb'=>'Th.2','Mar'=>'Th.3','Apr'=>'Th.4','May'=>'Th.5','Jun'=>'Th.6',
               'Jul'=>'Th.7','Aug'=>'Th.8','Sep'=>'Th.9','Oct'=>'Th.10','Nov'=>'Th.11','Dec'=>'Th.12'];
    $month = $months[date('M', strtotime($article->created_at))] ?? date('M', strtotime($article->created_at));
@endphp

<div class="col-md-6 col-lg-4 mb-4 ftco-animate" style="padding-left:14px;padding-right:14px;">
    <div class="article-card">

        {{-- IMAGE --}}
        <div class="article-card__img-wrap">
            <a href="{{ $articleUrl }}">
                <div class="article-card__img"
                     style="background-image:url('{{ $articleImg }}');width:100%;height:100%;background-size:cover;background-position:center;transition:transform 0.55s cubic-bezier(0.4,0,0.2,1);">
                </div>
            </a>
            <div class="article-card__date">
                <i class="fa fa-calendar"></i>
                {{ date('d', strtotime($article->created_at)) }} {{ $month }} {{ date('Y', strtotime($article->created_at)) }}
            </div>
        </div>

        {{-- BODY --}}
        <div class="article-card__body">
            <h3 class="article-card__title">
                <a href="{{ $articleUrl }}" title="{{ $article->a_title }}">
                    {{ the_excerpt($article->a_title, 90) }}
                </a>
            </h3>
            <p class="article-card__desc">{!! the_excerpt($article->a_description, 150) !!}</p>
            <div class="article-card__btn">
                <a href="{{ $articleUrl }}">
                    Đọc tiếp <i class="fa fa-arrow-right" style="margin-left:6px;transition:margin 0.2s;"></i>
                </a>
            </div>
        </div>

    </div>
</div>
