<?php

use App\Models\Category;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categrory/list',function(){
    $category = Category::get();
    return Response::json($category);
});

Route::get('pizza/list',function(){
    $pizza = Pizza::get();
    return Response::json($pizza);
});

Route::get('user/list',function(){
    $user = User::get();
    return Response::json($user);
});