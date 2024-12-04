<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="assets/admin/img/logo.jpg" alt="" style="width: 70%;margin:50px 50px 50px 50px">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Thay đổi mật khẩu</h1>
                                    </div>
                                    @if (session('msg'))
                                        <h6 class="alert alert-danger">{{ session('msg') }}</h6>
                                    @elseif (session('success'))
                                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                                    @endif
                                    <form action="{{ route('admin.change') }}" class="user" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="current_password" id="exampleInputEmail"
                                                placeholder="Nhập mật khẩu hiện tại" required>
                                        </div>  
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" name="new_password"
                                                    id="exampleInputPassword" placeholder="Nhập mật khẩu mới" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" name="confirm_password"
                                                    id="exampleRepeatPassword" placeholder="Xác nhận lại mật khẩu" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Cập nhật
                                        </button>
                                        <a href="{{route('admin.login')}}" class="btn btn-danger btn-user btn-block">
                                            Back
                                        </a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>