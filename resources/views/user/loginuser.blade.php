@include('user.layout.header')
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
                        <label for="">Mật khẩu:</label>
                        <input type="password" class="form-control form-control-user" placeholder="Mật khẩu"
                            name="mat_khau" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-user btn-block" type="submit">Đăng nhập</button>
                    <hr>
                    <a href="homeadmin" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="homeadmin" class="btn btn-facebook btn-user btn-block">
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