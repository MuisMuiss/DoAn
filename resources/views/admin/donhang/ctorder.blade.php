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
    <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng</h1>
    {{-- <a href="{{ route('admin.themuser') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
    </a> --}}
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng dữ liệu chi tiết đơn hàng của "{{ $order->User->ho_ten ?? 'Không xác định' }} vào ngày {{ date('d/m/Y', strtotime($order->ngay_dat)) }}"</h6>
        </div>
        @if (session('status'))
            <h5 class="alert alert-success">{{ session('status') }}</h5>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th rowspan="1" colspan="1">Mã đơn hàng</th>
                                        <th rowspan="1" colspan="1">Hình ảnh</th>
                                        <th rowspan="1" colspan="1">Tên sản phẩm</th>
                                        <th rowspan="1" colspan="1">Số lượng</th>
                                        <th rowspan="1" colspan="1">Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ct_order as $cto)
                                        <tr>
                                            <td>{{ $cto->don_hang_id }}</td>
                                            @if (isset($product[$cto->san_pham_id]))
                                                <td>
                                                    <img src="{{ asset('images/product/' . $product[$cto->san_pham_id]->hinh_anh) }}"
                                                        alt="Product Image" style="width: 90px; height: 90px;">
                                                </td>
                                                <td>{{ $product[$cto->san_pham_id]->ten_san_pham }}</td>
                                            @else
                                                <td>Không tìm thấy sản phẩm</td>
                                                <td>Không tìm thấy sản phẩm</td>
                                            @endif
                                            <td>{{ $cto->so_luong }}</td>
                                            <td>{{ number_format($cto->gia_don_vi, 0, ',', '.') }} VNĐ</td>
                                        </tr>
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

                                @if ($ct_order->hasPages())
                                    {{ $ct_order->links() }}
                                @else
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                                class="page-link">‹</a></li>
                                        <li class="page-item active"><span class="page-link">1</span></li>
                                        <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                                aria-controls="dataTable" data-dt-idx="2" tabindex="0"
                                                class="page-link">›</a></li>
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
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: red;" id="exampleModalLabel">Thông báo!!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn chắc chắn có muốn xóa không</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                {{-- <a class="btn btn-danger"
                    href="{{ route('admin.deleteUser', ['nguoi_dung_id' => $nd->nguoi_dung_id]) }}">Detele</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@include('admin.autth.footer')
