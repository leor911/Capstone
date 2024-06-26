<?php

use Dotenv\Util\Str;
use App\Http\Controllers\test;
use App\Http\Controllers\Zillow;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RoleCheck;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealtorController;
use App\Http\Controllers\MortgageCalculator;
use App\Http\Controllers\CreatePropertyController;
use App\Http\Controllers\ViewPropertiesController;
use App\Http\Controllers\Auth\Admin\LoginController;

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
Route::get('/', [ViewPropertiesController::class, 'viewPropertiesIndex'])->name('index')->middleware('rolecheck:realtor');

Route::get('/propertylistings', [ViewPropertiesController::class, 'viewProperties'])->name('listings')->middleware('rolecheck:realtor');
//login routes
Route::get('/login', function(){
    return view('login');
});
//edit profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

//Map routes
Route::get('/map', [MapController::class, 'mapView']);

//About page routes
Route::get('/about',function(){
    return view('about');
});

//Contact page routes
Route::get('/contact',function(){
    return view('contact');
});

Route::get('/realtor', [ViewPropertiesController::class, 'displayAgents'])->name('displayAgents');
Route::get('/realtor/search', [ViewPropertiesController::class, 'searchAgents'])->name('searchAgents');



//Edit Profile Route
Route::get('/edit', [RealtorController::class, 'viewEditRealtor']);

Route::post('/edit/confirm', [RealtorController::class, 'editConfirm'])->name('edit.confirm');

//Realtor routes
Route::get('/realtorDashboard', [RealtorController::class, 'viewHomePage']);


//t.o.s link
Route::get('/termsOfService',function(){
    return view('/termsOfService');
});


//Create Property page routes
Route::get('/createProperty', function () {
    return view('createProperty');
})->middleware('rolecheck:realtor');
Route::post('/createProperty',[CreatePropertyController::class,'createProperty']);

require __DIR__.'/auth.php';

//mortgage calc
Route::get('/mortgage-calc', [MortgageCalculator::class, 'showCalculator'])->name('mortgage.calculator');
Route::post('/mortgage-calc', [MortgageCalculator::class, 'calculate'])->name('mortgage.calculate');
Route::get('/mortgage-result', function () {
    return view('mortgageCalc');
})->name('mortgage.result');


Route::get('/header',function(){
    return view('/header');
});
