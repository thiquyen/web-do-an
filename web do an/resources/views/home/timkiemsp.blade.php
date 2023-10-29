@extends('layout.master')
@section('content')
    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Tìm kiếm</h2>
                <h1 class="display-4 text-uppercase">Sản phẩm với từ khóa "{{$key}}"</h1>
            </div>
            <div class="row">
                <div class="hienthisp col-md-12 ">
                    <div class="list-product row">
                    <?php if(isset($timkiem)): ?>
                    @foreach($timkiem as $sp)
                        <div class="product mb-5 col-xs-3 col-md-3">
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
                    <?php endif; ?>
                    <div class="clearfix pt-3 pl-3">
                        {{$timkiem->appends(request()->all())->links()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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