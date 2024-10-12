<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $username = $request->input('username');
        $password = $request->input('password');
        $tk = DB::table('nguoi_dung')->where('vai_tro', '=', 1)->select("*")->get();
        foreach ($tk as $row) {
            if ($row->ten_dang_nhap == $username && $row->mat_khau == md5($password)) {
                $dt = DB::table('san_pham')->select('*');
                $dt = $dt->get();
                setcookie("id", $row->Id, time() + 3600);
                return view("home", compact('dt'));
                break;
            }
        }
        return view("login", ['loginError' => "Sai mật khẩu hoặc tài khoản", 'SignUpError' => ""]);
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
            'so_dien_thoai.integer' => 'Số điện thoại phải là số nguyên.',
            'dia_chi.required'=> 'Địa chỉ không được để trống.'
        ];
    
        $validatedData = $request->validate([
            'ho_ten' => 'required',
            'ten_dang_nhap' => 'required',
            'email' => 'required|email',
            'mat_khau' => 'required|min:6',
            'so_dien_thoai' => 'required|integer|min:10',
            'dia_chi'=> 'required',
        ], $messages);
        try {
            //code...
            $db_user = DB::table('nguoi_dung')->insert(
                array(
                    'ho_ten'=>$request->input('ho_ten'),
                    'ten_dang_nhap'=>$request->input('ten_dang_nhap'),
                    'mat_khau'=>md5($request->input('mat_khau')),
                    'email'=>$request->input('email'),
                    'so_dien_thoai'=>$request->input('so_dien_thoai'),
                    'dia_chi'=>$request->input('dia_chi'),
                    'vai_tro'=>$request->input('vai_tro'),
                    'avatar'=>$request->input('avatar'),
                    'trang_thai'=>$request->input('trang_thai'),

                )
                );
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function viewuser(){
        return view('admin.user');
    }
}
