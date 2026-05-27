@extends('admin.layouts.main')
@section('title', 'Danh sách đặt phòng khách sạn')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đặt phòng khách sạn</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="card-title">Tìm kiếm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="h_name" value="{{ request('h_name') }}" class="form-control" placeholder="Tên khách sạn">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="bh_name" value="{{ request('bh_name') }}" class="form-control" placeholder="Tên khách hàng">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="bh_phone" value="{{ request('bh_phone') }}" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <div class="form-group">
                                    <select name="bh_status" class="form-control">
                                        <option value="">-- Trạng thái --</option>
                                        @foreach($status as $key => $val)
                                            <option value="{{ $key }}" {{ request('bh_status') == $key ? 'selected' : '' }}>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-1">
                                <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Tìm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="4%">STT</th>
                                        <th>Khách sạn</th>
                                        <th>Thông tin khách hàng</th>
                                        <th>Chi tiết đặt phòng</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (!$bookHotels->isEmpty())
                                    @php $i = $bookHotels->firstItem(); @endphp
                                    @foreach($bookHotels as $book)
                                        <tr>
                                            <td class="text-center" style="vertical-align:middle;">{{ $i }}</td>
                                            <td style="vertical-align:middle; width:18%;">
                                                <strong>{{ isset($book->hotel) ? $book->hotel->h_name : 'N/A' }}</strong>
                                                <p class="text-muted" style="font-size:12px;">(Mã: {{ $book->bh_hotel_id }})</p>
                                            </td>
                                            <td style="vertical-align:middle; width:20%;">
                                                <p><b>Tên:</b> {{ $book->bh_name }}</p>
                                                <p><b>Email:</b> {{ $book->bh_email }}</p>
                                                <p><b>Phone:</b> {{ $book->bh_phone }}</p>
                                                <p><b>Địa chỉ:</b> {{ $book->bh_address }}</p>
                                            </td>
                                            <td style="vertical-align:middle; width:35%;">
                                                <p><b>Nhận phòng:</b> {{ $book->bh_check_in }}</p>
                                                <p><b>Trả phòng:</b> {{ $book->bh_check_out }}</p>
                                                <p><b>Số phòng:</b> {{ $book->bh_number_rooms }}</p>
                                                <p><b>Đơn giá:</b> {{ number_format($book->bh_price, 0, ',', '.') }} vnd/đêm</p>
                                                @if ($book->bh_check_in && $book->bh_check_out)
                                                    @php
                                                        $nights = \Carbon\Carbon::parse($book->bh_check_in)->diffInDays(\Carbon\Carbon::parse($book->bh_check_out));
                                                        $total = $book->bh_price * $book->bh_number_rooms * max($nights, 1);
                                                    @endphp
                                                    <p><b>Số đêm:</b> {{ $nights }}</p>
                                                    <p><b>Tổng tiền:</b> <strong class="text-danger">{{ number_format($total, 0, ',', '.') }} vnd</strong></p>
                                                @endif
                                                @if ($book->bh_note)
                                                    <p><b>Ghi chú:</b> {{ $book->bh_note }}</p>
                                                @endif
                                                <p class="text-muted" style="font-size:12px;"><b>Mã booking:</b> #{{ $book->id }}</p>
                                            </td>
                                            <td style="vertical-align:middle; width:11%;" class="text-center">
                                                <button type="button" class="btn btn-block {{ $classStatus[$book->bh_status] ?? 'btn-secondary' }} btn-xs">
                                                    {{ $status[$book->bh_status] ?? 'N/A' }}
                                                </button>
                                            </td>
                                            <td style="vertical-align:middle; width:12%;" class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-sm">Hành động</button>
                                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="{{ route('book.hotel.delete', $book->id) }}"
                                                               onclick="return confirm('Bạn có chắc muốn xóa?')"
                                                               class="text-danger">
                                                                <i class="fa fa-trash"></i> Xóa
                                                            </a>
                                                        </li>
                                                        @foreach($status as $key => $item)
                                                            @if ($key != $book->bh_status)
                                                            <li>
                                                                <a href="{{ route('book.hotel.update.status', ['status' => $key, 'id' => $book->id]) }}">
                                                                    <i class="fas fa-check"></i> {{ $item }}
                                                                </a>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Chưa có đơn đặt phòng nào</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            @if($bookHotels->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $bookHotels->appends(request()->query())->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
