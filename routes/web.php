<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', [RoomController::class, 'index'])->name('index');
Route::get('/list', [RoomController::class, 'list'])->name('list');

Route::prefix('reservation')->group(function () {
    Route::get('/{room}', [ReservationController::class, 'index'])
        ->where('room', '[0-9]+')
        ->name('reservation');
    Route::post('/{room}', [ReservationController::class, 'reservation'])
        ->where('room', '[0-9]+')
        ->name('do.reservation');
    Route::get('/link/{reservation}', [ReservationController::class, 'link'])
        ->where('reservation', '[0-9]+')
        ->name('reservation.link');
});
