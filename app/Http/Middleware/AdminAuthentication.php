<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminAuthentication
{
    public function handle($request, Closure $next)
    {
        if (session('admin') && session('admin')->vai_tro == 1) {
            dd('Middleware passed');
            return $next($request);
        }
        return redirect()->route('login')->with('Bạn không có quyền truy cập.');
    }
}