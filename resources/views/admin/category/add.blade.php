@extends('layouts.admin')

@section('title')
Thêm Danh Mục
@stop

@section('content')

<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Thêm Danh Mục Sản Phẩm</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="container-fluid">

        @if($errors->has('name') || $errors->has('slug') || $errors->has('file'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Lỗi!</h5>
            @if($errors->has('name'))
                <p>- {{$errors->first('name')}}</p>
            @endif

            @if($errors->has('slug'))
                <p>- {{$errors->first('slug')}}</p>
            @endif

            @if($errors->has('file'))
                <p>- {{$errors->first('file')}}</p>
            @endif
        </div>
        @endif
        
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-danger">
                        <div class="card-header">
                            Thông tin chung
                        </div>

                        <div class="card-body">
                                
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label for="InputNameCategory">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập Tên Danh Mục" value="{{old('name')}}" onkeyup="autoSlug();">
                            </div>
                        
                            <div class="form-group">
                                <label for="InputSlugCategory">Đường Link</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Đường Link" value="{{old('slug')}}">
                            </div>

                            <div class="form-group">
                                <label for="InputCategory">Danh mục cha</label>
                                <select class="form-control custom-select" name="parent">
                                    <option value="0">Không có</option>
                                    @foreach($cats as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
  
                        </div>
                    </div>                                
                </div>

                <div class="col-lg-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh</h3>

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
                                        <!-- để ảnh -->
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: left; margin: 20px 0">Quay lại</a>
                    <div class="input-group input-group-sm" style="width: 150px; float: right; margin-top: 20px">
                        <button class="btn btn-block btn-info">Thêm mới</button>
                    </div>
                </div>
            </div>

        </form>
        
    </div>
</div>

<script type="text/javascript">
    function autoSlug() {
        var name = document.getElementById("name").value;

        // chứ hoa -> chứ thường
        var slug = name.toLowerCase();

        // có dấu -> không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');

        // xóa kí tự đặc biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');

        // khoảng trắng -> dấu '-'
        slug = slug.replace(/ /gi, "-");

        document.getElementById("slug").value = slug;
    }
</script>

@stop()