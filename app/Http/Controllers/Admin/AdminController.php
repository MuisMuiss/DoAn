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
}
