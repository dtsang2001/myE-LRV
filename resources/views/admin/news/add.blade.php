@extends('layouts.admin')

@section('title')
Đăng Tin
@stop

@section('content')
<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Đăng Tin</h1>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            @if($errors->has('title') || $errors->has('slug') || $errors->has('content') || $errors->has('category_news_id') || $errors->has('file'))
            <div class="alert alert-danger alert-dismissible myMessengerError">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Lỗi!</h5>
                @if($errors->has('title'))
                    <p>- {{$errors->first('title')}}</p>
                @endif

                @if($errors->has('slug'))
                    <p>- {{$errors->first('slug')}}</p>
                @endif

                @if($errors->has('content'))
                    <p>- {{$errors->first('content')}}</p>
                @endif

                @if($errors->has('category_news_id'))
                    <p>- {{$errors->first('category_news_id')}}</p>
                @endif

                @if($errors->has('file'))
                    <p>- {{$errors->first('file')}}</p>
                @endif

            </div>
            @endif
        </div>
    </div>

    <div class="card card-info">
        <div class="card-header"></div>

        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label for="InputNameNews">Tiêu Đề</label>
                            <input type="text" class="form-control" id="name" name="title" onkeyup="autoSlug();" value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="InputSlugNews">Đường Link</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                        </div>

                        <div class="form-group">
                            <label for="InputCategory">Danh Mục Tin Tức</label>
                            <select class="form-control custom-select" name="category_news_id">
                                <option value="">Chọn Danh Mục</option>
                                @foreach($cat_news as $cn)
                                <option value="{{$cn->id}}">{{$cn->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" style="width: 400px">

                            <div id="myInputImage">
                                <div class="myBlockInput">
                                    <label class="custom-file-upload">
                                        <input type="file" name="file" id="file">
                                        Tải lên hình ảnh <i class="fas fa-cloud-download-alt"></i>
                                    </label>
                                </div>                                        
                            </div>

                            <div id="myViewParent" class="clearfix">
                                <div id="myViewChild">
                                    <!-- Để ảnh -->
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" rows="30" name="content" id="description">
                                {{old('content')}}
                            </textarea>
                        </div>

                        <div class="col-lg-12">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: left; margin: 20px 0">Quay lại</a>
                            <div class="input-group input-group-sm" style="width: 150px; float: right; margin-top: 20px">
                                <button class="btn btn-block btn-info">Đăng Tin</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
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
        slug = slug.replace(/í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');

        // xóa kí tự đặc biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');

        // khoảng trắng -> dấu '-'
        slug = slug.replace(/ /gi, "-");

        document.getElementById("slug").value = slug;
    };

</script>
@stop()