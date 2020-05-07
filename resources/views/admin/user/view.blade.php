@extends('layouts.admin')

@section('title')
Thông tin tài khoản
@stop

@section('message')
<script type="text/javascript">

	const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

	@if(Session::has('user_success'))
	$(document).ready(function() {
	  	toastr.success("{{Session::get('user_success')}}")
	});
	@endif

	@if(Session::has('user_warning'))
	$(document).ready(function() {
	  	toastr.warning("{{Session::get('user_warning')}}")
	});
	@endif

	@if(Session::has('user_error'))
	$(document).ready(function() {
	  	toastr.error("{{Session::get('user_error')}}")
	});
	@endif
	
</script>
@stop

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thông tin tài khoản</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">

                        	<div class="myAvatar">
                        		<img class="profile-user-img img-fluid img-circle" src="uploads/{{ $user->avatar }}">

                        		<button type="button" class="myButtonEdit" title="Sửa avatar" data-toggle="modal" data-target="#modal-lg" >
	                            	<i class="fas fa-cloud-upload-alt"></i>
	                            </button>
                        	</div>
                            
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ ($user->level == 1)? 'Quản trị viên' : 'Khách hàng' }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                        	@if($user->level == 1)
                            <li class="list-group-item">
                                <b>Bài viết</b> <a class="float-right">{{ $user->news->count() }}</a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <b>Bình Luận</b> <a class="float-right">{{ $user->comment->count() }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="modal fade" id="modal-lg">
		       		<div class="modal-dialog modal-lg">
		          		<div class="modal-content">
		            		<div class="modal-header">
		              			<h4 class="modal-title">Sửa avatar</h4>
		              			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                			<span aria-hidden="true">&times;</span>
		              			</button>
		            		</div>

		            		<form action="{{ route('upload-avatar-user', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">

		            		<div class="modal-body">
			              		
		              			<div class="form-group">

		              				<input type="hidden" name="_token" value="{{csrf_token()}}">

		                            <div id="myInputImage">
		                                <div class="myBlockInput">
		                                    <label class="custom-file-upload">
		                                        <input type="file" name="avatar" id="avatar">
		                                        Tải lên Avatar <i class="fas fa-cloud-download-alt"></i>
		                                    </label>
		                                </div>                                        
		                            </div>

		                            <div id="myViewParent" class="clearfix" style="width: 300px; margin: 0 auto">
		                                <div id="myViewChild" class="clearfix">
		                                	<div id="myViewImage" class="myFileAvatar">
		                                		<img src="uploads/{{$user->avatar}}" class="img-circle">
		                                	</div>
		                                </div>
		                            </div>
		                            
		                        </div>
			              		
		            		</div>

		            		<div class="modal-footer justify-content-between">
		              			<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		              			<button type="submit" class="btn btn-primary">Lưu Lại</button>
		            		</div>

		            		</form>
		          		</div>
		        	</div>
		      	</div>

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                        <p class="text-muted"> {{$user->address}} </p>

                        <hr>

                        <strong><i class="fa fa-envelope mr-1"></i> Email</strong>

                        <p class="text-muted"> {{$user->email}} </p>

                        <hr>

                        <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>

                        <p class="text-muted"> {{$user->phone}}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#news" data-toggle="tab">Bài Viết</a></li>
                            <li class="nav-item"><a class="nav-link" href="#comment" data-toggle="tab">Bình Luận</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Thiết lập</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="news">

                                @foreach($user->news as $n)
                                <div class="post">

                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src=" uploads/{{$user->avatar}} ">
                                        <span class="username">
				                          	<a href="#">{{$n->title}}</a>
				                        </span>
                                        <span class="description">{{$n->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="row">

                                    	<div class="col-md-12" style="margin-bottom: 10px">
                                    		{!!$n->content!!}
                                    	</div>

                                    	<div class="col-md-12">
                                    		<img src="uploads/{{$n->image}}" width="100%">
                                    	</div>

                                    </div>

                                </div>
                                @endforeach
                                
                            </div>

                            <div class="tab-pane" id="comment">

                                <p>Chưa có gì</p>
                                
                            </div>

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-danger">
				                          10 Feb. 2014
				                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-info"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                            <h3 class="timeline-header border-0">
                                            	<a href="#">Sarah Young</a> accepted your friend request
                         					</h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                            <div class="timeline-body">
                                                Take me to your leader! Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
				                          3 Jan. 2014
				                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Họ và tên</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" value="{{$user->name}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" value="{{$user->email}}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 col-form-label">Số điện thoại</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPhone" value="{{$user->phone}}"disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputAddres" class="col-sm-2 col-form-label">Địa chỉ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputAddres" value="{{$user->address}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@stop