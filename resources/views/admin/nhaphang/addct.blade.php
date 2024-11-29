@include('admin.autth.layout')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tạo chi tiết nhập hàng</h3>
                    </div>
                    @if (session('success'))
                        <h5 class="alert alert-success">{{ session('success') }}</h5>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.addctnhap', ['nhap_hang_id' => $nhaphang->nhap_hang_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Mã nhập:</label>
                                <input type="text" name="nhap_hang_id" id="" class="form-control"
                                    value="{{ $nhaphang->nhap_hang_id }}" readonly>
                                @error('nhap_hang_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết nhập hàng:</label>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Thương hiệu</th>
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
                                                <input type="text" class="form-control"
                                                    value="{{ $brand->ten_thuong_hieu }}" readonly>
                                                <input type="hidden" name="details[0][thuong_hieu_id]"
                                                    value="{{ $brand->thuong_hieu_id }}">
                                            </td>
                                            <td>
                                                <input type="number" name="details[0][so_luong]" class="form-control"
                                                    value="1" min="1">
                                            </td>
                                            <td>
                                                <input type="text" name="details[0][gia_nhap]" class="form-control">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove-row">Xóa</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" id="add-row" class="btn btn-success">Thêm dòng</button>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('ctimport.all', ['nhap_hang_id' => $nhaphang->nhap_hang_id]) }}"
                                    class="btn btn-danger float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    let rowIndex = 1;

    document.getElementById('add-row').addEventListener('click', function() {
        const tbody = document.getElementById('product-rows');
        const newRow = `
        <tr>
            <td>
                <select name="details[${rowIndex}][san_pham_id]" class="form-control">
                    @foreach ($product as $pro)
                        <option value="{{ $pro->san_pham_id }}">{{ $pro->ten_san_pham }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="text" class="form-control" value="{{ $brand->ten_thuong_hieu }}" readonly>
                <input type="hidden" name="details[${rowIndex}][thuong_hieu_id]" value="{{ $brand->thuong_hieu_id }}">
            </td>
            <td>
                <input type="number" name="details[${rowIndex}][so_luong]" class="form-control" value="1" min="1">
            </td>
            <td>
                <input type="text" name="details[${rowIndex}][gia_nhap]" class="form-control">
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-row">Xóa</button>
            </td>
        </tr>
    `;
        tbody.insertAdjacentHTML('beforeend', newRow);
        rowIndex++;
    });

    document.getElementById('product-rows').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>


</html>
