<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sữa&Tã</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block" style="height: 3.32rem;">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a
                            class="text-white">65 Đ. Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Hồ Chí Minh, Việt
                            Nam</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a
                            class="text-white">milkanddiapers@gmail.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <small class="me-3"><i class="fas fa-phone-alt me-2 text-secondary"></i><a class="text-white">+84
                            984931615</a></small>
                </div>
            </div>
        </div>
        <div class="container px-0" style="max-width: 1400px;">
            <nav class="navbar navbar-light bg-white navbar-expand-xl" style="padding: 8px 16px 8px 16px;">
                <a href="{{ route('index') }}" class="navbar-brand">
                    <h1 class="text-primary display-6">Sữa & Tã</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav" style="margin-left: 10%">
                        <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                        <div class="nav-item dropdown">
                            <a href="{{ route('shopsua') }}" class="nav-link dropdown-toggle">Sữa</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                @foreach ($cate_product as $cate)
                                @if ($cate->danh_muc_id == 1)
                                <a href="{{route('go.shop',$cate->loai_sp_id)}}" class="dropdown-item">
                                    <option value=" ">{{ $cate->ten_loaisp }}</option>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="{{ route('shopta') }}" class="nav-link dropdown-toggle">Tã</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                @foreach ($cate_product as $cate)
                                @if ($cate->danh_muc_id == 2)
                                <a href="{{route('go.shop',$cate->loai_sp_id)}}" class="dropdown-item">
                                    <option value=" ">{{ $cate->ten_loaisp }}</option>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <a href="{{route('info')}}" class="nav-item nav-link">Thông tin</a>
                        <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <div class="position-relative" style="margin-right: 10em">
                            <form method="GET" action="{{route('find')}}">
                            <input class="form-control border-2 border-secondary rounded-pill" style="width: 140%"
                                type="text" name="key" placeholder="Nhập tên sản phẩm cần tìm" fdprocessedid="wkib7">
                            <button  type="submit"
                                class="btn btn-search border-2 border-secondary position-absolute rounded-pill text-white h-100"
                                style="top: 0; left:140%"><i class="fas fa-search text-primary"></i></button>
                            </form>
                        </div>
                        <a href="{{ route('cart.index') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            @if ($cartCount > 0)
                                <span
                                    class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                    style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                        <div class="nav-item dropdown">
                            @if (Auth::check())
                                <a href="{{ route('accout.view', ['nguoi_dung_id' => Auth::id()]) }}" onclick="showContent(this)">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi,
                                        {{ Auth::user()->ho_ten }}</span>
                                    <img class="img-profile"
                                        src="{{ Auth::user()->avatar ? asset('images/avatar/' . Auth::user()->avatar) : asset('assets/admin/img/undraw_profile.svg') }}"
                                        style="width: 35px; height: 35px; border-radius: 50%;">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('accout.view', ['nguoi_dung_id' => Auth::id()]) }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Tài khoản
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}" data-toggle="modal"
                                        data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Đăng xuất
                                    </a>
                                </div>
                            @else
                                <a href="{{ route('user.login') }}" class="my-auto"><i
                                        class="fas fa-user fa-2x"></i></a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{ route('user.login') }}" class="dropdown-item">Đăng nhập</a>
                                    <a href="{{ route('user.register') }}" class="dropdown-item">Đăng ký</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#" style="color: black">Home</a></li>
            <li class="breadcrumb-item"><a href="#" style="color: black">Đăng nhập tài khoản</a></li>
        </ol>
    </div>
    <div class="customer-form">
        <div class="page_title">
            <div class="page-title text-center">
                <h1>Đăng nhập tài khoản</h1>
            </div>
        </div>
        <div class="col-lg-6 mx-auto">
            <div class="p-5">
                <div class="text-center">
                    <p class="h6 text-gray-900 mb-4">Nếu bạn có một tài khoản, xin vui lòng đăng nhập</p>
                </div>
                @if (session('msg'))
                    <h6 class="alert alert-danger">{{session('msg')}}</h6>
                @endif
                <form action="{{route('user.login')}}" class="user" for="login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address..."  id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mat_khau">Mật khẩu:</label>
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
                    <button class="btn btn-primary btn-user btn-block" type="submit">Đăng nhập</button>
                    <hr>
                    <a href="{{route('user.login')}}" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="{{route('user.login')}}" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="{{route('forgotpass')}}">Quên mật khẩu?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="{{ route('user.register') }}">Đăng ký tài khoản!</a>
                </div>
            </div>
        </div>
    </div>
    @include('user.layout.footer')