<?php  
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\User;
use App\Model\Product;
use App\Model\Product_Image;
use Session;
use File;

/**
 * 
 */
class ProductController extends Controller
{
	
	public function list()
	{
		$pros = Product::latest()->paginate(10);
		return view('admin.product.list', [
			'pros' => $pros,
		]);
	}

	public function add()
	{
		$cats = Category::all();
		return view('admin.product.add', [
			'cats' => $cats,
		]);
	}

	public function create(Request $req)
	{
		$this->validate($req,
		[
			'name' => 'required|unique:products,name',
			'slug' => 'required|unique:products,slug',
			'description' => 'required',
			'category_id' => 'required',
			'unit_price' => 'required',
			'unit_in_stock' => 'required',
			'files' => 'required',
			'files.*' => 'image|mimes:jpg,jpeg,png,gif,bmp'
		],
		[
			'name.required' => 'Hãy Nhập Tên Sản Phẩm',
			'name.unique' => 'Tên Sản Phẩm Đã Tồn Tại',
			'slug.required' => 'Hãy Nhập Đường Link Sản Phẩm',
			'slug.unique' => 'Đường Link Sản Phẩm Đã Tồn Tại',
			'description.required' => 'Hãy Nhập Mô Tả Sản Phẩm',
			'category_id.required' => 'Hãy Chọn Danh Mục Sản Phẩm',
			'unit_price.required' => 'Hãy Nhập Giá Sản Phẩm',
			'unit_in_stock.required' => 'Hãy Nhập Số lượng Sản Phẩm Có Trong Kho',
			'files.required' => 'Hãy Chọn Ảnh',
			'files.*.mimes' => 'Hãy chọn đúng định dạng ảnh'
		]);

		$req->merge([
			'unit_on_order'=>0,
			'status'=>1
		]);

		$product = Product::create($req->all());

		if($req->hasFile('files')) {

			$images = $req->file('files');

            // duyệt từng ảnh và thực hiện lưu
			foreach ($images as $img) {

				$img_name = date('Y-m-d-h-s-i').$img->getClientOriginalName();

				$img->move(base_path('uploads/'),$img_name);

				Product_Image::create([
					'product_id' => $product->id,
					'url' => $img_name
				]);
			}
		}

		Session::flash('product_success', 'Bạn đã tạo sản phẩm '.$req->name);

		return redirect()->route('product');
	}

	public function edit($id)
	{
		$cats = Category::all();
		$id = Product::find($id);
		return view('admin.product.edit', [
			'id' => $id,
			'cats' => $cats,
		]);
	}

	public function update($id, Request $req)
	{
		$this->validate($req,
		[
			'name' => 'required|unique:products,name,'.$id,
			'slug' => 'required|unique:products,slug,'.$id,
			'description' => 'required',
			'category_id' => 'required',
			'unit_price' => 'required',
			'unit_in_stock' => 'required',
			'files.*' => 'image|mimes:jpg,jpeg,png,gif,bmp'
		],
		[
			'name.required' => 'Hãy Nhập Tên Sản Phẩm',
			'name.unique' => 'Tên Sản Phẩm Đã Tồn Tại',
			'slug.required' => 'Hãy Nhập Đường Link Sản Phẩm',
			'slug.unique' => 'Đường Link Sản Phẩm Đã Tồn Tại',
			'description.required' => 'Hãy Nhập Mô Tả Sản Phẩm',
			'category_id.required' => 'Hãy Chọn Danh Mục Sản Phẩm',
			'unit_price.required' => 'Hãy Nhập Giá Sản Phẩm',
			'unit_in_stock.required' => 'Hãy Nhập Số lượng Sản Phẩm Có Trong Kho',
			'files.*.mimes' => 'Hãy chọn đúng định dạng ảnh'
		]);

		Product::find($id)->update($req->all());

		if ($req->hasFile('files')) {

			$images_old = Product_Image::where('product_id', $id)->get();

			foreach($images_old as $img_old) {
				File::delete('uploads/' . $img_old->url);
			}

			Product_Image::where('product_id', $id)->delete();

			$images = $req->file('files');

			foreach ($images as $img) {
				$img_name = date('Y-m-d-h-s-i').$img->getClientOriginalName();

				$img->move(base_path('uploads/'),$img_name);

				Product_Image::create([
					'product_id' => $id,
					'url' => $img_name
				]);
			}
		}

		Session::flash('product_success', 'Bạn đã cập nhật sản phẩm '.$req->name);

		return redirect()->route('product');
	}

	public function delete($id)
	{
		$images_old = Product_Image::where('product_id', $id)->get();
			
		foreach($images_old as $img_old) {
			File::delete('uploads/' . $img_old->url);
		}
		
		Product_Image::where('product_id', $id)->delete();

		Product::where('id', $id)->delete();

		Session::flash('product_success', 'Bạn đã xóa 1 sản phẩm');

		return redirect()->route('product');

	}

	public function view($id)
	{
		$product = Product::find($id);
		return view('admin.product.view', [
			'product' => $product,
		]);
	}
}
?>