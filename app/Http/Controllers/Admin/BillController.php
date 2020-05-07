<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Order_Detail;
use App\Model\Orders;

/**
 * 
 */
class BillController extends Controller
{
	public function list()
	{
		return view('admin.bill');
	}

}
?>