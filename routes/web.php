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

//Rutas para el módulo de autenticación
Route::get('/', [AuthController::class, 'index'])->name('auth.login'); //Muestra el formulario de inicio de sesión
Route::post('login', [AuthController::class, 'login'])->name('auth.login.post'); //Envía la solicitud de inicio de sesión
Route::get('forgotPassword', [AuthController::class, 'forgotPassword'])->name('auth.forgotPassword'); //Muestra la vista de para recuperar la contrase;a
Route::post('checkUserEmail', [AuthController::class, 'checkUserEmail'])->name('auth.checkUserEmail'); //Valida que el correo esté registrado en BD
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout'); //Envía la solicitud para el salir del sistema
Route::post('resetAccount', [AuthController::class, 'resetAccount'])->name('auth.resetAccount'); //Envía la solicitud para el cambio de contraaseña
Route::get('showUpdatePasswordForm', [AuthController::class, 'showUpdatePasswordForm'])->name('auth.showUpdatePasswordForm')->middleware('auth'); //Muestra el formulario para el cambio de contraseña
Route::get('showChangePasswordForm/{token}', [AuthController::class, 'showChangePasswordForm'])->name('auth.showChangePasswordForm'); //Muestra el formulario para reestablecer la contraseña 
Route::post('changePassword', [AuthController::class, 'changePassword'])->name('auth.changePassword')->middleware('auth'); //Envía la petición para el cambio de contraseña
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('auth.resetPassword');  //Envía la petición para el reestablecmiento de la contraseña

//Rutas para el módulo de administración
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('listUsers', [UserController::class, 'listUsers'])->name('listUsers'); //Muestra el listado de usuarios
    Route::get('viewUser/{id}', [UserController::class, 'showUser'])->name('viewUser'); //Muestra el detalle del usuario seleccionado
    Route::get('newUser', [UserController::class, 'showRegistrationForm'])->name('newUser'); //Muestra el formulario para registrar un nuevo usuario
    Route::post('register', [UserController::class, 'create'])->name('register'); //Ingresa un nuevo registro de usuario en la BD
    Route::get('editUser/{id}', [UserController::class, 'showEditForm'])->name('editUser'); // Muestra el formulario para editar un usuario existente
    Route::put('updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser'); //Actualiza el registro del usuario seleccionado en la BD
    Route::get('changeUserStatus/{id}', [UserController::class, 'changeUserStatus'])->name('changeUserStatus'); //Cambia el estado del usuario seleccionado en la BD
    Route::get('listAuditLogs', [UserController::class, 'showSystemLogs'])->name('systemLogs'); //Muestra la bitácora del sistema
});

//Rutas para el módulo de Llamadas
Route::prefix('calls')->name('calls.')->group(function () {
    Route::get('callsList', [CallController::class, 'listCalls'])->name('callsList');  //Muestra el listado de llamadas
    Route::get('viewCall/{id}', [CallController::class, 'showCall'])->name('viewCall'); //Muestra el detalle de una llamada
    Route::get('newCall', [CallController::class, 'showRegistrationForm'])->name('newCall'); //Muestra el formulario para una nueva llamada
    Route::get('newCallId/{id}', [CallController::class, 'showRegistrationFormId'])->name('newCallId'); //Muestra el formulario para una nueva llamada con los datos del cliente precargados
    Route::post('newCommentCall', [CallController::class, 'createCommentCall'])->name('newCommentCall'); //Ingresa un nuevo registro de comentario para una llamada existente
    Route::post('register', [CallController::class, 'create'])->name('register'); //Ingresa un nuevo registro de llamada en la base de datos
    Route::get('callEdit/{id}', [CallController::class, 'showEditForm'])->name('callEdit'); //Muestra el formulario para editar una llamada
    Route::put('updateCall/{id}', [CallController::class, 'updateCall'])->name('updateCall'); //Actualiza el registro de una llamada existente
    Route::get('deleteCall/{id}', [CallController::class, 'deleteCall'])->name('deleteCall'); //Elimina una llamada existente
});

