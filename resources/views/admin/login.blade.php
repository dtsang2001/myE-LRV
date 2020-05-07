@extends('layouts.login.admin')
@section('box-login')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><img src="uploads/logo.png" style="width: 50%"></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Đăng nhập</p>

            @if(Session::has('error_login'))
            <div class="alert alert-danger alert-dismissible myMessengerError">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <small><i class="icon fas fa-ban"></i> <b> Lỗi!</b> : {{Session::get('error_login')}}</small>
            </div>
            @endif

            <form action="" method="POST">

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>

                </div>
            </form>

            
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@stop()