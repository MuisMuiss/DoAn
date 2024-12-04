@include('user.layout.header')
<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Checkout</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Thanh toán</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="form-item">
                        <label class="form-label my-3">Họ và tên<sup>*</sup></label>
                        <input type="text" class="form-control" name="name"
                            value="{{ Auth::user()->ho_ten ?? '' }}" readonly>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Email<sup>*</sup></label>
                        <input type="email" class="form-control" name="email"
                            value="{{ Auth::user()->email ?? '' }}" placeholder="..." readonly>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                        <input type="text" class="form-control" name="phone"
                            value="{{ Auth::user()->so_dien_thoai ?? '' }}" readonly>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ<sup>*</sup></label>
                        <input type="text" class="form-control" name="address"
                            value="{{ Auth::user()->dia_chi ?? '' }}" readonly>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="{{ asset('images/product/' . $item->hinh_anh) }}"
                                                    style="width: 90px; height: 90px;" alt="">
                                            </div>
                                        </th>
                                        <td class="py-5">{{ $item->ten_san_pham }}</td>
                                        <td class="py-5">{{ number_format($item->gia, 0, ',', '.') }} VNĐ</td>
                                        <td class="py-5">{{ $item->so_luong }}</td>
                                        <td class="py-5">
                                            {{ number_format($item->gia * $item->so_luong, 0, ',', '.') }} VNĐ
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th scope="row"></th>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        
                                    </td>
                                    <td class="py-5">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="py-3 border-bottom border-top">
                        <p class="mb-0 text-dark">Tổng số tiền cần phải thanh toán: 
                            <span class="text-danger">{{ number_format($total, 0, ',', '.') }} VNĐ</span></p>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="radio" class="form-check-input bg-primary border-0"
                                    id="payment_method_cod" name="payment_method" value="COD" required>
                                <label class="form-check-label" for="payment_method_cod">Thanh toán khi nhận hàng
                                    (COD)</label>
                            </div>
                            <div class="form-check text-start my-3">
                                <input type="radio" class="form-check-input bg-primary border-0"
                                    id="show-account-info" name="payment_method" value="Online" required>
                                <label class="form-check-label" for="payment_method_online">Thanh toán qua tài khoản
                                    ngân hàng/Online</label>
                            </div>
                            <div id="account-info" style="display: none;">
                                <h4>Thông tin tài khoản</h4>
                                <p>Số tài khoản: 1234 5678 9101</p>
                                <p>Ngân hàng: Vietcombank</p>
                            </div>
                            <script>
                                document.getElementById('show-account-info').addEventListener('click', function() {
                                    const accountInfo = document.getElementById('account-info');
                                    accountInfo.style.display = accountInfo.style.display === 'none' ? 'block' : 'none';
                                });
                            </script>
                        </div>
                    </div>
                    <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="cartItems" value="{{ json_encode($cartItems) }}">
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Thanh
                            toán</button>
                        
                    </div>
                    {{-- <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="cartItems" value="{{ json_encode($cartItems) }}">

                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <!-- Button thanh toán COD -->
                        <button id="btn_cod" type="submit" name="payment_method" value="COD"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
                            Thanh toán khi nhận hàng
                        </button>

                        <!-- Form thanh toán VnPay -->
                        <form action="{{ route('vn') }}" method="POST" id="btn_online">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $total }}">
                            <input type="hidden" name="bank_code" value="NCB">
                            <button type="submit" name="payment_method" value="Online"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
                                Thanh toán VnPay
                            </button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Checkout Page End -->
@include('user.layout.footer')
