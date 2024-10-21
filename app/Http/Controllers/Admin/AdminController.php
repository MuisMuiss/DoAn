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
    public function viewlogin(){
        return view('admin.login');
    }
    public function viewhome(){
        return view('admin.home');
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $hashedPassword = Hash::make($password);
        $dn=Auth::attempt(['email' => $email, 'password' => $hashedPassword]);
        dd($dn);
        if($dn==true){
            $user=Auth::user();
            dd($user);
            return view('admin.home');
        }
        return back()->with('msg','Email hoặc mật khẩu không chính xác');

        // $email = $request->input('email');
        // $password = $request->input('password');
        // $tk = DB::table('users')->where('isadmin', '=', 1)->select("*")->get();
        // foreach ($tk as $row) {
        //     if ($row->email == $email && $row->password == md5($password)) {
        //         $dt = DB::table('users')->select('*');
        //         $dt = $dt->get();
        //         setcookie("id", $row->Id, time() + 3600);
        //         return view("admin.home");
        //         break;
        //     }
        // }
        // return view("admin.login", ['loginError' => "Sai mật khẩu hoặc tài khoản", 'SignUpError' => ""]);
        
    }
    //CRUD 
    //Thêm user
    public function themuser(){
        return view('admin.curduser.adduser');
    }
    public function addUser(Request $request){
        // $validatedData = $request->validate([
        //     'ho_ten' => 'required',
        //     'ten_dang_nhap' => 'required',
        //     'mat_khau' => 'required|min:6',
        //     'email' => 'required|email',
        //     'so_dien_thoai' => 'required|integer',
        //     'dia_chi'=> 'required',
            
        // ]);
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
        $user = new nguoiDung;
        $user->ho_ten=$request->input('ho_ten');
        $user->ten_dang_nhap=$request->input('ten_dang_nhap');
        $user->mat_khau=bcrypt($request->input('mat_khau'));
        $user->email=$request->input('email');
        $user->so_dien_thoai=$request->input('so_dien_thoai');
        $user->dia_chi=$request->input('dia_chi');
        $user->vai_tro=$request->vai_tro ? 1 : 0;
        $params= $request->except('_token');
        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('puclic/images/avatar/',$filename);
            $user->avatar=$filename;
        }
        $user->trang_thai=$request->trang_thai? 1 : 0;;
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
    public function upuser($nguoi_dung_id){
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
