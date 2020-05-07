<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\News;
use Illuminate\Support\Facades\Auth;
use Session;
use File;

/**
 * 
 */
class UserController extends Controller
{
	public function list()
	{
		$users = User::latest()->paginate(10);
		$members = User::where('level', 1)->count();
		return view('admin.user.list',[
			'users' => $users,
			'members' => $members,
		]);
	}

	public function add()
	{
		return view('admin.user.add');
	}

	public function create(Request $req)
	{
		$this->validate($req, 
		[
			'name' =>'required',
			'email' => 'required|email|unique:users,email',
			'phone' => 'required|min:9|max:11|unique:users,phone',
			'password' => 'required|min:8',
			're_password' => 'required|same:password',
			'level' => 'required',
			'file' => 'image|mimes:jpg,jpeg,png,gif,bmp'
		],
		[
			'name.required' => 'Họ và Tên không được để trống',
			'email.required' => 'Email không được để trống',
			'email.email' => 'Email không đúng định dạng',
			'email.unique' => 'Email đã tồn tại',
			'phone.required' => 'Số điện thoại không được để trống',
			'phone.unique' => 'Số điện thoại đã tồn tại',
			'phone.min' => 'Số điện thoại không đúng định dạng',
			'phone.max' => 'Số điện thoại không đúng định dạng',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Mật khẩu nhiều hơn 8 ký tự',
			're_password.required' => 'Mật khẩu nhập lại không được để trống',
			're_password.same' => 'Mật khẩu nhập lại không trùng',
			'level.required' => 'Cấp tài khoản không được để trống',
			'file.mimes' => 'Hình ảnh chưa đúng định dạng'
		]);

		if ($req->hasFile('file')) {

			$avatar = $req->file('file');

			$avatar_name = date('Y-m-d-h-s-i').$avatar->getClientOriginalName();

			$avatar->move(base_path('uploads/'),$avatar_name);
		}
		else {
			$avatar_name = 'avatar_default.jpg';
		}

		// Mã hóa password
		$password = bcrypt($req->password);

		User::create([
			'name' => $req->name,
			'email' => $req->email,
			'phone' => $req->phone,
			'avatar' => $avatar_name,
			'password' => $password,
			'level' => $req->level,
			'address' => $req->address,
		]);

		return redirect()->route('user');
	}

	public function view($id)
	{
		$user = User::find($id);
		$news = News::where('user_id', $id)->latest()->get();
		return view('admin.user.view', [
			'user' => $user,
			'news' => $news
		]);
	}

	public function upload_avatar($id, Request $req)
	{
		$user = User::find($id);

		if ($req->hasFile('avatar')) {
			File::delete('uploads/' . $user->avatar);

			$avatar = $req->file('avatar');

			$avatar_name = date('Y-m-d-h-s-i').$avatar->getClientOriginalName();

			$avatar->move(base_path('uploads/'), $avatar_name);

			User::find($id)->update([
				'avatar' => $avatar_name,
			]);

			Session::flash('user_success', 'Bạn cập nhật avatar thành công');

			return redirect()->back();
		} else {
			Session::flash('user_warning', 'Avatar của bạn được giữ nguyên');

			return redirect()->back();
		}
	}

}
?>