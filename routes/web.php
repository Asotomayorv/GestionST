<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\VisitRoutesController;
use App\Http\Controllers\productWarrantyController;
use App\Http\Controllers\billingOrdersController;
use App\Http\Controllers\TechServiceController;
use App\Http\Controllers\InstallOrdersController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\QualityControlController;
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
Route::get('showUpdatePasswordForm', [AuthController::class, 'showUpdatePasswordForm'])->name('auth.showUpdatePasswordForm')->middleware('auth'); //Muestra el formulario para el cambio de contraseña
Route::get('showChangePasswordForm/{token}', [AuthController::class, 'showChangePasswordForm'])->name('auth.showChangePasswordForm'); //Muestra el formulario para reestablecer la contraseña 
Route::post('changePassword', [AuthController::class, 'changePassword'])->name('auth.changePassword')->middleware('auth'); //Ejecuta el cambio de contraseña
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('auth.resetPassword');  //Ejecuta el reestablecmiento de la contraseña

Route::prefix('calls')->group(function () {
    Route::get('callsList', [CallController::class, 'listCalls'])->name('calls.callsList'); // Muestra las llamadas
    Route::get('viewCall/{id}', [CallController::class, 'showCall'])->name('calls.viewCall'); //Muestra la llamada seleccionada
    Route::get('newCall', [CallController::class, 'showRegistrationForm'])->name('calls.newCall'); // Muestra formulario para registrar una llamada
    Route::get('newCallId/{id}', [CallController::class, 'showRegistrationFormId'])->name('calls.newCallId'); // Muestra formulario para registro de llamada con datos de cliente precargados
    Route::post('newCommentCall', [CallController::class, 'createCommentCall'])->name('calls.newCommentCall'); //Registra un comentario a una llamada
    Route::post('register', [CallController::class, 'create'])->name('calls.register'); // Envía la solicitud para crear una llamada
    Route::get('callEdit/{id}', [CallController::class, 'showEditForm'])->name('calls.callEdit'); // Muestra formulario para editar una llamada
    Route::put('updateCall/{id}', [CallController::class, 'updateCall'])->name('calls.updateCall');// Envía la solicitud para editar la llamada
    Route::get('deleteCall/{id}', [CallController::class, 'deleteCall'])->name('calls.deleteCall');// Envia la solicitud para eliminar la llamada
});

Route::prefix('Customers')->group(function () {
    Route::get('listCustomers', [CustomersController::class, 'listCustomers'])->name('customers.listCustomers'); // Muestra los clientes
    //Route::get('listCustomersModal', [CustomersController::class, 'listCustomersModal'])->name('customers.listCustomersModal'); // Muestra los clientes
    Route::get('viewCustomer/{id}', [CustomersController::class, 'showCustomer'])->name('customers.viewCustomer'); //Muestra un cliente seleccionado
    Route::get('findCustomer/{id}', [CustomersController::class, 'findCustomer'])->name('customers.findCustomer'); // Muestra los clientes
    Route::get('createCustomer', [CustomersController::class, 'showRegistrationForm'])->name('customers.createCustomer'); // Muestra formulario para registro de un cliente
    Route::post('register', [CustomersController::class, 'create'])->name('customers.register'); // Envía la solicitud para crear un cliente
    Route::post('registerModal', [CustomersController::class, 'createModal'])->name('customers.registerModal'); // Envía la solicitud para crear un cliente por medio del modal
    Route::get('editCustomer/{id}', [CustomersController::class, 'showEditForm'])->name('customers.editCustomer'); // Muestra formulario para editar cliente
    Route::put('updateCustomer/{id}', [CustomersController::class, 'updateCustomer'])->name('customers.updateCustomer'); // Envía la solicitud para editar un cliente
    Route::put('updateCustomerModal/{id}', [CustomersController::class, 'updateCustomerModal'])->name('customers.updateCustomerModal'); // Envía la solicitud para editar un cliente por medio del modal
});

