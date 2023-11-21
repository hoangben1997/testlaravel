<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo1Controller;
use App\Http\Controllers\Demo2Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CauthuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogadminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\MemberController;
use App\Http\Controllers\frontend\AccountController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HocsinhController;


use App\Http\Controllers\CloudflareController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * Cloudflare
 */
Route::get('cloud', [CloudflareController::class, 'adddns']);
Route::post('cloud', [CloudflareController::class, 'updatedns']);
Route::get('indexdns', [CloudflareController::class, 'indexdns']);
Route::get('deletedns/{id}', [CloudflareController::class, 'deletedns']);




Route::get('/', function () {
    return view('welcome');
});
// Route::get('/mail', function () {
//     return view('frontend.checkout.mail');
// });
// Route::get('/hoang', function () {
//     return view('hoang');
// });
// Route::get('/demo1', [Demo1Controller::class, 'index']);
// Route::post('/demo1', [Demo1Controller::class, 'store']);

// Route::get('/demo2', [Demo2Controller::class, 'index']);

// Route::get('/demo1', function () {
//     return view('demo1');
// });
// Route::get('/demo2', function () {
//     return view('demo2');
// });

// Route::get('/index', function () {
//     return view('index');
// });
// Route::get('/master', function () {
//     return view('master.master');
// });
// Route::get('/index', [IndexController::class, 'index']);
// Route::post('/index', [IndexController::class, 'store']);


// Route::get('/index', [IndexController::class, 'index']);

// Route::get('/add', [IndexController::class, 'create']);
// Route::post('/add', [IndexController::class, 'store']);


// Route::get('/edit/{id}', [IndexController::class, 'show']); // => hienn thi ra form, va lay data hien thi ra form
// Route::post('/edit/{id}', [IndexController::class, 'update']); // => khi nhap data vao form click thti gui qua controller xux ly

// Route::get('/edit', [IndexController::class, 'show']); // => hienn thi ra form, va lay data hien thi ra form
// Route::post('/edit', [IndexController::class, 'edit']); // => khi nhap data vao form click thti gui qua controller xux ly

// Route::get('/delete/{id}', [IndexController::class, 'delete']);

// frontend

Route::get('/index', [CauthuController::class, 'index']);

Route::get('/add', [CauthuController::class, 'create']);
Route::post('/add', [CauthuController::class, 'store']);

Route::get('/edit/{id}', [CauthuController::class, 'show']); 
Route::post('/edit/{id}', [CauthuController::class, 'update']); 

// Route::get('/delete/{id}', [CauthuController::class, 'delete']);
Route::get('/hocsinh', [HocsinhController::class, 'index']); // Hiển thị danh sách học sinh
Route::get('/hocsinh/create', [HocsinhController::class, 'create']);// Thêm mới học sinh
Route::post('/hocsinh/create', [HocsinhController::class, 'store']); // Xử lý thêm mới học sinh
Route::get('/hocsinh/{id}/edit', [HocsinhController::class, 'edit']); // Sửa học sinh
Route::post('/hocsinh/update', [HocsinhController::class, 'update']); // Xử lý sửa học sinh
Route::get('/hocsinh/{id}/delete', [HocsinhController::class, 'destroy']); // Xóa học sinh




//frontend
Route::get('/logoutmember', [MemberController::class, 'logout']);
Route::group(['middleware' => 'auth.user'], function(){
    Route::get('/homeindex', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('homeindex');
    Route::post('/homeindex', [App\Http\Controllers\frontend\HomeController::class, 'searchHome']);
    Route::post('/homeAjax', [App\Http\Controllers\frontend\HomeController::class, 'homeAjax']);


    Route::post('/cartAjax', [CartController::class, 'cartAjax']);
    Route::get('/cart', [CartController::class, 'cart']);
    Route::post('/cart', [CartController::class, 'addCart']);

        
    Route::get('/loginmember', [MemberController::class, 'login']);
    Route::post('/loginmember', [MemberController::class, 'logincheck']);
    Route::get('/registermember', [MemberController::class, 'register']);
    Route::post('/registermember', [MemberController::class, 'updateregister']);
       




        
    Route::get('/account/update', [AccountController::class, 'account']);
    Route::post('/account/update', [AccountController::class, 'updateaccount']);

    Route::get('/blog', [BlogController::class, 'blog']);

    Route::get('/blogsingle/{id}', [BlogController::class, 'blogsingle']);
    Route::post('/blogsingle/{id}', [BlogController::class, 'blogCmt']);
    Route::post('/blogAjax', [BlogController::class, 'blogRate']);

    Route::get('/account/myproduct', [ProductController::class, 'myproduct']);
    Route::get('/account/product/add', [ProductController::class, 'nhapproduct']);
    Route::post('/account/product/add', [ProductController::class, 'addproduct']);
    Route::get('/account/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('/account/product/edit/{id}', [ProductController::class, 'editproduct']);
    Route::post('/account/product/edit/{id}', [ProductController::class, 'updateproduct']);


    Route::get('/productdetail/{id}', [ProductController::class, 'productdetail']);

    Route::get('/cart/checkout', [CheckoutController::class, 'checkOut']);
    Route::get('/order', [CheckoutController::class, 'sendMail']);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//backend
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth'
], function () {
    Route::get('/', [LoginController::class, 'showLoginForm']);
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::group(['prefix' => 'admin','middleware' => 'auth.admin'],
function (){

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [UserController::class, 'index']);
    Route::post('/profile', [UserController::class, 'updateprofile']); 

    Route::get('/country', [CountryController::class, 'indexcountry'])->name('country');
    Route::get('/addcountry', [CountryController::class, 'addcountry']);
    Route::post('/addcountry', [CountryController::class, 'updatecountry']);
    Route::get('/delete/{id}', [CountryController::class, 'delete']);

    Route::get('/category', [CategoryController::class, 'indexcategory']);
    Route::get('/addcategory', [CategoryController::class, 'addcategory']);
    Route::post('/addcategory', [CategoryController::class, 'updatecategory']);
    Route::get('/delete/{id}', [CategoryController::class, 'delete']);

    Route::get('/brand', [BrandController::class, 'indexbrand']);
    Route::get('/addbrand', [BrandController::class, 'addbrand']);
    Route::post('/addbrand', [BrandController::class, 'updatebrand']);
    Route::get('/delete/{id}', [BrandController::class, 'delete']);

    Route::get('/blogadmin', [BlogadminController::class, 'indexblog']);//list danh sach blog

    Route::get('/addblog', [BlogadminController::class, 'nhapblog']);//nhap blog
    Route::post('/addblog', [BlogadminController::class, 'addblog']);//add blog vào data
    Route::get('/editblog/{id}', [BlogadminController::class, 'showblog']); //edit danh sach blog
    Route::post('/editblog/{id}', [BlogadminController::class, 'updateblog']); //up sau khi edit danh sach blog
    Route::get('/deleteblog/{id}', [BlogadminController::class, 'deleteblog']);//xoa blog
});





