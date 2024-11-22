
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
                                <textarea name="mo_ta" id="editor" class="form-control" placeholder="Nhập mô tả..."></textarea>
                                {{-- <input type="text" name="mo_ta" id="" class="form-control" value="{{old('mo_ta')}}"> --}}
                                {{-- <textarea name="mo_ta" id="editor" class="form-control description" required placeholder="...">{{old('mo_ta')}}</textarea>   --}}
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
                                <label for="">Thương hiệu:</label> 
                                <select type="text" name="thuong_hieu_id" id="" class="form-control" value="{{old('thuong_hieu_id')}}">
                                    @foreach($brand_product as $key => $cate)
                                        <option value="{{ $cate->thuong_hieu_id}}">{{ $cate->ten_thuong_hieu}}</option>
                                    @endforeach
                                </select>
                                @error('thuong_hieu_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Sản phẩm bestseller:</label>
                                    <select name="sp_bestseller" class="form-control">
                                        <option value="0">Sản phẩm bình thường</option>
                                        <option value="1">Sản phẩm Bestseller</option>
                                    </select>
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Sản phẩm mới:</label>
                                    <select name="sp_moi" class="form-control">
                                        <option value="0">Sản phẩm bình thường</option>
                                        <option value="1">Sản phẩm New</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Ảnh:</label>
                                <input type="file" name="hinh_anh" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Album ảnh:</label>
                                <input type="file" name="album[]" class="form-control" multiple onchange="showOtherImage(this)">
                                <hr>
                                <div class="row" id="show_other_img">
                
                                </div>
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
