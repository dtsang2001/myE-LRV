<?php 
namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Cart;
use Illuminate\Support\Facades\Auth;
use App\Model\Product;
use App\Model\Product_Image;
use View;

/**
 * summary
 */
class CartController extends Controller
{

    public function add_cart($id, Cart $cart, Request $req)
    {
        if (isset($req->qty)) {
            $qty = $req->qty;
            echo $qty;
        } else {
            $qty = 1;
        }

    	$model = Product::find($id);

    	if ($model) 
    	{
    		$cart->add($model, $qty);

    		return redirect()->back();
    	}
    	else 
    	{
    		return view('customer.error.404');
    	}
    }

    public function view()
    {
    	return view('customer.cart.view');
    }

    public function delete_cart($id, Cart $cart)
    {
    	$cart->delete($id);

    	return redirect()->route('cart');
    }

    public function update_cart($id, Request $req, Cart $cart)
    {
    	$qty = request()->qty;

    	$cart->update($id, $qty);

    	return redirect()->route('cart');
    }

    public function clear_cart(Cart $cart)
    {
    	$cart->clear();

    	return redirect()->route('cart');
    }

}

?>