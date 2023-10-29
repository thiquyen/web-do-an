<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cake - Nhóm 12</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/css/bootstrap.min.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Stylesheet -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/slick.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">ĐỊA CHỈ EMAIL</h6>
                        <span class="pe-2">deliciouscakesy@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-primary border-inner pt-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="{{ route('home.index')}}" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white mb-3"><i class="fa fa-mug-hot text-white"></i> Delicious</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-secondary py-4 pt-4">
                <div class="d-inline-flex align-items-center justify-content-center">
                    @if(Auth::guard('cus')->check())
                    <h5><i class="fa-solid fa-user text-primary"></i><a href="{{ route('thongtinkh',Auth::guard('cus')->user()->id) }}"> {{ Auth::guard('cus')->user()->customer_name }}</a></h5>
                    <div class="text-start ps-5">
                        <a href="{{ route('home.logout') }}"><h5 class="text-uppercase"><i class="fa-solid fa-right-from-bracket fs-3 text-danger exit-account"></i></h5></a>
                    </div>
                    <div class="text-start ps-5">
                        <a href="{{ route('wish.view') }}"><h5 class="text-uppercase"><i class="fa fa-heart fs-3 wishList"></i></h5></a>
                    </div>
                    @else 
                    <div class="text-start">
                        <a href="{{ route('home.login') }}"><h5 class="text-uppercase"><i class="fa fa-users fs-3 text-primary "></i> Đăng Nhập</h5></a>
                    </div>
                    <div class="text-start ps-5">
                        <a href="{{ route('home.register') }}"><h5 class="text-uppercase"><i class="fa fa-edit fs-3 text-primary"></i> Đăng Kí</h5></a>
                    </div>
                    @endif
                    <a href="#" id="cart"><i class="fa fa-shopping-cart fs-3 text-primary ms-5 " ></i></a>
                    <div class="text-start">
                        <a href="{{route('cart.view')}}" ><h5 class="text-uppercase"><span class="badge">{{$cart ->total_quantity}}</span></h5></a>
                    </div> 
                    <div class="shop-down">
                        <div class="shopping-cart">
                            <div class="shopping-cart-header  pb-3">
                                <i class="fa fa-shopping-cart  cart-icon text-primary"><span class="badge">{{$cart ->total_quantity}}</span></i>
                                <div class="shopping-cart-total">
                                        <span class="lighter-text">Thành tiền:</span>
                                        <span class="main-color-text">{{number_format($cart ->total_price,0,',','.')}} VND</span>
                                </div>
                            </div>
                            <div class="shop-item-card ">
                                @foreach($cart->items as $item)
                                <div class="shopping-cart-items">
                                    <div class="row">
                                        <div class="col-5">
                                            <img src="{{ asset('/img') }}/{{ $item['image'] }}" alt="" width="100px">
                                        </div>
                                        <div class="cartField col-7">
                                            <h5>{{ $item['product_name'] }}</h5>
                                            <h6>{{ number_format($item['price'],0,',','.') }} VND</h6>
                                            <p>Số lượng: {{ $item['quantity'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-6"><a href="{{route('cart.view')}}" class="button-viewcart" value="">Giỏ hàng</i></a> </div>
                                <div class="col-6"><a href="{{route('checkout')}}" class="button-checkout" value="">Thanh toán <i class="fa fa-arrow-circle-right"></i></a></div>
                            </div>
                       
                        </div> <!--end shopping-cart -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="{{route('home.index')}}" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3 "></i>Delicious</h1>
        </a>
        @if(Auth::guard('cus')->check())
        <a href="{{ route('home.logout') }}" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa-solid fa-right-from-bracket text-danger"></i></h1>
        </a>
        @else
        <a href="{{ route('home.login') }}" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa-solid fa-user"></i></h1>
        </a>
        @endif
        <a href="{{route('cart.view')}}" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fas fa-shopping-cart"></i></h1>
        </a>
        <button class="navbar-toggler mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="{{route('home.index')}} " class="nav-item nav-link <?php if(isset($title) && $title=='home'){echo 'active';} ?>">Trang chủ</a>
                <a href="{{ route('about')}}" class="nav-item nav-link <?php if(isset($title) && $title=='about') {echo 'active';} ?>">Giới thiệu</a>
                <a href="{{ route('menu',['cate'=> 1]) }}" class="nav-link nav-link <?php if(isset($title) && $title=='menu'){echo 'active';} ?>" >Thực đơn
                <a href="{{ route('team')}}" class="nav-item nav-link <?php if(isset($title) && $title=='team') {echo 'active';} ?>" >Đầu bếp</a>
                <a href="{{ route('contact')}}" class="nav-item nav-link <?php if(isset($title) && $title=='contact') {echo 'active';} ?> pe-5">Liên Hệ</a>
                <nav class="navbar">
                    <form action="{{route('timkiemsp')}}" method="get" class="d-flex"  >
                        <input class="form-control me-1" style="width: 300px !important" type="search" placeholder="Tìm kiếm..." aria-label="Search" oninput="searchProduct(this.value)" name="key">
                        <div id="search-result" class="result-search"></div>
                        <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>   
                    </form>
                </nav>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

        @yield('content');
    
    <script src="{{ asset('/js/ajax.js') }}"></script>
    <!-- Footer Start -->
    <div class="container-fluid bg-img text-secondary" style="margin-top: 90px">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 mb-lg-n5">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary border-inner p-4">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>Delicious</h1>
                        </a>
                        <p class="mt-3">Bạn là người yêu cái đẹp và thích sự ngọt ngào. Hãy đến với Delicious, chúng tôi sẽ mang đến cho bạn những khoảnh khắc khó quên với những chiếc bánh kỳ diệu. Một điều khác, Delicious Bakery tự hào về dịch vụ chăm sóc khách hàng đặc biệt và sự quan tâm đến từng chi tiết đối với các loại bánh mà chúng tôi sẽ phục vụ.</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <h4 class="text-primary text-uppercase mb-4">Liên lạc</h4>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">4/4 Đường Linh Đông, TP.Thủ Đức, Việt Nam</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">deliciouscakesy@gmail.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+012 345 67890</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-primary text-uppercase mb-4">Đường Dẫn Nhanh</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-secondary mb-2" href="{{ url('/')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Trang Chủ</a>
                                <a class="text-secondary mb-2" href="{{ url('/about')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Giới Thiệu</a>
                                <a class="text-secondary mb-2" href="{{ url('/team')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Gặp Gỡ Đầu Bếp</a>
                                <a class="text-secondary" href="{{ url('/contact')}}"><i class="bi bi-arrow-right text-primary me-2"></i>Liên Hệ Chúng Tôi</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-primary text-uppercase mb-4">Thông Báo Mới</h4>
                            <p>Để lại email của bạn để được nhận thông báo mới nhất từ chúng tôi</p>
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control border-white p-3" placeholder="Email của bạn...">
                                    <button class="btn btn-primary">Đồng Ý</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-secondary py-4" style="background: #111111;">
        <div class="container text-center">
			<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
			Designed by Nhom 12</p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <button  class="btn btn-primary border-inner py-3 fs-4 back-to-top" onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-arrow-up"></i></button>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    
    <!-- Template Javascript -->
 
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script  src="{{ asset('/js/btt.js') }}"></script>
    <script  src="{{ asset('/js/slick.js') }}"></script>

    <script type="text/javascript">
           $('.category-filter').click(function(){
                var category = [],tempArray = [];

                $.each($("[data-filters='category']:checked"),function(){
                    tempArray.push($(this).val());
                   
                });
                tempArray.reverse();
                if(tempArray.length !== 0){
                    category += '?cate=' + tempArray.toString();
                }
                window.location.href = category;
            });
    </script>
</body>

</html>