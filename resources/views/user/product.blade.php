@foreach ($product as $key => $pro)

                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <a href="{{route('productdetail',$pro->san_pham_id)}}">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{asset('images/product/'.$pro->hinh_anh)}}"
                                                class="img-fluid w-100 rounded-top" alt="">
                                        </div>

                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{$pro->ten_san_pham}}</h4>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$pro->gia}}đ</p>
                                                <a href="#"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach