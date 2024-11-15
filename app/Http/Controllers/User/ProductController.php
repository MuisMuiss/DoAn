<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductType;
class ProductController extends Controller
{
    public function index(){
        $product= DB::table ('san_pham')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product= DB::table ('loai_sp')->get();
        $brand_product= DB::table ('thuong_hieu')->get();
       return view('user.index')->with('product',$product)->with('category',$category)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function productdetail($proid){
        $product=Product::where('san_pham_id',$proid)->get();
        $products= DB::table ('san_pham')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        
        $cate_product = DB::table('loai_sp')->get();
        return view('user.shopdetail')->with('product',$product)->with('products',$products)->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('category',$category);
    }
   public function category($cate)
   {
       $product = Product::where('loai_sp_id', $cate)->get();
       $cate_product = DB::table('loai_sp')->get();
       $cate_shops = ProductType::where('loai_sp_id', $cate)->get();
       $brand_product = DB::table('thuong_hieu')->get();
       foreach ($cate_product as $cat) {
           if ($cat->danh_muc_id == 1 && $cat->loai_sp_id == $cate) {
               return view('user.shopsua')->with('product', $product)->with('cate_product', $cate_product)->with('cate_shops', $cate_shops)->with('brand_product', $brand_product);
           }
       }
       return view('user.shopta')->with('product', $product)->with('cate_product', $cate_product)->with('cate_shops', $cate_shops)->with('brand_product', $brand_product);
  
   }
   public function brandshop($brand)
    {
        $brand_product = DB::table('thuong_hieu')->get();
        $cate_product = DB::table('loai_sp')->get();
        $product = Product::where('thuong_hieu_id', $brand)->get();
        $brand_shops = Brand::where('thuong_hieu_id', $brand)->get();
        return view('user.brandshop')->with('product', $product)->with('cate_product', $cate_product)->with('brand_shops', $brand_shops)->with('brand_product', $brand_product);
    }

   
   
}