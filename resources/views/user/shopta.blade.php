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
    @foreach($cate_shops as $cate)
        <h1 class="mb-4"><a  href="{{ route('index') }}" >Home . </a>{{$cate->ten_loaisp}}</h1>
        @endforeach
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                  
                    <div class="col-6"></div>
                    <div class="col-xl-3">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                            <label for="fruits">Sắp xếp mặc định:</label>
                            <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                form="fruitform">
                                <option value="volvo">Ngẫu nhiên</option>
                                <option value="saab">Sản phẩm mới</option>
                                <option value="opel">Giá cao - thấp</option>
                                <option value="audi">Giá thấp - cao</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">

                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            @foreach ($cate_product as $cate)
                                            @if($cate->danh_muc_id==2)

                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{route('go.shop',$cate->loai_sp_id)}}"><i
                                                        class="fas fa-apple-alt me-2"></i>{{ $cate->ten_loaisp }}</a>
                                                <span>//</span>
                                            </div>

                                            @endif


                                            @endforeach
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4 class="mb-2">Giá</h4>
                                    <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                        min="0" max="500" value="0"
                                        oninput="amount.value=rangeInput.value">
                                    <output id="amount" name="amount" min-velue="0" max-value="500"
                                        for="rangeInput">0</output>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Thương hiệu</h4>
                                    @foreach ($brand_product as $brand)


                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="{{route('go.brand',$brand->thuong_hieu_id)}}"><i
                                                class="fas fa-apple-alt me-2"></i>{{ $brand->ten_thuong_hieu }}</a>
                                        <span>//</span>
                                    </div>




                                    @endforeach

                                </div>
                            </div>
                            @include('user.productmoi')
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="assets/user/img/banner-fruits.jpg" class="img-fluid w-100 rounded"
                                        alt="">
                                    <div class="position-absolute"
                                        style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                        @include('user.product')

                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <a href="#" class="rounded">&laquo;</a>
                                    <a href="#" class="active rounded">1</a>
                                    <a href="#" class="rounded">2</a>
                                    <a href="#" class="rounded">3</a>
                                    <a href="#" class="rounded">4</a>
                                    <a href="#" class="rounded">5</a>
                                    <a href="#" class="rounded">6</a>
                                    <a href="#" class="rounded">&raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->
@include('user.layout.footer')