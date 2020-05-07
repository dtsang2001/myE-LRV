@extends('layouts.customer')
@section('title', 'Đăng nhập - đăng ký')

@section('content')

    <div id="main">

        <div class="page-section">
            <div class="container">
                <div id="customer_login" class="row">
                    
                    @if($errors->has('name') || 
                        $errors->has('email') ||
                        $errors->has('phone') ||
                        $errors->has('password') ||
                        $errors->has('password_re') ||
                        $errors->has('file')
                    )
                    <div role="alert" class="alert alert-info style1">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>

                        <h3 class="alert_title">Có lỗi !!!</h3>

                        <p>{{$errors->first('name')}}</p>
                        <p>{{$errors->first('email')}}</p>
                        <p>{{$errors->first('phone')}}</p>
                        <p>{{$errors->first('password')}}</p>
                        <p>{{$errors->first('password_re')}}</p>
                        <p>{{$errors->first('file')}}</p>

                    </div>
                    @endif
                    
                    @if(Session::has('login_success'))
                    <div role="alert" class="alert alert-success style1">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                        <h3 class="alert_title">Thành công!</h3>
                        {{Session::get('login_success')}}
                    </div>
                    @endif

                    <div class="col-md-6">
                        <h5>Đăng Nhập</h5>
                        <form action="{{ route('post_login_fe') }}" class="login" method="POST">
                        	<input type="hidden" name="_token" value="{{csrf_token()}}">

                            <p class="form-row form-row-wide">
                                <label for="username1">Email <span class="required">*</span></label>
                                <input type="text" id="email" name="email" class="input-bg" value="{{old('email')}}"/>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password1">Mật khẩu <span class="required">*</span></label>
                                <input type="password" id="password1" name="password" class="input-bg" />
                            </p>

                            <p class="form-row">
                                <button type="submit" class="btn btn-dark-b">
                                	Đăng nhập
                                </button>
                            </p>

                            <p class="lost_password">
                                <a href="#">Quên mật khẩu?</a>
                            </p>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5>Đăng Ký</h5>
	                    <form action="{{ route('post_register_fe') }}" class="register" method="POST" enctype="multipart/form-data">
	                    	<input type="hidden" name="_token" value="{{csrf_token()}}">

	                    	<div class="text-center">
	                    		<label for="reg_name">Ảnh đại diện</label>

		                    	<div class="myAvatar myAvatarFe">
		                    		<div id="myViewParent" class="clearfix">
	                                    <div id="myViewChild">
	                                        <div class="myImage myImageFe">  
	                                            <img class="profile-user-img img-fluid img-circle" src="uploads/avatar_default.jpg"> 
	                                        </div>
	                                    </div>
	                                </div>

		                    		<label class="myButtonEdit myBtnFe">
                                        <input type="file" name="file" id="avatar_fe"/>
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </label>

		                    	</div>
		                        
		                    </div>

                            <p class="form-row form-row-wide">
                                <label for="reg_name">Họ và Tên <span class="required">*</span></label>
                                <input type="text" id="name" name="name" value="{{old('name')}}" class="input-bg" />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="reg_email">Email <span class="required">*</span></label>
                                <input type="text" id="email" name="email" value="{{old('email')}}" class="input-bg" />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="reg_phone">Phone <span class="required">*</span></label>
                                <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="input-bg" />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="reg_address">Địa chỉ <span class="required">*</span></label>
                                <input type="text" id="address" name="address" value="{{old('address')}}" class="input-bg" />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="reg_password1">Mật khẩu <span class="required">*</span></label>
                                <input type="password" id="password" name="password" class="input-bg" />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="reg_password2">Nhập lại mật khẩu <span class="required">*</span></label>
                                <input type="password" id="password_re" name="password_re" class="input-bg" />
                            </p>

                            <p class="form-row">
                                <button type="submit" class="btn btn-dark-b">
                                	Đăng ký
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #main -->
@stop()