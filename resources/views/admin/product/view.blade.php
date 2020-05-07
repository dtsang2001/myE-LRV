@extends('layouts.admin') @section('title') Chi Tiết Sản Phẩm @stop @section('content')

<!-- Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Chi Tiết Sản Phẩm</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <img src="uploads/{{$product->product_image->first()->url}}" class="product-image" style="object-fit: cover;height: 500px">
                    </div>

                    <div class="col-12 product-image-thumbs">
                        @foreach ($product->product_image as $img)
                        <div class="product-image-thumb">
                            <img src="uploads/{{$img->url}}" style="height: 100%; width: 100%; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$product->name}}</h3>

                    <hr>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0"> {{$product->unit_price}}đ </h2>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <a href="{{route('edit-product', ['id' => $product->id])}}" class="col-md-6">
                            <button class="btn btn-block btn-outline-success">
                                Sửa
                            </button>
                        </a>

                        <a href="{{route('delete-product', ['id' => $product->id])}}" onclick="return confirm('Bạn muốn xóa?')" class="col-md-6">
                            <button class="btn btn-block btn-outline-danger">
                                Xóa
                            </button>
                        </a>

                    </div>
                </div>

                <div class="col-md-12">
                  <div style="margin-top: 20px">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">

                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả</a>

                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments">Nhận xét({{$product->comment->count()}})</a>
                            </div>
                        </nav>

                        <div class="tab-content p-3" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {!!$product->description!!}
                            </div>

                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                <div class="card-footer card-comments">
                                    @foreach($product->comment as $cmt)
                                    <div class="card-comment">
                                        <img class="img-circle img-sm" src="uploads/{{ $cmt->user->avatar }}" alt="User Image">

                                        <div class="comment-text">
                                            <span class="username">
                                            {{ $cmt->user->name }}
                                                <span class="text-muted float-right">{{ $cmt->created_at->diffForHumans() }}</span>
                                            </span><!-- /.username -->
                                            {{ $cmt->content }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="card-footer">
                                    <form action="{{ route('home') }}" method="GET">
                                        <img class="img-fluid img-circle img-sm" src="uploads/{{ Auth::user()->avatar }}" alt="Alt Text">
                                        <div class="img-push">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nhấn Enter để đăng bình luận">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop