@extends('layouts.customer')
@section('title')
Sản phẩm - {{ $pro->name }}
@stop

@section('content')
<input type="hidden" id="csrf_token" name="csrf_token" value="{{ csrf_token() }}">
<input type="hidden" id="product_id" name="product_id" value="{{ $pro->id }}">
<input type="hidden" id="news_id" name="news_id" value="">

<div id="main">
    <div class="page-section">
        <div class="product-main style1" itemtype="http://schema.org/Product" itemscope="">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="product-detail-thumbarea">
                            <div class="single-product-main-images owl-carousel1" id="sync1">
								
								@foreach($pro->product_image as $img)
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="uploads/{{ $img->url }}" itemprop="image" class="woocommerce-main-image">
                                        <img src="uploads/{{ $img->url }}" >
                                    </a>
                                </div>
                               	@endforeach

                            </div>
                            <div class="single-product-main-thumbnails owl-carousel2" id="sync2" data-items="3">
								
								@foreach($pro->product_image as $img)
                                <a href="uploads/{{ $img->url }}" itemprop="image" class="woocommerce-main-image">
                                    <img alt="" src="uploads/{{ $img->url }}" >
                                </a>
                               	@endforeach 

                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                    	<ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Trang Chính</a></li>
                            <li><a href="{{ route('product_fe') }}">Sản Phẩm</a></li>
                            <li class="active">Chi Tiết Sản Phẩm</li>
                        </ol>
                        <h1 class="product-title">{{ $pro->name }}</h1>

                        @if($pro->sale_price > 0)
                        <div class="product-price-wrap clearfix">
                            <p style="margin: 0;">
                                <span class="amount"><del>{{ number_format($pro->unit_price) }}VND</del></span>
                            </p>
                            <h3 class="price"><span class="amount">{{ number_format($pro->sale_price) }} vnd</span></h3>
                        </div>
                        @else
                        <div class="product-price-wrap clearfix">
                            <h3 class="price"><span class="amount">{{ number_format($pro->unit_price) }} vnd</span></h3>
                        </div>
                        @endif

                        <div class="khuyen-mai-sp">
                            <ul>
                                <li><span class="fa fa-check-square-o"></span>Bảo hành chính hãng 12 tháng </li>
                                <li><span class="fa fa-check-square-o"></span>90 ngày đổi trả miễn phí </li>
                                <li><span class="fa fa-check-square-o"></span>Miễn phí vận chuyển các đơn hàng trên 1.000.000đ</li>
                                <li><span class="fa fa-check-square-o"></span>Trả góp 0% - Đăng ký tại cửa hàng</li>
                            </ul>
                        </div>

                        <form action="{{ route('add-cart', ['id' => $pro->id]) }}" enctype="multipart/form-data" method="GET" class="cart clearfix">

                            <div class="quantity">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" size="4" class="input-text qty text" title="Số lượng" value="1" name="qty" />
                            </div>

                            <button class="btn btn-addtocart-b" type="submit">Thêm vào giỏ hàng</button>

                        </form>                      

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section bg-gray" itemtype="http://schema.org/Review" itemscope="">
        <div class="container">
            <div class="woocommerce-tabs">
                <!-- Nav tabs -->
                <ul class="nav clearfix" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-description_tab" role="tab" data-toggle="tab">Mô tả</a></li>

                    <li role="presentation"><a href="#tab-reviews" role="tab" data-toggle="tab">Nhận Xét <span id="count_parent_comment">({{ $pro->comment->where('parent_id', 0)->count() }})</span></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <div id="tab-description_tab" role="tabpanel" class="tab-pane active">
                        <p>{!! $pro->description !!}</p>
                    </div>

                    <div id="tab-reviews" role="tabpanel" class="tab-pane">
                        <div class="row">
                            <div class="col-md-6" >

                                <div class="comments-area" style="margin: 0">
                                    <ol class="comment-list" id="box-cmt"></ol>
                                </div>

                                <div class="comments-area">

                                    <ol class="comment-list">

                                        <?php $i = 0 ?>
                                        @foreach($comment->where('parent_id', 0) as $cmt)
                                        <li class="comment mycmt">

                                            <div class="comment-item clearfix">

                                                <div class="comment-avatar">
                                                    <img class="avatar" src="uploads/{{$cmt->user->avatar}}" style="width: 45px; height: 45px; object-fit: cover;">
                                                </div>

                                                <div class="comment-content content-cmt">

                                                    <div class="comment-meta">
                                                        <h5 itemprop="author" class="author_name">{{$cmt->user->name}}</h5>

                                                        <span class="comment-date">
                                                            <small><time itemprop="datePublished">{{$cmt->created_at->diffForHumans()}}</time></small>
                                                        </span>

                                                        <button id="b{{$i}}" type="button" class="btn btn-link btn-cmt" style="float: right; padding-top: 0; color: black"><span id="count_child_comment_b{{$i}}">{{$pro->comment->where('parent_id', $cmt->id)->count()}}</span> bình luận</button>
                                                    
                                                    </div>

                                                    <div class="description" itemprop="description">
                                                        <p>{{$cmt->content}}</p>
                                                    </div>

                                                    <!-- Bình luận con -->
                                                    
                                                    <div id="comment-child-b{{$i}}" style="display: none;">

                                                        @if($pro->comment->where('parent_id', $cmt->id)->count() > 0)
                                                        @foreach($pro->comment->where('parent_id', $cmt->id) as $cmt_child)
                                                        <div class="user_comment_b{{$i}}" style="margin-top: 20px;">
                                                            <div class="comment-avatar">
                                                                <img class="avatar" src="uploads/{{$cmt_child->user->avatar}}" style="width: 38px; height: 38px; object-fit: cover;">
                                                            </div>
                                                            <div class="comment-meta">
                                                                <h5 itemprop="author" class="author_name">{{$cmt_child->user->name}}</h5>
                                                                <span class="comment-date">
                                                                    <small><time itemprop="datePublished">{{$cmt_child->created_at->diffForHumans()}}</time></small>
                                                                </span>
                                                            </div>
                                                            <div class="description" itemprop="description">
                                                                <p>{{$cmt_child->content}}</p>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                    

                                                    <!-- Đăng bình luận con -->
                                                    @if(Auth::check())
                                                    <div style="margin-top: 20px;">

                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                        <div class="comment-avatar">
                                                            <img class="avatar" src="uploads/{{Auth::user()->avatar}}" style="width: 38px; height: 38px; object-fit: cover;">
                                                        </div>

                                                        <div class="comment-content">

                                                            <div class="input-group">
                                                                <input type="text" id="comment_child_b{{$i}}" name="b{{$i}}" class="post-enter form-control" placeholder="Trả lời">

                                                                <input type="hidden" id="parent_comment_id_b{{$i}}" name="parent_comment_id" value="{{ $cmt->id }}" />

                                                                <span class="input-group-btn">
                                                                    <button name="b{{$i}}" class="btn_reply_child btn btn-default" style="background: gray; border: 1px solid gray"><i class="glyphicon glyphicon-send"></i></button>
                                                                </span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </li>
                                        <?php $i++ ?>
                                        @endforeach
                                    </ol>

                                </div>

                            </div>
                            <div class="col-md-5 col-md-offset-1">

                                <div id="review_form">
                                    <div id="respond" class="comment-respond">
                                        @if(Auth::check())
                                        <h3 class="comment-reply-title">Bình luận sản phẩm</h3>

                                            <img id="auth_comment" class="avatar" src="uploads/{{Auth::user()->avatar}}" width="45px" style="height: 45px; object-fit: cover; border-radius: 50%">
                                            <b id="auth_name_comment" style="padding-left: 10px">{{Auth::user()->name}}</b>
                                            
                                			<p class="comment-form-comment">
                                                <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="0" />

                                                <p class="comment-form-comment">
                                                    <textarea id="comment_parent" name="comment" cols="45" rows="3" placeholder="Bạn muốn hỏi về sản phẩm này?"></textarea>
                                                </p>
                                            </p>                                          

                                            <p class="form-submit">
                                                <button type="button" class="btn btn-addtocart-b" id="btn_reply">Bình luận</button>
                                            </p>

                                        @else
                                        <h3 class="comment-reply-title">Đăng nhập để bình luận sản phẩm</h3>
                                        @endif
                                    </div><!-- #respond -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">

            <div class="kt-heading-wrapper">
                <div class="kt-heading-divider">
                    <svg version="1.1" x="0px" y="0px"
                             viewBox="349 274.7 1310.8 245.3" style="enable-background:new 349 274.7 1310.8 245.3;" xml:space="preserve">
                        <path d="M1222,438.9c-2.7,0-5.4,0-8.1-2.7l-210.8-129.7L792.3,436.2c-5.4,2.7-10.8,2.7-13.5,0L573.3,306.5L365.2,436.2L349,411.9
                            l216.2-132.4c5.4-2.7,10.8-2.7,13.5,0l208.1,127l210.8-129.7c5.4-2.7,10.8-2.7,13.5,0L1222,409.2l208.1-129.7
                            c5.4-2.7,10.8-2.7,13.5,0l216.2,135.1l-13.5,21.7l-208.1-129.7l-208.1,129.7C1227.4,436.2,1224.7,438.9,1222,438.9L1222,438.9z"/>
                            <path d="M1222,520c-2.7,0-5.4,0-8.1-2.7l-210.8-129.7L792.3,517.3c-5.4,2.7-10.8,2.7-13.5,0L573.3,387.6L362.5,517.3L349,493
                            l216.2-132.4c5.4-2.7,10.8-2.7,13.5,0l205.4,129.7L995,360.5c5.4-2.7,10.8-2.7,13.5,0l210.8,129.7l208.1-129.7
                            c5.4-2.7,10.8-2.7,13.5,0l216.2,135.1l-13.5,21.6l-205.4-129.7l-208.1,129.8C1227.4,517.3,1224.7,520,1222,520L1222,520z"/>
                        </svg>
                </div>
                <h3 class="kt-heading-title">Sản Phẩm Liên Quan</h3>
            </div>

            <div class="products">

                <div class="owl-carousel-kt remove-mar-bottom navigation-center">
                    <div class="owl-carousel kt-owl-carousel" data-options='{"pagination": false, "navigation": true, "desktop": 4, "desktopsmall" : 3, "tablet" : 2, "mobile" : 1}'>

                        <?php $wow = 200 ?>
						@foreach($pros as $product)
                        <div class="product wow fadeInUp" data-wow-delay="{{$wow}}ms">
                            <div class="product-content">
                                <a href="{{ route('view_product_fe', ['slug' => $product->slug]) }}" class="product-thumbnail">
                                	<?php $i = 1 ?>
                                	@foreach($product->product_image->take(2) as $img)

                                		@if($i == 1)
                                        <img class="first-img" src="uploads/{{ $img->url }}" >
                                        @endif

                                        @if($i == 2)
                                        <img class="second-img" src="uploads/{{ $img->url }}" >
                                        @endif

                                        <?php $i++ ?>

                                    @endforeach
                                </a>

                                <div class="product-over-add">
                                    <a href="{{ route('view_product_fe', ['slug' => $product->slug]) }}" class="btn btn-addtocart">xem chi tiết</a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="{{ route('view_product_fe', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="product-price">{{ number_format($product->unit_price) }}đ </div>
                        </div>
                        <?php $wow += 200 ?>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@stop