@include('admin.autth.head')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi tiết nhập hàng</h1>
    <a href="{{ route('ctimport.add', ['nhap_hang_id' => $nhaphang->nhap_hang_id]) }}"
        class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Thêm sản phẩm nhập</span>
    </a>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng dữ liệu sản phẩm nhập hàng / Product import datatable</h6>
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
                                        <th rowspan="1" colspan="1">Mã nhập hàng</th>
                                        <th rowspan="1" colspan="1">Hình ảnh</th>
                                        <th rowspan="1" colspan="1">Tên sản phẩm</th>
                                        <th rowspan="1" colspan="1">Tên thương hiệu</th>
                                        <th rowspan="1" colspan="1">Số lượng</th>
                                        <th rowspan="1" colspan="1">Giá nhập</th>
                                        <th rowspan="1" colspan="1">Tổng thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ct_nhap as $ctn)
                                        <tr class="odd">
                                            <td>{{ $ctn->id }}</td>
                                            <td>{{ $ctn->nhap_hang_id }}</td>
                                            @if (isset($product[$ctn->san_pham_id]))
                                                <td>
                                                    <img src="{{ asset('images/product/' . $product[$ctn->san_pham_id]->hinh_anh) }}"
                                                        alt="Product Image" style="width: 90px; height: 90px;">
                                                </td>
                                            @else
                                                <td>Không tìm thấy sản phẩm</td>
                                            @endif
                                            @foreach ($product as $keybrand => $pro)
                                                @if ($ctn->san_pham_id == $pro->san_pham_id)
                                                    <td>{{ $pro->ten_san_pham }}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($brand as $keybrand => $br)
                                                @if ($ctn->thuong_hieu_id == $br->thuong_hieu_id)
                                                    <td>{{ $br->ten_thuong_hieu }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $ctn->so_luong }}</td>
                                            <td>{{ number_format($ctn->gia_nhap, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ number_format($ctn->thanh_tien, 0, ',', '.') }} VNĐ</td>
                                            <td>
                                                <div
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <a href="{{ route('admin.editctnhap', ['id' => $ctn->id]) }}"
                                                        class="btn btn-warning btn-circle btn-sm"
                                                        style=" margin-right: 10px;">
                                                        <i class="fas fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('admin.deletectnhap', ['id' => $ctn->id]) }}"
                                                        class="btn btn-danger btn-circle btn-sm"data-toggle="modal"
                                                        data-target="#deleteModal">
                                                        @csrf
                                                        @method('DELETE')
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color: red;"
                                                            id="exampleModalLabel">Thông báo!!!</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Bạn chắc chắn có muốn xóa không</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-danger"
                                                            href="{{ route('admin.deletectnhap', ['id' => $ctn->id]) }}">Detele</a>
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
                                @if ($ct_nhap->hasPages())
                                    {{ $ct_nhap->links() }}
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
