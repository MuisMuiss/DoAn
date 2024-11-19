@include('admin.autth.layout')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Sửa nhập hàng</h3>
                    </div>
                    @if (session('success'))
                        <h5 class="alert alert-success">{{ session('success') }}</h5>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.updatenhap', ['nhap_hang_id' => $nhaphang->nhap_hang_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Mã nhập:</label>
                                <input type="text" name="nhap_hang_id" id="" class="form-control"
                                    value="{{ old('nhap_hang_id', $nhaphang->nhap_hang_id) }}" readonly>
                                @error('nhap_hang_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Thương hiệu nhập:</label>
                                <select type="text" name="thuong_hieu_nhap" id="" class="form-control"
                                    value="{{ old('thuong_hieu_nhap') }}">
                                    @foreach ($brand as $key => $cate)
                                        <option value="{{ $cate->thuong_hieu_id }}"
                                            {{ old('thuong_hieu_nhap', $nhaphang->thuong_hieu_nhap) == $cate->thuong_hieu_id ? 'selected' : '' }}>
                                            {{ $cate->ten_thuong_hieu }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('thuong_hieu_nhap')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Ngày giờ nhập:</label>
                                <input type="datetime-local" name="ngay_nhap" id="" class="form-control"
                                    value="{{ old('ngay_nhap', $nhaphang->ngay_nhap) }}">
                                @error('ngay_nhap')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('inport.all') }}" class="btn btn-danger float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
