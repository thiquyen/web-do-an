@extends('layout.admin')
@section('content')
<?php $page = 'comment';?>
  <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" href="dist/css/phantrang.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Comment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">List of Comment</li>
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
                      <th style="width: 15%">Product</th>
                      <th style="width: 10%">Star</th>
                      <th style="width: 20%">Content</th>
                      <th style="width: 20%">Created</th>
                      <th style="width: 9%">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($comments as $comment)
                  <tr>
                      <td>{{ $comment->id }}</td>
                      <td>
                          <a>{{ $comment->customer_name }}</a>
                      </td>
                      <td>
                          <a href="{{route('thongtinsp',['id'=>$comment->product_id])}}">{{ $comment->product->product_name }}</a>
                      </td>
                      <td>
                          <a>{{ $comment->rating }} Star</a>
                      </td>
                      <td>
                          <a>{{ $comment->comment_content }}</a>
                      </td>
                      <td>
                          <a>{{ $comment->created_at }}</a>
                      </td>
                      <td class="project-actions ">
                          <a class="btn btn-danger btn-sm" href="{{route('del_comment',['id'=>$comment->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                              <i class="fas fa-trash"></i>Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>             
          </table>
          <div class="clearfix pt-3 pl-3">
          {{$comments->links()}}
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