@include('admin.autth.layout')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Sửa một Users</h3>
                    </div>
                    @if (session('status'))
                        <h3 class="alert alert-success">{{session('status')}}</h3>
                    @endif
                    <div class="card-body">
                        <form action="{{route('admin.updateUser', ['nguoi_dung_id' => $nguoiDung->nguoi_dung_id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Họ và tên:</label>
                                <input type="text" name="ho_ten" id="" class="form-control" value="{{$nguoiDung->ho_ten,old('ho_ten')}}">
                                @error('ho_ten')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Tên đăng nhập:</label>
                                <input type="text" name="ten_dang_nhap" id="" class="form-control" value="{{$nguoiDung->ten_dang_nhap,old('ten_dang_nhap')}}">
                                @error('ten_dang_nhap')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Mật khẩu:</label>
                                <input type="password" name="mat_khau" id="" class="form-control" value="{{$nguoiDung->mat_khau,old('mat_khau')}}">
                                @error('mat_khau')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email:</label>
                                <input type="email" name="email" id="" class="form-control" value="{{$nguoiDung->email,old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Số điện thoại:</label>
                                <input type="text" name="so_dien_thoai" id="" class="form-control" value="{{$nguoiDung->so_dien_thoai,old('so_dien_thoai')}}">
                                @error('so_dien_thoai')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Địa chỉ:</label>
                                <input type="text" name="dia_chi" id="" class="form-control" value="{{$nguoiDung->dia_chi,old('dia_chi')}}">
                                @error('dia_chi')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Vai trò:</label>
                                <select name="vai_tro" class="form-control"  >
                                    <option value="0"{{$nguoiDung->vai_tro == 0 ? 'selected' : '' }}>User</option>
                                    <option value="1"{{$nguoiDung->vai_tro == 1 ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Ảnh:</label>
                                <input type="file" name="avatar" class="form-control" id="">
                                <img src="{{asset('images/avatar/'.$nguoiDung->avatar)}}" width="100px" height="100px" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Trạng thái:</label>
                                <select name="trang_thai" class="form-control">>
                                    <option value="0"{{$nguoiDung->trang_thai == 0 ? 'selected' : '' }}>Ngừng hoạt động</option>
                                    <option value="1"{{$nguoiDung->trang_thai == 1 ? 'selected' : '' }}>Hoạt động</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{route('admin.alluser')}}" class="btn btn-danger float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script src="{{asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>


<script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>

</html>
