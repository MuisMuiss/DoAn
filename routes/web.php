<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product_Controller;
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
// Route::get('/adproduct', function () {
//     return view('admin.product');
// });
Route::get('/aduser', function () {
    return view('admin.user');
});
Route::get('/adcat', function () {
    return view('admin.category');
});
//Route::put('/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::match(['get', 'post'], '/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::match(['get', 'post'], '/homeadmin', [AdminController::class, "viewhome"])->name('admin.home');
Route::get('allproducts',[Product_Controller::class,"index"])->name('product.all');
Route::get('addproducts',[Product_Controller::class,"themsp"])->name('product.add');