//Rutas para el módulo de Clientes
Route::prefix('Customers')->name('customers.')->group(function () {
    Route::get('listCustomers', [CustomersController::class, 'listCustomers'])->name('listCustomers'); //Muestra el listado de clientes
    Route::get('viewCustomer/{id}', [CustomersController::class, 'showCustomer'])->name('viewCustomer'); //Muestra el detalle del cliente seleccionado
    Route::get('findCustomer/{id}', [CustomersController::class, 'findCustomer'])->name('findCustomer'); //Busca un cliente por el número de cédula
    Route::get('createCustomer', [CustomersController::class, 'showRegistrationForm'])->name('createCustomer'); //Muestra el formulario para registrar un nuevo cliente
    Route::post('register', [CustomersController::class, 'create'])->name('register'); //Ingresa un nuevo registro de cliente en la BD
    Route::post('registerModal', [CustomersController::class, 'createModal'])->name('registerModal'); //Muestra el modal con el formulario para registrar un nuevo cliente
    Route::get('editCustomer/{id}', [CustomersController::class, 'showEditForm'])->name('editCustomer'); //Muestra el formulario de edición de cliente
    Route::put('updateCustomer/{id}', [CustomersController::class, 'updateCustomer'])->name('updateCustomer'); //Actualiza el registro de un cliente existente
    Route::put('updateCustomerModal/{id}', [CustomersController::class, 'updateCustomerModal'])->name('updateCustomerModal'); //Actualiza el registro de un cliente existente actualizado a través del modal
});

//Rutas para el módulo de productos
Route::prefix('products')->name('products.')->group(function () {
    Route::get('productsList', [ProductController::class, 'listProducts'])->name('productsList'); //Muestra el listado de productos
    Route::get('newProduct', [ProductController::class, 'showRegistrationForm'])->name('newProduct'); // Muestra el formulario de registro para un nuevo producto
    Route::post('register', [ProductController::class, 'create'])->name('register'); //Ingresa un nuevo registro de producto en la BD
    Route::get('productEdit/{id}', [ProductController::class, 'showEditForm'])->name('productEdit'); //Muestra el formulario para editar un producto ya existente
    Route::put('updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct'); //Actualiza el registro del producto seleccionado
    Route::get('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct'); //Elimina el producto seleccionado
    Route::get('productView/{id}', [ProductController::class, 'productView'])->name('productView'); //Muestra el detalle del producto seleccionado
    Route::get('getModels/{id}', [ProductController::class, 'getModels'])->name('getModels'); //Obtiene los modelos de los productos 
});

//Rutas para el módulo de proveedores
Route::prefix('suppliers')->name('suppliers.')->group(function () {
    Route::get('listSuppliers', [SuppliersController::class, 'listSuppliers'])->name('listSuppliers'); //Muestra el listado de proveedores
    Route::get('createSupplier', [SuppliersController::class, 'showRegistrationForm'])->name('createSupplier'); //Muestra el formulario de registro para un nuevo proveedor
    Route::get('viewSupplier/{id}', [SuppliersController::class, 'showSupplier'])->name('viewSupplier'); //Muestra el detalle del proveedor seleccionado
    Route::post('register', [SuppliersController::class, 'create'])->name('register'); //Ingresa un nuevo registro de proveedor en la BD
    Route::get('editSupplier/{id}', [SuppliersController::class, 'showEditForm'])->name('editSupplier'); //Muestra el formulario para editar un proveedor existente
    Route::put('updateSupplier/{id}', [SuppliersController::class, 'updateSupplier'])->name('updateSupplier'); //Actualiza el registro del proveedor seleccionado
    Route::get('changeSupplierStatus/{id}', [SuppliersController::class, 'changeSupplierStatus'])->name('changeSupplierStatus'); //Cambia el estado del proveedor seleccionado en la BD
});

