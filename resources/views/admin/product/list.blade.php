@extends('layouts.admin')

@section('title')
Quản Lý Sản Phẩm
@stop

@section('message')
<script type="text/javascript">

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    @if(Session::has('product_success'))
    $(document).ready(function() {
        toastr.success("{{Session::get('product_success')}}")
    });
    @endif

    @if(Session::has('product_warning'))
    $(document).ready(function() {
        toastr.warning("{{Session::get('product_warning')}}")
    });
    @endif

    @if(Session::has('product_error'))
    $(document).ready(function() {
        toastr.error("{{Session::get('product_error')}}")
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
                <h1 class="m-0 text-dark">Quản Lý Sản Phẩm</h1>
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
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiểm">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <tr>
                                            <th>Hình Ảnh</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Danh Mục</th>
                                            <th>Giá</th>
                                            <th>Giá (SALE)</th>
                                            <th colspan="3">Hành Động</th>
                                        </tr>
                                        
                                        @foreach ($pros as $pro)
                                        <tr >
                                            
                                            <td style="padding: 5px; width: 120px">
   
                                                <img src="uploads/{{$pro->product_image->first()->url}}" width="105px" height="50px" style="object-fit: cover;">

                                            </td>

                                            <td style="vertical-align: middle; width: 60px; overflow: hidden; text-overflow: ellipsis;">
                                                {{$pro->name}}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{$pro->category->name}}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{ number_format($pro->unit_price) }}đ
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{ ($pro->sale_price > 0)? number_format($pro->sale_price).'đ' : '---'}}
                                            </td>

                                            <td width="50px" style="vertical-align: middle;">
                                                <a href="{{route('view-product', ['id' => $pro->id])}}">
                                                    <button class="btn btn-block btn-outline-info btn-sm">Xem</button>
                                                </a>                                                
                                            </td>
                                            <td width="50px" style="vertical-align: middle;">
                                                <a href="{{route('edit-product', ['id' => $pro->id])}}">
                                                    <button class="btn btn-block btn-outline-success btn-sm">Sửa</button>
                                                </a>                                                
                                            </td>
                                            <td width="50px" style="vertical-align: middle;">
                                                <a href="{{route('delete-product', ['id' => $pro->id])}}" onclick="return confirm('Bạn muốn xóa?')">
                                                    <button class="btn btn-block btn-outline-danger btn-sm">Xóa</button>
                                                </a>                                                
                                            </td>
                                        </tr>
                                        @endforeach

                                    </table>
                                </div>

                                <div class="card-footer">
                                    <div class="card-tools float-right">
                                        {{ $pros->links() }}
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
</div>
@stop()