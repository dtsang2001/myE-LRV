@extends('layouts.customer')
@section('title')
Giỏ hàng của bạn
@stop

@section('content')
<!-- Nguồn Trang -->
<div class="page-section bg-gray small-section">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Trang Chính</a></li>
                        <li class="active">Giỏ Hàng</li>
                    </ol>
                </div>
                <div class="col-md-8 text-right">
                    <h1>Giỏ Hàng</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="main">
    <div>
        <div class="container">
        	@if($cart->items)
            <div class="woocommerce">
				<div class="clearfix" style="margin: 20px 0">

                    <div class="button-checkout" style="float: left;">
                        <a class="btn btn-default btn-animation" href="{{ route('product_fe') }}">
                            <span>Quay về mua sắm <i class="fa fa-long-arrow-left"></i></span>
                        </a>
                    </div>

                    <div class="button-checkout" style="float: right;">
                    	<a class="btn btn-dark-b" href="{{ route('clear-cart') }}">
                            <span>Xóa giỏ hàng</span>
                        </a>
                    </div>

                </div>

                <div class="table-responsive table-cart">
                    <table class="shop_table cart">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">Hình ảnh</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-price">Giá</th>
                            <th class="product-subtotal">Tổng</th>
                            <th class="product-remove">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>

                        	@foreach($cart->items as $item)
                            <tr class="cart_item">
                                <td class="product-thumbnail">
                                    <a href="{{ route('view_product_fe', ['slug' => $item['slug']]) }}" class="attachment-shop_thumbnail wp-post-image"><img class="img-responsive" src="uploads/{{$item['image']->url}}" alt=""></a>
                                </td>
                                <td class="product-name" >
                                    <a href="{{ route('view_product_fe', ['slug' => $item['slug']]) }}">{{$item['name']}}</a>
                                </td>
                                <td class="product-quantity" style="width: 100px">

                                	<form method="GET" action="{{ route('update-cart', ['id' => $item['id']]) }}">
                                		<div class="input-group" style="width: 140px">
									      	<input type="text" size="4" title="Qty" value="{{$item['quantity']}}" name="qty" class="form-control">
									      	<span class="input-group-btn" >
									        	<button class="btn btn-default">
									        		<i class="glyphicon glyphicon-refresh"></i>
									        	</button>
									      	</span>
									    </div>
                                	</form>                                	

                                </td>
                                <td class="product-price">
                                    <span class="amount">{{number_format($item['unit_price'])}}đ</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount"><b>{{number_format($item['subtotal'])}}đ</b></span>
                                </td>
                                <td class="product-remove">
                                    <a href="{{ route('delete-cart', ['id' => $item['id']]) }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="cart-collaterals row" style="margin: 20px 0">

                    <form class="coupon-form col-md-4">
                        <h5>Mã khuyến mại</h5>
                        <div class="cart-collaterals-inner">
                            <div class="coupon">
                                <p>Nhập mã phiếu giảm giá của bạn nếu bạn có</p>
                                <input class="input-bg" placeholder="Coupon Code" type="text" name="coupon_code" />
                                <button name="apply_coupon" class="btn btn-dark-b">Áp dụng mã</button>
                            </div>
                        </div>
                    </form>

                    <div class="cart_totals col-md-8">
                        <h5>Thông tin đơn hàng</h5>
                        <div class="cart-collaterals-inner remove-mar-bottom">
                            <table>
                                <tbody>
                                <tr class="cart-subtotal">
                                    <th>Tiền tạm tính</th>
                                    <td class="text-right"><span class="amount">{{ number_format($cart->total_price) }}đ</span></td>
                                </tr>
                                <tr class="shipping">
                                    <th>Phí vận chuyển</th>
                                    <td class="text-right">
                                        + 0đ
                                        <input type="hidden" class="shipping_method" value="0" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                    </td>
                                </tr>
                                <tr class="code-sale">
                                    <th>Mã giảm giá</th>
                                    <td class="text-right"><span class="price-sale">- 0đ</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Thành tiền</th>
                                    <td class="text-right"><span class="amount">{{ number_format($cart->total_price) }}đ</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="button-checkout">
                            <a class="btn btn-default btn-animation" href="{{ route('order') }}">
                                <span>Tiến hành đặt hàng <i class="fa fa-long-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            @else
            <div class="woocommerce">
        		<div class="cart-collaterals row">
        			<div class="cart_totals col-md-12">
                        <div class="cart-collaterals-inner remove-mar-bottom">
                        	<table>
                                <tr class="cart-subtotal">
                                    <th><img class="center-block" src="uploads/cart_null.jpg"></th>
                                    <td class="text-right">
                                    	<h5>Giỏ hàng đang trổng</h5>
                                    	<div class="center-block button-checkout">
				                            <a class="btn btn-default btn-animation" href="{{ route('product_fe') }}">
				                                <span>Quay lại mua sắm <i class="fa fa-long-arrow-right"></i></span>
				                            </a>
				                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
        		</div>
        	</div>
        	@endif
        </div>
    </div>
</div><!-- #main -->
@stop