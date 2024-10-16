<?php
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/index', function () {
    return view('user.index');
});





























// Route::get('/', function () {
//     return view('admin.login');
//Route::put('/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::match(['get', 'post'], '/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::get('/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::post('/login', [AdminController::class, "login"])->name('admin.login');
Route::match(['get', 'post'], '/homeadmin', [AdminController::class, "viewhome"])->name('admin.home');
Route::match(['get', 'post'], '/themuser', [AdminController::class, "themuser"])->name('admin.themuser');
Route::match(['get', 'post'], '/alluser', [AdminController::class, "viewuser"])->name('admin.alluser');
Route::match(['get', 'post'], '/addUser', [AdminController::class, "addUser"])->name('admin.addUser');
Route::match(['get', 'post'], '/suauser/{nguoi_dung_id}', [AdminController::class, "suauser"])->name('admin.suauser');
Route::match(['get', 'post'], '/updateUser/{nguoi_dung_id}', [AdminController::class, "updateUser"])->name('admin.updateUser');
Route::match(['get', 'post'], '/deleteUser/{nguoi_dung_id}', [AdminController::class, "deleteUser"])->name('admin.deleteUser');