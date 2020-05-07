@extends('layouts.customer')
@section('title', 'Home')

@section('content')
        

<div class="page-section bg-gray no-padding">
    <div class="container-fluid">
        <div class="row equal_height">

            <div class="col-md-8 kt_column">
                <div class="page-small-width">
                    <div class="kt-heading-wrapper mar-top-90">
                        <h3 class="kt-heading-title">cập nhật sản phẩm mới nhất</h3>
                        <div class="kt-heading-subtitle"><a href="#">Xem ngay</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 kt_column kt-column-bg hidden-xs hidden-sm" style="background: #CCCCCC; "></div>
        </div>

        <div class="row equal_height">

            <div class="col-md-8 kt_column  pad-top-lg pad-bottom-lg" style="background:#bce5d3 url('uploads/{{ $pro_new->first()->product_image->first()->url }}') no-repeat center right; background-size: 500px 400px;">
                <div class="page-small-width">
                    <h3>{{ $pro_new->first()->name }}</h3>
                    
                    @if($pro_new->first()->sale_price > 1)
                    <span class="sale_price"><del>{{ number_format($pro_new->first()->unit_price) }}VND</del></span>
                    <h3 class="price">
                        <span class="amount">{{ number_format($pro_new->first()->sale_price) }} vnd</span>
                    </h3>
                    @else
                    <h3 class="price">
                        <span class="amount">{{ number_format($pro_new->first()->unit_price) }} vnd</span>
                    </h3>
                    @endif

                    <p class="remove-mar-bottom">
                        <a class="btn btn-default btn-animation" href="{{ route('view_product_fe', ['slug' => $pro_new->first()->slug]) }}">
                            <span>Mua ngay <i class="fa fa-long-arrow-right"></i></span>
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-md-4 kt_column pad-top-lg pad-bottom-lg" style="background-color: #b2d9c8;">
                <div class="kt-table">
                    <div class="kt-col">
                        <h2 class="white text-center no-margin">sản phẩm mới nhất</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row equal_height">
            <div class="col-md-4 kt_column kt-column-bg hidden-xs hidden-sm" style="background: #CCCCCC; "></div>

            <div class="col-md-8 kt_column">
                <div class="page-small-width">
                    <div class="kt-heading-wrapper mar-top-90">
                        <h3 class="kt-heading-title">Danh mục cho bạn lựa chọn</h3>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div id="main">

        <div class="page-section no-padding">
            <div class="owl-carousel-kt no-gutters navigation-center-inner no-margin">
                <div class="owl-carousel kt-owl-carousel" data-options='{"pagination": false, "navigation": true, "desktop": 3, "desktopsmall": 2, "tablet" : 2, "mobile" : 1}'>
                    
                    @foreach($cat_parent as $cat)
                    <div class="category-banner">
                        <img src="uploads/{{$cat->img}}" style="object-fit: cover;">
                        <div class="category-banner-content">
                            <h1 class="white">{{$cat->name}}</h1>

                            <ul class="">
                            	@foreach($cats as $c)
                            	<?php $check = ($c->parent == $cat->id)? $c->name : '' ?>
                                <li><a href="#">{{ $check }}</a> </li>
                                @endforeach
                            </ul>

                            <a href="#" class="btn btn-light-b">Xem ngay</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>


        <!-- Sản phẩm mới nhất -->
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
                    <h3 class="kt-heading-title">SẢN PHẨM MỚI NHẤT</h3>
                    <div class="kt-heading-subtitle"><a href="#">xem tất cả</a></div>
                </div>

                <div class="products">

                    <div class="owl-carousel-kt remove-mar-bottom navigation-center">
                        <div class="owl-carousel kt-owl-carousel" data-options='{"pagination": false, "navigation": true, "desktop": 4, "desktopsmall" : 3, "tablet" : 2, "mobile" : 1}'>
							<?php $wow = 200 ?>
							@foreach($pro_new as $pro)
                            <div class="product wow fadeInUp" data-wow-delay="{{$wow}}ms">
                                <div class="product-content">
                                    <a href="{{ route('view_product_fe', ['slug' => $pro->slug]) }}" class="product-thumbnail">
                                    	<?php $i = 1 ?>
                                    	@foreach($pro->product_image->take(2) as $img)

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
                                        <a href="{{ route('view_product_fe', ['slug' => $pro->slug]) }}" class="btn btn-addtocart">thêm vào giỏ</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('view_product_fe', ['slug' => $pro->slug]) }}">{{ $pro->name }}</a>
                                </h3>

                                @if($pro->sale_price > 1)
                                <div class="product-price">
                                    <b>{{ number_format($pro->sale_price) }}đ </b>
                                    <small><del>{{ number_format($pro->unit_price) }}đ </del></small>
                                </div>
                                @else
                                <div class="product-price">
                                    <b>{{ number_format($pro->unit_price) }}đ </b>
                                </div>
                                @endif
                                
                            </div>
                            <?php $wow = $wow + 200 ?>
                            @endforeach

                        </div>
                    </div>

                </div>


            </div>
        </div>

        <div class="page-section no-padding">
            <div class="container">
                <div class="kt-heading-wrapper">
                    <div class="kt-heading-divider">
                        <svg xml:space="preserve" style="enable-background:new 349 274.7 1310.8 245.3;" viewBox="349 274.7 1310.8 245.3" y="0px" x="0px" version="1.1">
                            <path d="M1222,438.9c-2.7,0-5.4,0-8.1-2.7l-210.8-129.7L792.3,436.2c-5.4,2.7-10.8,2.7-13.5,0L573.3,306.5L365.2,436.2L349,411.9
                                l216.2-132.4c5.4-2.7,10.8-2.7,13.5,0l208.1,127l210.8-129.7c5.4-2.7,10.8-2.7,13.5,0L1222,409.2l208.1-129.7
                                c5.4-2.7,10.8-2.7,13.5,0l216.2,135.1l-13.5,21.7l-208.1-129.7l-208.1,129.7C1227.4,436.2,1224.7,438.9,1222,438.9L1222,438.9z"/>
                            <path d="M1222,520c-2.7,0-5.4,0-8.1-2.7l-210.8-129.7L792.3,517.3c-5.4,2.7-10.8,2.7-13.5,0L573.3,387.6L362.5,517.3L349,493
                                l216.2-132.4c5.4-2.7,10.8-2.7,13.5,0l205.4,129.7L995,360.5c5.4-2.7,10.8-2.7,13.5,0l210.8,129.7l208.1-129.7
                                c5.4-2.7,10.8-2.7,13.5,0l216.2,135.1l-13.5,21.6l-205.4-129.7l-208.1,129.8C1227.4,517.3,1224.7,520,1222,520L1222,520z"/>
                            </svg>
                    </div>
                    <h3 class="kt-heading-title">Sản phẩm nối bật</h3>
                    <div class="kt-heading-subtitle"><a href="#">xem tất cả</a></div>
                </div>

                <div class="row products products-multi-masonry masonry-botom">
                    <div class="clearfix product col-sm-3 grid-sizer"></div>
					
					<?php $i = 1 ?>
					<?php $wow = 200 ?>
                    @foreach($pro_top as $pro)
					
					@if($i == 1)
						<?php $class = "col-sm-6 product product wide wow fadeInUp" ?>

					@elseif($i == 2 || $i == 3)
						<?php $class = "col-sm-6 product landscape wow fadeInUp" ?>

					@elseif($i == 4 || $i == 5 || $i == 6 || $i == 7 || $i == 9 || $i == 10)
						<?php $class = "col-sm-3 product standard wow fadeInUp" ?>

					@elseif($i == 8)
						<?php $class = "col-sm-9 product big wow fadeInUp" ?>

					@endif

					<div class="{{$class}}" data-wow-delay="{{$wow}}ms">
                        <div class="product-inner">
                            <div class="product-content">
                                <a class="product-thumbnail" href="{{ route('view_product_fe', ['slug' => $pro->slug]) }}">

                                    <img src="uploads/{{ $pro->product_image->first()->url }}" width="100%">

                                </a>
                            </div>

                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="{{ route('view_product_fe', ['slug' => $pro->slug]) }}">{{ $pro->name }}</a>
                                </h3>
                                @if($pro->sale_price > 1)
                                <div class="product-price">
                                    <b>{{ number_format($pro->sale_price) }}đ </b>
                                    <small><del>{{ number_format($pro->unit_price) }}đ </del></small>
                                </div>
                                @else
                                <div class="product-price">
                                    <b>{{ number_format($pro->unit_price) }}đ </b>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

					<?php $i++ ?>
					<?php $wow += 100 ?>
                    @endforeach


                </div>
            </div>
        </div>


        <!-- Quảng cáo Website -->
        <div class="page-section pad-xlg bg-dark-alfa-40 parallax-1" style="background-image: url('uploads/bg-qc.jpg') ">
            <div class="page-section-inner">
                <div class="container">
                    <h2 class="text-center white no-margin">HAWK - SHOP HÀNG ĐẦU TRONG LĨNH VỰC HỘI HỌA</h2>
                </div>
            </div>
        </div>


        <!-- Blog -->
        <div class="page-section pad-bottom-35">
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
                    <h3 class="kt-heading-title">Tin tức mới nhất</h3>
                    <div class="kt-heading-subtitle"><a href="blog-gird-3columns.html">xem tất cả</a></div>
                </div>

                <div class="blog-posts">
                    <div class="row multi-columns-row">
						
						@foreach($news as $n)
                        <div class="blog-post col-lg-4 col-md-4 col-sm-6">
                            <a href="blog-singlepost-standard.html" class="blog-post-thumbnail">
                                <img src="uploads/{{ $n->image }}" style="width: 100%; height: 220px; object-fit: cover;">
                            </a>
                            <h4 class="blog-post-title" >
                                <a href="blog-singlepost-standard.html">{{ $n->title }}</a>
                            </h4>
                            <div class="blog-post-meta">

                                <span class="author vcard">Tác giả: <a href="#">{{ $n->user->name }}</a></span>

                            </div>

                            <div style="height: 120px; overflow: hidden; text-overflow: ellipsis;">
                            	{!! $n->content !!}
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div><!-- #main -->

@stop