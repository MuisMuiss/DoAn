@include('user.layout.header')

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#" style="color: black">Home</a></li>
        <li class="breadcrumb-item"><a href="#" style="color: black">Tài khoản</a></li>
        <li class="breadcrumb-item"><a href="#" style="color: black">Chi tiết đơn hàng</a></li>
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
                            <h4>Chi tiết đơn hàng</h4>
                            <hr>
                            <div>
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1">Mã đơn hàng</th>
                                            <th rowspan="1" colspan="1">Hình ảnh</th>
                                            <th rowspan="1" colspan="1">Tên sản phẩm</th>
                                            <th rowspan="1" colspan="1">Số lượng</th>
                                            <th rowspan="1" colspan="1">Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ct_order as $cto)
                                            <tr>
                                                <td>{{ $cto->don_hang_id }}</td>
                                                @if (isset($product[$cto->san_pham_id]))
                                                    <td>
                                                        <img src="{{ asset('images/product/' . $product[$cto->san_pham_id]->hinh_anh) }}"
                                                            alt="Product Image" style="width: 90px; height: 90px;">
                                                    </td>
                                                    <td>{{ $product[$cto->san_pham_id]->ten_san_pham }}</td>
                                                @else
                                                    <td>Không tìm thấy sản phẩm</td>
                                                    <td>Không tìm thấy sản phẩm</td>
                                                @endif
                                                <td>{{ $cto->so_luong }}</td>
                                                <td>{{ number_format($cto->gia_don_vi, 0, ',', '.') }} VNĐ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <a href="{{ route('order.view') }}" class="btn btn-success btn-circle btn-sm"
                                    style=" margin-right: 10px;">
                                    <i class="fas" style="with:5em"> Quay lại</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('user.layout.footer')
