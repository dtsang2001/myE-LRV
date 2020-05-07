<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category_News;
use App\Model\News;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Session;
use File;

/**
 * 
 */
class NewsController extends Controller
{
	public function list()
	{
		$author = User::all();
		$news = News::latest()->get();
		return view('admin.news.list',[
			'news' => $news,
			'author' => $author,
		]);
	}

	public function add()
	{
		$cat_news = Category_News::all();
		return view('admin.news.add',[
			'cat_news' => $cat_news,
		]);
	}

	public function create(Request $req)
	{
		$this->validate($req, 
		[
			'title' => 'required|unique:news,title',
			'slug' => 'required|unique:news,slug',
			'category_news_id' => 'required',
			'file' => 'required|mimes:jpg,jpeg,png,gif',
			'content' => 'required',
		],
		[
			'title.required' => 'Tên danh mục chưa nhập',
			'slug.required' => 'Đường link chưa nhập',
			'title.unique' => 'Tên danh mục đã tồn tại',
			'slug.unique' => 'Đường link đã tồn tại',
			'category_news_id.required' => 'Danh mục chưa chọn',
			'file.required' => 'Hình ảnh chưa chọn',
			'file.mimes' => 'Hình ảnh không đúng định dạng',
			'content.required' => 'Nội dung chưa nhập',
		]);


		if ($req->hasFile('file')) {
			$image = $req->file('file');

			$image_name = date('Y-m-d-h-s-i').$image->getClientOriginalName();

			$image->move(base_path('uploads/'), $image_name);
		}

		$req->merge([
			'user_id' => Auth::user()->id,
			'image' => $image_name
		]);

		News::create($req->all());

		Session::flash('news_success', 'Bài viết '.$req->title.' đã được đăng bới bạn');

		return redirect()->route('news');
	}

	public function edit($id)
	{
		$cat_news = Category_News::all();
		$admin = Auth::user();
		$poster = News::find($id);
		return view('admin.news.edit',[
			'admin' => $admin,
			'cat_news' => $cat_news,
			'poster' => $poster
		]);
	}

	public function update($id, Request $req)
	{
		$this->validate($req, 
		[
			'title' => 'required|unique:news,title,'.$id,
			'slug' => 'required|unique:news,slug,'.$id,
			'category_news_id' => 'required',
			'file' => 'mimes:jpg,jpeg,png,gif',
			'content' => 'required',
		],
		[
			'title.required' => 'Tên danh mục chưa nhập',
			'slug.required' => 'Đường link chưa nhập',
			'title.unique' => 'Tên danh mục đã tồn tại',
			'slug.unique' => 'Đường link đã tồn tại',
			'category_news_id.required' => 'Danh mục chưa chọn',
			'file.mimes' => 'Hình ảnh không đúng định dạng',
			'content.required' => 'Nội dung chưa nhập',
		]);


		if ($req->hasFile('file')) {
			$news = News::find($id);

			File::delete('uploads/' . $news->image);

			$image = $req->file('file');

			$image_name = date('Y-m-d-h-s-i').$image->getClientOriginalName();

			$image->move(base_path('uploads/'), $image_name);

			News::find($id)->update([
				'image' => $image_name
			]);
		}

		News::find($id)->update($req->all());

		Session::flash('news_success', 'Bài viết '.$req->title.' đã được chỉnh sửa');

		return redirect()->route('news');
	}

	public function delete($id)
	{
		$news = News::find($id);
		
		File::delete('uploads/' . $news->image);

		News::destroy($id);

		Session::flash('news_success', 'Bài viết đã xóa');

		return redirect()->route('news');
	}

	public function view()
	{
		
	}
}
?>