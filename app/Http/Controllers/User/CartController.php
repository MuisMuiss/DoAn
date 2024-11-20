<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use session;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Iluminate\Support\Facades\Redirect;

session_start();

class CartController extends Controller
{
    public function index(){
        $product= DB::table ('san_pham')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product= DB::table ('loai_sp')->get();
        $brand_product= DB::table ('thuong_hieu')->get();
       return view('user.cart')->with('product',$product)->with('category',$category)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
public function addCart($proid){ 

$product_info = DB::table('san_pham',$proid)->first()->get();
$cate_product= DB::table ('loai_sp')->get();
$brand_product= DB::table ('thuong_hieu')->get();

return view('user.cart')->with('cate_product', $cate_product)->with('brand', $brand_product);
}
}