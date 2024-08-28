<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DangkyControlller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdcuctController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\TimkiemController;
use App\Http\Middleware\CustomerMiddleWare;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('Admin/admin');
// });

Route::prefix('sanpham')->group(function(){
    Route::get('form',[ProdcuctController::class,'index'])->name('form');
    Route::get('them',[ProdcuctController::class,'themmoi'])->name('them');
    Route::post('save',[ProdcuctController::class,'save'])->name('save');
    Route::get('sua/{id}',[ProdcuctController::class,'sua'])->name('sua');
    Route::put('luu/{id}',[ProdcuctController::class,'luu'])->name('luu');
    Route::get('xoa/{id}',[ProdcuctController::class,'xoa'])->name('xoa');

    Route::get('upload',[ProdcuctController::class,'upload'])->name('upload.form');
    Route::post('upload',[ProdcuctController::class,'upload'])->name('upload.upload');
    Route::get('Themanh/{id}',[ProdcuctController::class,'Themanh'])->name('Themanh');
    Route::put('Luuanhsanpham',[ProdcuctController::class,'Luuanhsanpham'])->name('Luuanhsanpham');
    Route::get('Xoaanh/{id}',[ProdcuctController::class,'Xoaanh'])->name('Xoaanh');
});
//});
Route::prefix('banner')->group(function(){
    Route::get('formbanner',[BannerController::class,'index'])->name('formbanner');
    Route::get('thembanner',[BannerController::class,'themban'])->name('themban');
    Route::post('savebanner',[BannerController::class,'saveban'])->name('saveban');
    Route::get('upload',[BannerController::class,'upload'])->name('upload.form');
    Route::post('upload',[BannerController::class,'upload'])->name('upload.upload');
    Route::get('xoaban/{id}',[BannerController::class,'xoaban'])->name('xoaban');
});
Route::prefix('brand')->group(function(){
    Route::get('formbrand',[BrandController::class,'index'])->name('formbrand');
    Route::get('thembrand',[BrandController::class,'thembrand'])->name('thembrand');
    Route::get('savebrand',[BrandController::class,'savebrand'])->name('savebrand');
    Route::get('suabrand/{id}',[BrandController::class,'suabrand'])->name('suabrand');
    Route::put('luubrand/{id}',[BrandController::class,'luubrand'])->name('luubrand');
    Route::get('xoabrand/{id}',[BrandController::class,'xoabrand'])->name('xoabrand');
});
Route::prefix('category')->group(function(){
    Route::get('formcate',[CateController::class,'index'])->name('formcate');
    Route::get('themcate',[CateController::class,'themcate'])->name('themcate');
    Route::get('savecate',[CateController::class,'savecate'])->name('savecate');
    Route::get('suacate/{id}',[CateController::class,'suacate'])->name('suacate');
    Route::put('luucate/{id}',[CateController::class,'luucate'])->name('luucate');
    Route::get('xoacate/{id}',[CateController::class,'xoacate'])->name('xoacate');
});

 

Route::prefix('/')->group(function(){
    Route::get('/',[SanphamController::class,'trangchu'])->name('trangchu');
    Route::get('banner',[SanphamController::class,'banner'])->name('banner');
    Route::get('sanpham',[SanphamController::class,'index'])->name('sanpham');
    Route::get('chitiet/{content}_{id}',[SanphamController::class,'chitiet'])->name('chitiet');
    Route::get('timkiem',[TimkiemController::class,'timkiem'])->name('timkiem');
});   
Route::prefix('giohang')->group(function (){
    Route::get('view',[CartController::class,'index'])->name('view.cart');
    Route::get('add/{id}',[CartController::class,'muahang'])->name('add.cart');
    Route::get('xoa/{id}',[CartController::class,'xoahang'])->name('xoa.cart');
    Route::put('capnhat',[CartController::class,'capnhatsoluong'])->name('update.cart');
    Route::get('huy',[CartController::class,'huyhang'])->name('huy.cart');
});
Route::group( ['prefix' => 'Customer'], function () {
        // Phương thức get hiển thị form login
Route::get('cus-logon', [CustomerController::class,'login'])->name('customer.logon');
        //Phương thức post để thực hiện login khi submit form
Route::post('post_logon', [CustomerController::class,'post_login'])->name('post_logon');
        // Phương thức get hiển thị form register
Route::get('cus-register', [CustomerController::class,'register'])->name('customer.register');
        //Phương thức post để thực hiện register khi submit form
Route::post('post_register', [CustomerController::class,'post_register'])->name('post_register');      
});

Route::get('send-mail',[HomeController::class,'sendmail'])->name('sendmail');
Route::get('/contact', [HomeController::class, 'Lienhe'])->name('contact');
Route::post('/contact', [HomeController::class, 'GuiLienhe'])->name('guilienhe');


Route::prefix('order') ->middleware([CustomerMiddleWare::class])->group(function() {
    // Hiển thị form nhập thông tin mua hàng
    Route::get('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    // Tạo đơn hàng, lưu thông tin vào CSDL
    Route::post('checkout', [OrderController::class, 'post_checkout']);
    // khi đặt hàng thành công thì chuyển hướng về daaySs
    Route::get('order-success', [OrderController::class, 'order_success'])->name('order.success');
    // danh sách đơn hàng đã giao dịch
    Route::get('history', [OrderController::class, 'history'])->name('order.history');
    // chi tiết các sản phẩm trong đơn hàng
    Route::get('detail/{order}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('verify-order/{token}', [OrderController::class, 'verify_order'])->name('order.verify_order');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
