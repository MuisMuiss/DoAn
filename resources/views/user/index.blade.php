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


<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">100% Hàng chính hãng</h4>
                <h1 class="mb-5 display-3 text-primary">Sữa & Tã</h1>
                <div class="position-relative mx-auto">
                    <form method="GET" action="{{ route('find') }}">
                        <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" name="key"
                            type="text" placeholder="Search">


                        <button type="submit"
                            class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                            style="top: 0; right: 25%;">Submit Now</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="assets/user/img/qc1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded"
                                alt="First slide">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="assets/user/img/qc2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="assets/user/img/qc3.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Free Shipping</h5>
                        <p class="mb-0">Miễn phí cho đơn hàng trên 1triệu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Thanh toán bảo mật</h5>
                        <p class="mb-0">100% Thanh toán bảo mật</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Hoàn trả trong 30 ngàyn</h5>
                        <p class="mb-0">Đảm bảo tiền 30 ngày</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Hỗ trợ 24/7</h5>
                        <p class="mb-0">Hỗ trợ nhanh chóng mọi lúc</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->


{{-- <!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Sữa và Tã</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 130px;">Sữa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                <span class="text-dark" style="width: 130px;">Tã</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($product as $key => $pro)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <a href="{{ route('productdetail', $pro->san_pham_id) }}">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('images/product/' . $pro->hinh_anh) }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                @foreach ($brand_product as $keybrand => $brand)
                                                    @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                            style="top: 10px; left: 10px;">
                                                            {{ $brand->ten_thuong_hieu }}</div>
                                                    @endif
                                                @endforeach
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h6 style="font-family: 'Arial', sans-serif;">
                                                        {{ $pro->ten_san_pham }}</h6>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="fw-bold mb-0" style="font-size: 1.10rem; color:red">
                                                            {{ number_format($pro->gia, 0, ',', '.') }}VNĐ</p>
                                                        <a href="{{ route('cart.add1', $pro->san_pham_id) }}"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                                            to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End--> --}}
<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Products</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex py-2 m-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-2">
                                <span class="text-dark" style="width: 130px;">Tất cả</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                <span class="text-dark" style="width: 130px;">Sữa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                <span class="text-dark" style="width: 130px;">Tã</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-2" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($product as $key => $pro)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <a href="{{ route('productdetail', $pro->san_pham_id) }}">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('images/product/' . $pro->hinh_anh) }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                @foreach ($brand_product as $keybrand => $brand)
                                                    @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                            style="top: 10px; left: 10px;">
                                                            {{ $brand->ten_thuong_hieu }}</div>
                                                    @endif
                                                @endforeach
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h6 style="font-family: 'Arial', sans-serif;">
                                                        {{ $pro->ten_san_pham }}</h6>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="fw-bold mb-0" style="font-size: 1.10rem; color:red">
                                                            {{ number_format($pro->gia, 0, ',', '.') }}VNĐ</p>
                                                        <a href="{{ route('cart.add1', $pro->san_pham_id) }}"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                                            to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($product as $key => $pro)
                                    @if ($pro->danh_muc_id == 1)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <a href="{{ route('productdetail', $pro->san_pham_id) }}">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('images/product/' . $pro->hinh_anh) }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                @foreach ($brand_product as $keybrand => $brand)
                                                    @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                            style="top: 10px; left: 10px;">
                                                            {{ $brand->ten_thuong_hieu }}</div>
                                                    @endif
                                                @endforeach
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h6 style="font-family: 'Arial', sans-serif;">
                                                        {{ $pro->ten_san_pham }}</h6>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="fw-bold mb-0" style="font-size: 1.10rem; color:red">
                                                            {{ number_format($pro->gia, 0, ',', '.') }}VNĐ</p>
                                                        <a href="{{ route('cart.add1', $pro->san_pham_id) }}"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                                            to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-4" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($product as $key => $pro)
                                    @if ($pro->danh_muc_id == 2)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <a href="{{ route('productdetail', $pro->san_pham_id) }}">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('images/product/' . $pro->hinh_anh) }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                @foreach ($brand_product as $keybrand => $brand)
                                                    @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                            style="top: 10px; left: 10px;">
                                                            {{ $brand->ten_thuong_hieu }}</div>
                                                    @endif
                                                @endforeach
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h6 style="font-family: 'Arial', sans-serif;">
                                                        {{ $pro->ten_san_pham }}</h6>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="fw-bold mb-0" style="font-size: 1.10rem; color:red">
                                                            {{ number_format($pro->gia, 0, ',', '.') }}VNĐ</p>
                                                        <a href="{{ route('cart.add1', $pro->san_pham_id) }}"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                                            to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<!-- Fruits Shop End-->

