@extends('layout.admin')
@section('content')
<?php $page = 'orders';?>
<!-- BREADCRUMB -->
<link rel="stylesheet" href="dist/css/phantrang.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">List of Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('success'))
    <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
      <div>
        <strong><i class="fa-solid fa-check"></i></strong>  {{ session()->get('success') }}
      </div>
    </div>
    @endif
    <!-- Main content -->
    <section class="content p-1">

      <!-- Default box -->
      <div class="card ">
        <div class="card-body p-0">
          <table class="table table-striped projects">
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
                    <td colspan ="3" class="hidden-xs text-center">Time Order: <strong>{{ $orderbtId->created_at }}</strong>
                        </td> 
                        <td colspan ="3" class="hidden-xs text-center">Total: <strong>{{ number_format($total,0,',','.') }} VND</strong>
                        </td> 
                    </tr>   
                </tfoot>              
          </table>
                
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@stop