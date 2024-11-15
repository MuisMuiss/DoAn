@include('user.layout.header')

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#" style="color: black">Home</a></li>
        <li class="breadcrumb-item"><a href="#" style="color: black">Tài khoản</a></li>
    </ol>
</div>

<section>
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="">
                            <h4>Trang tài khoản</h4>
                            <hr>

                            {{-- <div class="mb-3 fruite-name text-black">
                                <a href="#" onclick="showContent('profile', this, event)">Thông tin cá nhân</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="#" onclick="showContent('orders', this, event)">Đơn hàng</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="#" onclick="showContent('changepass', this, event)">Thay đổi mật khẩu</a>
                            </div> --}}
                            <div class="mb-3 fruite-name text-black">
                                <a href="{{ route('accout.view', ['nguoi_dung_id' => Auth::id()]) }}"
                                    onclick="showContent(this)">Thông tin cá nhân</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{ route('order.view') }}" onclick="showContent(this)">Đơn hàng</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{ route('chpass.view') }}" onclick="showContent(this)">Thay đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div id="content-section">
                            <h4>Thay đổi mật khẩu</h4>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{ route('change_password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Mật khẩu hiện tại:</label>
                                    <input type="password" id="current_password" name="mat_khau"
                                        class="form-control mb-3" required>
                                    @error('mat_khau')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Mật khẩu mới:</label>
                                    <input type="password" id="new_password" name="new_password"
                                        class="form-control mb-3" required>
                                    @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Xác nhận mật khẩu mới:</label>
                                    <input type="password" id="new_password_confirmation"
                                        name="new_password_confirmation" class="form-control mb-3" required>
                                    @error('new_password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('user.layout.footer')
