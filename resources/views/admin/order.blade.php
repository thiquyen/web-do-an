@extends('layout.admin')
@section('content')
<?php $page = 'orders';?>
  <!-- Content Wrapper. Contains page content -->
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
                      <th style="width: 1%">ID</th>
                      <th style="width: 15%">Name</th>
                      <th style="width: 10%">Email</th>
                      <th style="width: 10%">Phone</th>
                      <th style="width: 15%">Address</th>
                      <th style="width: 10%">Notes</th>
                      <th style="width: 10%">Detail</th>
                      <th style="width: 10%">Status</th>
                      <th style="width: 9%">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($order as $orders)
                  <tr>
                      <td>{{ $orders->id }}</td>
                      <td>
                          <a>{{ $orders->cus->customer_name }}</a>
                      </td>
                      <td>
                          <a>{{ $orders->email }}</a>
                      </td>
                      <td>
                          <a>{{ $orders->phone }}</a>
                      </td>
                      <td>
                          <a>{{ $orders->address }}</a>
                      </td>
                      <td>
                          <a>{{ $orders->order_note }}</a>
                      </td>
                      <td><span class="badge bg-info"><a class="text-white" href="{{ route('order_detail',['id'=>$orders->id]) }}">Hiển thị</a></span></td>	
                      @if($orders->status == 0)
										    <td><span class="badge bg-warning text-white">Chờ xác nhận</span></td>
                      @elseif($orders->status == 1)
										    <td><span class="badge bg-success text-white">Đang giao hàng</span></td>
                      @elseif($orders->status == 2)
										    <td><span class="badge bg-primary text-white">Đã Nhận Hàng</span></td>
										  @endif
                      <td class="project-actions ">
                          <a class="btn btn-info btn-sm" href="{{ route('editOrder',['id'=>$orders->id]) }}">
                              <i class="fas fa-pencil-alt pr-2 pl-1"></i>Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('del_order',['id'=> $orders->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                              <i class="fas fa-trash"></i>Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>             
          </table>
          <div class="clearfix pt-3 pl-3">
          {{$order->links()}}
          </div>

                
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop