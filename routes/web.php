<?php

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
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin_dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin')->name('adminDashboard');

Route::get('/admin_dashboard', [\App\Http\Controllers\InvoiceController::class, 'getChartAdmin'])->middleware('role:admin')->name('adminDashboard');

Route::get('/seller_dashboard', [\App\Http\Controllers\Seller\DashboardController::class, 'index'])->middleware('role:seller')->name('sellerDashboard');

Route::get('/seller_dashboard', [\App\Http\Controllers\InvoiceController::class, 'getChartSeller'])->middleware('role:seller')->name('sellerDashboard');

Route::get('/mail-send', [\App\Http\Controllers\Mail\MailController::class, 'sendChartMail'])->name('web.send.mail');
