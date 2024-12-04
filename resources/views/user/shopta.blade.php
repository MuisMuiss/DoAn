@include('user.layout.header')
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
    <h1 class="text-center text-white display-6">Thế Giới Tả </h1>

</div>
<!-- Single Page Header End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        @foreach ($cate_shops as $cate)
            <h1 class="mb-4"><a href="{{ route('index') }}">Home . </a>{{ $cate->ten_loaisp }}</h1>
        @endforeach
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-9">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <form id="priceRangeForm" method="GET"
                                    action="{{ route('go.shop', ['cate' => $cate_shops->first()->loai_sp_id ?? '']) }}">
                                    <div class="row align-items-end">
                                        <!-- Nhập giá thấp nhất -->
                                        <div class="col-md-3" style="width:20%">
                                            <h5>Tìm kiếm theo giá:</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="minPrice" class="form-label">Giá từ</label>
                                            <input type="number" class="form-control" id="minPrice" name="minPrice"
                                                placeholder="Nhập giá thấp nhất" min="0" required>
                                        </div>
                                        <!-- Nhập giá cao nhất -->
                                        <div class="col-md-3">
                                            <label for="maxPrice" class="form-label">Đến giá</label>
                                            <input type="number" class="form-control" id="maxPrice" name="maxPrice"
                                                placeholder="Nhập giá cao nhất" min="0" required>
                                        </div>
                                        <!-- Nút tìm kiếm -->
                                        <div class="col-md-3">
                                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                                            <button type="submit" class="btn btn-primary mt-2 w-50">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <form action="{{ route('go.shop', $cate) }}" method="GET" id="fruitform">
                            <input type="hidden" name="minPrice" value="{{ request('minPrice') }}">
                            <input type="hidden" name="maxPrice" value="{{ request('maxPrice') }}">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Sắp xếp mặc định:</label>
                                <select id="fruits" name="sort" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform" onchange="this.form.submit()">
                                    <option value="random" {{ request('sort') == 'random' ? 'selected' : '' }}>Ngẫu
                                        nhiên</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Sản phẩm
                                        mới</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                        Giá cao - thấp</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                        Giá thấp - cao</option>
                                </select>
                            </div>
                        </form>
                    </div>

                </div>
                <hr>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Loại sản phẩm</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            @foreach ($cate_product as $cate)
                                                @if ($cate->danh_muc_id == 2)
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{ route('go.shop', $cate->loai_sp_id) }}"><i
                                                                class="fas fa-cart-arrow-down me-3"></i>
                                                            {{ $cate->ten_loaisp }}</a>
                                                        <span>||</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Thương hiệu</h4>
                                    @foreach ($brand_product as $brand)
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="{{ route('go.brand', $brand->thuong_hieu_id) }}"><i
                                                    class="far fa-hand-point-right me-3"></i>{{ $brand->ten_thuong_hieu }}</a>
                                            <span>||</span>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            @include('user.product')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.productmoi')
    </div>
</div>
<script>
    function prepareSortingForm() {
        const minPriceInput = document.querySelector('#hiddenMinPrice');
        const maxPriceInput = document.querySelector('#hiddenMaxPrice');
        if (!minPriceInput.value.trim()) minPriceInput.disabled = true;
        if (!maxPriceInput.value.trim()) maxPriceInput.disabled = true;
        document.querySelector('#fruitform').submit();
    }
</script>
<!-- Fruits Shop End-->
@include('user.layout.footer')
