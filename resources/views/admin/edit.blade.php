@extends('layout.admin')
@section('content')
<?php $page = 'edit';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mb-5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa Sản Phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content p-1">
    <form action="" method="POST" roles="form" enctype="multipart/form-data">      
      @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" id="inputName" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ $suasp-> product_name }}">
                            @if($errors->has('product_name'))
                                <p style="color:red"> {{$errors->first('product_name') }} !!!</p>
                            @endif
                        </div>
                       
                        <div class="form-group">
                            <label for="inputType">Loại Sản Phẩm</label>
                            <select id="inputType" name="type_id" class="form-control custom-select">
                            <option selected disabled>Select one</option>
                            @foreach($allprotype as $protype)
                                <?php $selected = $protype->id == $suasp->type_id ? 'selected' : ''; ?>
                                <option {{ $selected }} value ='{{ $protype -> id }}'> {{ $protype -> type_name  }}</option>
                            @endforeach
                            </select>
                            @if($errors->has('type_id'))
                                <p style="color:red"> {{$errors->first('type_id') }} !!!</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Giá Sản Phẩm</label>
                            <input type="number" name="price" id="inputPrice" class="form-control" placeholder="Nhập giá sản phẩm" value="{{ $suasp-> price }}">
                            @if($errors->has('price'))
                            <p style="color:red"> {{$errors->first('price') }} !!!</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputPromotion">Khuyến Mãi (%)</label>
                            <input type="number" name="promotion" id="inputPromotion" class="form-control" placeholder="Nhập % khuyến mãi" value="{{ $suasp-> promotion }}">
                            @if($errors->has('promotion'))
                            <p style="color:red"> {{$errors->first('promotion') }} !!!</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Giá Sản Phẩm Sau Khi Khuyến Mãi</label>
                                <div class="row">
                                    <div class="col-9"><input id="inputSale" name="sale_price" class="form-control" value="{{ $suasp-> sale_price }}"  readonly></div>
                                    <div class="col-3"><button type="button" class="btn btn-primary" onclick="sum()">Tính</button></div>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputImg">Ảnh Sản Phẩm</label>
                                <div class="row">
                                    <div class="col-9"><input type="text" name="image" id="inputImage" class="form-control" value="{{ $suasp-> image }}" readonly ></div>
                                    <div class="col-3"><a  class="btn btn-primary" href="#modal-file" data-toggle="modal">Upload</a></div>
                                </div>
                                @if($errors->has('image'))
                                    <p style="color:red"> {{$errors->first('image') }} !!!</p>
                                @endif
                        </div>
                        <div class="form-group">
                                <label for="inputDescription">Mô Tả</label>
                                <textarea id="content" name="description" class="form-control"> {{ $suasp-> description }}</textarea>
                        </div>
                        <div class="form-group">
                                <label for="inputPrice">Hạn Sử Dụng</label>
                                <input type="number" name="expiry" id="inputExpiry" class="form-control" placeholder="Nhập hạn sử dụng"  value="{{ $suasp-> expiry }}">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="row p-1">
            <div class="col-12">
                <a href="{{ route('products') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Update Product" class="btn btn-success float-right" >
            </div>
        </div>
        </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="modal-file">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quản lý file</h5>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('file/dialog.php?akey=y6iFg3JIBfdH5mtfDU8oPWCVR6vfktSMgkTK8DiZfpE&field_id=inputImage') }}" style="width:100%;height:500px;border:0;overflow-y:auto"></iframe>
                </div>
            
            </div>
        </div>
    </div>

     <!-- Tính giá sau khi giảm -->
    <script>
        function sum(){
                let a = document.getElementById("inputPrice").value;
                let b = document.getElementById("inputPromotion").value;

                // Ép kiểu dữ liệu
                a = Number(a);
                b = Number(b);

                if (isNaN(a) || isNaN(b)){
                    alert("Bạn phải nhập vào hai số");
                    return false;
                }

                let sum = parseInt(a) - (parseInt(a) * b / 100);
                document.querySelector('#inputSale').value = parseInt(sum);
        }
    </script>
    <script src="{{ asset('/admin12/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/admin12/tinymce/config.js') }}"></script>
@stop