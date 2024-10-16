<?php
use App\Http\Controllers\Admin\AdminController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\Product_Controller;
=======
>>>>>>> 1f7db35eec24f105bdcb26715aed7ce8dab4b0e7
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
<<<<<<< HEAD
// Route::get('/adproduct', function () {
//     return view('admin.product');
// });
=======
Route::get('/adproduct', function () {
    return view('admin.product');
});
>>>>>>> 1f7db35eec24f105bdcb26715aed7ce8dab4b0e7
Route::get('/aduser', function () {
    return view('admin.user');
});
Route::get('/adcat', function () {
    return view('admin.category');
});
//Route::put('/login', [AdminController::class, "viewlogin"])->name('admin.login');
Route::match(['get', 'post'], '/login', [AdminController::class, "viewlogin"])->name('admin.login');
<<<<<<< HEAD
Route::match(['get', 'post'], '/homeadmin', [AdminController::class, "viewhome"])->name('admin.home');
Route::get('allproducts',[Product_Controller::class,"index"])->name('product.all');
Route::get('addproducts',[Product_Controller::class,"themsp"])->name('product.add');
=======
Route::match(['get', 'post'], '/homeadmin', [AdminController::class, "viewhome"])->name('admin.home');
>>>>>>> 1f7db35eec24f105bdcb26715aed7ce8dab4b0e7
