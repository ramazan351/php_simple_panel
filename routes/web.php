<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
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
// all listings
Route::get('/', [ListingController::class, 'index']);


// create listing
Route::get('/listings/create', [ListingController::class, 'create']);

// single listing
Route::post('/listings', [ListingController::class, 'store']);

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

/*
Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
 return $request->name . ' ' . $request->age;
})->where('search', '[A-Za-z]+');
*/
