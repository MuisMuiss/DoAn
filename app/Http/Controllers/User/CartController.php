<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Hiển thị giỏ hàng
     */
    public function index()
    {
        $userId = Auth::id(); // ID người dùng
        $cartItems = Cart::where('nguoi_dung_id', $userId)->get();

        $product = DB::table('san_pham')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        return view('user.cart')->with('cartItems', $cartItems)->with('product', $product)->with('category', $category)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function addToCart(Request $request, $id)
    {
        $userId = Auth::id(); // Lấy ID người dùng đã đăng nhập (nếu có)

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
        $cartItem = Cart::where('nguoi_dung_id', $userId)
            ->where('san_pham_id', $id)
            ->first();

        if ($cartItem) {
            // Nếu đã có, tăng số lượng
            $quantity = $request->input('so_luong', 1);
            $cartItem->so_luong += $quantity;
            $cartItem->save();

        } else {
            // Nếu chưa có, thêm mới

            Cart::create([
                'nguoi_dung_id' => $userId,
                'san_pham_id' => $id,
                'so_luong' => $request->quantity ?? 1,
                'ngay_them'=> now(),
            //   //  'price' => $product->gia, // Lưu giá tại thời điểm thêm
             ]);
        }

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
}
