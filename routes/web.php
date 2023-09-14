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
    return view('home/login');
})->name('user.login');

Route::get('password/reset', function () {
    return view('home/forgotPassword');
})->name('password.reset');

Route::get('/fluidNavbar', function () {
    return view('layout.fluidNavbar');
});

Route::get('dashobard', function () {
    return view('home/home');
})->name('dashboard');

Route::get('password/change', function () {
    return view('users/editAccount');
})->name('password.change');

Route::get('calls/list', function () {
    return view('calls/callsList');
})->name('calls.list');

Route::get('route/schedule', function () {
    return view('routes/routeSchedule');
})->name('route.schedule');

Route::get('technical/services', function () {
    return view('technical/technicalServices');
})->name('technical.services');

Route::get('technical/installations', function () {
    return view('technical/installations');
})->name('technical.installations');

Route::get('technical/maintenance', function () {
    return view('technical/maintenance');
})->name('technical.maintenance');

Route::get('technical/repairs', function () {
    return view('technical/repairs');
})->name('technical.repairs');

Route::get('technical/quality', function () {
    return view('technical/quality');
})->name('technical.quality');

Route::get('client/list', function () {
    return view('customers/customers');
})->name('client.list');

Route::get('stock/suppliers', function () {
    return view('stock/suppliers');
})->name('stock.suppliers');

Route::get('stock/inventory', function () {
    return view('stock/inventory');
})->name('stock.inventory');

Route::get('admin/employees', function () {
    return view('admin/users');
})->name('admin.employees');

Route::get('admin/systemLogs', function () {
    return view('admin/systemLogs');
})->name('admin.systemLogs');

Route::get('billing/sales', function () {
    return view('billing/sales');
})->name('billing.sales');

Route::get('billing/guarantees', function () {
    return view('billing/guarantees');
})->name('billing.guarantees');

/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');*/

/*Route::get('/dashboard', function () {
    return view('dashboard.navbar');
});*/



Route::get('calls/add', function () {
    return view('addCall');
})->name('calls.add');











