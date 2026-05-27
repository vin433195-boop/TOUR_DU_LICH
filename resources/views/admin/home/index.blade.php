@extends('admin.layouts.main')
@section('title', 'Bảng điều khiển - Tour Du Lịch')
@section('style-css')
<style>
    /* ===== DASHBOARD STYLES ===== */
    .dashboard-header {
        background: linear-gradient(135deg, #1a3c5e 0%, #2980b9 100%);
        padding: 28px 30px 22px;
        margin: -10px -15px 25px;
        border-radius: 0 0 18px 18px;
        color: #fff;
        box-shadow: 0 4px 20px rgba(41,128,185,0.18);
    }
    .dashboard-header h4 { font-size: 22px; font-weight: 700; margin: 0 0 4px; }
    .dashboard-header p  { font-size: 13px; opacity: .8; margin: 0; }

    /* Stat cards */
    .stat-card {
        border-radius: 14px;
        padding: 22px 20px;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 6px 20px rgba(0,0,0,.12);
        transition: transform .2s, box-shadow .2s;
        text-decoration: none;
    }
    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,.18); color:#fff; }
    .stat-card .icon-wrap {
        width: 58px; height: 58px; border-radius: 12px;
        background: rgba(255,255,255,.2);
        display: flex; align-items: center; justify-content: center;
        font-size: 26px; flex-shrink: 0;
    }
    .stat-card .info-text  { font-size: 12px; opacity: .85; margin-bottom: 4px; }
    .stat-card .info-number{ font-size: 30px; font-weight: 800; line-height: 1; }
    .stat-card.blue   { background: linear-gradient(135deg,#2980b9,#3498db); }
    .stat-card.green  { background: linear-gradient(135deg,#27ae60,#2ecc71); }
    .stat-card.orange { background: linear-gradient(135deg,#e67e22,#f39c12); }
    .stat-card.purple { background: linear-gradient(135deg,#8e44ad,#9b59b6); }

    /* Section title */
    .section-title {
        font-size: 16px; font-weight: 700; color: #2c3e50;
        margin: 0 0 16px; padding-bottom: 10px;
        border-bottom: 2px solid #e9ecef;
        display: flex; align-items: center; gap: 8px;
    }
    .section-title i { color: #2980b9; }

    /* Tour table */
    .tour-table { width:100%; border-collapse:separate; border-spacing:0; }
    .tour-table thead th {
        background: #f4f6f9; color:#5a6070;
        font-size: 11px; font-weight: 700; text-transform: uppercase;
        letter-spacing: .5px; padding: 10px 14px;
        border-bottom: 2px solid #e1e5eb;
    }
    .tour-table thead th:first-child { border-radius: 8px 0 0 0; }
    .tour-table thead th:last-child  { border-radius: 0 8px 0 0; }
    .tour-table tbody tr { transition: background .15s; }
    .tour-table tbody tr:hover { background: #f8fafc; }
    .tour-table td {
        padding: 12px 14px; border-bottom: 1px solid #f0f2f5;
        vertical-align: middle; font-size: 13.5px; color: #3d4451;
    }
    .tour-table .tour-img {
        width: 80px; height: 52px; object-fit: cover;
        border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.1);
    }
    .tour-table .tour-name { font-weight: 600; color: #2c3e50; max-width: 220px; }
    .tour-table .tour-name small { display:block; color:#95a5a6; font-weight:400; font-size:11.5px; margin-top:2px; }
    .badge-follow {
        background: linear-gradient(135deg,#2980b9,#3498db);
        color:#fff; border-radius:20px; padding: 3px 12px; font-size:12px; font-weight:600;
    }
    .rank-badge {
        width:26px; height:26px; border-radius:50%;
        display:inline-flex; align-items:center; justify-content:center;
        font-size:12px; font-weight:700; color:#fff;
    }
    .rank-1 { background: linear-gradient(135deg,#f39c12,#e67e22); }
    .rank-2 { background: linear-gradient(135deg,#bdc3c7,#95a5a6); }
    .rank-3 { background: linear-gradient(135deg,#cd7f32,#a0522d); }
    .rank-n { background: #dee2e6; color:#6c757d; }

    /* Filter bar */
    .filter-bar {
        background: #f8fafc; border-radius: 10px;
        padding: 14px 18px; margin-bottom: 18px;
        border: 1px solid #e9ecef;
        display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
    }
    .filter-bar label { font-size:12px; font-weight:600; color:#5a6070; margin:0; white-space:nowrap; }
    .filter-bar .form-control {
        height: 36px; font-size: 13px; border-radius: 8px;
        border-color: #d1d5db; min-width: 110px;
    }
    .filter-bar .btn { height:36px; font-size:13px; border-radius:8px; padding:0 16px; }

    /* Chart containers */
    .chart-card {
        background: #fff; border-radius: 14px;
        box-shadow: 0 2px 12px rgba(0,0,0,.07);
        padding: 20px; margin-bottom: 20px;
    }
    .chart-card .chart-title {
        font-size:14px; font-weight:700; color:#2c3e50; margin-bottom:14px;
        display:flex; align-items:center; gap:8px;
    }
    .chart-card .chart-title i { color:#2980b9; }
    #container, #container2, #container3 { min-height: 280px; }

    /* Responsive */
    @media(max-width:768px){
        .stat-card { padding: 16px 14px; }
        .stat-card .info-number { font-size: 24px; }
    }
</style>
@stop

@section('content')
<!-- ===== DASHBOARD HEADER ===== -->
<div class="content-header" style="padding:0">
    <div class="container-fluid">
        <div class="dashboard-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4><i class="fas fa-tachometer-alt mr-2"></i>Bảng điều khiển</h4>
                    <p>Xin chào, <strong>{{ Auth::user()->name }}</strong> — Hôm nay: {{ date('d/m/Y') }}</p>
                </div>
                <a href="{{ route('tour.index') }}" class="btn btn-sm btn-light" style="border-radius:8px;">
                    <i class="fas fa-plus mr-1"></i>Thêm tour mới
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ===== MAIN CONTENT ===== -->
<section class="content">
    <div class="container-fluid">

        <!-- ===== STAT CARDS ===== -->
        <div class="row mb-4">
            <div class="col-6 col-md-3 mb-3">
                <a href="{{ route('tour.index') }}" class="stat-card blue d-block">
                    <div class="icon-wrap"><i class="fas fa-map-marked-alt"></i></div>
                    <div>
                        <div class="info-text">Tổng số Tour</div>
                        <div class="info-number">{{ number_format($tour) }}</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="{{ route('book.tour.index') }}" class="stat-card green d-block">
                    <div class="icon-wrap"><i class="fas fa-calendar-check"></i></div>
                    <div>
                        <div class="info-text">Lượt đặt tour</div>
                        <div class="info-number">{{ number_format($bookTour) }}</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="{{ route('user.index') }}" class="stat-card orange d-block">
                    <div class="icon-wrap"><i class="fas fa-users"></i></div>
                    <div>
                        <div class="info-text">Thành viên</div>
                        <div class="info-number">{{ number_format($user) }}</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="{{ route('article.index') }}" class="stat-card purple d-block">
                    <div class="icon-wrap"><i class="fas fa-newspaper"></i></div>
                    <div>
                        <div class="info-text">Bài viết</div>
                        <div class="info-number">{{ number_format($article) }}</div>
                    </div>
                </a>
            </div>
        </div>

        <!-- ===== FEATURED TOURS TABLE ===== -->
        @if($tours->count() > 0)
        <div class="chart-card mb-4">
            <div class="section-title">
                <i class="fas fa-star"></i> Tour nổi bật
                <span class="ml-auto" style="font-size:12px;font-weight:400;color:#95a5a6;">Top {{ $tours->count() }} tour được đặt nhiều nhất</span>
            </div>
            @php
                $adminTourImgs = [
                    'https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1573843981267-be1999ff37cd?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1488085061387-422e29b40080?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1530841344095-9ec5ad8c4e54?w=160&h=100&fit=crop&auto=format&q=80',
                    'https://images.unsplash.com/photo-1519451241324-20b4ea2c4220?w=160&h=100&fit=crop&auto=format&q=80',
                ];
            @endphp
            <div class="table-responsive">
                <table class="tour-table">
                    <thead>
                        <tr>
                            <th style="width:50px">#</th>
                            <th style="width:96px">Ảnh</th>
                            <th>Tên tour</th>
                            <th style="width:120px">Ngày khởi hành</th>
                            <th style="width:100px;text-align:center">Lượt đặt</th>
                            <th style="width:80px;text-align:center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tours as $i => $tour)
                        @php
                            $tourImg = $tour->t_image
                                ? asset(pare_url_file($tour->t_image))
                                : $adminTourImgs[$tour->id % count($adminTourImgs)];
                            $rankClass = $i === 0 ? 'rank-1' : ($i === 1 ? 'rank-2' : ($i === 2 ? 'rank-3' : 'rank-n'));
                        @endphp
                        <tr>
                            <td><span class="rank-badge {{ $rankClass }}">{{ $i + 1 }}</span></td>
                            <td>
                                <img src="{{ $tourImg }}" alt="{{ $tour->t_title }}" class="tour-img"
                                     onerror="this.src='{{ asset('admin/dist/img/no-image.png') }}'">
                            </td>
                            <td>
                                <div class="tour-name">
                                    {{ Str::limit($tour->t_title, 55) }}
                                    <small>ID: #{{ $tour->id }}</small>
                                </div>
                            </td>
                            <td style="font-size:13px;color:#7f8c8d;">{{ $tour->t_start_date ?? '—' }}</td>
                            <td style="text-align:center">
                                <span class="badge-follow">{{ $tour->t_follow }}</span>
                            </td>
                            <td style="text-align:center">
                                <a href="{{ route('tour.update', $tour->id) }}" class="btn btn-sm btn-outline-primary" style="border-radius:6px;padding:3px 10px;" title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- ===== FILTER BAR ===== -->
        <form action="" method="GET" id="filter-form">
            <div class="filter-bar">
                <label><i class="fas fa-filter mr-1"></i>Lọc thống kê:</label>
                <div>
                    <?php $month = date('m'); ?>
                    <select name="select_month" class="form-control d-inline-block" style="width:auto">
                        <option value="">Tháng</option>
                        @for($i = 1; $i < 13; $i++)
                            @if(Request::get('select_month'))
                                <option {{ Request::get('select_month') == $i ? "selected" : '' }} value="{{ $i }}">Tháng {{ $i }}</option>
                            @else
                                <option {{ $month == $i ? "selected" : '' }} value="{{ $i }}">Tháng {{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div>
                    <?php $year = date('Y'); ?>
                    <select name="select_year" class="form-control d-inline-block" style="width:auto">
                        <option value="">Năm</option>
                        @for($i = $year - 5; $i <= $year + 1; $i++)
                            @if(Request::get('select_year'))
                                <option {{ Request::get('select_year') == $i ? "selected" : '' }} value="{{ $i }}">{{ $i }}</option>
                            @else
                                <option {{ $year == $i ? "selected" : '' }} value="{{ $i }}">{{ $i }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search mr-1"></i>Xem thống kê
                </button>
                <a href="{{ route('admin.home') }}" class="btn btn-light">
                    <i class="fas fa-redo mr-1"></i>Đặt lại
                </a>
            </div>
        </form>

        <!-- ===== CHARTS ROW 1 ===== -->
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="chart-card">
                    <div class="chart-title"><i class="fas fa-chart-line"></i>Lượt đặt tour trong tháng</div>
                    <div id="container2"
                         data-list-day="{{ $listDay }}"
                         data-money-default="{{ $arrRevenueTransactionMonthDefault }}"
                         data-money="{{ $arrRevenueTransactionMonth }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="chart-card">
                    <div class="chart-title"><i class="fas fa-chart-pie"></i>Trạng thái tour</div>
                    <div id="container" data-json="{{ $statusTransaction }}"></div>
                </div>
            </div>
        </div>

        <!-- ===== CHARTS ROW 2 ===== -->
        <div class="row">
            <div class="col-12">
                <div class="chart-card">
                    <div class="chart-title"><i class="fas fa-dollar-sign"></i>Doanh thu trong tháng</div>
                    <div id="container3"
                         data-list-day="{{ $listDay }}"
                         data-money="{{ $arrmoney }}">
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
@stop

@section('script')
<link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    // ===== PIE CHART =====
    var dataTransaction = JSON.parse($("#container").attr('data-json'));
    Highcharts.chart('container', {
        chart: { styledMode: true, backgroundColor: 'transparent' },
        title: { text: '' },
        legend: { enabled: true, itemStyle: { fontSize: '12px' } },
        series: [{
            type: 'pie',
            allowPointSelect: true,
            keys: ['name', 'y', 'selected', 'sliced'],
            data: dataTransaction,
            showInLegend: true,
            dataLabels: { enabled: false }
        }]
    });

    // ===== BOOKING LINE CHART =====
    var listday = JSON.parse($("#container2").attr("data-list-day"));
    var listMoneyMonth = JSON.parse($("#container2").attr('data-money'));
    var listMoneyMonthDefault = JSON.parse($("#container2").attr('data-money-default'));
    Highcharts.chart('container2', {
        chart: { type: 'areaspline', backgroundColor: 'transparent' },
        title: { text: '' },
        xAxis: { categories: listday, labels: { style: { fontSize: '11px' } } },
        yAxis: {
            title: { text: 'Số khách', style: { fontSize:'12px' } },
            labels: { formatter: function(){ return this.value; } }
        },
        tooltip: { crosshairs: true, shared: true },
        plotOptions: { areaspline: { fillOpacity: 0.12 } },
        series: [
            { name: 'Người lớn', data: listMoneyMonth, color: '#2980b9' },
            { name: 'Trẻ em', data: listMoneyMonthDefault, color: '#27ae60' }
        ],
        legend: { itemStyle: { fontSize: '12px' } }
    });

    // ===== REVENUE LINE CHART =====
    var listday2 = JSON.parse($("#container3").attr("data-list-day"));
    var listMoneyMonth2 = JSON.parse($("#container3").attr('data-money'));
    Highcharts.chart('container3', {
        chart: { type: 'column', backgroundColor: 'transparent' },
        title: { text: '' },
        xAxis: { categories: listday2, labels: { style: { fontSize: '11px' } } },
        yAxis: {
            title: { text: 'Doanh thu (VNĐ)', style: { fontSize:'12px' } },
            labels: { formatter: function(){ return Highcharts.numberFormat(this.value, 0, '.', ','); } }
        },
        tooltip: {
            shared: true,
            formatter: function(){ return '<b>' + this.x + '</b><br/>Doanh thu: <b>' + Highcharts.numberFormat(this.y,0,'.',',') + ' đ</b>'; }
        },
        series: [{ name: 'Doanh thu', data: listMoneyMonth2, color: '#2980b9' }],
        legend: { enabled: false }
    });
</script>
@stop
