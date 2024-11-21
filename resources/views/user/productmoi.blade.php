<div class="col-lg-12">
                                <h4 class="mb-3">Sản phẩm nổi bật</h4>

                                <div class="d-flex align-items-center justify-content-start">
                                    @foreach($products as $pro)

                                    @if($pro->sp_moi==1)
                                    <a href="{{route('productdetail',$pro->san_pham_id)}}">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="{{asset('images/product/'.$pro->hinh_anh)}}" class="img-fluid rounded"
                                            alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">{{$pro->ten_san_pham}}</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">{{$pro->gia}}</h5>
                                            <h5 class="text-danger text-decoration-line-through"></h5>
                                        </div>
                                    </div></a>
                                    @endif
                                    @endforeach

                                </div>
                            </div>
