<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        if (!Auth::check()) {
            return view('user.loginuser')->with('category', $category)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
        } else {
            $cartItems = Cart::where('nguoi_dung_id', $userId)->get();

            $product = DB::table('san_pham')->get();
            $cartCount = count($cartItems);

            return view('user.cart', compact('cartItems', 'product', 'category', 'cate_product', 'brand_product', 'cartCount'));
        }
    }

    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function addToCart(Request $request, $id)
    {
        $userId = Auth::id();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        if (!Auth::check()) {
            return view('user.loginuser', compact('category', 'cate_product', 'brand_product'))->with('no', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('index')->with('no', 'Sản phẩm không tồn tại.');
        }
        $validated = $request->validate([
            'so_luong' => 'required|integer|min:1|max:' . $product->so_luong_kho,
        ]);
        $quantity = $validated['so_luong'];
        // Kiểm tra giỏ hàng hiện tại
        $cartItem = Cart::where('nguoi_dung_id', $userId)
            ->where('san_pham_id', $id)
            ->first();

        if ($cartItem) {
            $newQuantity = $cartItem->so_luong + $quantity;
            if ($newQuantity > $product->so_luong_kho) {
                return redirect()->route('cart.index')->with('no', 'Số lượng sản phẩm vượt quá số lượng trong kho.');
            }
            $cartItem->so_luong = $newQuantity;
            $cartItem->save();
        } else {
            Cart::create([
                'nguoi_dung_id' => $userId,
                'san_pham_id' => $id,
                'so_luong' => $quantity,
                'ngay_them' => now(),
            ]);
        }

        return redirect()->route('cart.index')->with('ok', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    public function addToCart1($id)
    {
        $userId = Auth::id();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        if (!Auth::check()) {
            return view('user.loginuser', compact('category', 'cate_product', 'brand_product'))->with('no', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        } else {
            $cartItem = Cart::where('nguoi_dung_id', $userId)
                ->where('san_pham_id', $id)
                ->first();
            if ($cartItem) {
                $cartItem->so_luong += 1;
                $cartItem->save();
            } else {
                Cart::create([
                    'nguoi_dung_id' => $userId,
                    'san_pham_id' => $id,
                    'so_luong' => 1,
                    'ngay_them' => now(),
                
                ]);
            }
            return redirect()->route('cart.index')->with('ok', 'Sản phẩm đã được thêm vào giỏ hàng.');
        }
    }
    public function delete($cartId)
    {
        $cartItem = Cart::find($cartId);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('ok', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }
    public function update(Request $request, $cartId)
    {

        // Lấy giỏ hàng của người dùng
        $cartItem = Cart::find($cartId);

        // Kiểm tra số lượng sản phẩm trong kho
        $quantity = $request->input('so_luong');

        $product = $cartItem->product; // Lấy sản phẩm liên quan đến cart item

        if ($quantity > $product->so_luong_kho) {
            return redirect()->route('cart.index')->with('no', 'Số lượng sản phẩm vượt quá số lượng trong kho');
        }

        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $cartItem->so_luong = $quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('ok', 'Cập nhật giỏ hàng thành công');
    }
    public function clear()
    {
        $userId = Auth::id(); // Lấy ID người dùng đã đăng nhập (nếu có)

        // Xóa tất cả sản phẩm trong giỏ hàng của người dùng
        Cart::where('nguoi_dung_id', $userId)->delete();

        return redirect()->route('cart.index')->with('ok', 'Giỏ hàng đã được xóa thành công');
    }
    public function checkout()
    {
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $product = DB::table('san_pham')->get();

        $cartItems = DB::table('gio_hang')
            ->join('san_pham', 'gio_hang.san_pham_id', '=', 'san_pham.san_pham_id')
            ->where('gio_hang.nguoi_dung_id', Auth::id())
            ->select('gio_hang.so_luong', 'san_pham.san_pham_id', 'san_pham.ten_san_pham', 'san_pham.gia', 'san_pham.hinh_anh')
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->gia * $item->so_luong;
        });

        return view('user.checkout', compact('cate_product', 'brand_product', 'category', 'cartItems', 'total', 'product'));
    }
    public function processCheckout(Request $request)
    {
        try {
            DB::beginTransaction(); // Đảm bảo tính toàn vẹn dữ liệu trong csdl
            $user = Auth::user();
            $cartItems = DB::table('gio_hang')
                ->join('san_pham', 'gio_hang.san_pham_id', '=', 'san_pham.san_pham_id')
                ->select('gio_hang.so_luong', 'san_pham.san_pham_id', 'san_pham.ten_san_pham', 'san_pham.gia', 'san_pham.hinh_anh')
                ->where('gio_hang.nguoi_dung_id', Auth::id())
                ->get();
            $total = $cartItems->sum(function ($item) {
                return $item->gia * $item->so_luong;
            });

            // Tạo đơn hàng
            $orderId = DB::table('don_hang')->insertGetId([
                'nguoi_dung_id' => $user->nguoi_dung_id,
                'tong_tien' => $total,
                'phuong_thuc_thanh_toan' => $request->input('payment_method'),
                'dia_chi_giao_hang' => $request->input('address'),
                'ngay_dat' => now(),
                'trang_thai_don_hang' => 'Đang xử lý',
            ]);

            // Lưu chi tiết đơn hàng
            $cartItems = json_decode($request->input('cartItems'), true);
            foreach ($cartItems as $item) {
                if (isset($item['san_pham_id'])) {
                    DB::table('chi_tiet_don_hang')->insert([
                        'don_hang_id' => $orderId,
                        'san_pham_id' => $item['san_pham_id'],
                        'so_luong' => $item['so_luong'],
                        'gia_don_vi' => $item['gia'],
                    ]);
                } else {
                    // Xử lý trường hợp không có san_pham_id
                    dd('Không có san_pham_id trong item', $item);
                }
            }

            // Xóa giỏ hàng của người dùng sau khi đặt hàng
            DB::table('gio_hang')->where('nguoi_dung_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('checkout')->with('ok', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('no', 'Có lỗi xảy ra khi xử lý đơn hàng');
        }
    }
}
