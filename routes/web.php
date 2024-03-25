<?php

use App\Http\Controllers\MessageController;
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

// Route::get('/', 'MessageController@index')->name('message.index');
// Route::post('/send-message', 'MessageController@sendMessage')->name('message.send');

Route::get(
    '/',
    [MessageController::class, 'index']
)->name('message.index');

Route::post(
    '/send-message',
    [MessageController::class, 'sendMessage']
)->name('message.send');