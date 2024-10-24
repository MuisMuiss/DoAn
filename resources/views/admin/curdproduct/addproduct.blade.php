{{-- @include("admin.autth.head")
<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="name">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="example">Loại Sản Phẩm</label>
            <select name="product_cate" class="form-control input-sm m-bot15">
            @foreach($cate_product as $key => $cate)
                <option Value="1">{{ $cate->ten_loaisp}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Giá Sản Phẩm</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Mô Tả</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Số Lượng Kho</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Nhà Cung Cấp</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Hình Ảnh</label>
            <input type="file" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Ngày Tạo</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{route('admin.alluser')}}" class="btn btn-danger float-end">Back</a>
        </div>
    </div> --}}
@include('admin.autth.layout')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm mới một Sản phẩm</h3>
                    </div>
                    @if (session('status'))
                        <h5 class="alert alert-success">{{session('status')}}</h5>
                    @endif
                    <div class="card-body">
                        <form action="{{route('admin.addProduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Tên sản phẩm:</label>
                                <input type="text" name="ten_san_pham" id="" class="form-control" value="{{old('ten_san_pham')}}">
                                @error('ten_san_pham')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Loại sản phẩm:</label>
                                <select type="text" name="loai_sp_id" id="" class="form-control" value="{{old('loai_sp_id')}}">
                                    @foreach($cate_product as $key => $cate)
                                        <option value="{{ $cate->loai_sp_id }}">{{ $cate->ten_loaisp }}</option>
                                    @endforeach
                                </select>
                                @error('loai_sp_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Giá:</label>
                                <input type="text" name="gia" id="" class="form-control" value="{{old('gia')}}">
                                @error('gia')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Mô tả:</label>
                                <input type="text" name="mo_ta" id="" class="form-control" value="{{old('mo_ta')}}">
                                @error('mo_ta')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Số lượng kho:</label>
                                <input type="text" name="so_luong_kho" id="" class="form-control" value="{{old('so_luong_kho')}}">
                                @error('so_luong_kho')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Nhà cung cấp:</label> 
                                <select type="text" name="thuong_hieu_id" id="" class="form-control" value="{{old('thuong_hieu_id')}}">
                                    @foreach($brand_product as $key => $cate)
                                        <option value="{{ $cate->thuong_hieu_id}}">{{ $cate->ten_thuong_hieu}}</option>
                                    @endforeach
                                </select>
                                @error('thuong_hieu_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Ảnh:</label>
                                <input type="file" name="hinh_anh" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('product.all')}}" class="btn btn-danger float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
