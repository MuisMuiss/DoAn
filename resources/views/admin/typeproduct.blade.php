@include("admin.autth.head")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý loại sản phẩm</h1>
    <a href="{{route('type.add')}}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Thêm loại sản phẩm</span>
    </a>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng dữ liệu loại sản phẩm / Product type datatable</h6>
        </div>
        @if (session('status'))
                        <h5 class="alert alert-success">{{session('status')}}</h5>
                    @endif
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
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
                                        <th rowspan="1" colspan="1">Tên loại sản phẩm</th>
                                        <th rowspan="1" colspan="1">Tên danh mục</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typeproduct as $key=>$type)
                                        <tr>
                                            <td>{{$type->loai_sp_id}}</td>
                                            <td>{{$type->ten_loaisp}}</td>
                                            @foreach($category as $key => $cate)
                                                @if ($cate->danh_muc_id == $type->danh_muc_id)
                                                    <td>{{ $cate->ten_danh_muc }}</td>
                                                @endif
                                            @endforeach    
                                            <td>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <a href="{{ route('admin.edittype', ['loai_sp_id' => $type->loai_sp_id]) }}" class="btn btn-warning btn-circle btn-sm" style=" margin-right: 10px;">
                                                        <i class="fas fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('admin.deletetype', ['loai_sp_id' => $type->loai_sp_id]) }}"
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
                                Hiển thị từ 1 đến 5 mục</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers">
                                @if ($typeproduct->hasPages())
                                    {{ $typeproduct->links() }}
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
                    href="{{ route('admin.deletetype', ['loai_sp_id' => $type->loai_sp_id]) }}">Detele</a>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@include("admin.autth.footer")