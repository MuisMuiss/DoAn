@include('user.layout.header')
@php
    $tongTien = 0;
@endphp
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive" style="margin-top:100px">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng giá</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        @php
                            $tongTien += $item->product->gia * $item->so_luong; // Cộng dồn tiền từng sản phẩm
                        @endphp
                        {{-- <tr>
                            <td>
                                <img src=" {{ asset('images/product/' . $item->product->hinh_anh) }}"
                                    style="width: 80px;">
                            </td>
                            <td>{{ $item->product->ten_san_pham }}</td>
                            <td>{{ number_format($item->price) }} đ</td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->so_luong }}" min="1"
                                        class="form-control w-50">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Cập Nhật</button>
                                </form>
                            </td>
                            <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ</td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr> --}}
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src=" {{ asset('images/product/' . $item->product->hinh_anh) }}"
                                        style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">{{ $item->product->ten_san_pham }}</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">{{ number_format($item->product->gia, 0, ',', '.') }} đ</p>
                            </td>
                            <td>
                                <form class="mb-0 mt-4" action="{{ route('cart.update', $item->gio_hang_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('POST') <!-- Xác định phương thức là POST -->
                                    <label for="so_luong">Số lượng:</label>
                                    <input type="number" id="so_luong" name="so_luong" value="{{ $item->so_luong }}"
                                        min="1" max="{{ $item->product->so_luong_kho }}" required>
                                    <button type="submit" class="btn btn-info">Cập nhật</button>
                                </form>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">
                                    {{ number_format($item->product->gia * $item->so_luong, 0, ',', '.') }}VNĐ</p>
                            </td>
                            <td>
                                <form class="mb-0 mt-4" action="{{ route('cart.delete', $item->gio_hang_id) }}"
                                    method="GET" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <p class="mb-0 mt-4" style="color: red; font-size:1.15rem;font-weight: 600;">
                                Tổng tiền: {{ number_format($tongTien, 0, ',', '.') }}VNĐ</p>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <form action="{{ route('cart.clear') }}"
                                onsubmit="return confirm('Bạn có chắc chắn muốn dọn dẹp giỏ hàng?')">
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa toàn bộ giỏ hàng</button>

                            </form>
                        </td>
                        <td>
                            <a href="{{ route('cart.checkout') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Thanh toán</button>
                            </a>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>
@include('user.layout.footer')
