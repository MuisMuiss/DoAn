<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\nguoiDung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $product = DB::table('san_pham')->get();
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        return view('user.index')->with('product', $product)->with('category', $category)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function showLogin()
    {
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        return view('user.loginuser')->with('category', $category)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function checklogin(Request $request)
    {
        $mat_khau = $request->input('mat_khau');

        // Tìm người dùng theo email
        $nguoiDung = nguoiDung::where('email', $request->email)->where('vai_tro', 0)->first();
        if ($nguoiDung && Hash::check($mat_khau, $nguoiDung->mat_khau)) {
            Auth::guard('web')->login($nguoiDung);
            $request->session()->regenerate();
            return redirect()->route('index')->with('ok', 'Đăng nhập thành công');
        }
        // dd($request->all());
        return back()->with('no', 'Email hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
    public function showRegister()
    {
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        return view('user.register')->with('category', $category)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function checkregister(Request $request)
    {
        $messages = [
            'ho_ten.required' => 'Họ và Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'mat_khau.required' => 'Mật khẩu không được để trống.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'mat_khau.confirmed' => 'Mật khẩu không trùng khớp.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.min' => 'Mật khẩu phải có ít nhất 10 ký tự.',
        ];

        $validatedData = $request->validate([
            'ho_ten' => 'required',
            'email' => 'required|email',
            'mat_khau' => 'required|min:6|confirmed',
            'so_dien_thoai' => 'required|min:10',
        ], $messages);
        $existingUser = nguoiDung::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->with(['noE' => 'Email đã tồn tại.']);
        }
        // Tạo người dùng mới
        $nguoiDung = new nguoiDung();
        $nguoiDung->ho_ten = $request->input('ho_ten');
        $nguoiDung->email = $request->input('email');
        $nguoiDung->so_dien_thoai = $request->input('so_dien_thoai');
        $nguoiDung->mat_khau = bcrypt($request->input('mat_khau')); // Mã hóa mật khẩu
        $nguoiDung->vai_tro = 0;

        $nguoiDung->save();
        return redirect()->route('user.login')->with('dk', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
    // public function showProfile()
    // {
    //     $category = DB::table('danh_muc_san_pham')->get();
    //     $cate_product = DB::table('loai_sp')->get();
    //     $brand_product = DB::table('thuong_hieu')->get();
    //     $order = DB::table('don_hang')->get();
    //     return view('user.taikhoan.profile')->with('category', $category)->with('order', $order)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    // }
    // public function getInfo($type)
    // {
    //     try {
    //         if ($type === 'profile') {
    //             $user = Auth::user();
    //             $cate_product = DB::table('loai_sp')->get();
    //             return view('user.taikhoan.accout_content', compact('user', 'cate_product'))->render();
    //         } elseif ($type === 'orders') {
    //             $orders = Auth::user()->orders;
    //             return view('user.taikhoan.order_content', compact('orders'))->render();
    //         } elseif ($type === 'changepass') {
    //             $cate_product = DB::table('loai_sp')->get();
    //             return view('user.taikhoan.changepass_content', compact('cate_product'))->render();
    //         } else {
    //             return abort(404);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Đã xảy ra lỗi'], 500);
    //     }
    // }
    public function viewAccout($nguoi_dung_id)
    {
        $nguoiDung = nguoiDung::find($nguoi_dung_id);
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();

        return view('user.taikhoan.accout', compact('nguoiDung', 'category', 'cate_product', 'brand_product'));
    }
    public function updateAccout(Request $request, $nguoi_dung_id)
    {
        $messages = [
            'ho_ten.required' => 'Họ và Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'dia_chi.required' => 'Địa chỉ không được để trống.'
        ];
        $validatedData = $request->validate([
            'ho_ten' => 'required',
            'email' => 'required|email',
            'so_dien_thoai' => 'required|min:10',
            'dia_chi' => 'required',
        ], $messages);
        // Kiểm tra email đã tồn tại (trừ email của chính người dùng)
        $existingUser = nguoiDung::where('email', $request->email)
            ->where('nguoi_dung_id', '<>', $nguoi_dung_id) // Tránh kiểm tra email của chính người dùng
            ->first();
        if ($existingUser) {
            return redirect()->back()->with(['noE' => 'Email đã tồn tại.']);
        }
        $nguoiDung = nguoiDung::find($nguoi_dung_id);
        $nguoiDung->ho_ten = $request->input('ho_ten');
        $nguoiDung->email = $request->input('email');
        $nguoiDung->so_dien_thoai = $request->input('so_dien_thoai');
        $nguoiDung->dia_chi = $request->input('dia_chi');
        $nguoiDung->vai_tro = 0;
        // Xử lý ảnh đại diện
        if ($request->hasFile('avatar')) {
            $anhcu = public_path('images/avatar/' . $nguoiDung->avatar);
            // Kiểm tra xem ảnh cũ có tồn tại không và xóa nếu có
            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
            // Lưu ảnh mới
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/avatar'), $filename);
            // Cập nhật đường dẫn ảnh trong cơ sở dữ liệu
            $nguoiDung->avatar = $filename;
        }
        // Lưu thông tin người dùng
        $nguoiDung->save();

        return redirect()->back()->with('update', 'Cập nhật user thành công');
    }
    public function viewOrder()
    {
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        return view('user.taikhoan.order')->with('category', $category)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function viewChangepassword()
    {
        $category = DB::table('danh_muc_san_pham')->get();
        $cate_product = DB::table('loai_sp')->get();
        $brand_product = DB::table('thuong_hieu')->get();
        return view('user.taikhoan.changepass')->with('category', $category)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'mat_khau' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'mat_khau.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->mat_khau, $user->mat_khau)) {
            return back()->withErrors(['mat_khau' => 'Mật khẩu hiện tại không đúng.']);
        }
        $user->mat_khau = Hash::make($request->new_password);
        $user->save();

        return back()->with('ok', 'Đổi mật khẩu thành công!');
    }
}
