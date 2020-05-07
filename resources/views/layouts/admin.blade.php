<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <!-- TIÊU ĐỀ -->
    <title>@yield('title')</title>

    <base href="{{asset('')}}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="public/plugins/toastr/toastr.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- My Style -->
    <link rel="stylesheet" href="public/dist/css/myStyle.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">

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

                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="public/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">John Pierce</h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="public/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">Nora Silvester</h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-divider"></div>
                    </div>
                </li>                
            </ul>

            <!-- Nav - loge ben phải -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.html" class="brand-link" style="padding: 9px">
                        <img src="uploads/logo.png" style="opacity: .8; height: 30px ">
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Nav left -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <div class="sidebar">
                @if(Auth::check())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="uploads/{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image" style="height: 2.1rem; object-fit: cover;">
                    </div>
                    <div class="info" style="color: #fff">
                        {{Auth::user()->name}}
                    </div>
                </div>
                @endif

                <!-- Thanh MENU bên trái -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item" >
                            <a href="{{route('admin')}}" class="nav-link">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>Quản Trị</p>
                            </a>
                        </li>

                        <li class="nav-item" >
                            <a href="" class="nav-link">
                                <i class="nav-icon fa fa-cubes"></i>
                                <p>
                                    Danh Mục Sản Phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('category')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('add-category')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm Danh Mục</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item" >
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Danh Mục Tin Tức
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('category-news')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('add-category-news')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm Danh Mục</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-poll"></i>
                                <p>
                                    Sản Phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('product')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('add-product')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm Sản Phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Tin Tức
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('news')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('add-news')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Đăng Tin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('bill')}}" class="nav-link">
                                <i class="nav-icon fas fa-luggage-cart"></i>
                                <p>Đơn Hàng</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user')}}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Tài Khoản
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('user')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('add-user')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm Tài Khoản</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('role')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Phân Quyền Admin</p>
                            </a>
                        </li>
                        
                        <div class="dropdown-divider"></div>

                        <li class="nav-item" style="">
                            <a href="{{route('logout')}}" class="nav-link">
                                <i class="nav-icon fas fa-directions" ></i>
                                <p>Đăng Xuất</p>
                            </a>
                        </li>

                        <li class="nav-item" style="">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="nav-icon fas fa-running"></i>
                                <p>Trở về Website</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">

            @yield('content')

        </div>

    </div>

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="public/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="public/plugins/toastr/toastr.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/dist/js/demo.js"></script>
    <!-- My Jquery -->
    <script src="public/dist/js/myJquery.js"></script>

    <script src="public/ckeditor/ckeditor.js"></script>

    <script src="public/ckeditor/ckfinder/ckfinder.js"></script>

    <script>var editor1 = CKEDITOR.replace( 'editor1' );</script>

    @yield('message')

</body>

</html>
