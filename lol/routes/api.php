<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ItemController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('login', [UserController::class,'login'])->name('login');
Route::post('register', [UserController::class,'register']);
Route::get('users', [UserController::class,'getUsers']);





Route::controller(ItemController::class)->group(function(){
    Route::get('/items','index');
    Route::post('/item','store');
    Route::put('/item/{id}','update');
    Route::get('/item/{id}','edit');
    Route::delete('/item/{id}','destroy');

});
