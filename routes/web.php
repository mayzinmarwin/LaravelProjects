<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Product\SizeController;
use App\Http\Controllers\Product\UnitController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\ColorController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Product\StatusController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\PublicationController;
use App\Http\Controllers\Product\SubCategoryController;
use App\Http\Controllers\Product\MainCategoryController;
use App\Http\Controllers\Product\WriterController;

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


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\WebsiteController::class, 'index'])->name('websites.ecommerce.homepage');

// Route::get('/admin',[App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
//Route::post('/login','Auth\LoginController@login')->middleware('check_user_is_active');
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth',
        'namespace'=>'Admin'
    ],function(){
        Route::get('dashboard',[App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
});
//user management
Route::group(
    [
        'prefix' => 'user',
        'middleware' => ['auth','check_user_is_active','super_admin'],
        'namespace'=>'Admin'
    ],function(){
        Route::get('/',[App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create',[App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store',[App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update',[App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
        Route::get('/view/{id}',[App\Http\Controllers\Admin\UserController::class, 'view'])->name('admin.user.view');
        Route::post('/delete',[App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
        //Route::get('/test/{id}',[App\Http\Controllers\Admin\UserController::class, 'test'])->name('admin.user.test');
    }); 
    Route::group(
        [
            'prefix' => 'admin',
            'middleware' =>  ['auth','check_user_is_active','super_admin'],
            'namespace'=>'Admin'
        ],function(){
            Route::get('dashboard',[App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    });
    //user management
    Route::group(
        [
            'prefix' => 'user_role',
            'middleware' => 'auth',
            'namespace'=>'Admin'
        ],function(){
            Route::get('/',[App\Http\Controllers\Admin\UserRoleController::class, 'index'])->name('admin.user_role.index');
            // Route::get('/create',[App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
            // Route::post('/store',[App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
            // Route::get('/edit',[App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
            Route::post('/update',[App\Http\Controllers\Admin\UserRoleController::class, 'update'])->name('admin.user_role.update');
            // Route::get('/view/{id}',[App\Http\Controllers\Admin\UserController::class, 'view'])->name('admin.user.view');
            // Route::post('/delete',[App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
        }); 
Route::group(
    [
        'prefix' => 'admin/product',
        'middleware' => 'auth',
    ],function(){
        // Route::get('/',[App\Http\Controllers\Product\ProductController::class, 'index'])->name('admin.product.index');
        // Route::get('/create',[App\Http\Controllers\Product\ProductController::class, 'create'])->name('admin.product.create');
        // Route::get('/profile',[App\Http\Controllers\Product\ProductController::class, 'show'])->name('admin.product.show');

        Route::resource('product',ProductController::class);
        Route::resource('brand',BrandController::class);
        Route::resource('main_category', MainCategoryController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('sub_category', SubCategoryController::class);
        Route::resource('size', SizeController::class);
        Route::resource('status', StatusController::class);
        Route::resource('color', ColorController::class);
        Route::resource('unit', UnitController::class);
        Route::resource('writer', WriterController::class);
        Route::resource('publication', PublicationController::class);

        Route::get('/get-all-category-selected-by-main-category/{main_category_id}', [App\Http\Controllers\Product\CategoryController::class, 'get_category_by_main_category'])->name('get_all_category_selected_by_main_category');
        Route::get('/get-all-sub_category-selected-by-category/{category_id}', [App\Http\Controllers\Product\CategoryController::class, 'get_sub_category_by_category'])->name('get_all_sub_category_selected_by_category');
});

