@extends('layouts.admin')

@section('title')
Quản Lý Tin Tức
@stop

@section('message')
<script type="text/javascript">

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    @if(Session::has('news_success'))
    $(document).ready(function() {
        toastr.success("{{Session::get('news_success')}}")
    });
    @endif

    @if(Session::has('news_warning'))
    $(document).ready(function() {
        toastr.warning("{{Session::get('news_warning')}}")
    });
    @endif

    @if(Session::has('news_error'))
    $(document).ready(function() {
        toastr.error("{{Session::get('news_error')}}")
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
                <h1 class="m-0 text-dark">Quản Lý Tin Tức</h1>
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

                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <tr>
                                            <th>Hình Ảnh</th>
                                            <th>Tiêu Đề</th>
                                            <th>Tác Giả</th>
                                            <th colspan="3">Hành Động</th>
                                        </tr>
                                        
                                        @foreach($news as $n)
                                        <tr>

                                            <td style="padding: 5px; width: 120px">
                                                <img src="uploads/{{$n->image}}" width="105px" height="40px" style="object-fit: cover;">
                                            </td>

                                            <td width="350px">{{$n->title}}</td>

                                            @foreach($author as $a)
                                            <?php $check = ($n->user_id == $a->id)? $a->name : '' ?>
                                            @if($check != '')
                                            <td>{{ $check }}</td>
                                            @endif
                                            @endforeach

                                            <td width="50px" style="vertical-align: middle;">
                                                <a href="{{ route('view-news', ['id' => $n->id]) }}">
                                                    <button class="btn btn-block btn-outline-info btn-sm">Xem</button>
                                                </a>                                                
                                            </td>
                                            <td width="50px" style="vertical-align: middle;">
                                                <a href="{{ route('edit-news', ['id' => $n->id]) }}">
                                                    <button class="btn btn-block btn-outline-success btn-sm">Sửa</button>
                                                </a>                                                
                                            </td>
                                            <td width="50px" style="vertical-align: middle;">
                                                <a href="{{ route('delete-news', ['id' => $n->id]) }}" onclick="return confirm('Bạn muốn xóa?')">
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