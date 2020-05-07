@extends('layouts.customer')
@section('title', 'Đặt hàng')

@section('content')
<!-- Nguồn Trang -->
<div class="page-section bg-gray small-section">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Trang Chính</a></li>
                        <li><a href="{{ route('cart') }}">Giỏ Hàng</a></li>
                        <li class="active">Đặt Hàng</li>
                    </ol>
                </div>
                <div class="col-md-8 text-right">
                    <h1>Đặt Hàng</h1>
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::check())
<div id="main">
    <div class="page-section">
        <div class="container">
            <div class="woocommerce">
                <form action="" method="POST" class="checkout">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="woocommerce-billing-fields box">
                                <h5 class="title-checkout">Địa chỉ thanh toán</h5>
                                <div class="checkout-wrap">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                    <div class="form-group">
                                        <label>Họ và Tên <abbr title="yêu cầu nhập" class="required">*</abbr></label>
                                        <input class="input-bg" type="text" value="{{Auth::user()->name}}" />
                                    </div>

                                    <div class="form-group">
                                        <label>Địa chỉ <abbr title="yêu cầu nhập" class="required">*</abbr> (bạn có thế nhập địa chỉ nhận khác)</label>
                                        <input class="input-bg" type="text" name="address" value="{{Auth::user()->address}}" />
                                    </div>

                                    <div class="form-group">
                                        <label>Số điện thoại <abbr title="yêu cầu nhập" class="required">*</abbr></label>
                                        <input class="input-bg" type="text" value="{{Auth::user()->phone}}" />
                                    </div>

                                    <div class="form-group">
                                        <label>Email <abbr title="yêu cầu nhập" class="required">*</abbr></label>
                                        <input class="input-bg" type="text" value="{{Auth::user()->email}}" />
                                    </div>

                                    <div class="woocommerce-shipping-fields box">
                                        <label>Ghi chú</label>
                                        <div class="form-group">
                                            <textarea name="note" class="input-bg"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <h5 class="title-order">Đơn Hàng Của Bạn</h5>
                            <div class="checkout-wrap">
                                <div id="order_review">
                                    <table class="shop_table box">
                                        <tbody>

                                        	@foreach($cart->items as $item)
	                                        <tr class="cart_item">
	                                            <th class="product-name">
	                                                {{ $item['name'] }} <span class="product-quantity">× {{ $item['quantity'] }}</span>
	                                            </th>
	                                            <td class="product-total text-right">
	                                                <span class="amount">
		                                                {{ number_format($item['subtotal']) }}đ
		                                            </span>
	                                            </td>
	                                        </tr>
	                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td class="text-right"><span class="amount">
                                            	{{ number_format($cart->total_price) }}đ
                                            </span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Vận chuyển và xử lý</th>
                                            <td class="text-right">
                                                miễn phí vận chuyển
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Thành tiền</th>
                                            <td class="text-right"><span class="amount"><b>{{ number_format($cart->total_price) }}đ</b></span></td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    <div id="payment">

                                        <ul class="payment_methods">

                                            <li class="payment_method_bacs">
                                                <label class="radio">
                                                    <input id="payment_method_bacs" class="input-radio" name="payment_method" value="basic" checked="checked" data-order_button_text="" type="radio">
                                                    Thanh toán khi nhận hàng
                                                </label>
                                                <div class="payment_box payment_method_bacs" style="display: block"><p>Hàng sẽ được gứi đến bạn trước, sau đó hãy trả lại tiền cho người giao hàng</p>
                                                </div>
                                            </li>

                                            <li class="payment_method_cheque">
                                                <label class="radio">
                                                    <input id="payment_method_cheque" class="input-radio" name="payment_method" value="banking" data-order_button_text="" type="radio">
                                                    Cheque Payment
                                                </label>
                                                <div class="payment_box payment_method_cheque"><p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </li>

                                            <li class="payment_method_paypal">
                                                <label class="radio">
                                                    <input id="payment_method_paypal" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal" type="radio">
                                                    PayPal <img src="http://demo.qodeinteractive.com/bridge/wp-content/plugins/woocommerce/assets/images/icons/paypal.png" alt="PayPal">
                                                </label>
                                                <div class="payment_box payment_method_paypal"><p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-row place-order">
	                                        <button id="place_order" class="btn btn-dark-b">Đặt hàng</button>
	                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- #main -->
@else
<div class="woocommerce">
	<div class="cart-collaterals row">
		<div class="cart_totals col-md-12">
            <div class="cart-collaterals-inner remove-mar-bottom">
            	<div>
            		<img class="center-block" src="uploads/login_error.jpg">
            	</div>
            	<table>
                    <tr class="cart-subtotal">
                        <td class="text-right">
                        	<h5>Bạn chưa đăng nhập</h5>
                        	<div class="center-block button-checkout">
	                            <a class="btn btn-default btn-animation" href="{{ route('login_fe') }}">
	                                <span>Đăng nhập <i class="fa fa-long-arrow-right"></i></span>
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
@stop