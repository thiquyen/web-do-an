@extends('layout.master')
@section('content')
<?php $title='about' ?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">Giới Thiệu</h1>
                <a href="/">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Giới Thiệu</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Giới Thiệu</h2>
                <h1 class="display-4 text-uppercase">Welcome To Delicious</h1>
            </div>
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pb-5">
                    <p class="mb-4">Kết hợp một chiếc bánh ngọt nhỏ với cà phê hoặc trà là điều yêu thích của bạn? Thèm đồ ngọt trong ngày dài làm việc? Có một bữa tiệc với những người tự do hoặc gia đình và muốn cung cấp cho họ một hạnh phúc ngọt ngào? Bạn là một người yêu thích ẩm thực và thích khám phá sản phẩm mới?</p>
                    <h4 class="mb-5">Hãy đến với chúng tôi "Delicious Bakery". Là thương hiệu bánh ngọt Pháp thuộc công ty cổ phần bánh ngọt Delicious. Được thành lập vào năm 2021 tại một con phố nhỏ ở Thủ Đức, Việt Nam. Các sản phẩm của Delicious Bakery được làm từ nguyên liệu nhập khẩu từ các nước có truyền thống làm bánh như Newzeland, Mỹ, Pháp, Bỉ. Với hương vị thơm ngon đặc trưng của kem, bơ, sữa, phô mai, hạnh nhân, socola… dưới bàn tay khéo léo của những người thợ làm bánh giàu kinh nghiệm.</h4>
                   
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-heartbeat fa-2x text-white"></i>
                            </div>
                            <h4 class="text-uppercase">100% Nguyên Liệu Sạch</h4>
                            <p class="mb-0">Với nguyên liệu được chọn lọc kỹ càng trong từng khâu, chúng tôi đặt sức khỏe của người tiêu dùng lên hàng đầu</p>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-award fa-2x text-white"></i>
                            </div>
                            <h4 class="text-uppercase">Thành tựu</h4>
                            <p class="mb-0">Sản phẩm được 1.000 người trên thế giới tin dùng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid bg-img py-5 mb-5">
        <div class="container py-5">
            <div class="row gx-5 gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-star text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">Kinh Nghiệm Làm Bánh</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">5</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">CHUYÊN GIA LÀM BÁNH</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">3</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">HOÀN THÀNH DỰ ÁN</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">1000</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-mug-hot text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">KHÁCH HÀNG VUI VẺ</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">500</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->
    @endsection