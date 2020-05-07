@extends('layouts.admin')

@section('title')
Sửa Danh Mục
@stop

@section('content')
<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Sửa Danh Mục Tin Tức</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="container-fluid">

        @if($errors->has('name') || $errors->has('slug'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Lỗi!</h5>
            @if($errors->has('name'))
                <p>- {{$errors->first('name')}}</p>
            @endif

            @if($errors->has('slug'))
                <p>- {{$errors->first('slug')}}</p>
            @endif
        </div>
        @endif
        

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-danger">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form action="" method="POST">                                            
                            
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label for="InputNameCategory">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập Tên Danh Mục" value="{{$id->name}}" onkeyup="autoSlug();">
                            </div>
                        
                            <div class="form-group">
                                <label for="InputSlugCategory">Đường Link</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Đường Link" value="{{$id->slug}}">
                            </div>                            
                            
                            <div class="col-lg-12">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: left; margin: 20px 0">Quay lại</a>
                                <div class="input-group input-group-sm" style="width: 150px; float: right; margin-top: 20px">
                                    <button class="btn btn-block btn-info">Cập nhật</button>
                                </div>
                            </div>
 
                        </form>
                    </div>
                </div>                                
            </div>
        </div>
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