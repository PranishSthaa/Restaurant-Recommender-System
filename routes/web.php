<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestTypeController;
use App\Http\Controllers\RestaurantController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('frontend.about.index');
})->name('frontend.about.index');

Route::get('/cuisines', [CuisineController::class, 'frontendIndex'])->name('frontend.cuisine.index');
Route::get('/restaurants', function () {
    return view('frontend.restaurant.index');
})->name('frontend.restaurant.index');
Route::get('/restaurant/details/{id}', [RestaurantController::class, 'details'])->name('frontend.restaurant.details');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin.access'])->name('dashboard');

Route::middleware(['auth', 'admin.access'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/cuisine', [CuisineController::class, 'index'])->name('backend.cuisine.index');
    Route::get('/dashboard/cuisine/delete/{id}', [CuisineController::class, 'destroy'])->name('backend.cuisine.destroy');
    Route::post('/dashboard/cuisine/save', [CuisineController::class, 'store'])->name('backend.cuisine.save');

    Route::get('/dashboard/restaurant_type', [RestTypeController::class, 'index'])->name('backend.restaurant_type.index');
    Route::get('/dashboard/restaurant_type/delete/{id}', [RestTypeController::class, 'destroy'])->name('backend.restaurant_type.destroy');
    Route::post('/dashboard/restaurant_type/save', [RestTypeController::class, 'store'])->name('backend.restaurant_type.save');

    Route::get('/dashboard/restaurant', [RestaurantController::class, 'index'])->name('backend.restaurant.index');
    Route::get('/dashboard/restaurant/detail/{id}', [RestaurantController::class, 'show'])->name('backend.restaurant.show');
    Route::get('/dashboard/restaurant/delete/{id}', [RestaurantController::class, 'destroy'])->name('backend.restaurant.destroy');
    Route::post('/dashboard/restaurant/save', [RestaurantController::class, 'store'])->name('backend.restaurant.save');
});

require __DIR__ . '/auth.php';
