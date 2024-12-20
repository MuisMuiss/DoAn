    @include('admin.autth.layout')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cập nhật sản phẩm</h3>
                        </div>
                        @if (session('status'))
                            <h5 class="alert alert-success">{{session('status')}}</h5>
                        @endif
                        <div class="card-body">
                            <form action="{{route('admin.updatesp',['san_pham_id' => $product->san_pham_id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="">Tên sản phẩm:</label>
                                    <input type="text" name="ten_san_pham" id="" class="form-control" value="{{$product->ten_san_pham,old('ten_san_pham')}}">
                                    @error('ten_san_pham')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Loại sản phẩm:</label>
                                    <select name="loai_sp_id" id="" class="form-control">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{ $cate->loai_sp_id }}" 
                                                @if(old('loai_sp_id', $product->loai_sp_id) == $cate->loai_sp_id) selected @endif>
                                                {{ $cate->ten_loaisp }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('loai_sp_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label for="">Giá:</label>
                                    <input type="text" name="gia" id="" class="form-control" value="{{$product->gia,old('gia')}}">
                                    @error('gia')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label for="">Mô tả:</label>
                                    {{-- <input type="text" name="mo_ta" id="" class="form-control" value="{{$product->mo_ta,old('mo_ta')}}"> --}}
                                    <textarea name="mo_ta" id="editor" class="form-control description" placeholder="Product content">{{$product->mo_ta,old('mo_ta')}}</textarea>
                                    @error('mo_ta')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label for="">Số lượng kho:</label>
                                    <input type="text" name="so_luong_kho" id="" class="form-control" value="{{$product->so_luong_kho,old('so_luong_kho')}}" readonly>
                                    @error('so_luong_kho')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="">Thương hiệu:</label> 
                                    <select name="thuong_hieu_id" id="" class="form-control">
                                        @foreach($brand_product as $key => $cate)
                                            <option value="{{ $cate->thuong_hieu_id }}" 
                                                @if(old('thuong_hieu_id', $product->thuong_hieu_id) == $cate->thuong_hieu_id) selected @endif>
                                                {{ $cate->ten_thuong_hieu }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('thuong_hieu_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Sản phẩm bestseller:</label>
                                        <select name="sp_bestseller" class="form-control">
                                            <option value="0"{{$product->sp_bestseller == 0 ? 'selected' : '' }}>Sản phẩm bình thường</option>
                                            <option value="1"{{$product->sp_bestseller == 1 ? 'selected' : '' }}>Sản phẩm Bestseller</option>
                                        </select>
                                    </div>
    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Sản phẩm mới:</label>
                                        <select name="sp_moi" class="form-control">
                                            <option value="0" {{$product->sp_moi == 0 ? 'selected' : '' }}>Sản phẩm bình thường</option>
                                            <option value="1" {{$product->sp_moi == 1 ? 'selected' : '' }}>Sản phẩm New</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Ảnh:</label>
                                    <input type="file" name="hinh_anh" class="form-control" id="">
                                <img src="{{asset('images/product/'.$product->hinh_anh)}}" width="100px" height="100px" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Album ảnh:</label>
                                    <input type="file" name="album[]" class="form-control" multiple onchange="showOtherImage(this)">
                                    <hr>
                                    <div class="row" style="margin-right: 10.25rem;">
                                        @foreach ($product->images as $img)
                                        <div class="col-md-3" style="position: relative">
                                            <a href="" class="thumbnail">
                                                <img src="{{asset('images/product/'.$img->album_sp)}}" alt="" style="width: 100px">
                                            </a>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh không')" href="{{ route('product.deleteImage', $img->album_anh_id) }}" style="position: absolute; right:85px" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                                {{-- <a onclick="return confirm('Are you sure delete it?')" href="{{ route('product.destroyImage', $img->san_pham_id) }}" style="position: absolute; top:5px; right:20px" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a> --}}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    