<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/cars/show', [CarController::class, 'show_all_cars_page'])->name('cars');
    Route::get('/cars/offer/post/' , [CarController::class , 'offer_page'])->name('post_offer');//LICENSE PLATE
    Route::get('/cars/offer/new/{license_plate}', [CarController::class, 'new_offer_page'])->name('new_offer');// CAR FORM

    // POST Routes

    // Cars: 

    Route::post('/cars/offer/post/process', [CarController::class, 'process_new_offer'])->name('process_new_offer');
    Route::post('/cars/offer/post/license-plate', [CarController::class, 'submit_license_plate'])->name('submit_license_plate');

});



require __DIR__.'/auth.php';
