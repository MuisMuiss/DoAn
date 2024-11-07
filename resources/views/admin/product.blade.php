@include('admin.autth.head')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý sản phẩm</h1>
    <a href="{{ route('product.add') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Thêm sản phẩm</span>
    </a>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng dữ liệu sản phẩm / Product datatable</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length"><label>Show
                                    <select name="dataTable_length" aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="dataTable"></label></div>
                        </div>
                    </div>
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
                                        <th rowspan="1" colspan="1">Tên sản phẩm</th>
                                        <th rowspan="1" colspan="1">Loại sản phẩm</th>
                                        <th rowspan="1" colspan="1">Giá</th>
                                        <th rowspan="1" colspan="1">Mô tả</th>
                                        <th rowspan="1" colspan="1">Số lượng kho</th>
                                        <th rowspan="1" colspan="1">Thương hiệu</th>
                                        <th rowspan="1" colspan="1">Hình ảnh</th>
                                        <th rowspan="1" colspan="1">Album ảnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $key => $pro)
                                        <tr>
                                            <td>{{ $pro->san_pham_id }}</td>
                                            <td>{{ $pro->ten_san_pham }}</td>
                                            @foreach ($cate_product as $keycate => $cate)
                                                @if ($cate->loai_sp_id == $pro->loai_sp_id)
                                                    <td>{{ $cate->ten_loaisp }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $pro->gia }}</td>
                                            <td>{{ $pro->mo_ta }}</td>
                                            <td>{{ $pro->so_luong_kho }}</td>
                                            @foreach ($brand_product as $keybrand => $brand)
                                                @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                                                    <td>{{ $brand->ten_thuong_hieu }}</td>
                                                @endif
                                            @endforeach

                                            <td style="text-align: center; vertical-align: middle;">
                                                <img src="{{ asset('images/product/' . $pro->hinh_anh) }}"
                                                    width="70px" height="70px" alt="Image">
                                            </td>
                                            <td>
                                                <div
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <a href="{{ route('admin.editsp', ['san_pham_id' => $pro->san_pham_id]) }}"
                                                        class="btn btn-warning btn-circle btn-sm"
                                                        style=" margin-right: 10px;">
                                                        <i class="fas fa-fw fa-wrench"></i>
                                                    </a>
                                                    <a href="{{ route('admin.deletesp', ['san_pham_id' => $pro->san_pham_id]) }}"
                                                        class="btn btn-danger btn-circle btn-sm"data-toggle="modal"
                                                        data-target="#deleteModal">
                                                        @csrf
                                                        @method('DELETE')
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                Showing 1 to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a
                                            href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="dataTable" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="dataTable" data-dt-idx="3" tabindex="0"
                                            class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="dataTable" data-dt-idx="4" tabindex="0"
                                            class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="dataTable" data-dt-idx="5" tabindex="0"
                                            class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="dataTable" data-dt-idx="6" tabindex="0"
                                            class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
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
                <a class="btn btn-danger"
                    href="{{ route('admin.deletesp', ['san_pham_id' => $pro->san_pham_id]) }}">Detele</a>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@include('admin.autth.footer')