Route::prefix('admin')->group(function () {
    Route::get('listUsers', [UserController::class, 'listUsers'])->name('admin.listUsers'); // Muestra los usuarios
    //Route::get('refreshUsers', [UserController::class, 'refreshUsers'])->name('admin.refreshUsers'); //Actualiza la tabla de usuarios
    Route::get('viewUser/{id}', [UserController::class, 'showUser'])->name('admin.viewUser'); //Muestra un usuario seleccionado
    Route::get('newUser', [UserController::class, 'showRegistrationForm'])->name('admin.newUser'); // Muestra formulario para registro de usuarios
    Route::post('register', [UserController::class, 'create'])->name('admin.register'); // Envía la solicitud para crear un usuario
    Route::get('editUser/{id}', [UserController::class, 'showEditForm'])->name('admin.editUser'); // Muestra formulario para editar usuario
    Route::put('updateUser/{id}', [UserController::class, 'updateUser'])->name('admin.updateUser'); // Envía la solicitud editar un usuario
    Route::get('changeUserStatus/{id}', [UserController::class, 'changeUserStatus'])->name('admin.changeUserStatus'); // Envía la solicitud para cambiar el estado de un usuario
    Route::get('listAuditLogs', [UserController::class, 'showSystemLogs'])->name('admin.systemLogs'); // Muestra los registros en bitácora
});

