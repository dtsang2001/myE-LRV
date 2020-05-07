<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\News;
use Illuminate\Support\Facades\Auth;
use Session;

/**
 * 
 */
class DashboardController extends Controller
{
	public function index()
	{
		$account = User::where('level', 0)->count();
		$posters = News::count();
		return view('admin.index', [
			'account' => $account,
			'posters' => $posters,
		]);
	}

	public function login()
	{
		return view('admin.login');
	}

	public function post_login(Request $req)
	{
		$users = User::all();

		if (Auth::attempt($req->only('email','password'), $req->has('remember'))) {

			foreach ($users as $user) {
				if ($user->email == $req->email) {

					if ($user->level == 1) {
						Session::flash('success_login', 'Đăng nhập thành công !!!');
						return redirect()->route('admin');
					} else {
						Session::flash('error_login', 'Bạn không phải là quản trị viên');
						return redirect()->route('login');
					}
				}
			}
		}
		else {
			Session::flash('error_login', 'Email hoặc mật khẩu không đúng');
			return redirect()->route('login');
		}

	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}

}
?>