@include('user.layout.header')
@php
    // Mảng trạng thái
    $trang_thai = [
        'dang_xu_ly' => 'Đang xử lý',
        'dang_giao' => 'Đang giao',
        'da_giao' => 'Đã giao',
        'da_huy' => 'Đã hủy',
    ];
    $phuong_thuc = [
        'COD' => 'Thanh toán khi nhận hàng',
        'Online' => 'Thanh toán online',
    ];
@endphp
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#" style="color: black">Home</a></li>
        <li class="breadcrumb-item"><a href="#" style="color: black">Tài khoản</a></li>
        <li class="breadcrumb-item"><a href="#" style="color: black">Đơn hàng</a></li>
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
                                            <th>Họ và tên</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày giờ đặt</th>
                                            <th>Phương thức thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$order)
                                            <h5>Chưa có đơn hàng nào</h5>
                                        @endif
                                        @foreach ($order as $o)
                                        <tr>
                                            <td>{{ $o->don_hang_id }}</td>
                                            @foreach ($user as $keybrand => $nd)
                                                @if ($o->nguoi_dung_id == $nd->nguoi_dung_id)
                                                    <td>{{ $nd->ho_ten }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $trang_thai[$o->trang_thai_don_hang] ?? 'Đang xử lý' }}</td>
                                            <td>{{ number_format($o->tong_tien, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ $o->ngay_dat }}</td>
                                            <td>{{ $phuong_thuc[$o->phuong_thuc_thanh_toan] ?? 'Thanh toán khi nhận hàng' }}</td>
                                            <td>
                                                <div
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <a href="{{ route('ctorder.view', ['don_hang_id' => $o->don_hang_id]) }}" class="btn btn-success btn-circle btn-sm"
                                                        style=" margin-right: 10px;">
                                                        <i class="fas fa-pen" style="with:5em"> Chi tiết</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
