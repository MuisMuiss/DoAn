<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product_Controller;
use Illuminate\Support\Facades\Route;



Route::get('/index', function () {
    return view('user.index');
});
Route::get('/shopsua', function () {
    return view('user.shopsua');
});
Route::get('/shopta', function () {
    return view('user.shopta');
});
Route::get('/cart', function () {
    return view('user.cart');
});
Route::get('/checkout', function () {
    return view('user.checkout');
});
Route::get('/detail', function () {
    return view('user.shopdetail');
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

Route::match(['get', 'post'], '/upuser/{nguoi_dung_id}', [AdminController::class, "upuser"])->name('admin.upuser');
//Route::put('/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::match(['get', 'post'], '/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::get('/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::post('/login', [AdminController::class, "login"])->name('admin.login');
Route::match(['get', 'post'], '/homeadmin', [AdminController::class, "viewhome"])->name('admin.home');

Route::get('/themuser', [AdminController::class, "themuser"])->name('admin.themuser');
Route::get('/alluser', [AdminController::class, "viewuser"])->name('admin.alluser');
Route::post('/addUser', [AdminController::class, "addUser"])->name('admin.addUser');
Route::get( '/suauser/{nguoi_dung_id}', [AdminController::class, "suauser"])->name('admin.suauser');
Route::post( '/updateUser/{nguoi_dung_id}', [AdminController::class, "updateUser"])->name('admin.updateUser');
Route::match(['get', 'post'], '/deleteUser/{nguoi_dung_id}', [AdminController::class, "deleteUser"])->name('admin.deleteUser');
Route::get('/allproducts',[Product_Controller::class,"viewProduct"])->name('product.all');
Route::get('/addproducts',[Product_Controller::class,"themsp"])->name('product.add');
Route::post('/addProduct', [Product_Controller::class, "addProduct"])->name('admin.addProduct');
