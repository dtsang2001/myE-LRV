<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category_News;
use App\Model\User;
use App\Model\News;
use Illuminate\Support\Facades\Auth;
use Session;

/**
 * 
 */
class CategoryNewsController extends Controller
{
	public function list()
	{
		$news_cats = Category_News::latest()->get();
		return view('admin.category_news.list', [
			'news_cats' => $news_cats,
		]);
	}

	public function add()
	{
		return view('admin.category_news.add');
	}

	public function create(Request $req)
	{
		$this->validate($req, 
		[
			'name' => 'required|unique:category_news,name',
			'slug' => 'required|unique:category_news,slug'
		],
		[
			'name.required' => 'Tên danh mục chưa nhập',
			'slug.required' => 'Đường link chưa nhập',
			'name.unique' => 'Tên danh mục đã tồn tại',
			'slug.unique' => 'Đường link đã tồn tại'
		]);

		Category_News::create($req->all());

		Session::flash('category_news_success', 'Bạn đã tạo danh mục tin tức '.$req->name);

		return redirect()->route('category-news');
	}

	public function edit($id)
	{
		$id = Category_News::find($id);

		return view('admin.category_news.edit', [
			'id' => $id,
		]);
	}

	public function update($id, Request $req)
	{
		Category_News::find($id)->update($req->all());

		Session::flash('category_news_success', 'Bạn đã cập nhật cho danh mục '.$req->name);

		return redirect()->route('category-news');
	}

	public function delete($id)
	{
		$cat_news = Category_News::find($id);

		$posters = News::where('category_news_id', $cat_news->id)->count();

		if ($posters == 0) 
		{
			Category_News::destroy($id);
			Session::flash('category_news_success', 'Bạn đã xóa 1 danh mục tin tức');
			return redirect()->back();

		} else 
		{
			Session::flash('category_news_error', 'Bạn không thế xóa danh mục này, đang có Bài viết nằm trong danh mục này');
			return redirect()->back();
		}
			
	}
}
?>