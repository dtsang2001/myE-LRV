<?php 

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Category;
use App\Model\Product;
use App\Model\Product_Image;
use App\Model\User;
use App\Model\Comment;


/**
 * summary
 */
class ProductController extends Controller
{
    public function list()
    {
        $pros = Product::latest()->paginate(9);
    	return view('customer.shop',[
            'pros' => $pros,
        ]);
    }

    public function view($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        $pro = Product::where('slug', $slug)->first();

        if ($cat) {
            $pros = Product::where('category_id', $cat->id)->latest()->paginate(9);
            $pro_img = Product_Image::all();
            return view('customer.shop',[
                'cat' => $cat,
                'pros' => $pros,
                'pro_img' => $pro_img,
            ]);
        }elseif ($pro) {

            $pros = Product::where('category_id', $pro->category_id)->where('id', '<>', $pro->id)->take(8)->get();
            $pro_img = Product_Image::all();
            $comment = Comment::where('product_id', $pro->id)->latest()->get();

            return view('customer.product.view',[
                'pro' => $pro,
                'pros' => $pros,
                'comment' => $comment,
            ]);
        }
        else{
            return view('customer.error.404');
        }
    }

    public function ajaxComment(Request $req)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $req->id_product,
            'content' => $req->comment,
            'parent_id' => $req->parent_comment_id,
            'news_id' => $req->id_news,
        ]);
        
        return response()->json(['id_comment' => $comment->id, 'id_product' => $comment->product_id, 'id_news' => $comment->news_id]);

    }
}

?>