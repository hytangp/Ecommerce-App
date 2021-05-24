<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::prefix('admin')->group(function()
{
    Route::get('/', [AdminsController::class,'show'])->name('Home');

    Route::get('/signin',function()
    {
        return view('admin.admin_signin');
    })->name('Admin-Signin');

    Route::post('/postsignin',[AdminsController::class,'checkAuthAdmin']);

    Route::get('/signout',[AdminsController::class,'signOut']);

    Route::get('/manageproduct',[ProductsController::class,'adminProductShow'])->name('Manage-Product')
    ->middleware('auth:admin');

    Route::get('/manageusers',[AdminsController::class,'adminUserShow'])->name('Manage-User')
    ->middleware('auth:admin');

    Route::get('/addproduct',function()
    {
        return view('admin.products.product_add');    
    })->name('Add-Product')->middleware('auth:admin');

    Route::post('/postaddproduct',[ProductsController::class,'store']);

    Route::get('/productdelete/{id}',[ProductsController::class,'destroy']);

    Route::get('/editproduct/{id}',[ProductsController::class,'edit']);

    Route::post('/posteditproduct/{id}',[ProductsController::class,'update']);

    Route::get('/updateproductstatus',[ProductsController::class,'updateStatus']);

    Route::get('/updateuserstatus',[UsersController::class,'updateStatus']);

    Route::get('/sort_product/category={category}',[ProductsController::class,'sortProduct']);

});

Route::get('/',[UsersController::class,'show']);

Route::get('/signin',function(){
    return view('user.user_signin');
});

Route::get('/signup',function(){
    return view('user.user_signup');
});

Route::post('/postregisteruser',[UsersController::class,'create']);

Route::post('/postusersignin',[UsersController::class,'checkAuthUser']);

Route::get('/signout',[UsersController::class,'signOut']);

Route::get('/product_view/product={id}',[ProductsController::class,'userProductShow']);

Route::get('/add_to_cart',[ProductsController::class,'addToCart']);

Route::get('/managecart',[ProductsController::class,'userCartShow'])->middleware('auth');

Route::get('order',[OrdersController::class,'create']);

Route::get('/vieworders',[OrdersController::class,'show'])->name('View-Order')->middleware('auth');

Route::get('delete_from_cart',[ProductsController::class,'deleteFromCart']);

Route::post('/search',[ProductsController::class,'findProduct']);
