<?php 

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Category;
use App\Model\Product;
use App\Model\Product_Image;
use App\Model\News;
use App\Model\User;
use App\Model\Comment;
use Session;


/**
 * summary
 */
class HomeController extends Controller
{
    public function index()
    {
    	$cats = Category::all();
        $cat_parent = Category::where('parent', '0')->get();
    	$pro_new = Product::latest()->take(8)->get();
        $pro_top = Product::take(10)->get();
    	$pro_img = Product_Image::all();
    	$news = News::latest()->take(3)->get();

    	return view('customer.index', [
    		'cats' => $cats,
            'cat_parent' => $cat_parent,
    		'pro_new' => $pro_new,
            'pro_top' => $pro_top,
    		'pro_img' => $pro_img,
    		'news' => $news,
    	]);
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function login()
    {
        return view('customer.login');
    }

    public function post_login(Request $req)
    {
        $this->validate($req, 
        [
            'password' => 'required',
            'email' => 'required|email',
        ],
        [
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng'
        ]);

        if(Auth::attempt($req->only('email','password'))){
            return redirect()->back();
        }else {
            return redirect()->route('account');
        };
    }

    public function post_register(Request $req)
    {
        $this->validate($req, 
        [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|min:8',
            'password_re' => 'required|same:password',
            'address' => 'required',
            'file' => 'image|mimes:jpg,jpeg,png,gif,bmp'
        ],
        [
            'name.required' => 'Bạn chưa nhập Họ và Tên',
            'email.required' => 'Bạn chưa nhập Email',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Bạn chưa nhập Số điện thoại',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
            'phone.unique' => 'Số điện thoại phải là số',
            'password.required' => 'Bạn chưa nhập Mật khẩu',
            'password.min' => 'Mật khẩu yêu cầu nhiều hơn 8 ký tự',
            'password_re.required' => 'Bạn chưa nhập lại Mật khẩu',
            'password_re.same' => 'Mật khẩu nhập lại không trùng khớp',
            'address.required' => 'Bạn chưa nhập Địa chỉ',
            'file.mimes' => 'Hình ảnh chưa đúng định dạng',
        ]);

        if ($req->hasFile('file')) {
            
            $avatar = $req->file('file');

            $avatar_name = date('Y-m-d-h-s-i').$avatar->getClientOriginalName();

            $avatar->move(base_path('uploads/'), $avatar_name);
        } else {
            $avatar_name = 'avatar_default.jpg';
        }

        $password = bcrypt($req->password);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'avatar' => $avatar_name,
            'password' => $password,
            'address' => $req->address,
            'level' => 0,
        ]);

        Session::flash('login_success', 'Bạn đã đăng ký thành công, hãy đăng nhập');
        return redirect()->route('login_fe');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

}

?>