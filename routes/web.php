<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product_Controller;
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Route::get('/index', function () {
//     return view('user.index');
// });
Route::get('/index',[ProductController::class,"index"]);

Route::get('/shopsua', [ProductController::class,"shopsua"]);
Route::get('/shopta', [ProductController::class,"shopta"]);

Route::get('/cart', function () {
    return view('user.cart');
});
Route::get('/checkout', function () {
    return view('user.checkout');
});
Route::get('/detail', function () {
    return view('user.shopdetail');
});






























Route::get('/register', function () {
    return view('admin.register');
});
Route::get('/adproduct', function () {
    return view('admin.product');
});
Route::get('/adcat', function () {
    return view('admin.category');
});
Route::get('/type', function () {
    return view('admin.typeproduct');
});




Route::middleware('auth')->group(function(){
    Route::get('/homeadmin', function() {
         // Kiểm tra người dùng đã đăng nhập chưa
        return view('admin.home');
    })->name('admin.home');
    // Route::match(['get', 'post'], '/homeadmin', [AdminController::class, 'viewhome'])->name('admin.home');
    // Thêm User
    Route::get('/themuser', [AdminController::class, "themuser"])->name('admin.themuser');
    Route::get('/alluser', [AdminController::class, "viewuser"])->name('admin.alluser');
    Route::post('/addUser', [AdminController::class, "addUser"])->name('admin.addUser');
    // Cập nhật User
    Route::get( '/edituser/{nguoi_dung_id}', [AdminController::class, "edituser"])->name('admin.edituser');
    Route::post( '/updateUser/{nguoi_dung_id}', [AdminController::class, "updateUser"])->name('admin.updateUser');
    // Xóa User
    Route::get('/deleteUser/{nguoi_dung_id}', [AdminController::class, "deleteUser"])->name('admin.deleteUser');
    

    
    // Thêm sản phẩm
    Route::get('/allproducts',[Product_Controller::class,"viewProduct"])->name('product.all');
    Route::get('/addproducts',[Product_Controller::class,"themsp"])->name('product.add');
    Route::post('/addProduct', [Product_Controller::class, "addProduct"])->name('admin.addProduct');
    // Cập nhật sản phẩm
    Route::get( '/editsp/{san_pham_id}', [Product_Controller::class, "editsp"])->name('admin.editsp');
    Route::post( '/updatesp/{san_pham_id}', [Product_Controller::class, "updatesp"])->name('admin.updatesp');
    // Xóa sản phẩm
    Route::get('/deletesp/{san_pham_id}', [Product_Controller::class, "deletesp"])->name('admin.deletesp');

});

Route::get('/login', [AdminController::class, "viewlogin"])->name('login');
Route::post('/login', [AdminController::class, "login"])->name('admin.login');