<!-- Featurs Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-secondary rounded border border-secondary">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-primary text-center p-4 rounded">
                                <h5 class="text-white">Sữa</h5>
                                <h3 class="mb-0">100% Chính hãng</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#">
                    <div class="service-item bg-dark rounded border border-dark">
                        <div class="px-4 rounded-bottom">
                            <div class="service-content bg-light text-center p-4 rounded">
                                <h5 class="text-primary">Tã</h5>
                                <h3 class="mb-0">100% Chính hãng</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
<!-- Featurs End -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Sản phẩm mới</h1>
        </div>
        <div class="row g-4">
            @foreach ($product as $key => $pro)
                @if ($pro->sp_moi == 1)
                <div class="col-lg-6 col-xl-4" style="margin-left: 10px; width: 32.3333333333%;">
                    <div class="rounded bg-light position-relative" style="border:1px solid #81c408; border-radius: 25px;">
                        <div class="text-white bg-danger px-3 py-1 rounded position-absolute" 
                             style="top: 10px; left: 10px; font-weight: bold; font-size: 14px;">
                            New
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6">
                                <a href="{{ route('productdetail', $pro->san_pham_id) }}">
                                    <img src="{{ asset('images/product/' . $pro->hinh_anh) }}" class="img-fluid w-100" alt="">
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('productdetail', $pro->san_pham_id) }}" class="h5">{{ $pro->ten_san_pham }}</a>
                                <h5 class="mb-3" style="color: red">
                                    {{ number_format($pro->gia, 0, ',', '.') }} VNĐ
                                </h5>
                                <a href="{{ route('cart.add1', $pro->san_pham_id) }}" 
                                   class="btn border border-secondary rounded-pill px-3 text-primary">
                                   <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Vesitable Shop End -->


<!-- Banner Section Start-->
<div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Khuyến mãi lớn</h1>
                    <p class="fw-normal display-3 text-dark mb-4">Chỉ có tại Sữa & Tã</p>
                    <p class="mb-4 text-dark">Khi bạn mua đơn hàng giá trị trên 1 triệu đồng bạn sẽ được khuyến mãi
                        giao hàng tận nơi.</p>
                    {{-- <a href="#"
                        class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="assets/user/img/baner-1.png" class="img-fluid w-100 rounded" alt="">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                        style="width: 140px; height: 140px; top: 0; left: 0;">
                        <h1 style="font-size: 100px;">1</h1>
                        <div class="d-flex flex-column">
                            <span class="h2 mb-0">triệu</span>
                            <span class="h4 text-muted mb-0">bill</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->


<!-- Bestsaler Product Start -->

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Sản phẩm Bestseller</h1>
        </div>
        <div class="row g-4">
            @foreach ($product as $key => $pro)
                @if ($pro->sp_bestseller == 1)
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center" style="border:1px solid #81c408;border-radius: 25px;">
                        <a href="{{ route('productdetail', $pro->san_pham_id) }}">
                            <img src="{{ asset('images/product/' . $pro->hinh_anh) }}" class="img-fluid w-100" alt="">
                        </a>
                        <div class="py-4">
                            <a href="{{ route('productdetail', $pro->san_pham_id) }}" class="h6">{{ $pro->ten_san_pham }}
                                <h5 class="mb-3" style="color: red">{{ number_format($pro->gia, 0, ',', '.') }} VNĐ</h5>
                            <a href="{{ route('cart.add1', $pro->san_pham_id) }}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- Bestsaler Product End -->



@include('user.layout.footer')
