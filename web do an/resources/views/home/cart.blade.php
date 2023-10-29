@extends('layout.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
    <div class="container-fluid about py-5">
		<div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Kiểm tra & Thanh toán</h2>
                <h1 class="display-4 text-uppercase">Giỏ Hàng Của Bạn</h1>
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
                            <th style="width:10%">Thao Tác</th> 
                        </tr> 
                    </thead> 
                    @if($cart ->total_price > 0)
                    <tbody>
                        <?php $n = 1; ?>
                        @foreach($cart->items as  $item)
                        <tr> 
                            <td>{{$n}}</td>
                            <td data-th="Image"> 
                                    <div class="col-sm-2 hidden-xs"><img src="{{ asset('/img') }}/{{ $item['image'] }}" style="width: 80px" alt="">
                                    </div>  
                            </td>
                            <td data-th="Product"> 
                                    <div class="col-sm-10"> 
                                        <h4 class="nomargin"><a href="{{ route('thongtinsp',$item['id']) }}">{{ $item['product_name'] }}</a></h4>  
                                    </div> 
                            </td>
                            <td data-th="Price">{{ number_format($item['price'],0,',','.') }} VND</td>   
                            <td data-th="Quantity">
                                <form action="{{ route('cart.update',['id' => $item['id']]) }}" method="get">
                                    <input type="number" name="quantity" class="form-control" value="{{ $item['quantity'] }}">  
                            </td> 
                            <td data-th="Thanhtien">{{ number_format($item['price']*$item['quantity'],0,',','.') }} VND</td>   
                            <td class="actions" data-th="">
                                <button type="sumbit" value="Update" class="btn  btn-info btn-sm"><i class="fas fa-pencil-alt pr-2 pl-1 text-white"></i></button>
                                </form>
                                <a href="{{ route('cart.remove',['id' => $item['id']]) }}"><button class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        <?php $n++ ?>
                        @endforeach                 
                    </tbody>
                        @else
                        <tbody>
                            <td colspan="7" class="text-center p-5"><h4>Không có sản phẩm nào trong giỏ hàng của bạn</h4></td>
                        </tbody> 
                        @endif         
                    <tfoot> 
                        <tr>
                            <td></td>
                            <td colspan ="2"><a  href="{{ route('home.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Mua tiếp</a>
                            </td> 
                            <td colspan ="2" class="hidden-xs text-center">Thành tiền: <strong>{{number_format($cart ->total_price,0,',','.')}} VND</strong>
                            </td> 
                            <td colspan ="2"><a href="{{ route('checkout') }}" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                            </td> 
                        </tr> 
                    </tfoot> 
            </table>
        </div>
    </div>
</div>
@stop