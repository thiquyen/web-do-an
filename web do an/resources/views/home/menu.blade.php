@extends('layout.master')
@section('content')
<?php $title = 'menu';?>

    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Thực đơn & Giá cả</h2>
                <h1 class="display-4 text-uppercase">Các loại bánh</h1>
            </div>
            <div class="row">
                <div class="col-md-2 pt-2">
                    @php
                        $category_id = [];
                        $category_arr = [];

                        if(isset($_GET['cate'])){
                            $category_id = $_GET['cate'];
                        }else{
                            $category_id = $name->category_id.",";
                        }
                        $category_arr = explode(",",$category_id);
                    @endphp

                    @foreach($dulieu as $cate)
                        <label class="checkbox-inline">
                            <input  type="checkbox" {{ in_array($cate->id,$category_arr) ? 'checked' : '' }}
                            class="category-filter form-control-checkbox"
                             name="category-filter" value="{{ $cate->id }}" 
                             data-filters="category" >
                            {{ $cate->type_name }} ({{$cate->products->count()}})
                        </label>
                    @endforeach
                </div>
                <div class="hienthisp col-md-10 ">
                    <div class="list-product row">
                    @foreach($sp_theoloai as $sp)
                        <div class="product mb-5 col-xs-3 col-md-4">
							<div class="product-img">
								<img class="hinhphone" src="../img/{{ $sp-> image }}" alt="" >
									<div class="product-label">
                                    @if( $sp-> promotion != 0 )
                                    <span class="sale">-{{ $sp-> promotion }}%</span>
                                    @endif
									</div>
							</div>
							<div class="product-body">
                                <div class="product-btns">
                                <button class="add-to-wishlist" ><a href="{{ route('wish.add',['id' => $sp->id]) }}"><i class="fa fa-heart"></i></a><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view" data-bs-toggle="modal" data-bs-target="#exampleModal" data-product-id="{{ $sp->id }}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
									<h3 class="product-name"><a href="{{ route('thongtinsp',$sp->id) }}">{{ $sp-> product_name }}</a></h3>
                                    @if( $sp-> promotion != 0 )
                                    <h4 class="product-price"> {{ number_format($sp->sale_price,0,',','.') }} VND <del class="product-old-price">{{ number_format($sp->price,0,',','.') }}</del></h4>
                                    @else
                                    <h4 class="product-price"> {{ number_format($sp->price,0,',','.') }} VND</h4>
                                    @endif
								</div>
								<div class="add-to-cart">
									<a href="{{ route('cart.add',['id' => $sp->id]) }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
								</div>
							</div>       
                    @endforeach
                    <div class="clearfix pt-3 pl-3">
                        {{$sp_theoloai->links()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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
                </div>
            </div>
        </div>
    
    <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active ">
                    <!-- Products tab & slick -->
						<!-- tab -->
                        <div class="container">
                            <div class="row multiple-items ">
									<!-- product -->
                                    @foreach($giamgia as $row)
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