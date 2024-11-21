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
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

@foreach ($detail_product as $key => $pro)
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Chi tiết sản phẩm</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-white"><a href="{{ route('index') }}">Home</a></li>
        <li class="breadcrumb-item active text-white"><a href="{{route('go.shop',$pro->loai_sp_id)}}">{{$pro->ten_loaisp}}</a></li>
        <li class="breadcrumb-item active text-white">{{$pro->ten_san_pham}}</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Single Product Start -->

<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="{{asset('images/product/'.$pro->hinh_anh)}}" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <h4 class="fw-bold mb-3">{{$pro->ten_san_pham}}</h4>


                        <p class="mb-3">Loại sản phẩm: {{$pro->ten_loaisp}}</p>
                        @foreach($brand_product as $keybrand => $brand)
                        @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                        <p class="mb-3">Brand: {{$brand->ten_thuong_hieu}}</p>
                        @endif
                        @endforeach
                        <h5 class="fw-bold mb-3">{{number_format($pro->gia)}} VND</h5>

                        <p class="mb-4">{{$pro->mo_ta}}</p>
                        <!-- //   <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p> -->
                        <form action="{{ route('cart.add', $pro->san_pham_id) }}" method="POST">
                            @csrf
                            <label for="so_luong">Số lượng:</label>
                            <input type="number" id="so_luong" name="so_luong" value="1" min="1" max="{{ $pro->so_luong_kho }}" required>
                            <button type="submit">Thêm vào giỏ hàng</button>
                        </form>
                    </div>

                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.
                                    Susp endisse ultricies nisi vel quam suscipit </p>
                                <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish filefish Antarctic
                                    icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray sweeper.</p>
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">1 kg</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Country of Origin</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Agro Farm</p>
                                                </div>
                                            </div>
                                            <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Quality</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Organic</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Сheck</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">Healthy</p>
                                                </div>
                                            </div>
                                            <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Min Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">250 Kg</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="assets/user/img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="assets/user/img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <h1 class="fw-bold mb-0">Sản phẩm liên quan</h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach($products as $pros)

                @if($pro->loai_sp_id== $pros->loai_sp_id )
                <a href="{{route('productdetail',$pro->san_pham_id)}}">
                    <div class="border border-primary rounded position-relative vesitable-item">


                        <div class="vesitable-img">
                            <img src="{{asset('images/product/'.$pros->hinh_anh)}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;"></div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>{{$pros->ten_san_pham}}</h4>
                            <p>Thông tin cơ bản</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">Giá</p>
                                <a href="{{ route('cart.add1', $pros->san_pham_id) }}" method="POST" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>




                    </div>
                </a>
                @endif

                @endforeach

            </div>
        </div>
    </div>
</div>

@endforeach

<!-- Single Product End -->
@include('user.layout.footer')