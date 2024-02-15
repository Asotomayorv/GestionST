<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Support\Facades\View;
use App\Models\InstallOrders;
use App\Models\ErrorLogs;
use App\Models\VisitRoutes;
use App\Models\User;
use App\Models\ProductInstall;
use App\Models\AuditLogs;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class InstallOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listInstallOrders()
    {
        //Obtiene los servicios del sistema de la base de datos
        $install = InstallOrders::all();
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        //Muestra la vista con el listado de servicios en el sistema
        return View::make('installorders.listInstallOrders', ['installorders' => $install, 'technicians' => $technicians]);
    }

    public function showRegistrationForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $routes = VisitRoutes::where(function ($query) {
            $query->where('routeType', 'Instalación')
                  ->orWhere('routeType', 'Gira')
                  ->orWhere('routeType', 'Visita Venta');
        })
        ->where('routeStatus', '!=', 'Finalizado')
        ->get();
        //Muestra el formulario para registrar un nuevo installorder
        return View::make('installorders.createInstallOrder', ['routes' => $routes]);
    }

    public function getProducts($idCustomer)
    {
        $customer = Customers::findOrFail($idCustomer);
        $productsToInstall = $customer->billingOrders()->with(['productSale' => function ($query) {
            $query->where('installationRequired', 1);
        }, 'productSale.products', 'productSale.products.brands', 'productSale.products.models'])->get();
        return response()->json($productsToInstall);
    }

    public function showInstallOrders($id)
    {
        //Obtener a la servicio a modificar
        $install = InstallOrders::findOrFail($id);
        // Obtener todos los productos asociados a la boleta de facturación
        $selectedProducts = ProductInstall::where('idinstallation', $install -> idinstallation)->with('products.brands', 'products.models')->get();
        $install->dateLastEdit = Carbon::parse($install->dateLastEdit);
        $install->dateCreation = Carbon::parse($install->dateCreation);
        //Mostrar el formulario de edición con los datos de la servicio
        return view('installorders.viewInstallOrder', ['install' => $install, 'selectedProducts' => $selectedProducts->toArray()]);
    }

    protected function create(Request $request){
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'installationComments' => ['required', 'string', 'max:200'],
            'installationDetails' => ['required', 'max:135'],
            'installationEstimateHours' => ['required'],
            'installationTravelHours' => ['required'],
            'productData' => ['required'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        // Recuperar los datos de los productos desde el campo oculto
        $selectedProducts = json_decode($request->input('productData'), true);

        $customer = Customers::findorFail($data['idCustomer']);

        try{
            //Crear al cliente si la validación es exitosa            
            $installOrder = InstallOrders::create([
            'idRoute' => $data['idRoute'],
            'installationDate' => $data['startDate'],
            'installationComments' => $data['installationComments'],
            'installationDetails' => implode(", ", $data['installationDetails']),
            'installationEstimateHours' => $data['installationEstimateHours'],
            'installationTravelHours' => $data['installationTravelHours'],
            'installationTotalHours' => $data['installationTotalHours'],
            ]);

             // Después de crear la boleta de facturación con éxito
             foreach ($selectedProducts as $product) {
                // Crear la relación con la boleta de facturación
                ProductInstall::create([
                'idInstallation' => $installOrder->idinstallation,
                'idproduct' => $product['idProduct'],
                'productQuantity' => $product['productQuantitySelected'],
                ]);
            }

            AuditLogs::logActivity(session('idUser'), 'NEW_INSTALL_ORDER', 
            'Se ha registrado una nueva boleta de instalación para el cliente: ' . $customer -> customerFullName);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Boleta de Instalación registrada exitosamente');
            return redirect() -> route('installorders.listInstallOrders');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_InstallOrder');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar la boleta de instalación: '. $e->getMessage());
            return redirect() -> route('installorders.createInstallOrder');
        }
    }

    public function showEditForm($id)
    {
        //Obtener a la servicio a modificar
        $install = InstallOrders::findOrFail($id);
        // Obtener todos los productos asociados a la boleta de facturación
        $selectedProducts = ProductInstall::where('idinstallation', $install -> idinstallation)->with('products.brands', 'products.models')->get();
        $install->dateLastEdit = Carbon::parse($install->dateLastEdit);
        //Mostrar el formulario de edición con los datos de la servicio
        return view('installorders.editInstallOrder', ['install' => $install, 'selectedProducts' => $selectedProducts->toArray()]);
    }

    public function updateInstallOrder(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'installationComments' => ['required', 'string', 'max:200'],
            'installationDetails' => ['required', 'max:135'],
            'installationEstimateHours' => ['required'],
            'installationTravelHours' => ['required'],
            'productData' => ['required'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        // Recuperar los datos de los productos desde el campo oculto
        $selectedProducts = json_decode($request->input('productData'), true);
        $customer = Customers::findorFail($request->input('idCustomer'));

        try{
            //Actualiza los datos del usuario
            $install = InstallOrders::findorFail($id);
            $install -> idRoute = $request -> input('idRoute');
            $install -> installationDate = $request -> input('startDate');
            $install -> installationComments = $request -> input('installationComments');
            $install->installationDetails = implode(", ", $request->input('installationDetails'));
            $install -> installationStatus = $request -> input('installationStatus');
            $install -> installationEstimateHours = $request -> input('installationEstimateHours');
            $install -> installationTravelHours = $request -> input('installationTravelHours');
            $install -> installationTotalHours = $request -> input('installationTotalHours');
            $install -> dateLastEdit = Carbon::now();
            $install -> userNameLastEdit = Session::get('systemUser');
            $install -> save();

            // Obtener las relaciones existentes
            $existingProductInstall = ProductInstall::where('idinstallation', $install->idinstallation)->get();

            foreach ($selectedProducts as $product) {

                // Actualizar o crear la relación con la boleta de instalación
                ProductInstall::updateOrCreate(
                    [
                        'idInstallation' => $install->idinstallation,
                        'idproduct' => $product['idProduct'],
                    ],
                    [
                        'productQuantity' => $product['productQuantitySelected'],
                    ]
                );
        }
        // Eliminar las relaciones que ya no están en la lista actualizada
        $currentProductIds = collect($selectedProducts)->pluck('idProduct')->toArray();
        $deletedProductInstalls = $existingProductInstall->reject(function ($existingProductInstall) use ($currentProductIds) {
            return in_array($existingProductInstall->idproduct, $currentProductIds);
        });

        foreach ($deletedProductInstalls as $deletedProductInstall) {
            // Eliminar la relación
            $deletedProductInstall->delete();
        }

        AuditLogs::logActivity(session('idUser'), 'UPDATE_INSTALL_ORDER', 
        'Se han actualizado los datos de la boleta de instalación registrada para el cliente:' . $customer -> customerFullName);

        // Después de actualizar exitosamente, genera un mensaje de éxito
        Session::flash('updateSuccess', 'Boleta de instalación actualizada exitosamente');
        return redirect()->route('installorders.listInstallOrders');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_InstallOrder');
            Session::flash('updateError', 'Ocurrió un error al actualizar el producto: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function deleteInstallOrder($idInstallOrders) {
        try {
            // Encuentra el registro de la llamada por su ID
            $installOrder = InstallOrders::findorFail($idInstallOrders);
            $customerName = $installOrder -> routes -> customers -> customerFullName;
            if ($installOrder) {
                // Elimina el registro de la llamada
                // Obtén todos los comentarios asociados a la llamada
            $products = ProductInstall::where('idinstallation', $idInstallOrders)->get();
            // Elimina los comentarios
            foreach ($products as $product) {
                $product->delete();
            }
            // Elimina la llamada
            $installOrder->delete();
            AuditLogs::logActivity(session('idUser'), 'DELETE_INSTALL_ORDER', 
            'Se ha eliminado el registro de boleta de instalación para el cliente:' . ' ' . $customerName);

            // Devuelve una respuesta exitosa
            return response()->json(['message' => 'La boleta de instalación se eliminó existosamente'], 200);
            }
            else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró la boleta de Instalación'], 404);
            }
        } catch (Exception $e) {
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de la boleta: ' . $e->getMessage()], 500);
        }
    }

    public function printInstallOrder($id)
    {
       //Obtener al usuario a modificar
        $installOrder = InstallOrders::findOrFail($id);
        $selectedProducts = ProductInstall::where('idinstallation', $installOrder -> idinstallation)->with('products.brands', 'products.models')->get();
        $pdf = Pdf::loadView('installorders.pdfInstallOrder', compact('installOrder', 'selectedProducts'));
        return $pdf->stream();
    }

    private function logError($errorMessage, $errorCode, $errorSource)
    {
        // Verificar si hay errores de validación y registrarlos si los hay
        if ($errorCode === 'VALIDATION_ERROR') {
            foreach ($errorMessage->all() as $error) {
                ErrorLogs::create([
                    'errorMessage' => $error,
                    'errorCode' => 'VALIDATION_ERROR',
                    'errorSource' => $errorSource,
                ]);
            }
        } else {
            ErrorLogs::create([
                'errorMessage' => $errorMessage,
                'errorCode' => $errorCode,
                'errorSource' => $errorSource,
            ]);
        }
    }
}
