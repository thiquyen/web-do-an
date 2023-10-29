@extends('layout.admin')
@section('content')
<?php $page = 'products';?>
  <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" href="dist/css/phantrang.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of products</li>
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
                      <th style="width: 5%">ID</th>
                      <th style="width: 10%">Name</th>
                      <th style="width: 10%">Image</th>
                      <th style="width: 13%">Price</th>
                      <th style="width: 9%">Promotion</th>
                      <th style="width: 13%">Sale Price</th>
                      <th style="width: 25%">Description</th>
                      <th style="width: 5%">Protype</th>
                      <th style="width: 5%">Expipy</th>
                      <th style="width: 5%">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($data as $product)
                  <tr>
                      <td>{{ $product->id }}</td>
                      <td>
                          <a>{{ $product->product_name }}</a>
                      </td>
                      <td><img src="../../img/{{ $product->image }}" style="width: 150px" alt=""></td>
                      <td class="project_progress">{{ number_format($product->price,0,',','.') }} VND</td>
                      <td class="project_progress">{{ $product->promotion }}%</td>
                      <td class="project_progress">{{ number_format($product->sale_price,0,',','.') }} VND</td>
                      <td class="project_progress"><?php echo $product->description ?></td>
                      <td class="project_progress">{{ $product->type_id }}</td>
                      <td class="project_progress">{{ $product->expiry }}</td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{ route('product_edit',['id' => $product->id ]) }}">
                              <i class="fas fa-pencil-alt pr-2 pl-1">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('product_del',['id' => $product->id ]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>             
          </table>
          <div class="clearfix pt-3 pl-3">
          {{$data->links()}}
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