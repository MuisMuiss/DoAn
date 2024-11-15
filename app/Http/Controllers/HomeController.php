<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class HomeController extends Controller
{
    public function brandshop($brand)
    {
        $brand_product = DB::table('thuong_hieu')->get();
        $cate_product = DB::table('loai_sp')->get();
        $product = Product::where('thuong_hieu_id', $brand)->get();
        $brand_shops = Brand::where('thuong_hieu_id', $brand)->get();
        return view('user.brandshop')->with('product', $product)->with('cate_product', $cate_product)->with('brand_shops', $brand_shops)->with('brand_product', $brand_product);
    }

   
   
  
}
