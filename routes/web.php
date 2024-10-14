<?php
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('admin.login');
// });
Route::get('/register', function () {
    return view('admin.register');
});
// Route::get('/homeadmin', function () {
//     return view('admin.home');
// });
// Route::post('/homeadmin', function () {
//     return view('admin.home');
// });
Route::get('/adproduct', function () {
    return view('admin.product');
});
// Route::get('/aduser', function () {
//     return view('admin.user');
// });
Route::get('/adcat', function () {
    return view('admin.category');
});
//Route::put('/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::match(['get', 'post'], '/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::match(['get', 'post'], '/homeadmin', [AdminController::class, "viewhome"])->name('admin.home');
Route::match(['get', 'post'], '/themuser', [AdminController::class, "themuser"])->name('admin.themuser');
Route::match(['get', 'post'], '/alluser', [AdminController::class, "viewuser"])->name('admin.alluser');
Route::match(['get', 'post'], '/addUser', [AdminController::class, "addUser"])->name('admin.addUser');