//Rutas para el módulo de Rutas/Calendario
Route::prefix('visitRoutes')->name('routes.')->group(function () {
    Route::get('listRoutes', [VisitRoutesController::class, 'listRoutes'])->name('listRoutes'); //Muestra el calendario de rutas
    Route::post('createRoute', [VisitRoutesController::class, 'create'])->name('createRoute'); //Ingresa un nuevo registro de ruta en la BD
    Route::get('listEvents', [VisitRoutesController::class, 'showEvents'])->name('showEvents'); //Carga los eventos guardados en BD
    Route::put('updateRoute/{id}', [VisitRoutesController::class, 'updateRoute'])->name('updateRoute'); //Muestra el formulario para editar un registro de ruta existe
});

//Rutas para el módulo de Garantía de productos
Route::prefix('productWarranty')->name('productWarranty.')->group(function () {
    Route::get('productWarrantyList', [productWarrantyController::class, 'productWarrantyList'])->name('productWarrantyList'); //Muestra el listado de garantías
    Route::get('createProductWarranty', [productWarrantyController::class, 'showRegistrationForm'])->name('createProductWarranty'); //Muestra el formulario de registro de una nueva garantía
    Route::get('getProducts/{id}', [productWarrantyController::class, 'getProducts'])->name('getProducts'); //Obtiene los productos sin garantías asociadas
    Route::get('viewProductWarranty/{id}', [productWarrantyController::class, 'showProductWarranty'])->name('viewProductWarranty'); //Muestra el detalle de la garantía seleccionada
    Route::post('register', [productWarrantyController::class, 'create'])->name('register'); //Ingresa un nuevo registro de garantía en la BD
    Route::get('editProductWarranty/{id}', [productWarrantyController::class, 'showEditForm'])->name('editProductWarranty'); //Muestra el formulario para editar una garantía existente
    Route::put('updateProductWarranty/{id}', [productWarrantyController::class, 'updateProductWarranty'])->name('updateProductWarranty'); //Actualiza el registro de garantía seleccionada
    Route::get('deleteProductWarranty/{id}', [productWarrantyController::class, 'delete'])->name('deleteProductWarranty'); //Elimina la garantía seleccionada
});

//Rutas para el módulo de facturación
Route::prefix('billingOrders')->name('billingOrders.')->group(function () {
    Route::get('listBillingOrders', [billingOrdersController::class, 'listBillingOrders'])->name('listBillingOrders'); //Muestra un listado de las órdenes de facturación
    Route::get('createBillingOrders', [billingOrdersController::class, 'showRegistrationForm'])->name('createBillingOrders'); //Muestra el formulario de registro de una órden de facturación
    Route::get('viewBillingOrder/{id}', [billingOrdersController::class, 'showBillingOrder'])->name('viewBillingOrder'); //Muestra el detalle de la orden de facturación seleccionada
    Route::post('register', [billingOrdersController::class, 'create'])->name('register'); //Ingresa un nuevo registro de orden de facturación en la BD
    Route::get('editBillingOrders/{id}', [billingOrdersController::class, 'showEditForm'])->name('editBillingOrders'); //Muestra el formulario de edición para una orden de facturación existente
    Route::put('updateBillingOrders/{id}', [billingOrdersController::class, 'updateBillingOrders'])->name('updateBillingOrders'); //Actualiza el registro de la orden de facturación seleccionada
    Route::get('deleteBillingOrders/{id}', [billingOrdersController::class, 'deleteBillingOrder'])->name('deleteBillingOrders'); //Elimina el registro de orden de facturación seleccionada
    Route::get('printBillingOrder/{id}', [billingOrdersController::class, 'printBillingOrder'])->name('pdfBillingOrder'); //Genera la pre-visualización del detalle de la orden de facturación seleccionada en formato PDF
});

