<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product_Controller;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\ManageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/index', function () {
//     return view('user.index');
// });
Route::get('/index',[HomeController::class,"index"])->name('index');
Route::get('/products{danh_muc_id}', [ProductController::class, 'getDanhMuc'])->name('getDM.product');
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
//Route::get('/account/profile/{type}', [HomeController::class, 'getInfo'])->middleware('auth');
Route::prefix('account')->group(function () {
    Route::get('login', [HomeController::class, 'showLogin'])->name('login');
    Route::post('login', [HomeController::class, 'checklogin'])->name('user.login');
    Route::get('logout', [HomeController::class, 'logout'])->name('user.logout');

    Route::get('forgotpassword', [HomeController::class, 'showfp'])->name('forgotpass');
    Route::post('forgotpassword', [HomeController::class, 'checkfp'])->name('user.forgotpass');
    Route::get('resetpassword/{email}', [HomeController::class, 'showResetForm'])->name('reset.password');
    Route::post('resetpassword', [HomeController::class, 'resetPassword'])->name('reset.password.post');
    
    Route::get('register', [HomeController::class, 'showRegister'])->name('register');
    Route::post('register', [HomeController::class, 'checkregister'])->name('user.register');
    Route::get('profile', [HomeController::class, 'showProfile'])->name('profile');
    
    Route::get('profile/account/{nguoi_dung_id}', [HomeController::class, "viewAccout"])->name('accout.view');
    Route::post('profile/account/{nguoi_dung_id}/update', [HomeController::class, "updateAccout"])->name('accout.update');
    Route::get('profile/order', [HomeController::class, "viewOrder"])->name('order.view');
    Route::get('profile/ctorder/{don_hang_id}', [HomeController::class, "viewctOrder"])->name('ctorder.view');


    
    Route::get('profile/changepassword', [HomeController::class, "viewChangepassword"])->name('chpass.view');
    Route::post('/change_password', [HomeController::class, 'changePassword'])->name('change_password');
    Route::get('/proid/{proid}',[ProductController::class,"productdetail"])->name('productdetail');
    Route::get('/cate/{cate}', [ProductController::class, "category"])->name('go.shop');
    Route::get('/brand/{brand}', [ProductController::class, "brandshop"])->name('go.brand');
    Route::get('/search', [ProductController::class, "search"])->name('find');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/add1/{id}', [CartController::class, 'addToCart1'])->name('cart.add1');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('checkout');
    
});
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('info', [HomeController::class, 'info'])->name('info');





























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

    //Đơn hàng
    Route::get('/allorder',[ManageController::class,"vieworder"])->name('order.all');
    // Cập nhật đơn hàng
    Route::get( '/editorder/{don_hang_id}', [ManageController::class, "editorder"])->name('admin.editorder');
    Route::post( '/updateorder/{don_hang_id}', [ManageController::class, "updateorder"])->name('admin.updateorder');
    //Xóa đơn hàng
    Route::get('/deleteorder/{don_hang_id}', [ManageController::class, "deleteorder"])->name('admin.deleteorder');
    //chi tiết đơn hàng
    Route::get('/allctorder/{don_hang_id}',[ManageController::class,"viewctorder"])->name('ctorder.all');




    //Nhập hàng 
    Route::get('/allnhap',[ManageController::class,"viewnhap"])->name('inport.all');
    Route::get('/addnhap',[ManageController::class,"themnhap"])->name('inport.add');
    Route::post('/addnhap', [ManageController::class, "addnhap"])->name('admin.addnhap');
    // Cập nhật nhập hàng
    Route::get( '/editnhap/{nhap_hang_id}', [ManageController::class, "editnhap"])->name('admin.editnhap');
    Route::post( '/updatenhap/{nhap_hang_id}', [ManageController::class, "updatenhap"])->name('admin.updatenhap');
    //Xóa nhập hàng
    Route::get('/deletenhap/{nhap_hang_id}', [ManageController::class, "deletenhap"])->name('admin.deletenhap');
    

    //Chi tiết
    Route::get('/allnhap/{nhap_hang_id}',[ManageController::class,"viewctnhap"])->name('ctimport.all');
    Route::get('/addctnhap/{nhap_hang_id}',[ManageController::class,"themctnhap"])->name('ctimport.add');
    Route::post('/addctnhap/{nhap_hang_id}', [ManageController::class, "addctnhap"])->name('admin.addctnhap');
    //
    Route::get( '/editctnhap/{id}', [ManageController::class, "editctnhap"])->name('admin.editctnhap');
    Route::post( '/updatectnhap/{id}', [ManageController::class, "updatectnhap"])->name('admin.updatectnhap');
    //
    Route::get('/deletectnhap/{id}', [ManageController::class, "deletectnhap"])->name('admin.deletectnhap');
    //



    Route::get('/nguoidung/search', [AdminController::class, 'searchND'])->name('nguoidung.search');
    Route::get('/product/search', [Product_Controller::class, 'searchSP'])->name('product.search');
    Route::get('/brand/search', [ManageController::class, 'searchTH'])->name('brand.search');
    Route::get('/donhang/search', [ManageController::class, 'searchDH'])->name('order.search');
    Route::get('/nhaphang/search', [ManageController::class, 'searchNH'])->name('import.search');
    
});

Route::get('/login_admin', [AdminController::class, "viewlogin"])->name('login');
Route::post('/login_admin', [AdminController::class, "login"])->name('admin.login');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

