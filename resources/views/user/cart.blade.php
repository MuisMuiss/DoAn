 @include('user.layout.header')

<div class="container">
    <h1 class="my-4">Giỏ Hàng</h1>

    {{-- Thông báo --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Kiểm tra nếu giỏ hàng có sản phẩm --}}
    @if(count($cart) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hình Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td>
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="width: 80px;">
                        </td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control w-50">
                                <button type="submit" class="btn btn-primary btn-sm ms-2">Cập Nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} đ</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Tổng tiền --}}
        <div class="d-flex justify-content-between align-items-center my-4">
            <h4>Tổng Cộng: <strong>{{ number_format($total, 0, ',', '.') }} đ</strong></h4>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Xóa Toàn Bộ Giỏ Hàng</button>
            </form>
        </div>

        {{-- Nút Thanh Toán --}}
        <div class="text-end">
            <a href="" class="btn btn-success">Tiến Hành Thanh Toán</a>
        </div>
    @else
        <div class="alert alert-info">
            Giỏ hàng của bạn đang trống.
        </div>
        <a href="" class="btn btn-primary">Tiếp Tục Mua Sắm</a>
    @endif
</div>

@include('user.layout.footer')