<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-primary mb-0">Sữa & Tã</h1>
                        <p class="text-secondary mb-0">Fresh products</p>
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Hãy yên tâm mua hàng</h4>
                    <p class="mb-4">Hãy yên tâm mua hàng của chúng tôi vì ở đây chúng tôi nói không với hàng giả, hàng kém chất lượng</p>
                    <a href="{{route('contact')}}" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Liên hệ</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Hướng dẫn</h4>
                    <a class="btn-link" href="#">Chọn sản phẩm mình muốn mua</a>
                    <a class="btn-link" href="#">Click vào và chọn số lượng</a>
                    <a class="btn-link" href="#">Thêm vào giỏ hàng</a>
                    <a class="btn-link" href="#">Nhấn nút thanh toán</a>
                    <a class="btn-link" href="#">Chọn phương thức thanh toán</a>
                    <a class="btn-link" href="#">Nhấn nút Thanh toán</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Chính sách hoàn trả</h4>
                    <a class="btn-link" href="">Vui lòng khi nhận hàng hãy quay video</a>
                    <a class="btn-link" href="">liên hệ shop qua zalo "0984931615"</a>
                    <a class="btn-link" href="">Báo cáo tình trạng kèm video</a>
                    <a class="btn-link" href="">Chúng tôi sẽ xử lý nhanh nhất có thể</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Thông tin</h4>
                    <p>Address: 65 Đ. Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam</p>
                    <p>Email: milkanddiapers@gmail.com</p>
                    <p>Phone: +84 984931615</p>
                    <p>Payment Accepted</p>
                    <img src="/assets/user/img/payment.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/user/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/user/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('assets/user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/user/js/main.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
@if (Session::has('ok'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('ok')}}",
            showHideTransition: 'slide',
            icon: 'success',
            position:'top-center'
        })
    </script>
@endif
@if (Session::has('no'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('no')}}",
            showHideTransition: 'slide',
            icon: 'error',
            position:'top-center'
        })
    </script>
@endif
@if (Session::has('dk'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('dk')}}",
            showHideTransition: 'slide',
            icon: 'success',
            position:'top-center'
        })
    </script>
@endif
@if (Session::has('noE'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('noE')}}",
            showHideTransition: 'slide',
            icon: 'error',
            position:'top-center'
        })
    </script>
@endif
@if (Session::has('update'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('update')}}",
            showHideTransition: 'slide',
            icon: 'success',
            position:'top-center'
        })
    </script>
@endif
@if (Session::has('mk'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('mk')}}",
            showHideTransition: 'slide',
            icon: 'error',
            position:'top-center'
        })
    </script>
@endif
</body>

</html>
