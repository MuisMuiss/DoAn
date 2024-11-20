@include('user.layout.header')
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 800px;">
                        <h1 class="text-primary">Liên hệ cho chúng tôi khi nào bạn muốn</h1>
                        <p class="mb-4">"Cần hỗ trợ tư vấn về sản phẩm hoặc giải đáp thắc mắc? Đừng ngần ngại liên hệ
                            với chúng tôi! Đội ngũ chăm sóc khách hàng luôn sẵn sàng lắng nghe và hỗ trợ bạn."<a
                                href="https://www.facebook.com/">liên hệ qua facebook</a>.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" style="height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52735.07559192087!2d106.71811559531967!3d10.7685120368261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1732066933624!5m2!1svi!2s"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form action="" class="">
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                        <input type="email" class="w-100 form-control border-0 py-3 mb-4"
                            placeholder="Enter Your Email">
                        <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"></textarea>
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                            type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Đại chỉ:</h4>
                            <p class="mb-2">65 Đ. Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Email:</h4>
                            <p class="mb-2">milkanddiapers@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Hotline:</h4>
                            <p class="mb-2">+84 984 931 615</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.layout.footer')