//Rutas para el módulo de servicios técnicos
Route::prefix('technicalservices')->name('technicalservices.')->group(function () {
    Route::get('listTechnicalServices', [TechServiceController::class, 'listTechnicalServices'])->name('listTechnicalServices'); //Muestra un listado de las órdenes de servicio técnico
    Route::get('createTechnicalService', [TechServiceController::class, 'showRegistrationForm'])->name('createTechnicalService'); //Muestra el formulario de registro de una órden de servicio técnico
    Route::get('viewTechnicalService/{id}', [TechServiceController::class, 'showTechService'])->name('viewTechnicalService'); //Muestra el detalle de la órden de servicio técnico seleccionada
    Route::post('register', [TechServiceController::class, 'create'])->name('register'); //Ingresa un nuevo registro de orden técnico en la BD
    Route::get('editTechnicalService/{id}', [TechServiceController::class, 'showEditForm'])->name('editTechnicalService'); //Muestra el formulario de edición para la orden de servicio técnico seleccionado
    Route::put('updateTechnicalService/{id}', [TechServiceController::class, 'updateTechService'])->name('updateTechnicalService'); //Actualiza el registro de la orden de servicio técnico selecccionada 
    Route::get('deleteTechnicalService/{id}', [TechServiceController::class, 'deleteTechService'])->name('deleteTechnicalService'); //Elimina el registro de orden de servicio técnico seleccionado
});

//Rutas para el módulo de instalaciones
Route::prefix('installorders')->name('installorders.')->group(function () {
    Route::get('listInstallOrders', [InstallOrdersController::class, 'listInstallOrders'])->name('listInstallOrders'); //Muestra un listado de las órdenes de instalación
    Route::get('createInstallOrder', [InstallOrdersController::class, 'showRegistrationForm'])->name('createInstallOrder'); //Muestra el formulario de registro para una nueva orden de instalación
    Route::get('getProducts/{id}', [InstallOrdersController::class, 'getProducts'])->name('getInstallProducts'); //Obtiene los productos con instalaciones asociadas
    Route::get('viewInstallOrder/{id}', [InstallOrdersController::class, 'showInstallOrders'])->name('viewInstallOrder'); //Muestra el detalle de la órden de instalación seleccionada
    Route::post('register', [InstallOrdersController::class, 'create'])->name('register'); //Ingresa un nuevo registro de orden de instalación en la BD
    Route::get('editInstallOrder/{id}', [InstallOrdersController::class, 'showEditForm'])->name('editInstallOrder'); //Muestra el formulario de edición para la orden de instalación seleccionada
    Route::put('updateInstallOrder/{id}', [InstallOrdersController::class, 'updateInstallOrder'])->name('updateInstallOrder'); //Actualiza el registro de la orden de instalación seleccionada 
    Route::get('deleteInstallOrder/{id}', [InstallOrdersController::class, 'deleteInstallOrder'])->name('deleteInstallOrder'); //Elimina el registro de orden de instalación seleccionada
    Route::get('printInstallOrder/{id}', [InstallOrdersController ::class, 'printInstallOrder'])->name('pdfInstallOrder'); //Genra la pre-visualización del detalle de la orden de instalación seleccionada
});

