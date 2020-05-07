@extends('layouts.admin')

@section('title')
Thêm Sản Phẩm
@stop

@section('content')
<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Thêm Sản Phẩm</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <form action="" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="row">

            <div class="col-md-12">
                @if($errors->has('name') || 
                    $errors->has('slug') ||
                    $errors->has('description') ||
                    $errors->has('category') ||
                    $errors->has('unit_price') ||
                    $errors->has('unit_in_stock') ||
                    $errors->has('files')
                    )
                <div class="alert alert-danger alert-dismissible myMessengerError">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Lỗi!</h5>
                    @if($errors->has('name'))
                        <p>- {{$errors->first('name')}}</p>
                    @endif

                    @if($errors->has('slug'))
                        <p>- {{$errors->first('slug')}}</p>
                    @endif

                    @if($errors->has('description'))
                        <p>- {{$errors->first('description')}}</p>
                    @endif

                    @if($errors->has('category'))
                        <p>- {{$errors->first('category')}}</p>
                    @endif

                    @if($errors->has('unit_price'))
                        <p>- {{$errors->first('unit_price')}}</p>
                    @endif

                    @if($errors->has('unit_in_stock'))
                        <p>- {{$errors->first('unit_in_stock')}}</p>
                    @endif

                    @if($errors->has('files'))
                        <p>- {{$errors->first('files')}}</p>
                    @endif
                </div>
                @endif
            </div>
        
            <div class="col-md-8">
                
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Thông tin chung</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="InputNameProduct">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" onkeyup="autoSlug();">
                        </div>

                        <div class="form-group">
                            <label for="InputSlugProduct">Đường Link</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="4" name="description">
                                {{old('description')}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="InputCategory">Danh mục</label>
                            <select class="form-control custom-select" name="category_id">
                                <option value="">Chọn Danh Mục</option>
                                @foreach($cats as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="card card-secondary">

                    <div class="card-header">
                        <h3 class="card-title">Giá - Số lượng nhập kho</h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="InputPriceProduct">Giá</label>
                            <input type="number" id="unit_price" name="unit_price" value="{{old('unit_price')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="InputPriceProduct">Giá Khuyễn Mãi</label>
                            <input type="number" id="sale_price" name="sale_price" value="{{old('sale_price')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="InputStockProduct">Số lượng trong kho</label>
                            <input type="number" id="unit_in_stock" name="unit_in_stock" value="{{old('unit_in_stock')}}" class="form-control">
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh</h3>

                        <div class="card-tools">
                            <div class="input-group">
                                <div id="myInputImage">
                                    <div class="myBlockInput">
                                        <label class="custom-file-upload">
                                            <input type="file" name="files[]" id="file" multiple/>
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
                                    <!-- Để ảnh -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
                
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: left; margin: 20px 0">Quay lại</a>
                <div class="input-group input-group-sm" style="width: 150px; float: right; margin: 20px 0">
                    <button class="btn btn-block btn-success">Thêm mới</button>
                </div>
            </div>
        </div>
    </form>

    
</section>

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