<?php

// use App\Http\Controllers\Dashboard\PostController;

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PostController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::group(['prefix'=> LaravelLocalization::setLocale()] ,function(){

    // Route::get('/', function () {
    //     return view('welcome');
    // });

// Route::get('/user/{name}/{age?}', function($name , $age = "not found"){
//     echo  "Hello " . $name . " Your Age is " . $age;
// });

// Route::get('users/{name}' , function($name){
//     return "hello" . $name;
// })->where('name' , '[A-Za-z]+');

// users/create
//users/edit
//users/delete
// Route::get('home', function () {
//     return "Hello From Website  ,  You are not authorizated to access this page";
// })->name('home');
// Route::group(['prefix'=>'users', 'as'=>'users.'] , function(){


//     Route::get('/' , function(){
//         return "Hello From Index Users";
//     })->name('index');
//     Route::get('/show' , function(){
//         return "Hello From Users Show";
//     })->name('show');

//     Route::get('/delete' , function(){
//         return "Hello From Users Delete";
//     })->name('delete');

// });
// Route::get('post/index' , [PostController::class , 'index']);
// route::group(['middleware'=>'auth'] , function(){

    Route::resource('posts' , PostController::class);
// });




Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
// });
