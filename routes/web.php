<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomePage;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
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
Route::get("/admin", [AdminController::class,'index'])->name('login');
Route::post("/admin", [AdminController::class,'postLogin'])->name('admin.login');
Route::get('/sign-out',[AdminController::class, 'signOut'])->name('admin.signOut');


//---------- Router Backend ------------//
Route::prefix('adminSSMobile')->middleware('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    
    //---- Route category ----//
    Route::resource('category', CategoryController::class);
    Route::get('/category-trash',[CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/{id}/restore',[CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/category/{id}/forceDelete',[CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    //---- END ROUTE CATEGORY ----//

    //---- ROUTE PRODUCT ----//
    Route::resource('product', ProductController::class);
    //---- END ROUTE PRODUCT ----//
});
//-----------    End      ------------//

//----------- Router Frontend ------------//    
Route::prefix('SSMobile')->group(function () {
    //Trang Chu
    Route::get('/',[HomePage::class, 'homePage'])->name('homePage.index');
    
    //Dang ky dang nhap
    Route::get('/login-page', [UserController::class, 'login_page'])->name('homePage.loginPage');
    Route::post('/login', [UserController::class, 'login'])->name('homePage.login');
    Route::post('/register', [UserController::class, 'register'])->name('homePage.register');
    //Dang xuat
    Route::get('/logout',[UserController::class, 'logout'])->name('homePage.logout');
    Route::get('/account', [UserController::class, 'account'])->name('homePage.account');
    //Shop
    Route::get('/shop-list', [HomePage::class,'shop'])->name('homePage.shop');
});

//-----------    End      ------------//