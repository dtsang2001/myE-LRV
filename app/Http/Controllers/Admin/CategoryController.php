<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\User;
use App\Model\Product;
use Session;
use File;

/**
 * 
 */
class CategoryController extends Controller
{
	public function list()
	{
		$cats = Category::search()->latest()->get();

		return view('admin.category.list', [
			'cats' => $cats,
		]);
	}

	public function add()
	{
		$cats = Category::where('parent', 0)->get();
		return view('admin.category.add', [
			'cats' => $cats,
		]);
	}

	public function create(Request $req)
	{
		$this->validate($req, 
		[
			'name' => 'required|unique:categorys,name',
			'slug' => 'required|unique:categorys,slug',
			'file' => 'required',
			'file' => 'image|mimes:jpg,jpeg,png,gif,bmp'
		],
		[
			'name.required' => 'Tên danh mục chưa nhập',
			'slug.required' => 'Đường link chưa nhập',
			'name.unique' => 'Tên danh mục đã tồn tại',
			'slug.unique' => 'Đường link đã tồn tại',
			'file.required' => 'Hình ảnh chưa chọn',
			'file.mimes' => 'Hình ảnh không đủng định dạng ảnh'
		]);

		if ($req->hasFile('file')) {
			$image = $req->file('file');

			$image_name = date('Y-m-d-h-s-i').$image->getClientOriginalName();

			$image->move(base_path('uploads/'), $image_name);
		}

		Category::create([
			'name' => $req->name,
			'slug' => $req->slug,
			'parent' => $req->parent,
			'img' => $image_name,
		]);

		Session::flash('category_success', 'Bạn đã tạo danh mục '.$req->name);

		return redirect()->route('category');
	}

	public function edit($id)
	{
		$id = Category::find($id);
		$cats = Category::where('parent', 0)->get();

		return view('admin.category.edit', [
			'id' => $id,
			'cats' => $cats,
		]);
	}

	public function update($id, Request $req)
	{
		$this->validate($req, 
		[
			'name' => 'required|unique:categorys,name,'.$id,
			'slug' => 'required|unique:categorys,slug,'.$id,
			'file' => 'required',
			'file' => 'image|mimes:jpg,jpeg,png,gif,bmp'
		],
		[
			'name.required' => 'Tên danh mục chưa nhập',
			'slug.required' => 'Đường link chưa nhập',
			'name.unique' => 'Tên danh mục đã tồn tại',
			'slug.unique' => 'Đường link đã tồn tại',
			'file.required' => 'Hình ảnh chưa chọn',
			'file.mimes' => 'Hình ảnh không đủng định dạng ảnh'
		]);

		if ($req->hasFile('file')) {

			$cat = Category::find($id);

			File::delete('uploads/' . $cat->img);

			$image = $req->file('file');

			$image_name = date('Y-m-d-h-s-i').$image->getClientOriginalName();

			$image->move(base_path('uploads/'),$image_name);

			Category::find($id)->update([
				'img' => $image_name,
			]);
		}

		Category::find($id)->update([
			'name' => $req->name,
			'slug' => $req->slug,
			'parent' => $req->parent,
		]);

		Session::flash('category_success', 'Bạn đã cập nhật thành công danh mục '.$req->name);

		return redirect()->route('category');
	}

	public function delete($id)
	{
		$category = Category::find($id);

		$product = Product::where('category_id', $category->id)->count();

		if ($product == 0) 
		{
			File::delete('uploads/' . $category->img);
			Category::where('id', $id)->delete();
			Session::flash('category_success', ' Bạn đã xóa một danh mục');
		}
		else {
			Session::flash('category_error', 'Bạn không thế xóa danh mục này, vì đang có Sản phẩm nằm trong danh mục '.$category->name);
		}

		return redirect()->route('category');
	}
}
?>