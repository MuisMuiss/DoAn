@include('admin.autth.layout')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Sửa chi tiết nhập hàng</h3>
                    </div>
                    @if (session('success'))
                        <h5 class="alert alert-success">{{ session('success') }}</h5>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.updatectnhap', ['id' => $ct_nhap->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Mã nhập:</label>
                                <input type="text" name="nhap_hang_id" id="" class="form-control"
                                    value="{{ $ct_nhap->nhap_hang_id }}" readonly>
                                @error('nhap_hang_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Tên sản phẩm nhập</label>
                                <select name="san_pham_id" id="" class="form-control">
                                    @foreach ($product as $key => $pro)
                                        <option value="{{ $pro->san_pham_id }}"
                                            {{ old('san_pham_id',$ct_nhap->san_pham_id) == $pro->san_pham_id ? 'selected' : '' }}>
                                            {{ $pro->ten_san_pham }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('san_pham_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Thương hiệu nhập:</label>
                                <select type="text" name="thuong_hieu_id" id="" class="form-control"
                                    value="{{ old('thuong_hieu_id') }}">
                                    @foreach ($brand as $key => $cate)
                                        <option value="{{ $cate->thuong_hieu_id }}"
                                            {{ old('thuong_hieu_id', $ct_nhap->thuong_hieu_id) == $cate->thuong_hieu_id ? 'selected' : '' }}>
                                            {{ $cate->ten_thuong_hieu }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('thuong_hieu_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="form-group mb-3 col">
                                    <label for="">Số lượng:</label>
                                    <input type="number" name="so_luong" id="so_luong" class="form-control"
                                        value="{{ old('so_luong', $ct_nhap->so_luong) }}" min="1" step="1">
                                    @error('so_luong')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col">
                                    <label for="">Giá nhập:</label>
                                    <input type="text" name="gia_nhap" id="" class="form-control"
                                        value="{{ old('gia_nhap',$ct_nhap->gia_nhap) }}">
                                    @error('gia_nhap')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('ctimport.all', ['nhap_hang_id' => $ct_nhap->nhap_hang_id]) }}"
                                    class="btn btn-danger float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
