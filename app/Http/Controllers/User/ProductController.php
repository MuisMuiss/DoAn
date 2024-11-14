<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function shopsua(){
        $product= DB::table ('san_pham')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product= DB::table ('loai_sp')->get();
        $brand_product= DB::table ('thuong_hieu')->get();
       return view('user.shopsua')->with('product',$product)->with('category',$category)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function shopta(){
        $product= DB::table ('san_pham')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product= DB::table ('loai_sp')->get();
        $brand_product= DB::table ('thuong_hieu')->get();
       return view('user.shopta')->with('product',$product)->with('category',$category)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
}
