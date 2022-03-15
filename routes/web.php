<?php

use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\UserCheckMiddleware;
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

Route::get('< Back', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin#profile');
        } else if (Auth::user()->role == 'user') {
            return redirect()->route('user#index');
        }
    }
})->name('dashboard');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //Admin Route Group
    Route::get('profile', 'AdminController@profile')->name('admin#profile')->middleware(AdminCheckMiddleware::class);
    Route::get('logoutCancel', 'AdminController@logoutCancel')->name('admin#logoutCancel');
    Route::get('logoutConfirm', 'AdminController@logoutConfirm')->name('admin#logoutConfirm');
    Route::post('updateInfo/{id}', 'AdminController@updateInfo')->name('admin#updateInfo');
    Route::get('passwordChangePage/{id}', 'AdminController@passwordChangePage')->name('admin#passwordChangePage');
    Route::post('passwordChange', 'AdminController@changePassword')->name('admin#changePassword');

    //Category CRUD Route Group
    Route::get('category', 'CategoryController@category')->name('admin#category');
    Route::get('addCategory', 'CategoryController@addCategory')->name('admin#addCategory');
    Route::post('createCategory', 'CategoryController@createCategory')->name('admin#createCategory');
    Route::get('deleteCategory/{id}', 'CategoryController@deleteCategory')->name('admin#deleteCategory');
    Route::get('editCategory/{id}', 'CategoryController@editCategory')->name('admin#editCategory');
    Route::post('updateCategory', 'CategoryController@updateCategory')->name('admin#updateCategory');
    Route::get('category/search', 'CategoryController@searchCategory')->name('admin#searchCategory');
    Route::get('categoryItem/{id}', 'CategoryController@categoryItem')->name('admin#categoryItem');

    //Pizza CRUD Route Group
    Route::get('pizza', 'PizzaController@pizza')->name('admin#pizza');
    Route::get('addPizza', 'PizzaController@addPizza')->name('admin#addPizza');
    Route::post('createPizza', 'PizzaController@createPizza')->name('admin#createPizza');
    Route::get('deletePizza/{id}', 'PizzaController@deletePizza')->name('admin#deletePizza');
    Route::get('editPizza/{id}', 'PizzaController@editPizza')->name('admin#editPizza');
    Route::post('updatePizza/{id}', 'PizzaController@updatePizza')->name('admin#updatePizza');
    Route::get('pizza/search', 'PizzaController@searchPizza')->name('admin#searchPizza');

    //User And Admin Route Group
    Route::get('adminList', 'ListController@adminList')->name('admin#adminList');
    Route::get('userList', 'ListController@userList')->name('admin#userList');
    Route::get('userSearch', 'ListController@userSearch')->name('admin#userSearch');
    Route::get('adminSearch', 'ListController@adminSearch')->name('admin#adminSearch');

    //User Contact
    Route::get('contact', 'ContactController@contact')->name('admin#contact');
    Route::get('contact/search', 'ContactController@searchContact')->name('admin#searchContact');

    //Admin Order List
    Route::get('order', 'OrderController@order')->name('admin#order');
});
Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
    //User Route Group
    Route::get('/', 'UserController@index')->name('user#index')->middleware(UserCheckMiddleware::class);
    Route::get('logoutCancel', 'UserController@logoutCancel')->name('user#logoutCancel');
    Route::get('logoutConfirm','UserController@logoutConfirm')->name('user#logoutConfirm');
    Route::get('categoryPizzaList/{id}', 'UserController@categoryPizzaList')->name('user#categoryPizzaList');
    Route::get('search/all', 'UserController@allSearch')->name('user#allSearch');
    Route::get('productDetail/{id}','UserController@productDetail')->name('user#productDetail');
    Route::get('confirmOrder/{id}','UserController@confirmOrder')->name('user#confirmOrder');
    Route::post('order/{id}','UserController@order')->name('user#order');

});