<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TestController;
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

Route::middleware('auth.check')->group(function(){

    Route::get('/', [SigninController::class, 'index'])->name('signin.index');
    Route::post('/', [SigninController::class, 'signin'])->name('signin');

    Route::get('/signup', [SignupController::class, 'index'])->name('signup.index');
    Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

});

Route::middleware('auth')->group(function(){

    Route::post('/signout', [SignoutController::class, 'signout'])->name('signout');
    
    Route::resource('car', CarsController::class);
    Route::get('/car-table', [CarsController::class, 'table'])->name('car.table');

});