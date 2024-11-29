<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductType;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        return view('user.index', compact('product', 'cate_product', 'category', 'brand_product'));
    }
    public function productdetail($proid)
    {
        $detail_product = DB::table('san_pham')->join('loai_sp', 'loai_sp.loai_sp_id', '=', 'san_pham.loai_sp_id')->where('san_pham.san_pham_id', $proid)->get();
        $products = DB::table('san_pham')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $product_images = DB::table('album_anh')
            ->where('album_sp_id', $proid)
            ->get();
        $cate_product = DB::table('loai_sp')->get();
        return view('user.shopdetail', compact('product_images', 'products', 'detail_product', 'cate_product', 'category', 'brand_product'));
    }
    public function category(Request $request, $cate)
    {
        $minPrice = $request->input('minPrice', 0);
        $maxPrice = $request->input('maxPrice', PHP_INT_MAX);
        $sort = $request->input('sort', 'random');
        $productsw = Product::where('loai_sp_id', $cate);
        if (!empty($minPrice) && !empty($maxPrice)) {
            $productsw->whereBetween('gia', [$minPrice, $maxPrice]);
        }
        switch ($sort) {
            case 'newest':
                $productsw->orderBy('sp_moi', 'desc');
                break;
            case 'price_desc':
                $productsw->orderBy('gia', 'desc');
                break;
            case 'price_asc':
                $productsw->orderBy('gia', 'asc');
                break;
            case 'random':
                $productsw->inRandomOrder();
                break;
            default:
                $productsw->orderBy('sp_moi', 'desc');
                break;
        }
        $products = DB::table('san_pham')->get();
        $product = $productsw->paginate(6);
        $cate_product = DB::table('loai_sp')->get();
        $cate_shops = ProductType::where('loai_sp_id', $cate)->get();
        $brand_product = DB::table('thuong_hieu')->get();
        foreach ($cate_product as $cat) {
            if ($cat->danh_muc_id == 1 && $cat->loai_sp_id == $cate) {
                return view('user.shopsua', compact('products', 'product', 'cate_product', 'cate_shops', 'brand_product'));
            }
        }
        return view('user.shopta', compact('products', 'product', 'cate_product', 'cate_shops', 'brand_product'));
    }
    public function brandshop(Request $request, $brand)
    {
        $minPrice = $request->input('minPrice', 0);
        $maxPrice = $request->input('maxPrice', PHP_INT_MAX);
        $brand_product = DB::table('thuong_hieu')->get();
        $cate_product = DB::table('loai_sp')->get();
        $productsw = Product::where('thuong_hieu_id', $brand);
        if (!empty($minPrice) && !empty($maxPrice)) {
            $productsw->whereBetween('gia', [$minPrice, $maxPrice]);
        }

        $sort = $request->input('sort', 'random');
        switch ($sort) {
            case 'newest':
                $productsw->orderBy('sp_moi', 'desc');
                break;
            case 'price_desc':
                $productsw->orderBy('gia', 'desc');
                break;
            case 'price_asc':
                $productsw->orderBy('gia', 'asc');
                break;
            case 'random':
                $productsw->inRandomOrder();
                break;
            default:
                $productsw->orderBy('sp_moi', 'desc');
                break;
        }
        $product = $productsw->paginate(6);
        $products = DB::table('san_pham')->get();
        $brand_shops = Brand::where('thuong_hieu_id', $brand)->get();
        return view('user.brandshop', compact('products', 'product', 'cate_product', 'brand_shops', 'brand_product'));
    }
    public function search(Request $request)
    {
        $minPrice = $request->input('minPrice', 0);
        $maxPrice = $request->input('maxPrice', PHP_INT_MAX);

        $productsw = Product::where('ten_san_pham', 'like', '%' . $request->input('key') . '%');
        if (!empty($minPrice) && !empty($maxPrice)) {
            $productsw->whereBetween('gia', [$minPrice, $maxPrice]);
        }
        $sort = $request->input('sort', 'random');
        switch ($sort) {
            case 'newest':
                $productsw->orderBy('sp_moi', 'desc');
                break;
            case 'price_desc':
                $productsw->orderBy('gia', 'desc');
                break;
            case 'price_asc':
                $productsw->orderBy('gia', 'asc');
                break;
            case 'random':
                $productsw->inRandomOrder();
                break;
            default:
                $productsw->orderBy('sp_moi', 'desc');
                break;
        }
        $product= $productsw->paginate(6);
        $products = DB::table('san_pham')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();

        return view('user.search', compact('products', 'product', 'cate_product', 'category', 'brand_product'));
    }
    public function getDanhMuc($danh_muc_id)
    {
        $danhMuc = Category::find($danh_muc_id);
        $product = Product::whereHas('loaiSanPham', function ($query) use ($danhMuc) {
            $query->where('danh_muc_id', $danhMuc->id); // Lọc theo danh_muc_id
        })->get();
        return view('user.index', compact('product', 'danhMuc'));
    }
}
