<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product_Controller;
use App\Http\Controllers\Admin\Category_Controller;
use Illuminate\Support\Facades\Route;



Route::get('/index', function () {
    return view('user.index');
});





























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
Route::get('/type', function () {
    return view('admin.typeproduct');
});
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
Route::get('allproducts',[Product_Controller::class,"index"])->name('product.all');
Route::get('addproducts',[Product_Controller::class,"themsp"])->name('product.add');
Route::get('allcate', [Category_Controller::class, "index"])->name('Cate.all');
Route::get('addcate', [Category_Controller::class, "themcategory"])->name('Cate.add');