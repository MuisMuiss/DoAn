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

@foreach ($detail_product as $key => $pro)
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Chi tiết sản phẩm</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item active text-white"><a href="{{ route('index') }}">Home</a></li>
            <li class="breadcrumb-item active text-white"><a
                    href="{{ route('go.shop', $pro->loai_sp_id) }}">{{ $pro->ten_loaisp }}</a></li>
            <li class="breadcrumb-item active text-white">{{ $pro->ten_san_pham }}</li>
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
                            <div class="border rounded text-center">
                                @if ($product_images->isNotEmpty())
                                    <img id="mainImage"
                                        src="{{ asset('images/product/' . $product_images->first()->album_sp) }}"
                                        class="img-fluid rounded" alt="Main Image">
                                @else
                                    <img src="{{ asset('images/product/' . $pro->hinh_anh) }}" class="img-fluid rounded"
                                        alt="Image">
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <div class="col-12 d-flex justify-content-center flex-wrap">
                                    @foreach ($product_images as $image)
                                        <img src="{{ asset('images/product/' . $image->album_sp) }}"
                                            class="img-thumbnail m-2 small-image" alt="Thumbnail"
                                            style="width: 100px; cursor: pointer;"
                                            onclick="changeMainImage('{{ asset('images/product/' . $image->album_sp) }}')">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <h4 class="fw-bold mb-3">{{ $pro->ten_san_pham }}</h4>


                            <p class="fw-bold mb-3">Loại sản phẩm: {{ $pro->ten_loaisp }}</p>
                            @foreach ($brand_product as $keybrand => $brand)
                                @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                                    <p class="fw-bold mb-3">Brand: {{ $brand->ten_thuong_hieu }}</p>
                                @endif
                            @endforeach
                            <h5 class="fw-bold mb-3" style="color: red">{{ number_format($pro->gia, 0, ',', '.') }} VND
                            </h5>


                            <!-- //   <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p> -->
                            <form action="{{ route('cart.add', $pro->san_pham_id) }}" method="POST">
                                @csrf
                                <label class="fw-bold" for="so_luong">Số lượng:</label>
                                <input type="number" id="so_luong" name="so_luong" value="1" min="1"
                                    max="{{ $pro->so_luong_kho }}" required>
                                <button type="submit"
                                    class="btn border border-secondary rounded-pill px-3 text-primary">Add to
                                    cart</button>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Mô tả
                                        sản phẩm</button>

                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    <p>{!! $pro->mo_ta !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                        <h1 class="display-4">Sản phẩm Bestseller</h1>
                    </div>
                    <div class="row g-4">
                        @foreach ($products as $key => $pro)
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
        </div>
    </div>
@endforeach
<script>
    // click để đổi ảnh
    function changeMainImage(imageUrl) {
        document.getElementById('mainImage').src = imageUrl;
    }
    let images = [
        @foreach ($product_images as $image)
            "{{ asset('images/product/' . $image->album_sp) }}",
        @endforeach
    ];
    let currentIndex = 0;
    // Hàm tự động đổi ảnh 3s thì đổi và lặp lại
    function changeImage() {
        currentIndex = (currentIndex + 1) % images.length;
        document.getElementById('mainImage').src = images[currentIndex];
    }
    setInterval(changeImage, 3000);
</script>
<!-- Single Product End -->
@include('user.layout.footer')
