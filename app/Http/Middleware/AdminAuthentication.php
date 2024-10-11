<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminAuthentication
{
    public function handle($request, Closure $next)
    {
        if (Session::has('admin')) {
            $isAdmin = DB::table('ten_dang_nhap')
                ->where('nguoi_dung_id', Session::get('admin'))
                ->where('vai_tro', 1)
                ->first();

            if ($isAdmin) {
                return $next($request);
            }
        }

        return redirect('/login')->with('flag',0);
    }
}