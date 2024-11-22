@include('admin.autth.layout')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Sửa đơn hàng</h3>
                    </div>
                    @if (session('success'))
                        <h5 class="alert alert-success">{{ session('success') }}</h5>
                    @endif
                    <div class="card-body">
                        <form action="{{route('admin.updateorder', ['don_hang_id' => $order->don_hang_id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Họ và tên:</label>
                                <select name="nguoi_dung_id" class="form-control" readonly>
                                    @foreach ($user as $key => $cate)
                                        <option value="{{ $cate->nguoi_dung_id }}"
                                            {{ old('nguoi_dung_id', $order->nguoi_dung_id) == $cate->nguoi_dung_id ? 'selected' : '' }}>
                                            {{ $cate->ho_ten }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Trạng thái đơn hàng:</label>
                                <select name="trang_thai_don_hang" class="form-control">
                                    <option value="chao_xu_ly"
                                        {{ old('trang_thai_don_hang', $order->trang_thai_don_hang) == 'dang_xu_ly' ? 'selected' : '' }}>
                                        Đang xử lý</option>
                                    <option value="dang_giao"
                                        {{ old('trang_thai_don_hang', $order->trang_thai_don_hang) == 'dang_giao' ? 'selected' : '' }}>
                                        Đang giao</option>
                                    <option value="da_giao"
                                        {{ old('trang_thai_don_hang', $order->trang_thai_don_hang) == 'da_giao' ? 'selected' : '' }}>
                                        Đã giao</option>
                                    <option value="da_huy"
                                        {{ old('trang_thai_don_hang', $order->trang_thai_don_hang) == 'da_huy' ? 'selected' : '' }}>
                                        Đã hủy</option>
                                </select>
                                @error('trang_thai_don_hang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Phương thức thanh toán:</label>
                                <select name="phuong_thuc_thanh_toan" class="form-control">
                                    <option value="COD"
                                        {{ old('phuong_thuc_thanh_toan', $order->phuong_thuc_thanh_toan) == 'COD' ? 'selected' : '' }}>
                                        Thanh toán khi nhận hàng</option>
                                    <option value="Online"
                                        {{ old('phuong_thuc_thanh_toan', $order->phuong_thuc_thanh_toan) == 'Online' ? 'selected' : '' }}>
                                        Chuyển khoản</option>
                                </select>
                                @error('phuong_thuc_thanh_toan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('order.all') }}" class="btn btn-danger float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
