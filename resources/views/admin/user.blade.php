@include('admin.autth.head')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý người dùng</h1>
    <a href="{{ route('admin.themuser') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Thêm người dùng</span>
    </a>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng dữ liệu người dùng / User datatable</h6>
        </div>
        @if (session('status'))
            <h5 class="alert alert-success">{{ session('status') }}</h5>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <form action="{{ route('nguoidung.search') }}" method="GET">
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
                                    <tr>
                                        <th rowspan="1" colspan="1">Id</th>
                                        <th rowspan="1" colspan="1">Họ và Tên</th>
                                        <th rowspan="1" colspan="1">Email</th>
                                        <th rowspan="1" colspan="1">Số điện thoại</th>
                                        <th rowspan="1" colspan="1">Địa chỉ</th>
                                        <th rowspan="1" colspan="1">Ảnh</th>
                                        <th rowspan="1" colspan="1">IsAdmin</th>
                                        <th rowspan="1" colspan="1">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($nguoiDung->isEmpty())
                                        <tr>
                                            <td colspan="5">Không tìm thấy người dùng nào.</td>
                                        </tr>
                                    @else
                                        @foreach ($nguoiDung as $nd)
                                            <tr class="odd">
                                                <td class="sorting_1">{{ $nd->nguoi_dung_id }}</td>
                                                <td>{{ $nd->ho_ten }}</td>
                                                <td>{{ $nd->email }}</td>
                                                <td>{{ $nd->so_dien_thoai }}</td>
                                                <td>{{ $nd->dia_chi }}</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <img src="{{ asset('images/avatar/' . $nd->avatar) }}"
                                                        width="70px" height="70px" alt="Image">
                                                </td>
                                                <td>
                                                    <p>{{ $nd->vai_tro == 1 ? 'Admin' : 'User' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $nd->trang_thai == 1 ? 'Hoạt động' : 'Ngưng hoạt động' }}</p>
                                                </td>
                                                <td>
                                                    <div
                                                        style="display: flex; justify-content: center; align-items: center;">
                                                        <a href="{{ route('admin.edituser', ['nguoi_dung_id' => $nd->nguoi_dung_id]) }}"
                                                            class="btn btn-warning btn-circle btn-sm"
                                                            style=" margin-right: 10px;">
                                                            <i class="fas fa-fw fa-wrench"></i>
                                                        </a>
                                                        <a href="{{ route('admin.deleteUser', ['nguoi_dung_id' => $nd->nguoi_dung_id]) }}"
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
                                                                href="{{ route('admin.deleteUser', ['nguoi_dung_id' => $nd->nguoi_dung_id]) }}">Detele</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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
                                @if ($nguoiDung->hasPages())
                                    {{ $nguoiDung->appends(['keyword' => request('keyword')])->links() }}
                                @else
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="dataTable_previous">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="0"
                                                tabindex="0" class="page-link">‹</a>
                                        </li>
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
