@if ($product->isNotEmpty())
    @foreach ($product as $key => $pro)
        <div class="col-md-6 col-lg-6 col-xl-4">
            <a href="{{ route('productdetail', $pro->san_pham_id) }}">
                <div class="rounded position-relative fruite-item">
                    <div class="fruite-img">
                        <img src="{{ asset('images/product/' . $pro->hinh_anh) }}" class="img-fluid w-100 rounded-top"
                            alt="">
                    </div>
                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                        <h6>{{ $pro->ten_san_pham }}</h6>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="fw-bold mb-0" style="font-size: 1.10rem; color:red">
                                {{ number_format($pro->gia, 0, ',', '.') }}VNĐ</p>
                            <a href="{{ route('cart.add1', $pro->san_pham_id) }}"
                                class="btn border border-secondary rounded-pill px-3 text-primary" style="font-size:0.8rem"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i>Thêm giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
    <h5 class="d-flex justify-content-center mt-5">Không thấy sản phẩm phù hợp</h5>
@endif


<div class="col-12">
    <div class="d-flex justify-content-center mt-5">
        @if ($product->hasPages())
            {{ $product->appends(['keyword' => request('keyword')])->links('pagination::bootstrap-4') }}
        @else
            <ul class="pagination" style="display: flex;">
                <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                    <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">‹</a>
                </li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                        aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">›</a></li>
            </ul>
        @endif
    </div>
</div>
