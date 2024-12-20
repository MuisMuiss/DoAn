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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to admin!</h1>
                                    </div>
                                    @if (session('msg'))
                                        <h6 class="alert alert-danger">{{session('msg')}}</h6>
                                    @endif
                                    <form action="{{route('admin.login')}}" class="user" for="login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email"  id="email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Mật khẩu"
                                                name="mat_khau" id="mat_khau" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" onclick="togglePassword()">
                                                <label class="custom-control-label" for="customCheck">Hiện mật khẩu</label>
                                            </div>
                                        </div>
                                        <script>
                                            function togglePassword() {
                                                const passwordInput = document.getElementById('mat_khau');
                                                const checkBox = document.getElementById('customCheck');
                                                if (checkBox.checked) {
                                                    passwordInput.type = "text";
                                                } else {
                                                    passwordInput.type = "password";
                                                }
                                            }
                                        </script>
                                        {{-- <input class="btn btn-primary btn-user btn-block" type="submit" value="login" name="login"> --}}
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
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