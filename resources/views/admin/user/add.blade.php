@extends('layouts.admin')

@section('title')
Thêm tài khoản Admin
@stop
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Thêm Tài Khoản</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if($errors->has('name') || 
                $errors->has('email') ||
                $errors->has('phone') ||
                $errors->has('password') ||
                $errors->has('re_password') ||
                $errors->has('level') ||
                $errors->has('file') 
                )
            <div class="alert alert-danger alert-dismissible myMessengerError">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Lỗi!</h5>
                @if($errors->has('name'))
                    <p>- {{$errors->first('name')}}</p>
                @endif

                @if($errors->has('email'))
                    <p>- {{$errors->first('email')}}</p>
                @endif

                @if($errors->has('phone'))
                    <p>- {{$errors->first('phone')}}</p>
                @endif

                @if($errors->has('password'))
                    <p>- {{$errors->first('password')}}</p>
                @endif

                @if($errors->has('re_password'))
                    <p>- {{$errors->first('re_password')}}</p>
                @endif

                @if($errors->has('level'))
                    <p>- {{$errors->first('level')}}</p>
                @endif

                @if($errors->has('file'))
                    <p>- {{$errors->first('file')}}</p>
                @endif
            </div>
            @endif
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="card card-primary">
            <div class="card-header"></div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Avatar</h3>

                                <div class="card-tools">
                                    <div class="input-group">
                                        <div id="myInputImage">
                                            <div class="myBlockInput">
                                                <label class="custom-file-upload">
                                                    <input type="file" name="file" id="file"/>
                                                    Tải lên <i class="fas fa-cloud-download-alt"></i>
                                                </label>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group" >

                                    <div id="myViewParent" class="clearfix">
                                        <div id="myViewChild">
                                            <div id="myViewImage" class="myImage">  
                                                <img src="uploads/avatar_default.jpg"> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-8">

                        <div class="form-group">
                            <label for="InputUserName">Họ và Tên</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="InputUserEmail">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="InputUserPhone">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                        </div>

                        <div class="form-group">
                            <label for="InputUserPassword">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="InputUserRe_Password">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="re_password" name="re_password">
                        </div>

                        <div class="form-group">
                            <label for="InputUserAddress">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                        </div>

                        <div class="form-group">
                            <label for="InputCategory">Cấp độ</label>
                            <select class="form-control custom-select" name="level">
                                <option>Chọn Cấp Độ</option>
                                <option value="0">Khách hàng</option>
                                <option value="1">Quản trị viên</option>
                            </select>
                        </div>


                    </div>

                    <div class="col-12">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: left; margin: 20px 0">Quay lại</a>
                        <div class="input-group input-group-sm" style="width: 150px; float: right; margin: 20px 0">
                            <button class="btn btn-block btn-success">Thêm mới</button>
                        </div>
                    </div>
                    </div>
                
            </div>
        </div>
    </form>
</section>
@stop