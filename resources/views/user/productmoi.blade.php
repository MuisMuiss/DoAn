
    <h4 class="mb-3">Sản phẩm mới</h4>

    <div class="tab-content">
    <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($products as $key => $pro)
                           @if($pro->sp_moi==1)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <a href="{{route('productdetail',$pro->san_pham_id)}}">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('images/product/'.$pro->hinh_anh)}}" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            @foreach($brand_product as $keybrand => $brand)
                                            @if ($pro->thuong_hieu_id == $brand->thuong_hieu_id)
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$brand->ten_thuong_hieu}}</div>
                                            @endif
                                            @endforeach
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h6 style="font-family: 'Arial', sans-serif;">{{$pro->ten_san_pham}}</h6>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="fw-bold mb-0" style="font-size: 1.10rem; color:red">{{number_format($pro->gia,0, ',', '.')}}VNĐ</p>
                                                    <a href="{{ route('cart.add1', $pro->san_pham_id) }}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>Add to cart</a>
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
