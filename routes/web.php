<?php

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/{aid}', [HomeController::class, "index"]);

Route::middleware("auth")->prefix("admin")->group(function () {

    #Dashboard
    Route::get('/', "App\Http\Controllers\Admin\HomeController@index")->name("admin_home");

    #Category
    Route::get("category", "App\Http\Controllers\Admin\CategoryController@index")->name("admin_category");
    Route::get("category/create", "App\Http\Controllers\Admin\CategoryController@create")->name("admin_category_create");
    Route::post("category/store", "App\Http\Controllers\Admin\CategoryController@store")->name("admin_category_store");
    Route::get("category/edit/{id}", "App\Http\Controllers\Admin\CategoryController@edit")->name("admin_category_edit");
    Route::post("category/update/{id}", "App\Http\Controllers\Admin\CategoryController@update")->name("admin_category_update");
    Route::get("category/delete/{id}", "App\Http\Controllers\Admin\CategoryController@destroy")->name("admin_category_delete");
    Route::get("category/show", "App\Http\Controllers\Admin\CategoryController@show")->name("admin_category_show");

    #Product
    Route::get("product", "App\Http\Controllers\Admin\ProductController@index")->name("admin_product");
    Route::get("product/create", "App\Http\Controllers\Admin\ProductController@create")->name("admin_product_create");
    Route::post("product/store", "App\Http\Controllers\Admin\ProductController@store")->name("admin_product_store");
    Route::get("product/edit/{id}", "App\Http\Controllers\Admin\ProductController@edit")->name("admin_product_edit");
    Route::post("product/update/{id}", "App\Http\Controllers\Admin\ProductController@update")->name("admin_product_update");
    Route::get("product/delete/{id}", "App\Http\Controllers\Admin\ProductController@destroy")->name("admin_product_delete");
    Route::get("product/show", "App\Http\Controllers\Admin\ProductController@show")->name("admin_product_show");

    #Image Gallery
    Route::prefix("image")->group(function () {
        Route::get("create/{product_id}", "App\Http\Controllers\Admin\ImageController@create")->name("admin_image_create");
        Route::post("store/{product_id}", "App\Http\Controllers\Admin\ImageController@store")->name("admin_image_store");
        Route::get("delete/{product_id}/{id}", "App\Http\Controllers\Admin\ImageController@destroy")->name("admin_image_delete");
        Route::get("show", "App\Http\Controllers\Admin\ImageController@show")->name("admin_image_show");
    });

    #Settings
    Route::get("setting", "App\Http\Controllers\Admin\SettingController@index")->name("admin_setting");
    Route::post("setting/update", "App\Http\Controllers\Admin\SettingController@update")->name("admin_setting_update");
});



Route::get('/admin/login', [AdminHomeController::class, "login"])->name("admin_login");
Route::post('/admin/logincheck', [AdminHomeController::class, "logincheck"])->name("admin_logincheck");
Route::get('/admin/logout', [AdminHomeController::class, "logout"])->name("admin_logout");
