<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UomsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});
Route::get('/product/get-product', [ProductsController::class,'getProduct']);
Route::post('/product/add-product', [ProductsController::class,'addProduct']);
Route::get('/product/edit-product/{id}', [ProductsController::class,'editProduct']);
Route::put('/product/update-product/{id}', [ProductsController::class,'updateProduct']);
Route::delete('/product/delete-product/{id}', [ProductsController::class,'deleteProduct']);
Route::get('/uom/get-uom', [UomsController::class,'getUom']);
Route::post('/uom/add-uom', [UomsController::class,'addUom']);
Route::get('/uom/edit-uom/{id}', [UomsController::class,'editUom']);
Route::put('/uom/update-uom/{id}', [UomsController::class,'updateUom']);
Route::delete('/uom/delete-uom/{id}', [UomsController::class,'deleteUom']);