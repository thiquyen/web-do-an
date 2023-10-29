@extends('layout.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container-fluid about py-5">
                <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">Lựa chọn tuyệt vời</h2>
                    <h1 class="display-4 text-uppercase">{{ $thongtinsp -> product_name  }}</h1>
                </div>
            <div class="container">
                <!-- row -->
                <div class="row">
                        <!--  Details -->
                        <div class="col-md-6">
                            <div class="billing-details">
                                <div class="product-img">
                                    <img src="/img/{{ $thongtinsp -> image  }}" >
                                </div>
                            </div>
                            <!--  Details -->
                        </div>
                        <!-- Order Details -->
                        <div class="col-md-6 order-details">
                            <div class="section-title text-center">
                                <h3 class="title">Chi tiết sản phẩm</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>Giá</strong></div>
                                    <div><h5 class="text-primary">{{ number_format($thongtinsp -> price,0,',','.')  }} VND</h5></div>
                                </div>
                                <div class="order-products">
                                    <div class="order-col">
                                        <div><strong>Loại bánh</strong></div>
                                        <div><strong>{{ $thongtinsp ->protype-> type_name  }}</strong></div>
                                    </div>
                                    <form action="{{route('cart.add',['id' => $thongtinsp->id])}}" method="get">
                                        <div class="order-col">
                                            <div><strong>Số Lượng Mua</strong></div>
                                            <div><input id="quantity" name="quantity" type="number" min="0" class="form-control" placeholder="Số Lượng" ></div>
                                        </div>
                                    <div class="order-col">
                                        <div><strong>Hạn dử dụng</strong></div>
                                        <div><span class="badge bg-primary"><strong>{{ $thongtinsp ->expiry  }} Ngày</strong></span> </div>
                                    </div>
                                    <div class="order-col">
                                        <div><strong>Đánh giá</strong></div>
                                        <div>
                                        <ul class="list-inline ngoisao" title="Average Rating">
                                        @for ($count=1; $count <= 5; $count++)
                                            @php
                                                if($count<=$sosao){
                                                    $color = 'color:#ffcc00;';
                                                }
                                                else{
                                                    $color = 'color:#ccc;';
                                                }
                                            @endphp
                                            <li title="star_rating" class="ngoisao" style="display: inline-block;cusor:pointer; {{$color}};font-size:30px;">&#9733;</li>
                                        @endfor
                                        </ul>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                                        <input name="submit" type="submit" value="Add to cart" class="btn btn-primary border-inner py-3 px-5 me-5">
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="payment-method">
                                <h4 class="title">Mô Tả</h4></br>
                                <p><?php echo $thongtinsp -> description ?></p>
                            </div>
                        </div>
					<!-- /Order Details -->
                    </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
         <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Lời chứng thực</h2>
                <h1 class="display-4 text-uppercase">Khách hàng đánh giá!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-dark text-white border-inner p-4">
                <div class="align-items-center mb-3">
                    <div class="container razz">
                        <div id="rating-container">
                            <div class="rating" data-rating="1" name="rating" value="1" onclick=rate(1)>★</div>
                            <div class="rating" data-rating="2" name="rating" value="2" onclick=rate(2)>★</div>
                            <div class="rating" data-rating="3" name="rating" value="3" onclick=rate(3)>★</div>
                            <div class="rating" data-rating="4" name="rating" value="4" onclick=rate(4)>★</div>
                            <div class="rating" data-rating="5" name="rating" value="5" onclick=rate(5)>★</div>
                        </div>
                    </div>
                    @if(Auth::guard('cus')->check())  
                        <h4 class="text-primary text-uppercase mb-1">{{ Auth::guard('cus')->user()->customer_name }}</h4>
                        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{Auth::guard('cus')->user()->id}}">
                        <input type="hidden" class="form-control" id="customer_name" name="customer_name" value="{{Auth::guard('cus')->user()->customer_name}}">
                    @else
                        <h4 class="text-primary text-uppercase mb-1">Tài khoản khách</h4>
                    @endif 
                    <textarea type="text" class="form-control" id="comment_content" name="comment_content" cols="auto" rows="3" placeholder="Nhập nội dung (*)" required ></textarea>
                    <div id="commentHelp" class="form-text mb-3">Bình luận của bạn sẽ được thấy bởi tất cả mọi người, hãy là một người thưởng thức vị ngon văn minh</div>
                      
                    @if(Auth::guard('cus')->check()) 
                        <button id="btn-comment" type="button" class="btn btn-primary" data-product-id="{{ $thongtinsp->id }}" data-url="{{ route('comments.store') }}">Gửi bình luận</button>
                    @else
                        <button class="btn btn-primary" type="button" disabled >Gửi bình luận</button>
                    @endif 
                    </div>         
                </div>
                <div id="show-comment" class="overflow-auto" style="max-height:300px; ">
                    @foreach($comments as $comment)
                    <div class="testimonial-item text-white border-inner p-4" style="background-color:#905ddc !important">
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-fluid flex-shrink-0" src="{{url('/img/smile.png')}}" style="width: 60px; height: 60px;">
                            <div class="ps-3">
                                <h4 class="text-white text-uppercase mb-1" >{{$comment->customer_name}}</h4>
                                <span>{{$comment->rating}} Sao</span>
                            </div>
                        </div>
                        <p class="mb-0">{{$comment->comment_content}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Các sản phẩm tương tự</h2>
            </div>
            <div class="tab-class text-center">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active ">
                        <!-- Products tab & slick -->
							<!-- tab -->
                            <div class="row multiple-items ">
									<!-- product -->
                                    @foreach($sp_cungloai as $row)
									<div class="product mb-5 col-xs-3">
										<div class="product-img">
											<img class="newProductsImg" src="/img/{{ $row-> image }}" alt="" style="margin: 0 auto">
												<div class="product-label">
                                                    @if( $row-> promotion != 0 )
                                                        <span class="sale">-{{ $row-> promotion }}%</span>
                                                    @endif
                                                    <span class="new">NEW</span>
												</div>
									    </div>
										<div class="product-body">
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
                            <!-- Products tab & slick -->
					</div>
                </div>
            </div>
        </div>
    </div>
@endsection