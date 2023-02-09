<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\Admin\CategoryController;

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
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Shop', 'prefix' => 'shop'], function (){
    Route::resource('products','PostController')->names('shop.products');
});

// Админка магазина
$groupData = [
    'namespace' => 'App\Http\Controllers\Shop\Admin',
    'prefix' => 'admin/shop'
];
Route::group($groupData,function (){
    //ShopCategory
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories','CategoryController')
        ->only($methods)
        ->names('shop.admin.categories');
});

Route::resource('rest', 'App\Http\Controllers\RestTestController')->names('restTest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
