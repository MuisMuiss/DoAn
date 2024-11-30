<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\nguoiDung;
use App\Models\Category;
use App\Models\Product;
use App\Models\Import;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function Dashboard()
    {

        $categories = DB::table('chi_tiet_don_hang')
            ->join('san_pham', 'chi_tiet_don_hang.san_pham_id', '=', 'san_pham.san_pham_id')
            ->join('loai_sp', 'san_pham.loai_sp_id', '=', 'loai_sp.loai_sp_id')
            ->join('danh_muc_san_pham', 'loai_sp.danh_muc_id', '=', 'danh_muc_san_pham.danh_muc_id')
            ->select(
                'danh_muc_san_pham.ten_danh_muc',
                DB::raw('SUM(chi_tiet_don_hang.so_luong) as total_san_phams')
            )
            ->groupBy('danh_muc_san_pham.danh_muc_id', 'danh_muc_san_pham.ten_danh_muc') // Thêm ten_danh_muc vào GROUP BY
            ->get();


        $soLuongSP = Product::count();
        $tongDoanhThu = Order::where('trang_thai_don_hang', '!=', 'da_huy')
        ->sum('tong_tien');
        $soLuongDH = Order::count();
        $soLuongNH = Import::count();
        $doanhThuNgay = Order::select(DB::raw('DATE(ngay_dat) as ngay, SUM(tong_tien) as doanh_thu'))
            ->groupBy(DB::raw('DATE(ngay_dat)'))
            ->pluck('doanh_thu', 'ngay');
        $doanhThuThang = Order::select(DB::raw('YEAR(ngay_dat) as nam, MONTH(ngay_dat) as thang, SUM(tong_tien) as doanh_thu'))
            ->groupBy(DB::raw('YEAR(ngay_dat), MONTH(ngay_dat)'))
            ->orderBy('nam')
            ->orderBy('thang')
            ->get();
        $doanhThuNam = Order::select(DB::raw('YEAR(ngay_dat) as nam, SUM(tong_tien) as doanh_thu'))
            ->groupBy(DB::raw('YEAR(ngay_dat)'))
            ->pluck('doanh_thu', 'nam');

        return view('admin.home', compact('soLuongSP', 'tongDoanhThu', 'soLuongDH', 'soLuongNH', 'doanhThuNgay', 'doanhThuThang', 'doanhThuNam', 'categories'));
    }
    public function viewlogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $mat_khau = $request->input('mat_khau');

        // Tìm người dùng theo email
        $nguoiDung = nguoiDung::where('email', $request->email)->where('vai_tro', 1)->first();
        if ($nguoiDung && Hash::check($mat_khau, $nguoiDung->mat_khau)) {
            Auth::guard('admin')->login($nguoiDung);
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }
        // dd($request->all());
        return back()->with('msg', 'Email hoặc mật khẩu không chính xác');
    }
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
    //CRUD 
    //Thêm user
    public function themuser()
    {
        return view('admin.curduser.adduser');
    }
    public function addUser(Request $request)
    {
        $messages = [
            'ho_ten.required' => 'Họ và Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'mat_khau.required' => 'Mật khẩu không được để trống.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.min' => 'Mật khẩu phải có ít nhất 10 ký tự.',
            //'so_dien_thoai.integer' => 'Số điện thoại phải là số nguyên.',
            'dia_chi.required' => 'Địa chỉ không được để trống.'
        ];

        $validatedData = $request->validate([
            'ho_ten' => 'required',
            'email' => 'required|email',
            'mat_khau' => 'required|min:6',
            'so_dien_thoai' => 'required|min:10',
            'dia_chi' => 'required',
            'vai_tro' => 'required|boolean',
            'trang_thai' => 'required|boolean',
        ], $messages);
        $existingUser = nguoiDung::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->with(['status' => 'Email đã tồn tại.']);
        }
        $user = new nguoiDung();
        $user->ho_ten = $request->input('ho_ten');
        $user->mat_khau = bcrypt($request->input('mat_khau'));
        $user->email = $request->input('email');
        $user->so_dien_thoai = $request->input('so_dien_thoai');
        $user->dia_chi = $request->input('dia_chi');
        $user->vai_tro = $request->vai_tro ? 1 : 0;
        $user->trang_thai = $request->trang_thai ? 1 : 0;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/avatar/', $filename);
            $user->avatar = $filename;
        }
        $user->save();
        return redirect()->back()->with('status', 'Thêm user thành công');
    }
    public function viewuser()
    {
        $nguoiDung = nguoiDung::paginate(5);
        return view('admin.user', compact('nguoiDung'));
    }
    //Edit
    public function edituser($nguoi_dung_id)
    {
        $nguoiDung = nguoiDung::find($nguoi_dung_id);
        return view('admin.curduser.edituser', compact('nguoiDung'));
    }
    // 
    public function updateuser(Request $request, $nguoi_dung_id)
    {
        $messages = [
            'ho_ten.required' => 'Họ và Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'mat_khau.required' => 'Mật khẩu không được để trống.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'dia_chi.required' => 'Địa chỉ không được để trống.'
        ];
        $validatedData = $request->validate([
            'ho_ten' => 'required',
            'email' => 'required|email',
            'so_dien_thoai' => 'required|min:10',
            'dia_chi' => 'required',
            'vai_tro' => 'required|boolean',
            'trang_thai' => 'required|boolean',
        ], $messages);
        $existingUser = nguoiDung::where('email', $request->email)
            ->where('nguoi_dung_id', '<>', $nguoi_dung_id)
            ->first();
        if ($existingUser) {
            return redirect()->back()->with(['status' => 'Email đã tồn tại.']);
        }
        $nguoiDung = nguoiDung::find($nguoi_dung_id);
        $nguoiDung->ho_ten = $request->input('ho_ten');
        // Cập nhật mật khẩu nếu có
        if ($request->filled('mat_khau')) {
            $nguoiDung->mat_khau = bcrypt($request->input('mat_khau'));
        }
        $nguoiDung->email = $request->input('email');
        $nguoiDung->so_dien_thoai = $request->input('so_dien_thoai');
        $nguoiDung->dia_chi = $request->input('dia_chi');
        $nguoiDung->vai_tro = $request->vai_tro ? 1 : 0;
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
            $nguoiDung->avatar = $filename;
        }
        $nguoiDung->trang_thai = $request->trang_thai ? 1 : 0;
        $nguoiDung->save();

        return redirect()->back()->with('status', 'Cập nhật user thành công');
    }
    //Delete
    public function deleteUser($nguoi_dung_id)
    {
        $nguoiDung = nguoiDung::find($nguoi_dung_id);
        $anhcu = public_path('images/avatar/' . $nguoiDung->avatar);
        // Kiểm tra xem ảnh cũ có tồn tại không và xóa nếu có
        if (File::exists($anhcu)) {
            File::delete($anhcu);
        }
        $nguoiDung->delete();
        return redirect()->back()->with('status', 'Xóa user thành công');
    }
    public function searchND(Request $request)
    {
        $keyword = $request->input('keyword');

        // Tìm kiếm theo các cột họ tên, email, số điện thoại
        $nguoiDung = nguoiDung::where('ho_ten', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->orWhere('so_dien_thoai', 'LIKE', "%$keyword%")
            ->paginate(5);

        return view('admin.user', compact('nguoiDung', 'keyword'));
    }
}
