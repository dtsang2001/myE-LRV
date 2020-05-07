@extends('layouts.customer')
@section('title', 'Cửa hàng')

@section('content')
<div class="page-section bg-gray small-section">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Trang Chính</a></li>
                        <li class="active">Sản Phẩm</li>
                    </ol>
                </div>
                <div class="col-md-8 text-right">
                    <h1>{{ (isset($cat))? 'Sản phẩm '.$cat->name : 'Tất cả sản phẩm'}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<div id="main">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 side-bar">

                    <div class="widget-container widget_product_categories">
                        <h3 class="widget-title">Tìm kiểm</h3>
                        <form class="md-form mt-0" method="GET" action="#">
                            <input class="form-control" type="text" placeholder="Tìm kiểm..." >
                        </form>
                    </div>

                    <div class="widget-container widget_product_categories">
                        <h3 class="widget-title">Danh Mục</h3>
                        <ul>
                            <li><a href="{{ route('product_fe') }}">Tất cả</a></li>
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('view_product_fe', ['slug' => $cat->slug]) }}">{{ $cat->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                
                <div class="col-md-9 col-sm-12 col-xs-12 pull-right">
                    
                    <!-- Lọc Sản Phẩm -->
                    <div class="products-tools clearfix">

                        <form class="products-sortby" method="get" action="#">
                            <div class="select-icon">
                                <select name="showby">
                                    <option value="15"> 15 SP</option>
                                    <option value="30"> 30 SP</option>
                                    <option value="45"> 45 SP</option>
                                </select>
                            </div>
                            <div class="select-icon">
                                <select name="shortby">
                                	<option value="selling"> Mới nhất</option>
                                    <option value="selling"> Bán chạy nhất</option>
                                    <option value="popularity"> Phổ biến</option>
                                    <option value="rating"> Giá từ thấp - cao</option>
                                    <option value="date"> Giá từ cao - thấp</option>
                                </select>
                            </div>
                        </form>

                        <!-- Hiện thi theo cột dọc / hàng ngang -->
                        <ul class="grid-list">
                            <li><a class="active" href="#" data-layout="grid" data-remove="lists" title="Grid view"><i class="fa fa-th"></i></a></li>
                            <li><a href="#" data-layout="lists" data-remove="grid" title="List view"><i class="fa fa-bars"></i></a></li>
                        </ul>

                    </div>
                    
                    <!-- Danh Sách Sản Phẩm -->
                    <div class="row multi-columns-row">
                        <div class="products">
							
							@foreach($pros as $pro)
                            <div class="product col-lg-4 col-md-4 col-sm-6 col-xs-6">
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
                                        <a href="{{ route('add-cart', ['id' => $pro->id]) }}" class="btn btn-addtocart">thêm vào giỏ</a>
                                    </div>
                                </div>
                                <div class="product-attribute">
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
                                    
                                    <div class="product-description">{!! $pro->description !!}</div>
                                    <div class="produt-tool-list clearfix">
                                        <div class="quantity">
                                            <input type="text" size="4" class="input-text qty text" title="Số lượng" value="1" name="qty" />
                                        </div>
                                        <div class="product-over-add">
                                            <a href="#" class="btn btn-addtocart-b">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{ $pros->links('layouts.paginate') }}

                </div>
                
            </div>
        </div>
    </div>
</div>
@stop