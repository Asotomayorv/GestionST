<?php

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
    return view('login');
})->name('user.login');
/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');*/
/*Route::get('/dashboard', function () {
    return view('dashboard.navbar');
});*/
Route::get('dashobard', function () {
    return view('home');
})->name('dashboard');

Route::get('password/reset', function () {
    return view('forgotPassword');
})->name('password.reset');

Route::get('password/change', function () {
    return view('editAccount');
})->name('password.change');

Route::get('calls/list', function () {
    return view('callsList');
})->name('calls.list');

Route::get('calls/add', function () {
    return view('addCall');
})->name('calls.add');

Route::get('route/schedule', function () {
    return view('routeSchedule');
})->name('route.schedule');

Route::get('technical/services', function () {
    return view('technicalServices');
})->name('technical.services');

Route::get('technical/installations', function () {
    return view('installations');
})->name('technical.installations');

Route::get('sales/billing', function () {
    return view('sales');
})->name('sales.billing');

Route::get('stock/suppliers', function () {
    return view('suppliers');
})->name('stock.suppliers');

Route::get('client/list', function () {
    return view('customers');
})->name('client.list');

Route::get('employees/list', function () {
    return view('users');
})->name('employees.list');


