@extends('layouts.customer')

@section('title')
	@if(session('success'))
	Đặt hàng thành công
	@else if({{session('error')}})
	Đặt hàng không thành công
	@endif
@stop

@section('content')
	@if(session('success'))

	<div class="woocommerce">
		<div class="cart-collaterals row">
			<div class="cart_totals col-md-12">
	            <div class="cart-collaterals-inner remove-mar-bottom">
	            	<table>
	                    <tr class="cart-subtotal">
	                        <td class="text-right">
	                        	<h5>{{session('success')}}</h5>
<!-- 	                        	<div class="center-block button-checkout">
		                            <a class="btn btn-default btn-animation" href="{{ route('login_fe') }}">
		                                <span>Đăng nhập <i class="fa fa-long-arrow-right"></i></span>
		                            </a>
		                        </div> -->
	                        </td>
	                    </tr>
	                </table>
	            	<div>
	            		<img class="center-block" src="uploads/order_seccess.gif">
	            	</div>
	            </div>
	        </div>
		</div>
	</div>

	@else if(session('error'))

	<div class="woocommerce">
		<div class="cart-collaterals row">
			<div class="cart_totals col-md-12">
	            <div class="cart-collaterals-inner remove-mar-bottom">
	            	<table>
	                    <tr class="cart-subtotal">
	                        <td class="text-right">
	                        	<h5>{{session('error')}}</h5>
	                        	<!-- <div class="center-block button-checkout">
		                            <a class="btn btn-default btn-animation" href="{{ route('login_fe') }}">
		                                <span>Đăng nhập <i class="fa fa-long-arrow-right"></i></span>
		                            </a>
		                        </div> -->
	                        </td>
	                    </tr>
	                </table>
	                
	            	<div>
	            		<img class="center-block" src="uploads/order_error.gif">
	            	</div>
	            	
	            </div>
	        </div>
		</div>
	</div>

	@endif
@stop