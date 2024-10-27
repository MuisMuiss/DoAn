<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\nguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\File\File;

class AdminController extends Controller
{   
    // public function viewhome(){
    //     return view('admin.home');
    // }
    public function viewlogin(){
        return view('admin.login');
    }
    // public function login(Request $request)
    // {
    //     // Kiểm tra xem email có tồn tại trong bảng không
    //     $nguoiDung = nguoiDung::where('email', $request->email)->first();

    //     // Nếu không tìm thấy người dùng
    //     if (!$nguoiDung) {
    //         return back()->with([
    //             'msg' => 'Email không tồn tại.',
    //         ]);
    //     }

    //     // Mã hóa mật khẩu nhập vào bằng MD5
    //     $matKhauMd5 = md5($request->mat_khau);
    //     // Kiểm tra mật khẩu
    //     if ($matKhauMd5 === $nguoiDung->mat_khau) {
    //         // Lưu thông tin người dùng vào session
    //         session(['user' => $nguoiDung]);

    //         return view('admin.home');// Redirect về trang chính
    //     }

    //     // Nếu mật khẩu không đúng
    //     return back()->with([
    //         'msg' => 'Mật khẩu không đúng.',
    //     ]);
    // }
    public function login(Request $request)
    {
        $mat_khau = $request->input('mat_khau');

        // Tìm người dùng theo email
        $nguoiDung = nguoiDung::where('email', $request->email)->where('vai_tro', 1)->first();
        // Kiểm tra nếu người dùng tồn tại và mật khẩu khớp
        // if ($nguoiDung && Hash::check($mat_khau, $nguoiDung->mat_khau)) {
        //     // Đăng nhập thành công
        //     Auth::login($nguoiDung);
        //     $request->session()->regenerate();
        //     return redirect()->route('homeadmin')->with('msg', 'Đăng nhập thành công'); // Chuyển hướng sau khi đăng nhập
        // }
        if ($nguoiDung && Hash::check($mat_khau, $nguoiDung->mat_khau)) {
            Auth::login($nguoiDung);
            $request->session()->regenerate();
        
            // Kiểm tra xem người dùng đã được công nhận là đăng nhập chưa
            if (Auth::check()) {
                return redirect()->route('homeadmin')->with('msg', 'Đăng nhập thành công');
            }
        }
        return back()->with('msg','Email hoặc mật khẩu không chính xác');  
    }

    //CRUD 
    //Thêm user
    public function themuser(){
        return view('admin.curduser.adduser');
    }
    public function addUser(Request $request){
        $messages = [
            'ho_ten.required' => 'Họ và Tên không được để trống.',
            'ten_dang_nhap.required' => 'Tên đăng nhập không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'mat_khau.required' => 'Mật khẩu không được để trống.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.min' => 'Mật khẩu phải có ít nhất 10 ký tự.',
            //'so_dien_thoai.integer' => 'Số điện thoại phải là số nguyên.',
            'dia_chi.required'=> 'Địa chỉ không được để trống.'
        ];
    
        $validatedData = $request->validate([
            'ho_ten' => 'required',
            'ten_dang_nhap' => 'required',
            'email' => 'required|email',
            'mat_khau' => 'required|min:6',
            'so_dien_thoai' => 'required|min:10',
            'dia_chi'=> 'required',
            'vai_tro'=>'required|boolean',
            'trang_thai'=>'required|boolean',
        ], $messages);
        $existingUser = nguoiDung::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->with(['status' => 'Email đã tồn tại.']);
        }
        $user = new nguoiDung;
        $user->ho_ten=$request->input('ho_ten');
        $user->ten_dang_nhap=$request->input('ten_dang_nhap');
        $user->mat_khau=bcrypt($request->input('mat_khau'));
        $user->email=$request->input('email');
        $user->so_dien_thoai=$request->input('so_dien_thoai');
        $user->dia_chi=$request->input('dia_chi');
        $user->vai_tro=$request->vai_tro ? 1 : 0;
        $user->trang_thai=$request->trang_thai? 1 : 0;

        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/avatar/', $filename);
            $user->avatar=$filename;
        }
        $user->save();
        return redirect()->back()->with('status','Thêm user thành công');
    }
    public function viewuser(){
        $nguoiDung = nguoiDung::all();
        return view('admin.user',compact('nguoiDung'));
    }
    //Edit
    public function suauser($nguoi_dung_id){
        $nguoiDung=nguoiDung::find($nguoi_dung_id);
        return view('admin.curduser.edituser',compact('nguoiDung'));
    }
    public function updateuser(Request $request, $nguoi_dung_id){
        $messages = [
            'ho_ten.required' => 'Họ và Tên không được để trống.',
            'ten_dang_nhap.required' => 'Tên đăng nhập không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'mat_khau.required' => 'Mật khẩu không được để trống.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.min' => 'Mật khẩu phải có ít nhất 10 ký tự.',
            //'so_dien_thoai.integer' => 'Số điện thoại phải là số nguyên.',
            'dia_chi.required'=> 'Địa chỉ không được để trống.'
        ];
    
        $validatedData = $request->validate([
            'ho_ten' => 'required',
            'ten_dang_nhap' => 'required',
            'email' => 'required|email',
            'so_dien_thoai' => 'required|min:10',
            'dia_chi'=> 'required',
            'vai_tro'=>'required|boolean',
            'trang_thai'=>'required|boolean',
        ], $messages);
        // if($request->hasFile('avatar')){
        //     $img=$request->file('avatar')->getClientOriginalName();
        //     $request->avatar->move(public_path('images/avatar'),$img);
        // }else{$img=null;}
        //code...
        $existingUser = nguoiDung::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect()->back()->with(['status' => 'Email đã tồn tại.']);
        }
        $nguoiDung=nguoiDung::find($nguoi_dung_id);
        $nguoiDung->ho_ten=$request->input('ho_ten');
        $nguoiDung->ten_dang_nhap=$request->input('ten_dang_nhap');
        $nguoiDung->mat_khau=bcrypt($request->input('mat_khau'));
        $nguoiDung->email=$request->input('email');
        $nguoiDung->so_dien_thoai=$request->input('so_dien_thoai');
        $nguoiDung->dia_chi=$request->input('dia_chi');
        $nguoiDung->vai_tro=$request->vai_tro ? 1 : 0;
        //$params= $request->except('_token');
        if($request->hasFile('avatar')){
            // $anhcu = 'images/avatar/'.$user->avatar;
            // if (File::exists($anhcu)){
            //     File::delete($anhcu);
            // }
            $file=$request->file('avatar');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('puclic/images/avatar/',$filename);
            $nguoiDung->avatar=$filename;
        }
        $nguoiDung->trang_thai=$request->trang_thai? 1 : 0;;
        $nguoiDung->update();
        return redirect()->back()->with('status','Sửa user thành công');
    }
    //Delete
    public function deleteUser($nguoi_dung_id){
        $nguoiDung=nguoiDung::find($nguoi_dung_id);
        $nguoiDung->delete();
        return redirect()->back()->with('status','Xóa user thành công');
    }
}
