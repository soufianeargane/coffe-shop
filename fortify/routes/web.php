<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\LogoutController;

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

// Route::get('dashbord', function () {
//     return view('dashbord');
// })->middleware(['auth', 'verified']);

// profile


// logout
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
// update profile
Route::get('profile/edit', function () {
    return view('profile.edit');
})->middleware(['auth', 'verified']);
// update password
Route::get('profile/password', function () {
    return view('profile.password');
})->middleware(['auth', 'verified']);


// to show the meals page
Route::get('/', [MealsController::class, 'home']);
// to show the meals in table in the dashbord
Route::get('/dashbord', [MealsController::class, 'messi'])->middleware(['auth', 'verified']);
// insert new meal
Route::post('/dashbord', [MealsController::class, 'insert'])->middleware(['auth', 'verified']);

Route::get('/update-modal/{id}', [MealsController::class, 'getSingledata'])->middleware(['auth', 'verified']);

// route patch to update the meal
Route::patch('/dashbord', [MealsController::class, 'update'])->middleware(['auth', 'verified']);
// route delete to delete the meal
Route::delete('/dashbord/{id}', [MealsController::class, 'delete'])->middleware(['auth', 'verified']);