Route::prefix('products')->group(function () {
    Route::get('productsList', [ProductController::class, 'listProducts'])->name('products.productsList'); // Muestra los usuarios
    Route::get('newProduct', [ProductController::class, 'showRegistrationForm'])->name('products.newProduct'); // Muestra formulario para registro de usuarios
    Route::post('register', [ProductController::class, 'create'])->name('products.register'); // Envía la solicitud a BD (create)
    Route::get('productEdit/{id}', [ProductController::class, 'showEditForm'])->name('products.productEdit'); // Muestra formulario para editar usuario
    Route::put('updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('products.updateProduct');// Envía la solicitud a BD (edit)
    Route::get('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('products.deleteProduct'); 
    Route::get('productView/{id}', [ProductController::class, 'productView'])->name('products.productView'); 
    Route::get('getModels/{id}', [ProductController::class, 'getModels'])->name('products.getModels'); 
});

Route::prefix('suppliers')->group(function () {
    Route::get('listSuppliers', [SuppliersController::class, 'listSuppliers'])->name('suppliers.listSuppliers'); // Muestra los proveedores
    Route::get('createSupplier', [SuppliersController::class, 'showRegistrationForm'])->name('suppliers.createSupplier'); // Muestra formulario para registro de cliente
    Route::get('refreshSuppliers', [SuppliersController::class, 'refreshSuppliers'])->name('suppliers.refreshSuppliers'); //Actualiza la tabla de usuarios
    Route::get('viewSupplier/{id}', [SuppliersController::class, 'showSupplier'])->name('suppliers.viewSupplier'); 
    Route::get('newSupplier', [SuppliersController::class, 'showRegistrationForm'])->name('suppliers.newSupplier'); // Muestra formulario para registro de usuarios
    Route::post('register', [SuppliersController::class, 'create'])->name('suppliers.register'); // Envía la solicitud a BD (create)
    Route::get('editSupplier/{id}', [SuppliersController::class, 'showEditForm'])->name('suppliers.editSupplier'); // Muestra formulario para editar usuario
    Route::put('updateSupplier/{id}', [SuppliersController::class, 'updateSupplier'])->name('suppliers.updateSupplier'); // Envía la solicitud a BD (edit)
    Route::get('changeSupplierStatus/{id}', [SuppliersController::class, 'changeSupplierStatus'])->name('suppliers.changeSupplierStatus'); // Envía la solicitud a BD (inactive)
});

Route::prefix('visitRoutes')->group(function () {
    Route::get('listRoutes', [VisitRoutesController::class, 'listRoutes'])->name('routes.listRoutes'); // Muestra los proveedores
    Route::post('createRoute', [VisitRoutesController::class, 'create'])->name('routes.createRoute'); // Muestra formulario para registro de cliente
    Route::get('listEvents', [VisitRoutesController::class, 'showEvents'])->name('routes.showEvents'); 
    Route::put('updateRoute/{id}', [VisitRoutesController::class, 'updateRoute'])->name('routes.updateRoute'); // Envía la solicitud a BD (edit)
    /*Route::get('refreshSuppliers', [VisitRoutesController::class, 'refreshSuppliers'])->name('suppliers.refreshSuppliers'); //Actualiza la tabla de usuarios
    Route::get('viewSupplier/{id}', [VisitRoutesController::class, 'showSupplier'])->name('suppliers.viewSupplier'); 
    Route::get('newSupplier', [VisitRoutesController::class, 'showRegistrationForm'])->name('suppliers.newSupplier'); // Muestra formulario para registro de usuarios
    Route::post('register', [VisitRoutesController::class, 'create'])->name('suppliers.register'); // Envía la solicitud a BD (create)
    Route::get('editSupplier/{id}', [VisitRoutesController::class, 'showEditForm'])->name('suppliers.editSupplier'); // Muestra formulario para editar usuario
    Route::get('changeSupplierStatus/{id}', [VisitRoutesController::class, 'changeSupplierStatus'])->name('suppliers.changeSupplierStatus'); // Envía la solicitud a BD (inactive)*/
});

Route::prefix('productWarranty')->group(function () {
    Route::get('productWarrantyList', [productWarrantyController::class, 'productWarrantyList'])->name('productWarranty.productWarrantyList'); // Muestra los proveedores
    Route::get('createProductWarranty', [productWarrantyController::class, 'showRegistrationForm'])->name('productWarranty.createProductWarranty'); // Muestra formulario para registro de cliente
    Route::get('getProducts/{id}', [productWarrantyController::class, 'getProducts'])->name('productWarranty.getProducts');
    Route::get('viewProductWarranty/{id}', [productWarrantyController::class, 'showProductWarranty'])->name('productWarranty.viewProductWarranty'); 
    Route::get('newProductWarranty', [productWarrantyController::class, 'showRegistrationForm'])->name('productWarranty.newProductWarranty'); // Muestra formulario para registro de usuarios
    Route::post('register', [productWarrantyController::class, 'create'])->name('productWarranty.register'); // Envía la solicitud a BD (create)
    Route::get('editProductWarranty/{id}', [productWarrantyController::class, 'showEditForm'])->name('productWarranty.editProductWarranty'); // Muestra formulario para editar usuario
    Route::put('updateProductWarranty/{id}', [productWarrantyController::class, 'updateProductWarranty'])->name('productWarranty.updateProductWarranty'); // Envía la solicitud a BD (edit)
    Route::get('deleteProductWarranty/{id}', [productWarrantyController::class, 'delete'])->name('productWarranty.deleteProductWarranty'); // Envía la solicitud a BD (inactive)
});

Route::prefix('billingOrders')->group(function () {
    Route::get('listBillingOrders', [billingOrdersController::class, 'listBillingOrders'])->name('billingOrders.listBillingOrders'); // Muestra los proveedores
    Route::get('createBillingOrders', [billingOrdersController::class, 'showRegistrationForm'])->name('billingOrders.createBillingOrders'); // Muestra formulario para registro de cliente
    Route::get('viewBillingOrder/{id}', [billingOrdersController::class, 'showBillingOrder'])->name('billingOrders.viewBillingOrder'); 
    Route::post('register', [billingOrdersController::class, 'create'])->name('billingOrders.register'); // Envía la solicitud a BD (create)
    Route::get('editBillingOrders/{id}', [billingOrdersController::class, 'showEditForm'])->name('billingOrders.editBillingOrders'); // Muestra formulario para editar usuario
    Route::put('updateBillingOrders/{id}', [billingOrdersController::class, 'updateBillingOrders'])->name('billingOrders.updateBillingOrders'); // Envía la solicitud a BD (edit)
    Route::get('deleteBillingOrders/{id}', [billingOrdersController::class, 'deleteBillingOrder'])->name('billingOrders.deleteBillingOrders');// Envia la solicitud para eliminar la llamada
});

Route::prefix('technicalservices')->group(function () {
    Route::get('listTechnicalServices', [TechServiceController::class, 'listTechnicalServices'])->name('technicalservices.listTechnicalServices'); // Muestra los proveedores
    Route::get('createTechnicalService', [TechServiceController::class, 'showRegistrationForm'])->name('technicalservices.createTechnicalService'); // Muestra formulario para registro de cliente
    Route::get('viewTechnicalService/{id}', [TechServiceController::class, 'showTechService'])->name('technicalservices.viewTechnicalService'); 
    Route::get('newTechnicalService', [TechServiceController::class, 'showRegistrationForm'])->name('technicalservices.newTechnicalService'); // Muestra formulario para registro de usuarios
    Route::post('register', [TechServiceController::class, 'create'])->name('technicalservices.register'); // Envía la solicitud a BD (create)
    Route::get('editTechnicalService/{id}', [TechServiceController::class, 'showEditForm'])->name('technicalservices.editTechnicalService'); // Muestra formulario para editar usuario
    Route::put('updateTechnicalService/{id}', [TechServiceController::class, 'updateTechService'])->name('technicalservices.updateTechnicalService'); // Envía la solicitud a BD (edit)
    Route::get('changeTechnicalServiceStatus/{id}', [TechServiceController::class, 'changeTechnicalServiceStatus'])->name('technicalservices.changeTechnicalServiceStatus'); // Envía la solicitud a BD (inactive)
    Route::get('deleteTechnicalService/{id}', [TechServiceController::class, 'deleteTechService'])->name('technicalservices.deleteTechnicalService');
});

Route::prefix('installorders')->group(function () {
    Route::get('listInstallOrders', [InstallOrdersController::class, 'listInstallOrders'])->name('installorders.listInstallOrders'); // Muestra los proveedores
    Route::get('createInstallOrder', [InstallOrdersController::class, 'showRegistrationForm'])->name('installorders.createInstallOrder'); // Muestra formulario para registro de cliente
    Route::get('getProducts/{id}', [InstallOrdersController::class, 'getProducts'])->name('installorders.getInstallProducts'); //Actualiza la tabla de usuarios
    Route::get('viewInstallOrder/{id}', [InstallOrdersController::class, 'showInstallOrders'])->name('installorders.viewInstallOrder'); 
    Route::get('newInstallOrder', [InstallOrdersController::class, 'showRegistrationForm'])->name('installorders.newInstallOrder'); // Muestra formulario para registro de usuarios
    Route::post('register', [InstallOrdersController::class, 'create'])->name('installorders.register'); // Envía la solicitud a BD (create)
    Route::get('editInstallOrder/{id}', [InstallOrdersController::class, 'showEditForm'])->name('installorders.editInstallOrder'); // Muestra formulario para editar usuario
    Route::put('updateInstallOrder/{id}', [InstallOrdersController::class, 'updateInstallOrder'])->name('installorders.updateInstallOrder'); // Envía la solicitud a BD (edit)
    Route::get('changeInstallOrderStatus/{id}', [InstallOrdersController::class, 'changeInstallOrderStatus'])->name('installorders.changeInstallOrderStatus'); // Envía la solicitud a BD (inactive)
    Route::get('deleteInstallOrder/{id}', [InstallOrdersController::class, 'deleteInstallOrder'])->name('installorders.deleteInstallOrder');
});

Route::prefix('repairs')->group(function () {
    Route::get('listRepairs', [RepairController::class, 'showRepairsList'])->name('repairs.listRepairs');
    Route::get('listProductRepair', [RepairController::class, 'showProductRepairsList'])->name('repairs.listProductRepair');
    Route::get('getProducts/{id}', [RepairController::class, 'getProducts'])->name('repairs.getRepairProducts'); 
    Route::get('getProductsToRepair/{id}', [RepairController::class, 'getProductsToRepair'])->name('repairs.getProductsToRepair');
    Route::get('viewRepair/{id}', [RepairController::class, 'showRepairDetails'])->name('repairs.viewRepair');
    Route::get('viewProductRepair/{id}', [RepairController::class, 'showProductRepairDetails'])->name('repairs.viewProductRepair');
    Route::get('createRepair', [RepairController::class, 'showCreateForm'])->name('repairs.createRepair');
    Route::post('create', [RepairController::class, 'create'])->name('repairs.registerRepair');
    Route::get('createProductRepair', [RepairController::class, 'showCreateProductRepairForm'])->name('repairs.createProductRepair'); 
    Route::post('registerProductRepair', [RepairController::class, 'createProductRepair'])->name('repairs.registerProductRepair');
    Route::get('editRepair/{id}', [RepairController::class, 'showEditForm'])->name('repairs.editRepair');
    Route::put('updateRepair/{id}', [RepairController::class, 'updateRepair'])->name('repairs.updateRepair');
    Route::get('editProductRepair/{id}', [RepairController::class, 'showEditProductRepairForm'])->name('repairs.editProductRepair');
    Route::put('updateProductRepair/{id}', [RepairController::class, 'updateProductRepair'])->name('repairs.updateProductRepair');
    Route::get('deleteRepairOrder/{id}', [RepairController::class, 'deleteRepairOrder'])->name('repairs.deleteRepairOrder');
    Route::get('deleteProductRepairOrder/{id}', [RepairController::class, 'deleteProductRepairOrder'])->name('repairs.deleteProductRepairOrder');
});

Route::prefix('qualityControl')->group(function () {
    Route::get('listQA', [QualityControlController::class, 'listQAOrders'])->name('qualityControl.listQA'); // Muestra los proveedores
    Route::get('registerQA', [QualityControlController::class, 'showRegistrationForm'])->name('qualityControl.registerQA'); // Muestra formulario para registro de cliente
    Route::get('getProducts/{id}', [QualityControlController::class, 'getProducts'])->name('qualityControl.getProducts'); //Actualiza la tabla de usuarios
    Route::get('viewQA/{id}', [QualityControlController::class, 'showQualityControl'])->name('qualityControl.viewQA'); 
    Route::post('register', [QualityControlController::class, 'create'])->name('qualityControl.register'); // Envía la solicitud a BD (create)
    Route::get('editIQA/{id}', [QualityControlController::class, 'showEditForm'])->name('qualityControl.editQA'); // Muestra formulario para editar usuario
    Route::put('updateQA/{id}', [QualityControlController::class, 'updateQualityControl'])->name('qualityControl.updateQA'); // Envía la solicitud a BD (edit)
    Route::get('deleteQA/{id}', [QualityControlController::class, 'delete'])->name('qualityControl.deleteQualityControl');
});

Route::get('dashboard', function () {
    return view('home/home');
})->name('dashboard')->middleware('auth');

Route::get('/fluidNavbar', function () {
    return view('layout.fluidNavbar');
});

Route::get('home/technicalServices', function () {
    return view('home/technicalServices');
})->name('home.technicalServices');

Route::get('home/billingServices', function () {
    return view('home/billingServices');
})->name('home.billingServices');

Route::get('home/stockServices', function () {
    return view('home/stockServices');
})->name('home.stockServices');

Route::get('home/adminServices', function () {
    return view('home/adminServices');
})->name('home.adminServices');

Route::get('reports/graphics', function () {
    return view('reports/graphics');
})->name('reports.graphics');


/*Route::get('route/schedule', function () {
    return view('routes/routeSchedule');
})->name('route.schedule');*/



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

Route::get('stock/inventory', function () {
    return view('stock/inventory');
})->name('stock.inventory');

Route::get('billing/sales', function () {
    return view('billing/sales');
})->name('billing.sales');

Route::get('billing/guarantees', function () {
    return view('billing/guarantees');
})->name('billing.guarantees');

/*Route::get('/dashboard', function () {
    return view('dashboard.navbar');
});*/















