@include('admin.autth.head')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý nhập hàng</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal"><i
            class="fas fa-plus"></i>
        Thêm sản phẩm nhập
    </button>
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 800px;">
            <form action="{{ route('import.addproduct') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel"> Thêm sản phẩm nhập</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form cho thương hiệu -->
                        <div class="form-group row">
                            <label for="thuong_hieu_id" class="col-sm-3 col-form-label">Thương hiệu</label>
                            <div class="col-sm-9">
                                <select name="thuong_hieu_id" id="thuong_hieu_id" class="form-control" required>
                                    <option value="">Chọn thương hiệu</option>
                                    @foreach ($brand as $br)
                                        <option value="{{ $br->thuong_hieu_id }}">{{ $br->ten_thuong_hieu }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Form cho chi tiết nhập hàng -->
                        <div class="form-group">
                            <label for="">Chi tiết nhập hàng:</label>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá nhập</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="product-rows">
                                    <tr>
                                        <td>
                                            <select name="details[0][san_pham_id]" class="form-control">
                                                @foreach ($product as $pro)
                                                    <option value="{{ $pro->san_pham_id }}">{{ $pro->ten_san_pham }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="details[0][so_luong]" class="form-control"
                                                value="1" min="1">
                                        </td>
                                        <td>
                                            <input type="text" name="details[0][gia_nhap]" class="form-control"
                                                required>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove-row">Xóa</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" id="add-row" class="btn btn-success">Thêm dòng</button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng dữ liệu nhập hàng / Import datatable</h6>
        </div>
        @if (session('status'))
            <h5 class="alert alert-success">{{ session('status') }}</h5>
        @elseif (session('error'))
            <h5 class="alert alert-danger">{{ session('error') }}</h5>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <form action="{{ route('import.search') }}" method="GET">
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
                                        <th rowspan="1" colspan="1">Mã nhập hàng</th>
                                        <th rowspan="1" colspan="1">Thương hiệu</th>
                                        <th rowspan="1" colspan="1">Ngày nhập</th>
                                        <th rowspan="1" colspan="1">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($nhaphang->isEmpty())
                                        <tr>
                                            <td colspan="5">Không tìm thấy.</td>
                                        </tr>
                                    @else
                                        @foreach ($nhaphang as $item)
                                            <tr class="odd">
                                                <td>{{ $item->nhap_hang_id }}</td>
                                                {{-- @foreach ($brand as $keybrand => $br)
                                                @if ($item->thuong_hieu_nhap == $br->thuong_hieu_id)
                                                    <td>{{ $br->ten_thuong_hieu }}</td>
                                                @endif
                                            @endforeach --}}
                                                <td>{{ $item->brand->ten_thuong_hieu ?? 'Không xác định' }}</td>
                                                <td>{{ $item->ngay_nhap }}</td>
                                                <td>{{ number_format($item->tong_tien, 0, ',', '.') }} VNĐ</td>
                                                <td>
                                                    <div
                                                        style="display: flex; justify-content: center; align-items: center;">
                                                        <a href="{{ route('ctimport.all', ['nhap_hang_id' => $item->nhap_hang_id]) }}"
                                                            class="btn btn-success btn-circle btn-sm"
                                                            style=" margin-right: 10px;">
                                                            <i class="fas fa-fw fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-circle btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal{{ $item->nhap_hang_id }}"
                                                            data-id="{{ $item->nhap_hang_id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Delete Modal-->
                                            <div class="modal fade" id="deleteModal{{ $item->nhap_hang_id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
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
                                                        <div class="modal-body">Bạn chắc chắn có muốn xóa không?</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Hủy</button>
                                                            <form
                                                                action="{{ route('admin.deletenhap', ['nhap_hang_id' => $item->nhap_hang_id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Xóa</button>
                                                            </form>
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
                                @if ($nhaphang->hasPages())
                                    {{ $nhaphang->appends(['keyword' => request('keyword')])->links() }}
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const brandSelect = document.getElementById('thuong_hieu_id');
        const productRows = document.getElementById('product-rows');
        const addRowButton = document.getElementById('add-row');
        // Hàm để lấy sản phẩm theo thương hiệu
        function getProductsByBrand(brandId, callback) {
            $.ajax({
                url: '{{ route('get.brand', '') }}/' + brandId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    callback(data);
                },
                error: function() {
                    alert('Không thể tải danh sách sản phẩm. Vui lòng thử lại!');
                }
            });
        }

        // Khi thay đổi thương hiệu
        brandSelect.addEventListener('change', function() {
            const brandId = brandSelect.value;
            // Cập nhật tất cả các dòng trong bảng theo thương hiệu
            getProductsByBrand(brandId, function(products) {
                // Xóa tất cả các dòng cũ
                productRows.innerHTML = '';
                // Nếu có sản phẩm, chỉ hiển thị một dòng trống cho phép chọn sản phẩm
                if (products.length > 0) {
                    // Thêm một dòng mới
                    const rowIndex = productRows.children.length; // Lấy số dòng hiện có
                    addProductRow(rowIndex, products);
                } else {
                    alert('Không có sản phẩm nào thuộc thương hiệu này!');
                }
            });
        });

        // Hàm để thêm dòng mới
        function addProductRow(rowIndex, products) {
            const newRow = document.createElement('tr');
            const productOptions = products
                .map(product => `<option value="${product.san_pham_id}">${product.ten_san_pham}</option>`)
                .join('');
            newRow.innerHTML = `
                <td>
                    <select name="details[${rowIndex}][san_pham_id]" class="form-control">
                        ${productOptions}
                    </select>
                </td>
                <td>
                    <input type="number" name="details[${rowIndex}][so_luong]" class="form-control" value="1" min="1">
                </td>
                <td>
                    <input type="text" name="details[${rowIndex}][gia_nhap]" class="form-control" required>
                    @error('details.[${rowIndex}].gia_nhap')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-row">Xóa</button>
                </td>
            `;
            // Append dòng mới vào bảng
            productRows.appendChild(newRow);
            //xóa dòng
            newRow.querySelector('.remove-row').addEventListener('click', function() {
                newRow.remove();
            });
        }
        // Thêm dòng
        addRowButton.addEventListener('click', function() {
            const brandId = brandSelect.value;
            // Lấy danh sách sản phẩm theo thương hiệu
            getProductsByBrand(brandId, function(products) {
                if (products.length > 0) {
                    const rowIndex = productRows.children.length;
                    addProductRow(rowIndex, products);
                } else {
                    alert('Không có sản phẩm nào thuộc thương hiệu này!');
                }
            });
        });
    });
</script>


<!-- End of Main Content -->
@include('admin.autth.footer')
