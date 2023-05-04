<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\TransactionController as ControllersTransactionController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $products = Product::get();
    $tests = Product::where('category_id', 1)->get();
    $panels = Product::where('category_id', 2)->get();
    return view('welcome', compact('products', 'tests', 'panels'));
});

Route::get('/check', function(){
    return Auth::user()->role == 'admin' ? redirect('/home') : redirect('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('cart', CartController::class);
Route::resource('transaction', ControllersTransactionController::class);
Route::resource('pemesanan', TransactionController::class);
Route::resource('user', UserController::class);
Route::resource('produk', ControllersProductController::class);
Route::post('/cart/delete/api', [CartController::class, 'deleteApi']);
Route::resource('tes', TesController::class);
Route::resource('panel', PanelController::class);
Route::resource('profile', ProfileController::class);