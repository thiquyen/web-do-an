@extends('layout.admin')
@section('content')
<?php $page = 'protypes';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật trạng thái đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="" method="POST" roles="form" enctype="multipart/form-data">      
        @csrf
      <div class="row p-1">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                            <label for="inputType">Trạng thái</label>
                            <select id="inputType" name="status" class="form-control custom-select">
                            <option selected disabled>Select one</option>
                            <option value ='0'>Đang xử lí</option>
                            <option value ='1'>Đang giao hàng</option>
                            <option value ='2'>Đã nhận hàng</option>
                            </select>
                        </div>
                </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row p-1">
        <div class="col-12">
          <a href="{{ route('orders') }}" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Edit Order" class="btn btn-success float-right" >
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop