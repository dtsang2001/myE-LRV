<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\User_Level;
use Illuminate\Support\Facades\Auth;

/**
 * 
 */
class RoleController extends Controller
{
	public function list()
	{
		$customer = User::latest()->where('level', 0)->get();
		return view('admin.role',[
			'customer' =>$customer,
		]);
	}

	public function update_admin($id)
	{
		User::find($id)->update([
			'level' => 1,
		]);

		return redirect()->route('user');
	}

}
?>