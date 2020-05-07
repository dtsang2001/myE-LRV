@extends('layouts.customer')
@section('title', 'Thông tin tài khoản')

@section('content')
<div id="main">
	<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div>
                        <div class="text-center">

                        	<div class="myAvatar">
                        		<img class="profile-user-img img-fluid img-circle" src="uploads/{{Auth::user()->avatar}}">

                        		<button type="button" class="myButtonEdit" title="Sửa avatar" data-toggle="modal" data-target="#modal-lg" >
	                            	<i class="fa fa-cloud-upload-alt"></i>
	                            </button>
                        	</div>
                            
                        </div>

                        <h4 class="text-center" style="padding-top: 10px">{{Auth::user()->name}}</h4>

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

		            		<form action="" method="POST" enctype="multipart/form-data">

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
		                                		<img src="uploads/{{Auth::user()->avatar}}" class="img-circle">
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

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>

  <!-- Nav tabs -->
  <ul class="nav nav-pills">
    <li class="myActive"><a class="btn-block btn btn-dark-b" href="#">Home</a></li>
    <li><a class="btn-block btn btn-dark-b" href="#">Menu 1</a></li>
    <li><a class="btn-block btn btn-dark-b" href="#">Menu 2</a></li>
    <li><a class="btn-block btn btn-dark-b" href="#">Menu 3</a></li>
  </ul>

  <!-- <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul> -->

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
</div>
@stop

