@extends('layout.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
    <div class="container-fluid about py-5">
		<div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Chi tiết đơn hàng</h2>
                <h1 class="display-4 text-uppercase">Đơn hàng của bạn</h1>
            </div>
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
        <div class="container"> 
            <table id="cart" class="table table-hover table-condensed"> 
                <thead> 
                <tr> 
                    <th style="width:10%">STT</th>
                    <th style="width:10%">Ảnh sản phẩm</th>  
                    <th style="width:25%">Tên sản phẩm</th> 
                    <th style="width:15%">Giá</th> 
                    <th style="width:10%">Số lượng</th> 
                    <th style="width:15%">Tổng Tiền</th> 
                </tr> 
                </thead> 
                <tbody>
                    <?php $n = 1; $total = 0 ?>
                    @foreach($orderdetalbyId as $item)
                    <tr> 
                        <td>{{$n}}</td>
                        <td data-th="Image"> 
                                <div class="col-sm-2 hidden-xs"><img src="{{ asset('/img') }}/{{ $item->pro->image }}" style="width: 80px" alt="">
                                </div>  
                        </td>
                        <td data-th="Product"> 
                                <div class="col-sm-10"> 
                                    <h4 class="nomargin">{{ $item->pro->product_name }}</h4>  
                                </div> 
                        </td>
                        <td data-th="Price">{{ number_format($item['price'],0,',','.') }} VND</td>   
                        <td data-th="Quantity">{{ $item['quantity'] }}</td> 
                        <td data-th="Thanhtien">{{ number_format($item['price']*$item['quantity'],0,',','.') }} VND</td>   
                    </tr>
                    <?php $n++; $total+= $item['price']*$item['quantity'] ?>
                    @endforeach
                    
                </tbody>         
        <tfoot> 
            <tr>
            <td colspan ="3" class="hidden-xs text-center">Thời gian đặt hàng: <strong>{{ $orderbtId->created_at }}</strong>
                </td> 
                <td colspan ="3" class="hidden-xs text-center">Thành tiền: <strong>{{ number_format($total,0,',','.') }} VND</strong>
                </td> 
            </tr> 
        </tfoot> 
        </table>
</div>
@stop