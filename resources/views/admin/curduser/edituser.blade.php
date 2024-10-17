@include('admin.autth.layout')
                    <div class="card-header">
                        <h3>Sửa một Users</h3>
                    </div>
                    @if (session('status'))
                        <h3 class="alert alert-success">{{session('status')}}</h3>
                    @endif
                    <div class="card-body">
                        <form action="{{route('admin.updateUser', ['nguoi_dung_id' => $nguoiDung->nguoi_dung_id])}}" method="post">
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
                                <select name="vai_tro" class="form-control" >
                                    <option value="0">Khách hàng</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Ảnh:</label>
                                <input type="file" name="avatar" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Trạng thái:</label>
                                <select name="trang_thai" class="form-control">
                                    <option value="0">Ngừng hoạt động</option>
                                    <option value="1">Hoạt động</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('admin.alluser')}}" class="btn btn-danger float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>


<script src="assets/admin/js/sb-admin-2.min.js"></script>

</html>
<!-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    
    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
    <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img class="sidebar-card-illustration mb-2" src="asset/admin/img/undraw_rocket.svg" alt="...">logo
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Thêm người dùng</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleUsername"
                                            placeholder="Tên đăng nhập">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="examplePassword"
                                            placeholder="Mật khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleName"
                                        placeholder="Họ và tên">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="examplePhone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control form-control-user"
                                            id="exampleAvatar" placeholder="ảnh">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleAddress"
                                        placeholder="Địa chỉ">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Ảnh</label>
                                        <input type="file" class="form-control form-control-user"
                                            id="exampleAvatar" placeholder="Ảnh">
                                </div>
                                <div class="form-group row">
                                    <a href="login.html" class="btn btn-primary btn-user btn-block">
                                        Thêm
                                    </a>
                                    <a href="{{route('admin.alluser')}}" class="btn btn-danger btn-user btn-block">
                                        Back
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    
    <script src="assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html> -->
