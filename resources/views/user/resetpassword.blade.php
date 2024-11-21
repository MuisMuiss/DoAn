@include('user.layout.header')
    <!-- Navbar End -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#" style="color: black">Home</a></li>
            <li class="breadcrumb-item"><a href="#" style="color: black">Quên mật khẩu</a></li>
        </ol>
    </div>
    <div class="customer-form">
        <div class="page_title">
            <div class="page-title text-center">
                <h1>Quên mật khẩu</h1>
            </div>
        </div>
        <div class="col-lg-6 mx-auto">
            <div class="p-5">
                <div class="text-center">
                    <p class="h6 text-gray-900 mb-4">Vui lòng nhập email để xác nhận</p>
                </div>
                @if (session('msg'))
                    <h6 class="alert alert-danger">{{ session('msg') }}</h6>
                @endif
                <form action="{{ route('reset.password.post') }}" class="user" for="login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Email..." name="email"
                            required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu:</label>
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            placeholder="Password..." name="password" value="{{ old('password') }}"
                            required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Xác nhận mật khẩu:</label>
                        <input type="password" class="form-control form-control-user"
                            placeholder="Confirm Password..." id="exampleRepeatPassword" name="password_confirmation"
                            required>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">Xác nhận</button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="{{ route('user.login') }}">Đăng nhập tài khoản!</a>
                </div>
                <div class="text-center">
                    <a class="small" href="{{ route('user.register') }}">Đăng ký tài khoản!</a>
                </div>
            </div>
        </div>
    </div>
    @include('user.layout.footer')
