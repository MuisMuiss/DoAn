@include('admin.autth.head')
@php
    // Mảng trạng thái
    $trang_thai = [
        'dang_xu_ly' => 'Đang xử lý',
        'dang_giao' => 'Đang giao',
        'da_giao' => 'Đã giao',
        'da_huy' => 'Đã hủy',
    ];
    $phuong_thuc = [
        'COD' => 'Thanh toán khi nhận hàng',
        'Online' => 'Thanh toán online',
    ];
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý đơn hàng</h1>
    {{-- <a href="{{ route('admin.themuser') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
    </a> --}}
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng dữ liệu đơn hàng / Order datatable</h6>
        </div>
        @if (session('success'))
                        <h5 class="alert alert-success">{{ session('success') }}</h5>
                    @endif
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <form action="{{ route('order.search') }}" method="GET">
                        <div id="dataTable_filter" class="dataTables_filter" style="max-width: 15%">
                            <label>Search:
                                <input type="search" name="keyword" class="form-control form-control-sm"
                                    value="{{ request('keyword') }}" placeholder="Nhập từ khóa tìm kiếm...">
                                <button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
                            </label>

                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <!-- <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 190.775px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 309.712px;">Position</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137.288px;">Office</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 63.9125px;">Age</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 129.8px;">Start date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 116.512px;">Salary</th>
                                    </tr> -->
                                    <tr>
                                        <th rowspan="1" colspan="1">Id</th>
                                        <th rowspan="1" colspan="1">Họ và Tên</th>
                                        <th rowspan="1" colspan="1">Trạng thái đơn hàng</th>
                                        <th rowspan="1" colspan="1">Tổng tiền</th>
                                        <th rowspan="1" colspan="1">Ngày đặt</th>
                                        <th rowspan="1" colspan="1">Phương thức thanh toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $o)
                                        <tr>
                                            <td>{{ $o->don_hang_id }}</td>
                                            @foreach ($user as $keybrand => $nd)
                                                @if ($o->nguoi_dung_id == $nd->nguoi_dung_id)
                                                    <td>{{ $nd->ho_ten }}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                {{-- {{ $trang_thai[$o->trang_thai_don_hang] ?? 'Đang xử lý' }} --}}
                                                <form action="{{ route('updateStatus') }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="don_hang_id" value="{{ $o->don_hang_id }}">
                                                    <select name="trang_thai" class="form-control" onchange="this.form.submit()">
                                                        @foreach ($trang_thai as $key => $value)
                                                            <option value="{{ $key }}" {{ $o->trang_thai_don_hang == $key ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>
                                            <td>{{ number_format($o->tong_tien, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ $o->ngay_dat }}</td>
                                            <td>{{ $phuong_thuc[$o->phuong_thuc_thanh_toan] ?? 'Thanh toán khi nhận hàng' }}</td>
                                            <td>
                                                <div
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    {{-- <a href="{{ route('admin.editorder', ['don_hang_id' => $o->don_hang_id]) }}" class="btn btn-warning btn-circle btn-sm"
                                                        style=" margin-right: 10px;">
                                                        <i class="fas fa-fw fa-pen"></i>
                                                    </a> --}}
                                                    <a href="{{ route('ctorder.all', ['don_hang_id' => $o->don_hang_id]) }}" class="btn btn-success btn-circle btn-sm"
                                                        style=" margin-right: 10px;">
                                                        <i class="fas fa-fw fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.deleteorder', ['don_hang_id' => $o->don_hang_id]) }}"
                                                        class="btn btn-danger btn-circle btn-sm"data-toggle="modal"
                                                        data-target="#deleteModal">
                                                        @csrf
                                                        @method('DELETE')
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: red;"
                                                                id="exampleModalLabel">Thông báo!!!</h5>
                                                            <button class="close" type="button"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Bạn chắc chắn có muốn xóa không</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a class="btn btn-danger"
                                                                href="{{ route('admin.deleteorder', ['don_hang_id' => $o->don_hang_id]) }}">Detele</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                Hiển thị từ 1 đến 5 mục</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers">
                                
                                @if ($order->hasPages())
                                    {{ $order->links() }}
                                @else
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="dataTable_previous"><a href="#" aria-controls="dataTable"
                                                data-dt-idx="0" tabindex="0" class="page-link">‹</a></li>
                                        <li class="page-item active"><span class="page-link">1</span></li>
                                        <li class="paginate_button page-item next" id="dataTable_next"><a
                                                href="#" aria-controls="dataTable" data-dt-idx="2"
                                                tabindex="0" class="page-link">›</a></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@include('admin.autth.footer')
