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
                            {{-- <div class="mb-3 fruite-name text-black">
                                <a href="{{ route('accout.view', ['nguoi_dung_id' => Auth::id()]) }}" onclick="showContent(this)">Thông tin cá nhân</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{route('order.view')}}" onclick="showContent(this)">Đơn hàng</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{route('chpass.view')}}" onclick="showContent(this)">Thay đổi mật khẩu</a>
                            </div> --}}
                            <div class="mb-3 fruite-name text-black">
                                <a href="{{ route('accout.view', ['nguoi_dung_id' => Auth::id()]) }}"
                                 style="color: red">Thông tin cá nhân</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{ route('order.view') }}"  id="order-tab">Đơn hàng</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{ route('chpass.view') }}" id="chpass-tab">Thay đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="content-section" id="account">
                            <h4>Thông tin tài khoản</h4>
                            <hr>
                            <div class="card-body">
                                <form
                                    action="{{ route('accout.update', ['nguoi_dung_id' => $nguoiDung->nguoi_dung_id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <img id="avatarPreview"
                                            src="{{ $nguoiDung->avatar ? asset('images/avatar/' . $nguoiDung->avatar) : asset('assets/admin/img/undraw_profile.svg') }}"
                                            width="100px" height="100px"
                                            style="border-radius: 50%; border: 2px solid black;">
                                        <input type="file" name="avatar" class="form-control" id="avatarInput"
                                            style="width:10%; margin-top: 10px;">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Họ và tên:</label>
                                        <input type="text" name="ho_ten" id="" class="form-control"
                                            value="{{ old('ho_ten', $nguoiDung->ho_ten) }}">
                                        @error('ho_ten')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Email:</label>
                                        <input type="email" name="email" id="" class="form-control"
                                            value="{{ old('email', $nguoiDung->email) }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Số điện thoại:</label>
                                        <input type="text" name="so_dien_thoai" id="" class="form-control"
                                            value="{{ old('so_dien_thoai', $nguoiDung->so_dien_thoai) }}">
                                        @error('so_dien_thoai')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Địa chỉ:</label>
                                        <input type="text" name="dia_chi" id="" class="form-control"
                                            value="{{ old('dia_chi', $nguoiDung->dia_chi) }}">
                                        @error('dia_chi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @method('POST')
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById('avatarInput').addEventListener('change', function(event) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            // Cập nhật ảnh hiển thị
                                            document.getElementById('avatarPreview').src = e.target.result;
                                        };
                                        // Đọc tệp hình ảnh được chọn
                                        reader.readAsDataURL(event.target.files[0]);
                                    });
                                </script>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('user.layout.footer')
