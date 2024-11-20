<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product_Controller;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\CartController as ControllersCartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/index', function () {
//     return view('user.index');
// });
Route::get('/index',[HomeController::class,"index"])->name('index');

Route::get('/shopsua', [ProductController::class,"shopsua"])->name('shopsua');
Route::get('/shopta', [ProductController::class,"shopta"])->name('shopta');

Route::get('/cart', function () {
    return view('user.cart');
});
Route::get('/checkout', function () {
    return view('user.checkout');
});
Route::get('/detail', function () {
    return view('user.shopdetail');
});
Route::get('/save-cart', [CartController::class, "save_cart"])->name('save.cart');
//Route::get('/account/profile/{type}', [HomeController::class, 'getInfo'])->middleware('auth');
Route::prefix('account')->group(function () {
    Route::get('login', [HomeController::class, 'showLogin'])->name('login');
    Route::post('login', [HomeController::class, 'checklogin'])->name('user.login');
    Route::get('logout', [HomeController::class, 'logout'])->name('user.logout');
    
    Route::get('register', [HomeController::class, 'showRegister'])->name('register');
    Route::post('register', [HomeController::class, 'checkregister'])->name('user.register');
    Route::get('profile', [HomeController::class, 'showProfile'])->name('profile');
    
    Route::get('profile/account/{nguoi_dung_id}', [HomeController::class, "viewAccout"])->name('accout.view');
    Route::post('profile/account/{nguoi_dung_id}/update', [HomeController::class, "updateAccout"])->name('accout.update');
    Route::get('profile/order', [HomeController::class, "viewOrder"])->name('order.view');
    Route::get('profile/changepassword', [HomeController::class, "viewChangepassword"])->name('chpass.view');
    Route::post('/change_password', [HomeController::class, 'changePassword'])->name('change_password');
    Route::get('/proid/{proid}',[ProductController::class,"productdetail"])->name('productdetail');
Route::get('/cate/{cate}', [ProductController::class, "category"])->name('go.shop');
Route::get('/brand/{brand}', [ProductController::class, "brandshop"])->name('go.brand');
Route::get('/search', [ProductController::class, "search"])->name('find');
Route::get('/cart',[CartController::class,"index"])->name('cart');
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

Route::middleware('auth:admin')->group(function(){
    Route::get('/homeadmin', function() {
         // Kiểm tra người dùng đã đăng nhập chưa
        return view('admin.home');
    })->name('admin.home');
    // Route::match(['get', 'post'], '/homeadmin', [AdminController::class, 'viewhome'])->name('admin.home');

    //User
    // Thêm User
    Route::get('/themuser', [AdminController::class, "themuser"])->name('admin.themuser');
    Route::get('/alluser', [AdminController::class, "viewuser"])->name('admin.alluser');
    Route::post('/addUser', [AdminController::class, "addUser"])->name('admin.addUser');
    // Cập nhật User
    Route::get( '/edituser/{nguoi_dung_id}', [AdminController::class, "edituser"])->name('admin.edituser');
    Route::post( '/updateUser/{nguoi_dung_id}', [AdminController::class, "updateUser"])->name('admin.updateUser');
    // Xóa User
    Route::get('/deleteUser/{nguoi_dung_id}', [AdminController::class, "deleteUser"])->name('admin.deleteUser');
    
    //Product
    
    // Thêm sản phẩm
    Route::get('/allproducts',[Product_Controller::class,"viewProduct"])->name('product.all');
    Route::get('/addproducts',[Product_Controller::class,"themsp"])->name('product.add');
    Route::post('/addProduct', [Product_Controller::class, "addProduct"])->name('admin.addProduct');
    // Cập nhật sản phẩm
    Route::get( '/editsp/{san_pham_id}', [Product_Controller::class, "editsp"])->name('admin.editsp');
    Route::post( '/updatesp/{san_pham_id}', [Product_Controller::class, "updatesp"])->name('admin.updatesp');
    // Xóa sản phẩm
    Route::get('deleteimage/{image}', [Product_Controller::class,'deleteImage'])->name('product.deleteImage');
    Route::get('/deletesp/{san_pham_id}', [Product_Controller::class, "deletesp"])->name('admin.deletesp');

    //Danh mục
    // Thêm danh mục
    Route::get('/allcate',[ManageController::class,"viewCate"])->name('cate.all');
    Route::get('/addcate',[ManageController::class,"themcate"])->name('cate.add');
    Route::post('/addcate', [ManageController::class, "addcate"])->name('admin.addcate');
    // Cập nhật danh mục
    Route::get( '/editcate/{danh_muc_id}', [ManageController::class, "editcate"])->name('admin.editcate');
    Route::post( '/updatecate/{danh_muc_id}', [ManageController::class, "updatecate"])->name('admin.updatecate');
    // Xóa danh mục
    Route::get('/deletecate/{danh_muc_id}', [ManageController::class, "deletecate"])->name('admin.deletecate');

    //Thương hiệu
    // Thêm thương hiệu
    Route::get('/allbrand',[ManageController::class,"viewbrand"])->name('brand.all');
    Route::get('/addbrand',[ManageController::class,"thembrand"])->name('brand.add');
    Route::post('/addbrand', [ManageController::class, "addbrand"])->name('admin.addbrand');
    // Cập nhật thương hiệu
    Route::get( '/editbrand/{thuong_hieu_id}', [ManageController::class, "editbrand"])->name('admin.editbrand');
    Route::post( '/updatebrand/{thuong_hieu_id}', [ManageController::class, "updatebrand"])->name('admin.updatebrand');
    // Xóa thương hiệu
    Route::get('/deletebrand/{thuong_hieu_id}', [ManageController::class, "deletebrand"])->name('admin.deletebrand');

    //Loại sản phẩm
    // Thêm Loại sản phẩm
    Route::get('/alltype',[ManageController::class,"viewtype"])->name('type.all');
    Route::get('/addtype',[ManageController::class,"themtype"])->name('type.add');
    Route::post('/addtype', [ManageController::class, "addtype"])->name('admin.addtype');
    // Cập nhật Loại sản phẩm
    Route::get( '/edittype/{loai_sp_id}', [ManageController::class, "edittype"])->name('admin.edittype');
    Route::post( '/updatetype/{loai_sp_id}', [ManageController::class, "updatetype"])->name('admin.updatetype');
    // Xóa Loại sản phẩm
    Route::get('/deletetype/{loai_sp_id}', [ManageController::class, "deletetype"])->name('admin.deletetype');
});

Route::get('/login_admin', [AdminController::class, "viewlogin"])->name('login');
Route::post('/login_admin', [AdminController::class, "login"])->name('admin.login');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

