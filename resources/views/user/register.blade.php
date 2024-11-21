@include('user.layout.header')
    <!-- Navbar End -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#" style="color: black">Home</a></li>
            <li class="breadcrumb-item"><a href="#" style="color: black">Đăng ký tài khoản</a></li>
        </ol>
    </div>
    <div class="customer-form">
        <div class="page_title">
            <div class="page-title text-center">
                <h1>Đăng ký tài khoản</h1>
            </div>
        </div>
        @if (session('status'))
            <h5 class="alert alert-success">{{ session('status') }}</h5>
        @endif
        <div class="col-lg-7 mx-auto">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h6 text-gray-900 mb-4">Hãy đăng ký tài khoản!!!</h1>
                </div>
                <form class="user" method="POST" action="{{ route('user.register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="ho_ten" class="form-control form-control-user"
                            id="exampleInputName" placeholder="Họ & tên" value="{{ old('ho_ten') }}" required>
                        {{-- @error('ho_ten')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="email" name="email" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="so_dien_thoai" class="form-control form-control-user"
                                id="exampleInputPhone" placeholder="Số điện thoại"
                                value="{{ old('so_dien_thoai') }}" required>
                            @error('so_dien_thoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="mat_khau" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Mật khẩu" value="{{ old('mat_khau') }}"
                                required>
                            @error('mat_khau')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="mat_khau_confirmation"
                                class="form-control form-control-user" id="exampleRepeatPassword"
                                placeholder="Lặp lại mật khẩu" required>
                            @error('mat_khau_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Đăng ký tài khoản
                    </button>
                    <hr>
                    <a href="#" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Đăng ký với Google
                    </a>
                    <a href="#" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Đăng ký với Facebook
                    </a>
                </form>

                <hr>
                <div class="text-center">
                    <a class="small" href="{{ route('user.login') }}">Đã có tài khoản? Đăng nhập!</a>
                </div>
            </div>
        </div>
    </div>
    @include('user.layout.footer')
