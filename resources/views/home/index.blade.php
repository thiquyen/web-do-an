@extends('layout.master')
@section('content')
<?php $title = 'home' ?>
    <!-- Hero Start -->
    <div class="container-fluid  py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-start">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="font-secondary text-primary mb-4">Super Crispy</h1>
                        <h1 class="display-1 text-uppercase text-white mb-4">Delicious</h1>
                        <h1 class="text-uppercase text-white">Xin chào quý khách hàng !</h1>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                            <a href="{{ route('about') }}" class="btn btn-primary border-inner py-3 px-5 me-5">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Hero End -->
    @if(session()->has('error'))
        <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
            <div>
                <strong>X</strong>  {{ session()->get('error') }}
            </div>
        </div>
    @elseif(session()->has('success'))
        <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
            <div>
                <strong>V</strong>  {{ session()->get('success') }}
            </div>
        </div>
    @endif
    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Thực đơn và giá cả</h2>
                <h1 class="display-4 text-uppercase">Bánh mới</h1>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">
                    @foreach($dulieu as $row)
                    <li class="nav-item type-item">                   
                        <a class="nav-link text-white" href="{{ route('menu',['cate'=>$row -> id]) }}">{{$row->type_name}}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active ">
                        <!-- Products tab & slick -->
							<!-- tab -->
                            <div class="container">
                            <div class="row multiple-items ">
									<!-- product -->
                                    @foreach($data as $row)
									<div class="product mb-5 col-xs-3">
										<div class="product-img">
											<img class="newProductsImg" src="img/{{ $row-> image }}" alt="" style="margin: 0 auto">
												<div class="product-label">
                                                    @if( $row-> promotion != 0 )
                                                        <span class="sale">-{{ $row-> promotion }}%</span>
                                                    @endif
                                                    <span class="new">NEW</span>
												</div>
									    </div>
										<div class="product-body">
                                            <div class="product-btns">
												<button class="add-to-wishlist" ><a href="{{ route('wish.add',['id' => $row->id]) }}"><i class="fa fa-heart"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view" data-bs-toggle="modal" data-bs-target="#exampleModal" data-product-id="{{ $row->id }}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											
                                            </div>
											<h3 class="product-name"><a href="{{ route('thongtinsp',$row->id) }}">{{ $row-> product_name }}</a></h3>
                                            @if( $row-> promotion != 0 )
                                                <h4 class="product-price"> {{ number_format($row->sale_price,0,',','.') }} VND <del class="product-old-price">{{ number_format($row->price,0,',','.') }}</del></h4>
                                            @else
                                            <h4 class="product-price"> {{ number_format($row->price,0,',','.') }} VND</h4>
                                            @endif
											
										</div>
										<div class="add-to-cart">
                                            <a href="{{ route('cart.add',['id' => $row->id]) }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Add cart</button></a>
										</div>
									</div>
									<!-- /product -->
                                    @endforeach
							    </div>  
                            </div>
                            <!-- Products tab & slick -->
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Service Start -->
    <div class="container-fluid service position-relative px-5 mt-5" style="margin-bottom: 135px;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary border-inner text-center text-white p-5">
                        <h4 class="text-uppercase mb-3">Birthday Cake</h4>
                        <p>Bánh sinh nhật là một chiếc bánh được ăn như một phần của lễ sinh nhật. Bánh sinh nhật thường là những chiếc bánh nhiều lớp với lớp phủ mờ được trang trí với những ngọn nến nhỏ được thắp sáng trên đỉnh tượng trưng cho tuổi của chủ nhân.</p>
                        <a class="text-uppercase text-dark" href="{{ route('menu', ['cate'=> 1]) }}">Khám phá <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary border-inner text-center text-white p-5">
                        <h4 class="text-uppercase mb-3">Wedding Cake</h4>
                        <p>Là chiếc bánh không thể thiếu trong lễ kết hôn. Nó thường được phủ và trang trí bằng lớp phủ mờ. Các lớp có thể được lấp đầy bởi kem bánh ngọt. Nó có thể được đặt trên cùng bởi đồ trang trí làm từ sương mù, với hoa ăn được hoặc với các đồ trang trí khác.</p>
                        <a class="text-uppercase text-dark" href="{{ route('menu', ['cate'=> 2]) }}">Khám phá <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary border-inner text-center text-white p-5">
                        <h4 class="text-uppercase mb-3">Cookie</h4>
                        <p>Cookie là một món ăn nhẹ hoặc món tráng miệng được nướng hoặc nấu chín thường có vị ngọt. Nó thường chứa đường, trứng và một số loại chất béo hoặc bơ. Nó có thể bao gồm các thành phần khác như nho khô, socola nhỏ, các loại hạt, v.v.</p>
                        <a class="text-uppercase text-dark" href="{{ route('menu', ['cate'=> 3]) }}">Khám phá <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Start -->

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

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Thành viên của nhóm</h2>
                <h1 class="display-4 text-uppercase">Các Siêu Đầu Bếp</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                            <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="https://www.facebook.com/ciiuchinchin/"><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary">John</h4>
                            <p class="text-white m-0">Bậc Thầy Làm Bánh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary">Rouke</h4>
                            <p class="text-white m-0">Bậc Thầy Làm Bánh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary">jesica</h4>
                            <p class="text-white m-0">Bậc Thầy Làm Bánh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title position-relative text-center mx-auto mb-4 pb-3" style="max-width: 600px;">
                        <h2 class="text-white font-secondary">Xin chào mùa hè</h2>
                        <h1 class=" text-uppercase text-white">GIẢM GIÁ 30% CHO MÙA HÈ NÀY</h1>
                    </div>
                    <p class="text-white mb-4">Delicious xin gửi đến những người yêu thương sinh nhật bộ sưu tập bánh mới Hè này với chủ đề BIỂN.
                    Đặc biệt trong bộ sưu tập lần này, chúng tôi mang đến món bánh Tiramisu - món bánh gây thương nhớ cho nhiều khách hàng của 
                    Delicious, đã từng là một trong những loại bánh được ship nhiều nhất, trước khi Bánh Bơ Sầu Riêng ra đời. Ngoài ra, mỹ nhân của 
                    Summer Set này có thể kể đến món Bánh PINA COLADA được trang trí theo concept Bãi biển, chắc chắn sẽ mang đến một hương vị mới 
                    lạ cho những “khách hàng đỏng đảnh” của Delicious.</p>
                    <a href="{{ route('menu', ['cate'=> 5]) }}" class="btn btn-primary border-inner py-3 px-5 me-3">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Lời chứng thực</h2>
                <h1 class="display-4 text-uppercase">KHÁCH HÀNG CỦA CHÚNG TÔI NÓI !!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach($comment as $comm)
                <div class="testimonial-item bg-dark text-white border-inner p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid flex-shrink-0" src="./img/smile.png" style="width: 60px; height: 60px;">
                        <div class="ps-3">
                            <h4 class="text-primary text-uppercase mb-1">{{$comm->customer->customer_name}} - {{$comm->rating}} SAO</h4>
                            <span>{{$comm->created_at}}  <a href="{{ route('thongtinsp',$comm->product->id) }}">{{$comm->product->product_name}}</a></span>
                        </div>
                    </div>
                    <p class="mb-0">{{$comm->comment_content}}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông Tin Sản Phẩm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        </div>
        </div>
    </div>
    </div>
    <!-- Modal -->

@endsection