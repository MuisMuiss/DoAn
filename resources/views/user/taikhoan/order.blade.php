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
                            <div class="mb-3 fruite-name text-black">
                                <a href="{{ route('accout.view', ['nguoi_dung_id' => Auth::id()]) }}">Thông tin cá
                                    nhân</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{ route('order.view') }}" style="color: red">Đơn hàng</a>
                            </div>
                            <div class="mb-3 fruite-name">
                                <a href="{{ route('chpass.view') }}">Thay đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-9">
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
                    </div> --}}
                    <div class="col-lg-9">
                        <div class="orders-container">
                            <h4>Đơn hàng của bạn</h4>
                            <hr>
                            @forelse ($orders as $order)
                                <div class="order">
                                    <div class="order-header">
                                        <p><strong>Mã đơn hàng:</strong> {{ $order->don_hang_id }}</p>
                                        <p><strong>Ngày đặt:</strong> {{ date('d/m/Y', strtotime($order->ngay_dat)) }}
                                        </p>
                                        <p><strong>Trạng thái:</strong>
                                            {{ $trang_thai[$order->trang_thai_don_hang] ?? 'Đang xử lý' }}</p>
                                    </div>
                                    <div class="order-items fw-bold">
                                        @foreach ($order->orderItems as $item)
                                            <div class="item">
                                                <img src="{{ asset('images/product/' . $item->product->hinh_anh) }}"
                                                    alt="{{ $item->product->ten_san_pham }}" class="product-image">
                                                <div class="item-info ">
                                                    <p>{{ $item->product->ten_san_pham }}</p>
                                                    <p>Số lượng: {{ $item->so_luong }}</p>
                                                    <p style="color: red">
                                                        {{ number_format($item->gia_don_vi, 0, ',', '.') }} VNĐ</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="order-header" style="display: flex;">
                                        <p><strong>Phươn thức thanh toán:</strong>
                                            {{ $phuong_thuc[$order->phuong_thuc_thanh_toan] }}</p>
                                        <p style="color: red"><strong style="color: #747d88">Tổng tiền:
                                            </strong>{{ number_format($order->tong_tien, 0, ',', '.') }} VNĐ</p>
                                        <form class="mb-0 mt-4"
                                            action="{{ route('deleteOrder', ['don_hang_id' => $order->don_hang_id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng không?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                                        </form>
                                    </div>

                                </div>
                            @empty
                                <p>Bạn chưa có đơn hàng nào.</p>
                            @endforelse
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-11">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    
                                        {{ $orders->appends(['keyword' => request('keyword')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .orders-container {
        width: 90%;
        max-width: 1200px;
    }

    .order {
        border: 1px solid #dfd7d7;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 15px;
    }

    .order-header,
    .order-footer {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .order-items {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .item {
        display: flex;
        border: 1px solid #b8b4b4;
        border-radius: 5px;
        padding: 10px;
        flex: 1;
        max-width: 300px;
    }

    .product-image {
        width: 80px;
        height: 80px;
        border: 1px solid #ebe7e7;
        object-fit: cover;
        margin-right: 10px;
    }

    .item-info {
        flex: 1;
    }

    .order-items .item {
        flex: 1 1 calc(33.33% - 10px);
        max-width: calc(33.33% - 10px);
    }
</style>
@include('user.layout.footer')
