<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    /**
     * Hiển thị giỏ hàng
     */
    public function index()
    {
        $cart = session()->get('cart', []); // Lấy dữ liệu giỏ hàng từ session
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']); // Tính tổng tiền
        $product= DB::table ('san_pham')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product= DB::table ('loai_sp')->get();
        $brand_product= DB::table ('thuong_hieu')->get();
       return view('user.cart')->with('cart',$cart)->with('total',$total)->with('product',$product)->with('category',$category)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
 
    }

    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::where('san_pham_id',$id); // Tìm sản phẩm từ cơ sở dữ liệu
        $cart = session()->get('cart', []); // Lấy giỏ hàng hiện tại

        // Kiểm tra nếu sản phẩm đã có trong giỏ
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity ?? 1;
        } else {
            // Thêm sản phẩm mới
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity ?? 1,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart); // Lưu lại giỏ hàng vào session

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ hàng
     */
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart); // Lưu lại giỏ hàng
            return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được cập nhật.');
        }

        return redirect()->route('cart.index')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng
     */
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart); // Lưu lại giỏ hàng
            return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        }

        return redirect()->route('cart.index')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
    }

    /**
     * Xóa toàn bộ giỏ hàng
     */
    public function clearCart()
    {
        session()->forget('cart'); // Xóa toàn bộ dữ liệu giỏ hàng
        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được xóa.');
    }
}
