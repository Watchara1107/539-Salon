<?php

use App\Http\Controllers\Admin\BookingController;
use App\Models\Booking;
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
    $booking = Booking::all();
    return view('welcome',compact('booking'));
});
Route::get('/booking',[BookingController::class, 'forntbooking']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//booking
Route::get('/admin/booking/index',[BookingController::class, 'index'])->name('booking.index');
Route::get('/admin/booking/insert',[BookingController::class, 'insert'])->name('booking.insert');
Route::post('/admin/booking/create',[BookingController::class, 'create'])->name('booking.create');
Route::post('/admin/booking/save',[BookingController::class, 'save'])->name('booking.save');
Route::post('/admin/booking/queue/{id}',[BookingController::class, 'queue']);
Route::get('/admin/booking/edit/{id}',[BookingController::class, 'edit']);
Route::post('/admin/booking/update/{id}',[BookingController::class, 'update']);
Route::get('/admin/booking/delete/{id}',[BookingController::class, 'delete']);
Route::post('/admin/booking/open/{id}',[BookingController::class, 'open']);
Route::post('/admin/booking/end/{id}',[BookingController::class, 'end']);
