<?php 
namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

/**
 * summary
 */
class AccountController extends Controller
{
    /**
     * summary
     */
    public function view()
    {
    	return view('customer.account.view');
    }
}


?>