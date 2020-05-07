@extends('layouts.admin')

@section('title', 'Trang Quản Trị')

@section('message')
<script type="text/javascript">

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    @if(Session::has('success_login'))
    $(document).ready(function() {
        toastr.success("{{Session::get('success_login')}}")
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
                <h1 class="m-0 text-dark">Trang Quản Trị</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Đơn Hàng Đã Đặt</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="bill_admin.html" class="small-box-footer">Xem thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>53</h3>
                        <p>Đơn Hàng Đã Giao</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-paper-airplane"></i>
                    </div>
                    <a href="bill_admin.html" class="small-box-footer">Xem thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$account}}</h3>
                        <p>Khách Hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="{{ route('user') }}" class="small-box-footer">Xem thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$posters}}</h3>
                        <p>Tin tức đã đăng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-compose"></i>
                    </div>
                    <a href="{{ route('news') }}" class="small-box-footer">Xem thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông Báo</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="card-body">

                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="public/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">Lung Thị Linh</h3>
                                    <p class="text-sm">Đã đặt mua ghế</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-divider"></div>

                    </div>
                </div>                                
            </div>

            <div class="col-lg-6">
                @if(Auth::check())
                <div class="card card-widget widget-user">

                    <div class="widget-user-header text-white" style="background: url('uploads/{{Auth::user()->avatar}}'); background-size: cover">
                        <h3 class="widget-user-username text-right">{{Auth::user()->name}}</h3>
                        <h5 class="widget-user-desc text-right">Quản trị viên</h5>
                    </div>

                    <div class="card-footer">
                        <div class="row">

                          <div class="col-sm-6 border-right">
                            <div class="description-block">
                              <h5 class="description-header">{{Auth::user()->news->count()}}</h5>
                              <span class="description-text">Bài Viết</span>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="description-block">
                              <h5 class="description-header">{{Auth::user()->comment->count()}}</h5>
                              <span class="description-text">Bình Luận</span>
                            </div>
                          </div>

                      </div>
                  </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop()