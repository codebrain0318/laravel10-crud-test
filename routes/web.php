<?php

use App\Models\Apikey;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApikeyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $apikeys = ApiKey::all();
    return view('dashboard', compact('apikeys'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/apikeys', ApikeyController::class .'@index')->name('apikeys.index');

Route::post('/apikeys', ApikeyController::class .'@store')->name('apikeys.store');

Route::get('/apikeys/{apikey}/edit', ApikeyController::class .'@edit')->name('apikeys.edit');

Route::put('/apikeys/{apikey}', ApikeyController::class .'@update')->name('apikeys.update');

Route::delete('/apikeys/{apikey}', ApikeyController::class .'@destroy')->name('apikeys.destroy');

require __DIR__.'/auth.php';
