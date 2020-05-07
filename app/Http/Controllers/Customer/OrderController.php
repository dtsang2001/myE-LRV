<?php 
namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helper\Cart;
use App\Model\Orders;
use App\Model\Order_Detail;
use App\Model\Product;
use Session;

/**
 * summary
 */
class OrderController extends Controller
{
	public function order()
	{
		return view('customer.order.checkout');
	}

	public function post_order(Request $req, Cart $cart)
	{
		$req->merge([
			'user_id' => Auth::id(),
			'total_price' => $cart->total_price,
			'status' => 0,
		]);

		$datas = [];

		if ($order = Orders::create($req->all()))
		{
			foreach ($cart->items as $item) {
				$datas[] = [
					'product_id' => $item['id'],
					'order_id' => $order->id,
					'quantity' => $item['quantity'],
					'unit_price' => $item['unit_price'],
				];
			}

			if ($datas) 
			{
				if (Order_Detail::insert($datas)) 
				{
					$cart->clear();
					return redirect()->route('order_notification')->with('success', 'Bạn đã đặt hàng thành công');
				} 
				else 
				{
					$order->delete();
					return redirect()->route('order_notification')->with('error', 'Đặt hàng không thành công');
				}
			}
		} 
		else
		{
			
		}
	}

	public function notification()
	{
		return view('customer.order.notification');
	}

	public function history()
	{
		
	}

	public function detail($id)
	{
		
	}
}

?>