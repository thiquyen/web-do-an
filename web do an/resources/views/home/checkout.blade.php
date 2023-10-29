@extends('layout.master')
@section('content')

	@if(session()->has('success'))
		<div class="alert alert-success d-flex align-items-center mt-3" role="alert">
		<div>
			<strong><i class="fa-solid fa-check"></i></strong> {{ session()->get('success') }}
		</div>
		</div>
	@endif
	<!-- SECTION -->
		<div class="section mt-5">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-7">
						<form action="" method="post">
						@csrf
						<!-- Billing Details -->
						<div class="row billing-details">
							<div class="mb-3">
								<h3 class="title">Địa chỉ thanh toán</h3>
							</div>
							<div class="col-8 mb-3">
								<label for="name" class="form-label">Họ và tên</label>
								<input class="form-control" type="text" id="name" name="first-name" placeholder="Your Name" value="{{ Auth::guard('cus')->user()->customer_name }}">
							</div>
							<div class="col-8 mb-3">
								<label for="email" class="form-label">Email</label>
								<input class="form-control" type="email" id="email" name="email" placeholder="exam@email.com" value="{{ Auth::guard('cus')->user()->email }}">
							</div>
							<div class="col-8 mb-3">
								<label for="address" class="form-label">Địa chỉ nhà</label>
								<input class="form-control" type="text" name="address" placeholder="Your Address" value="{{ Auth::guard('cus')->user()->address }}">
							</div>
							<div class="col-8 mb-3">
								<label for="phone" class="form-label">Số điện thoại</label>
								<input class="form-control" type="tel" name="phone" placeholder="Telephone" value="{{ Auth::guard('cus')->user()->phone }}">
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="col-8 mb-3">
							<label for="Notes" class="form-label">Ghi chú</label>
							<textarea class="form-control" name="order_note" id="Notes" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details mt-5">
						<div class="section-title text-center " style="max-height=400px">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>SẢN PHẨM</strong></div>
								<div><strong>TỔNG CỘNG</strong></div>
							</div>
                            
							<div class="order-products">
                            @foreach($cart->items as  $item)
								<div class="order-col">
                               
									<div>{{ $item['quantity'] }}x {{ $item['product_name'] }}</div>
									<div>{{ number_format($item['price']*$item['quantity'],0,',','.') }} VND</div>
								</div>
                            @endforeach
							</div>
							<div class="order-col">
								<div>Phí giao hàng</div>
								<div><strong>Miễn Phí</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Thành tiền</strong></div>
								<div><strong class="order-total">{{number_format($cart ->total_price,0,',','.')}}VND</strong></div>
							</div>
						</div>
						@if($cart ->total_price == 0) 
						<button type="submit" class="btn btn-primary order-submit "  disabled>Đặt hàng</button>
						@else
						<button type="submit" class="btn btn-primary order-submit ">Đặt hàng</button>
						@endif
					</div>
					</form>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@stop