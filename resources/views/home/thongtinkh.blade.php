@extends('layout.master')
@section('content')

	<!-- SECTION -->
		<div class="section mt-5">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				@if(session()->has('success'))
					<div class="alert alert-success d-flex align-items-center mt-3" role="alert">
					<div>
						<strong><i class="fa-solid fa-check"></i></strong>  {{ session()->get('success') }}
					</div>
					</div>
					@endif
					<div class="col-md-7">
						<form action="" method="POST">
						@csrf
						<!-- Billing Details -->
						<div class="row billing-details">
							<div class="mb-3">
								<h3 class="title">Thông tin cá nhân</h3>
							</div>
							<div class="col-8 mb-3">
								<label for="name" class="form-label">Họ và tên</label>
								<input class="form-control" type="text" id="name" name="customer_name" placeholder="Your Name" value="{{ Auth::guard('cus')->user()->customer_name }}">
								@if($errors->has('customer_name'))
                                    <p style="color:red"> {{$errors->first('customer_name') }} !!!</p>
                                @endif
							</div>
							<div class="col-8 mb-3">
								<label for="email" class="form-label">Địa chỉ Email</label>
								<input class="form-control" type="email" id="email" name="email" placeholder="exam@email.com" value="{{ Auth::guard('cus')->user()->email }}" readonly>
							</div>
							<div class="col-8 mb-3">
								<label for="address" class="form-label">Địa chỉ</label>
								<input class="form-control" type="text" name="address" placeholder="Your Address" value="{{ Auth::guard('cus')->user()->address }}">
								@if($errors->has('address'))
                                    <p style="color:red"> {{$errors->first('address') }} !!!</p>
                                @endif
							</div>
							<div class="col-8 mb-3">
								<label for="phone" class="form-label">Số điện thoại</label>
								<input class="form-control" type="tel" name="phone" placeholder="Telephone" value="{{ Auth::guard('cus')->user()->phone }}">
								@if($errors->has('phone'))
                                    <p style="color:red"> {{$errors->first('phone') }} !!!</p>
                                @endif
							</div>
						</div>
						<button type="submit" class="btn btn-primary order-submit ">Cập nhật thông tin</button>
						</form>
						<!-- /Billing Details -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center ">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<table id="cart" class="table table-hover table-condensed"> 
								<thead> 
									<tr> 
										<th style="width:25%">Mã Đơn</th>
										<th style="width:20%">Trạng Thái</th>  
										<th style="width:30%">Ngày Đặt</th>  
										<th style="width:25%">Chi Tiết </th> 
									</tr> 
								</thead> 
								<tbody>
									@foreach($orderbycustomer as $item)
									<tr>
										<td>{{ $item['id'] }}</td>
										@if($item['status'] == 0)
										    <td><span class="badge bg-warning text-white">Chờ xác nhận</span></td>
                      					@elseif($item['status'] == 1)
										    <td><span class="badge bg-success text-white">Đang giao hàng</span></td>
                      					@elseif($item['status'] == 2)
										    <td><span class="badge bg-primary text-white">Đã Nhận Hàng</span></td>
										@endif
										<td>{{ $item['created_at'] }}</td>
										<td><span class="badge bg-info"><a class="text-white" href="{{ route('thongtindh',$item['id']) }}">Hiển thị</a></span></td>	
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@stop