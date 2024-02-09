<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Index routes
Route::get('/', function () {
    return view('/index');
});

Route::post('/login', [LoginController::class, 'login']);

//Map routes
Route::get('/map', function () {
    return view('/map');
});

//About page routes
Route::get('/about',function(){
    return view('/about');
});

//Contact page routes
Route::get('/contact',function(){
    return view('/contact');
});

//Property List page routes
Route::get('/propertyList',function(){
    return view('/propertyList');
});
