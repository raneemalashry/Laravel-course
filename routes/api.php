<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('/' , function(){
        return 'hello from  api';
    });
});
// Route::get('/' , function(){
//     return 'hello from  api';
// });


Route::post('register', [AuthController::class, 'register']);

Route::post('login' ,[AuthController::class , 'login']);
Route::resource('posts', PostController::class);
