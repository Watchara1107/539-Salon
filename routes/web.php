<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\IncomController;
use App\Http\Controllers\Admin\Profile359salonController;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\ServiceController;
use App\Models\Booking;
use App\Models\Profile;
use App\Models\Salon;
use App\Models\Service;
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
    return view('welcome')
    ->with("booking",Booking::all())
    ->with("salon",Salon::all())
    ->with("service",Service::all())
    ->with("profile",Profile::all());
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

//Salon
Route::get('/admin/salon/index',[SalonController::class, 'index'])->name('salon.index');
Route::post('/admin/salon/create',[SalonController::class, 'create'])->name('salon.create');
Route::get('/admin/salon/edit/{id}',[SalonController::class, 'edit']);
Route::post('/admin/salon/update/{id}',[SalonController::class, 'update']);
Route::get('/admin/salon/delete/{id}',[SalonController::class, 'delete']);


//Service
Route::get('/admin/service/index',[ServiceController::class,'index'])->name('service.index');
Route::post('/admin/service/create',[ServiceController::class, 'create'])->name('service.create');
Route::get('/admin/service/edit/{id}',[ServiceController::class, 'edit']);
Route::post('/admin/service/update/{id}',[ServiceController::class, 'update']);
Route::get('/admin/service/delete/{id}',[ServiceController::class, 'delete']);

//Profile 539 Salon
Route::get('/admin/profile/index',[Profile359salonController::class, 'index'])->name('pro.index');
Route::get('/admin/profile/create',[Profile359salonController::class, 'create'])->name('pro.create');
Route::post('/admin/profile/insert',[Profile359salonController::class, 'insert'])->name('store.multi.image');
Route::get('/admin/profile/edit/{id}',[Profile359salonController::class, 'edit']);
Route::post('/admin/profile/update',[Profile359salonController::class, 'update'])->name('update.multi.image');
Route::get('/admin/profile/delete/{id}',[Profile359salonController::class, 'delete']);

//Incom
Route::get('/admin/incom/index',[IncomController::class, 'index'])->name('incom.index');
Route::get('/admin/incom/index/all',[IncomController::class, 'indexall'])->name('incom.index.all');
Route::get('/admin/incom/create',[IncomController::class, 'create'])->name('incom.create');
Route::post('/admin/incom/insert',[IncomController::class, 'insert'])->name('incom.insert');
Route::get('/admin/incom/edit/{id}',[IncomController::class, 'edit']);
Route::post('/admin/incom/update/{id}',[IncomController::class, 'update']);
Route::get('/admin/incom/delete/{id}',[IncomController::class, 'delete']);


//Expenses
Route::get('/admin/expenses/index',[ExpensesController::class, 'index'])->name('expenses.index');
Route::get('/admin/expenses/create',[ExpensesController::class, 'create'])->name('expenses.create');
Route::post('/admin/expenses/insert',[ExpensesController::class, 'insert'])->name('expenses.insert');
Route::get('/admin/expenses/edit/{id}',[ExpensesController::class, 'edit']);
Route::post('/admin/expenses/update/{id}',[ExpensesController::class, 'update']);
Route::get('/admin/expenses/delete/{id}',[ExpensesController::class, 'delete']);