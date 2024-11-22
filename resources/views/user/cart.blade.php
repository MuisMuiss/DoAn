@include('user.layout.header')

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive" style="margin-top:100px">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <!-- <tr>
        <td>
            <img src=" {{ asset('images/product/' . $item->product->hinh_anh) }}" style="width: 80px;">
        </td>
        <td>{{ $item->product->ten_san_pham }}</td>
        <td>{{ number_format($item->price) }} đ</td>
        <td>
            <form action="" method="POST">
                @csrf
                <input type="number" name="quantity" value="{{ $item->so_luong }}" min="1" class="form-control w-50">
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
    </tr> -->
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
                                <p class="mb-0 mt-4">
                                    {{ number_format($item->product->gia * $item->so_luong, 0, ',', '.') }}đ</p>
                            </td>
                            <td>
                                <form class="mb-0 mt-4" action="{{ route('cart.update', $item->gio_hang_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('POST') <!-- Xác định phương thức là POST -->
                                    <label for="so_luong">Số lượng:</label>
                                    <input type="number" id="so_luong" name="so_luong" value="{{ $item->so_luong }}"
                                        min="1" max="{{ $item->product->so_luong_kho }}" required>
                                    <button type="submit">Cập nhật</button>
                                </form>
                            </td>

                            <td>
                                <form class="mb-0 mt-4" action="{{ route('cart.delete', $item->gio_hang_id) }}"
                                    method="GET" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                    @csrf
                                    <button type="submit">Xóa</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <form action="{{ route('cart.clear') }}"
                                onsubmit="return confirm('Bạn có chắc chắn muốn dọn dẹp giỏ hàng?')">
                                @csrf
                                <button type="submit">Dọn dẹp giỏ hàng</button>

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
