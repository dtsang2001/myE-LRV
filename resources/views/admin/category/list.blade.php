@extends('layouts.admin')

@section('title')
Quản Lý Danh Mục
@stop

@section('message')
<script type="text/javascript">

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    @if(Session::has('category_success'))
    $(document).ready(function() {
        toastr.success("{{Session::get('category_success')}}")
    });
    @endif

    @if(Session::has('category_warning'))
    $(document).ready(function() {
        toastr.warning("{{Session::get('category_warning')}}")
    });
    @endif

    @if(Session::has('category_error'))
    $(document).ready(function() {
        toastr.error("{{Session::get('category_error')}}")
    });
    @endif
    
</script>
@stop

@section('content')
<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Quản Lý Danh Mục Sản Phẩm</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <div class="card card-success">

                    <div class="card-header"></div>

                    <div class="card-body">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">

                                        <form action="" role="form" method="GET"> 
                                            <div class="input-group input-group-sm" style="width: 250px;">
                                            
                                                <input type="text" name="search" class="form-control float-right" placeholder="Tìm kiểm tên danh mục" value="{{old('search')}}">

                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap table-hover">
                                        <tr>
                                            <th>Hình Ảnh</th>
                                            <th>Tên Danh Mục</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Cập Nhật</th>
                                            <th colspan="2" width="100">Hành Động</th>
                                        </tr>
                                        
                                        @foreach($cats as $x)
                                        <tr>
                                            <td style="padding: 5px; width: 120px">
                                                <img src="uploads/{{$x->img}}" width="105px" height="50px" style="object-fit: cover;">
                                            </td>
                                            <td>{{$x->name}}</td>
                                            <td>{{$x->created_at}}</td>
                                            <td>{{$x->updated_at}}</td>
                                            <td>
                                                <a href="{{route('edit-category', ['id' => $x->id])}}" >
                                                    <button class="btn btn-block btn-outline-success btn-sm">Sửa</button>
                                                </a>                                                
                                            </td>
                                            <td>
                                                <a href="{{route('delete-category', ['id' => $x->id])}}" onclick="return confirm('Bạn muốn xóa?')">
                                                    <button class="btn btn-block btn-outline-danger btn-sm">Xóa</button>
                                                </a>                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()