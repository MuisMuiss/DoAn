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
                            <h4>Đơn hàng của bạn</h4>
                            <hr>
                            <div>
                                <table class="table table-bordered dataTable" id="table">
                                    <thead class="thead-default">
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng giá trị đơn hag</th>
                                            <th>Ngày đặt</th>
                                            <th>Địa chỉ nhận hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Chưa có đơn hàng nào</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('user.layout.footer')