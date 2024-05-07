<?php

use App\Http\Controllers\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => '/v1/products'

], function ($router) {

    // Accounts
    Route::get('/all_products', [productController::class,'index']);
    Route::get('/products_table', [productController::class,'show_table']);
    Route::get('/get_product', [productController::class,'show']);
    Route::post('/products',  [productController::class,'store']);
    Route::put('/update_product',  [productController::class,'update']);
    Route::delete('/delete_product', [productController::class,'destroy']);

});