//Rutas para el módulo de reparaciones
Route::prefix('repairs')->name('repairs.')->group(function () {
    Route::get('listRepairs', [RepairController::class, 'showRepairsList'])->name('listRepairs');
    Route::get('listProductRepair', [RepairController::class, 'showProductRepairsList'])->name('listProductRepair'); //Muestra un listado de las reparaciones
    Route::get('getProducts/{id}', [RepairController::class, 'getProducts'])->name('getRepairProducts'); //Obtiene los productos por cliente 
    Route::get('getProductsToRepair/{id}', [RepairController::class, 'getProductsToRepair'])->name('getProductsToRepair'); //Obtiene los productos por reparar
    Route::get('viewRepair/{id}', [RepairController::class, 'showRepairDetails'])->name('viewRepair'); // Muestra el detalle de la reparación seleccionada
    Route::get('viewProductRepair/{id}', [RepairController::class, 'showProductRepairDetails'])->name('viewProductRepair'); //Muestra el detalle del producto a reparar seleccionado
    Route::get('createRepair', [RepairController::class, 'showCreateForm'])->name('createRepair'); //Muestra el formulario de registro para una nueva reparación
    Route::post('create', [RepairController::class, 'create'])->name('registerRepair'); //Ingresa un nuevo registro de reparación en la BD
    Route::get('createProductRepair', [RepairController::class, 'showCreateProductRepairForm'])->name('createProductRepair'); //Muestra el formulario de registro para iniciar una reparación a un producto
    Route::post('registerProductRepair', [RepairController::class, 'createProductRepair'])->name('registerProductRepair'); //Ingresa un nuevo registro de trabajo de reparación en la BD
    Route::get('editRepair/{id}', [RepairController::class, 'showEditForm'])->name('editRepair'); //Muestra el formulario de edición para la reparación seleccionada
    Route::put('updateRepair/{id}', [RepairController::class, 'updateRepair'])->name('updateRepair'); //Actualiza el registro de la reparación seleccionada
    Route::get('editProductRepair/{id}', [RepairController::class, 'showEditProductRepairForm'])->name('editProductRepair'); //Muestra el formulario de edición para el trabajo de reparación del producto seleccionado
    Route::put('updateProductRepair/{id}', [RepairController::class, 'updateProductRepair'])->name('updateProductRepair'); //Actualiza el registro del trabajo de reparación para el producto seleccionado
    Route::get('deleteRepairOrder/{id}', [RepairController::class, 'deleteRepairOrder'])->name('deleteRepairOrder'); //Elimina el registro de reparación seleccionada
    Route::get('deleteProductRepairOrder/{id}', [RepairController::class, 'deleteProductRepairOrder'])->name('deleteProductRepairOrder'); //Elimina el trabajo de reparación para el producto seleccionado
});

//Rutas para el módulo de control de calidad
Route::prefix('qualityControl')->name('qualityControl.')->group(function () {
    Route::get('listQA', [QualityControlController::class, 'listQAOrders'])->name('listQA'); //Muestra un listado de los controles de calidad
    Route::get('registerQA', [QualityControlController::class, 'showRegistrationForm'])->name('registerQA'); // Muestra el formulario de registro para un nuevo control de calidad
    Route::get('getProducts/{id}', [QualityControlController::class, 'getProducts'])->name('getProducts'); //Obtienen los productos con órdenes de facturación asociados
    Route::get('viewQA/{id}', [QualityControlController::class, 'showQualityControl'])->name('viewQA'); //Muestra el detalle del control de calidad seleccionado
    Route::post('register', [QualityControlController::class, 'create'])->name('register'); //Ingresa un nuevo registro de control de calidad en la BD
    Route::get('editIQA/{id}', [QualityControlController::class, 'showEditForm'])->name('editQA'); //Muestra el formulario de edición para el control de calidad seleccionado
    Route::put('updateQA/{id}', [QualityControlController::class, 'updateQualityControl'])->name('updateQA'); //Actualiza el registro del control de calidad seleccionado en la BD
    Route::get('deleteQA/{id}', [QualityControlController::class, 'delete'])->name('deleteQualityControl'); //Elimina el control de calidad seleccionado de la BD
});

//Muestra el dashboard
Route::get('dashboard', function () {
    return view('home/home');
})->name('dashboard')->middleware('auth');

//Muestra las categorías  de servicios técnios
Route::get('home/technicalServices', function () {
    return view('home/technicalServices');
})->name('home.technicalServices');

//Muestra las categorías de facturación
Route::get('home/billingServices', function () {
    return view('home/billingServices');
})->name('home.billingServices');

//Muestra las categorías de inventario
Route::get('home/stockServices', function () {
    return view('home/stockServices');
})->name('home.stockServices');

//Muestra las categorias de administración
Route::get('home/adminServices', function () {
    return view('home/adminServices');
})->name('home.adminServices');

//Muestra la vista de reportes
Route::get('reports/graphics', function () {
    return view('reports/graphics');
})->name('reports.graphics');