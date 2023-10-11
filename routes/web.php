<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'index'])->name('auth.login'); //Muestra el formulario de inicio de sesión
Route::post('login', [AuthController::class, 'login'])->name('auth.login.post'); //Envía la solicitud de inicio de sesión
Route::get('forgotPassword', [AuthController::class, 'forgotPassword'])->name('auth.forgotPassword'); //Muestra la vista de olvidó contraseña
Route::post('checkUserEmail', [AuthController::class, 'checkUserEmail'])->name('auth.checkUserEmail'); //Valida que el correo esté registrado en BD
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout'); //Envía la solicitud para el logout
Route::post('resetAccount', [AuthController::class, 'resetAccount'])->name('auth.resetAccount'); //Envía la solicitud para el cambio de contraaseña
Route::get('showUpdatePasswordForm', [AuthController::class, 'showUpdatePasswordForm'])->name('auth.showUpdatePasswordForm')->middleware('auth'); 
Route::get('showChangePasswordForm/{token}', [AuthController::class, 'showChangePasswordForm'])->name('auth.showChangePasswordForm'); 
Route::post('changePassword', [AuthController::class, 'changePassword'])->name('auth.changePassword')->middleware('auth'); 
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('auth.resetPassword'); 

Route::prefix('calls')->group(function () {
    Route::get('callsList', [CallController::class, 'listCalls'])->name('calls.callsList'); // Muestra las llamadas
    Route::get('newCall', [CallController::class, 'showRegistrationForm'])->name('calls.newCall'); // Muestra formulario para registro de llamadas
    Route::post('register', [CallController::class, 'create'])->name('calls.register'); // Envía la solicitud a BD (create)
    Route::get('callEdit/{id}', [CallController::class, 'showEditForm'])->name('calls.callEdit'); // Muestra formulario para editar una llamada
    Route::put('updateCall/{id}', [CallController::class, 'updateCall'])->name('calls.updateCall');// Envía la solicitud a BD (edit)
    Route::get('deleteCall/{id}', [CallController::class, 'deleteCall'])->name('calls.deleteCall');// Envia la solicitud para eliminar una llamada
});

Route::prefix('Customers')->group(function () {
    Route::get('listCustomers', [CustomersController::class, 'listCustomers'])->name('customers.listCustomers'); // Muestra los clientes
    Route::get('createCustomer', [CustomersController::class, 'showRegistrationForm'])->name('customers.createCustomer'); // Muestra formulario para registro de cliente
    Route::post('register', [CustomersController::class, 'create'])->name('customers.register'); // Envía la solicitud a BD (create)
    Route::get('editCustomer/{id}', [CustomersController::class, 'showEditForm'])->name('customers.editCustomer'); // Muestra formulario para editar cliente
    Route::put('updateCustomer/{id}', [CustomersController::class, 'updateCustomer'])->name('customers.updateCustomer'); // Envía la solicitud a BD (edit)
    Route::get('changeUserStatus/{id}', [CustomersController::class, 'changeUserStatus'])->name('customers.changeUserStatus'); // Envía la solicitud a BD (inactive)
});

Route::prefix('admin')->group(function () {
    Route::get('listUsers', [UserController::class, 'listUsers'])->name('admin.listUsers'); // Muestra los usuarios
    Route::get('refreshUsers', [UserController::class, 'refreshUsers'])->name('admin.refreshUsers'); //Actualiza la tabla de usuarios
    Route::get('viewUser/{id}', [UserController::class, 'showUser'])->name('admin.viewUser'); 
    Route::get('newUser', [UserController::class, 'showRegistrationForm'])->name('admin.newUser'); // Muestra formulario para registro de usuarios
    Route::post('register', [UserController::class, 'create'])->name('admin.register'); // Envía la solicitud a BD (create)
    Route::get('editUser/{id}', [UserController::class, 'showEditForm'])->name('admin.editUser'); // Muestra formulario para editar usuario
    Route::put('updateUser/{id}', [UserController::class, 'updateUser'])->name('admin.updateUser'); // Envía la solicitud a BD (edit)
    Route::get('changeUserStatus/{id}', [UserController::class, 'changeUserStatus'])->name('admin.changeUserStatus'); // Envía la solicitud a BD (inactive)
});

Route::get('dashboard', function () {
    return view('home/home');
})->name('dashboard');

Route::get('modal', function () {
    return view('modal');
})->name('modal');

/*Route::get('/', function () {
    return view('home/login');
})->name('home.login');*/

/*Route::get('password/reset', function () {
    return view('home/forgotPassword');
})->name('password.reset');*/

Route::get('/fluidNavbar', function () {
    return view('layout.fluidNavbar');
});

Route::get('password/change', function () {
    return view('users/editAccount');
})->name('password.change');

/*Route::get('calls/list', function () {
    return view('calls/callsList');
})->name('calls.list');*/

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

/*
Route::get('admin/listUsers', [UserController::class, 'listUsers']) -> name('admin.listUsers'); //Muestra los usuarios
Route::get('admin/newUser', [UserController::class, 'showRegistrationForm']) -> name('admin.newUser'); //Muestra formulario para registro de usuarios
Route::post('admin/register', [UserController::class, 'create'])-> name('admin.register'); //Envía la solicitud a BD (create)
Route::get('admin/editUser/{id}', [UserController::class, 'showEditForm']) -> name('admin.editUser'); //Muestra formulario para editar usuario
Route::put('admin/updateUser/{id}', [UserController::class, 'updateUser']) -> name('admin.updateUser'); //Envía la solicitud a BD (edit)
Route::get('admin/changeUserStatus/{id}', [UserController::class, 'changeUserStatus']) -> name('admin.changeUserStatus'); //Envía la solicitud a BD (inactive)
*/





Route::get('admin/addEmployees', function () {
    return view('admin/userRegister');
})->name('admin.addEmployees');

Route::get('admin/systemLogs', function () {
    return view('admin/systemLogs');
})->name('admin.systemLogs');

Route::get('billing/sales', function () {
    return view('billing/sales');
})->name('billing.sales');

Route::get('billing/guarantees', function () {
    return view('billing/guarantees');
})->name('billing.guarantees');

Route::get('calls/add', function () {
    return view('addCall');
})->name('calls.add');

/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');*/

/*Route::get('/dashboard', function () {
    return view('dashboard.navbar');
});*/















