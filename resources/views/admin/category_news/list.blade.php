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

    @if(Session::has('category_news_success'))
    $(document).ready(function() {
        toastr.success("{{Session::get('category_news_success')}}")
    });
    @endif

    @if(Session::has('category_news_warning'))
    $(document).ready(function() {
        toastr.warning("{{Session::get('category_news_warning')}}")
    });
    @endif

    @if(Session::has('category_news_error'))
    $(document).ready(function() {
        toastr.error("{{Session::get('category_news_error')}}")
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
                <h1 class="m-0 text-dark">Quản Lý Danh Mục Tin Tức</h1>
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

                                        <form action="" role="form"> 
                                            <div class="input-group input-group-sm" style="width: 250px;">
                                            
                                                <input type="text" name="search" class="form-control float-right" placeholder="Tìm kiểm tên danh mục">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap table-hover">
                                        <tr>
                                            <th>Tên Danh Mục</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Cập Nhật</th>
                                            <th colspan="2" width="100">Hành Động</th>
                                        </tr>
                                        
                                        @foreach($news_cats as $x)
                                        <tr>
                                            <td>{{$x->name}}</td>
                                            <td>{{$x->created_at}}</td>
                                            <td>{{$x->updated_at}}</td>
                                            <td>
                                                <a href="{{route('edit-category-news', ['id' => $x->id])}}" >
                                                    <button class="btn btn-block btn-outline-success btn-sm">Sửa</button>
                                                </a>                                                
                                            </td>
                                            <td>
                                                <a href="{{route('delete-category-news', ['id' => $x->id])}}" onclick="return confirm('Bạn muốn xóa?')">
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