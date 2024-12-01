{{-- @include('admin.autth.layout')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tạo chi tiết nhập hàng</h3>
                    </div>
                    @if (session('success'))
                        <h5 class="alert alert-success">{{session('success')}}</h5>
                    @endif
                    <div class="card-body">
                        <div class="modal-dialog">
                            <form action="{{ route('import.addproduct') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addProductModalLabel">Thêm sản phẩm nhập</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="thuong_hieu_id">Thương hiệu</label>
                                            <select name="thuong_hieu_id" id="thuong_hieu_id" class="form-control">
                                                @foreach ($brand as $brand)
                                                    <option value="{{ $brand->thuong_hieu_id }}">{{ $brand->ten_thuong_hieu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="san_pham_id">Sản phẩm</label>
                                            <select name="san_pham_id" id="san_pham_id" class="form-control">
                                                @foreach ($product as $product)
                                                    <option value="{{ $product->san_pham_id }}">{{ $product->ten_san_pham }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="so_luong">Số lượng</label>
                                            <input type="number" name="so_luong" id="so_luong" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gia_nhap">Giá nhập</label>
                                            <input type="number" name="gia_nhap" id="gia_nhap" class="form-control" required>
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
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}