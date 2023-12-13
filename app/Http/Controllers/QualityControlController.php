<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\billingOrders;
use Illuminate\Support\Facades\View;
use App\Models\ProductQualityControl;
use App\Models\Customers;
use App\Models\User;
use App\Models\AuditLogs;
use App\Models\ProductSale;
use App\Models\ErrorLogs;
use Illuminate\Support\Carbon;
use Exception;

class QualityControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listQAOrders()
    {
        //Obtiene los servicios del sistema de la base de datos
        $QAControls = ProductQualityControl::all();
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        //Muestra la vista con el listado de servicios en el sistema
        return View::make('qualityControl.listQA', ['QAControls' => $QAControls, 'technicians' => $technicians]);
    }

    public function getProducts($idBillingOrder)
    {
        /*$billingOrder = BillingOrders::findOrFail($idBillingOrder);
        $productsToCheck = $billingOrder->productSale()->with(['products', 'products.brands', 'products.models'])->get();
        return response()->json($productsToCheck);*/
        
        // Obtén la orden de facturación
        $billingOrder = BillingOrders::findOrFail($idBillingOrder);
        $productsToCheck = $billingOrder->productSale()
            ->whereDoesntHave('productQualityControl') // Añade esta línea
            ->with(['products', 'products.brands', 'products.models'])
            ->get();
        return response()->json($productsToCheck);
    }

    public function showRegistrationForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $billingOrders = billingOrders::all();
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        //Muestra el formulario para registrar un nuevo installorder
        return View::make('qualityControl.registerQA', ['billingOrders' => $billingOrders, 'technicians' => $technicians]);
    }

    public function showQualityControl($id)
    {
        //Obtener a la servicio a modificar
        $productQA = ProductQualityControl::findOrFail($id);
        //Mostrar el formulario de edición con los datos de la servicio
        return view('qualityControl.viewQA', ['productQA' => $productQA]);
    }

    public function create(Request $request)
    {
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'idProductSale' => ['required', 'integer'],
            'technicianAssigned' => ['required', 'string', 'max:75'],
            'technicianComments' => ['required', 'string', 'max:200'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $productSale = ProductSale::findOrFail($data['idProductSale']);
        $billingOrder = $productSale->billingOrders; // Ajusta el nombre de la relación según sea necesario
        $idcustomer = $billingOrder->idCustomer;

        $customer = Customers::findorFail($idcustomer);

        try {
            // Crear el control de calidad
            $QA = new ProductQualityControl();
            $QA->idProductSale = $data['idProductSale'];
            $QA->technicianComments = $data['technicianComments'];
            $QA->technicianAssigned = $data['technicianAssigned'];
            
            // Marcar las opciones seleccionadas en la base de datos
            $QA->accesories = $request->has('accesories') ? 1 : 0;
            $QA->adapter = $request->has('adapter') ? 1 : 0;
            $QA->display = $request->has('display') ? 1 : 0;
            $QA->keyboard = $request->has('keyboard') ? 1 : 0;
            $QA->cases = $request->has('cases') ? 1 : 0;
            $QA->carReader = $request->has('carReader') ? 1 : 0;
            $QA->battery = $request->has('battery') ? 1 : 0;
            $QA->sound = $request->has('battery') ? 1 : 0;
            $QA->wifi = $request->has('wifi') ? 1 : 0;
            $QA->installationBase = $request->has('installationBase') ? 1 : 0;
            $QA->communication = $request->has('communication') ? 1 : 0;
            $QA->camera = $request->has('camera') ? 1 : 0;
            $QA->tcpIp = $request->has('tcpIp') ? 1 : 0;
            $QA->downUSB = $request->has('downUSB') ? 1 : 0;
            $QA->rs485 = $request->has('rs485') ? 1 : 0;
            $QA->downSDCard = $request->has('downSDCard') ? 1 : 0;
            $QA->miniUSB = $request->has('miniUSB') ? 1 : 0;
            $QA->rs232 = $request->has('rs232') ? 1 : 0;
            $QA->reader = $request->has('reader') ? 1 : 0;
            $QA->save();

            AuditLogs::logActivity(session('idUser'), 'NEW_QUALITY_CONTROL', 
            'Se ha registrado una nueva boleta por control de calidad para el cliente: ' . $customer -> customerFullName);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Control de calidad registrado exitosamente');
            return redirect() -> route('qualityControl.listQA');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Quality_Control');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar la boleta de control de calidad: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function showEditForm($id)
    {
        //Obtener a la servicio a modificar
        $productQA = ProductQualityControl::findOrFail($id);
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        //Mostrar el formulario de edición con los datos de la servicio
        return view('qualityControl.editQA', ['productQA' => $productQA, 'technicians' => $technicians]);
    }

    public function updateQualityControl(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idProductSale' => ['required', 'integer'],
            'technicianAssigned' => ['required', 'string', 'max:75'],
            'technicianComments' => ['required', 'string', 'max:200'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $customer = Customers::findorFail($request->input('idCustomer'));

        try{
            // Crear el control de calidad
            $QA = ProductQualityControl::findOrFail($id);
            $QA->idProductSale = $request -> input('idProductSale');
            $QA->technicianComments = $request -> input('technicianComments');
            $QA->technicianAssigned = $request -> input ('technicianAssigned');
            
            // Marcar las opciones seleccionadas en la base de datos
            $QA->accesories = $request->has('accesories') ? 1 : 0;
            $QA->adapter = $request->has('adapter') ? 1 : 0;
            $QA->display = $request->has('display') ? 1 : 0;
            $QA->keyboard = $request->has('keyboard') ? 1 : 0;
            $QA->cases = $request->has('cases') ? 1 : 0;
            $QA->carReader = $request->has('carReader') ? 1 : 0;
            $QA->battery = $request->has('battery') ? 1 : 0;
            $QA->sound = $request->has('sound') ? 1 : 0;
            $QA->wifi = $request->has('wifi') ? 1 : 0;
            $QA->installationBase = $request->has('installationBase') ? 1 : 0;
            $QA->communication = $request->has('communication') ? 1 : 0;
            $QA->camera = $request->has('camera') ? 1 : 0;
            $QA->tcpIp = $request->has('tcpIp') ? 1 : 0;
            $QA->downUSB = $request->has('downUSB') ? 1 : 0;
            $QA->rs485 = $request->has('rs485') ? 1 : 0;
            $QA->downSDCard = $request->has('downSDCard') ? 1 : 0;
            $QA->miniUSB = $request->has('miniUSB') ? 1 : 0;
            $QA->rs232 = $request->has('rs232') ? 1 : 0;
            $QA->reader = $request->has('reader') ? 1 : 0;
            $QA -> dateLastEdit = Carbon::now();
            $QA -> userNameLastEdit = Session::get('systemUser');
            $QA->save();

        AuditLogs::logActivity(session('idUser'), 'UPDATE_QUALITY_CONTROL', 
        'Se han actualizado los datos de la boleta de control de calidad para el cliente: ' . $customer -> customerFullName);

        // Después de actualizar exitosamente, genera un mensaje de éxito
        Session::flash('updateSuccess', 'Boleta de Control de Calidad actualizada exitosamente');
        return redirect()->route('qualityControl.listQA');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_InstallOrder');
            Session::flash('updateError', 'Ocurrió un error al actualizar el producto: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function delete($id) {
        try {
            // Encuentra el registro de la llamada por su ID
            $productQA = ProductQualityControl::findorFail($id);
            $customerName = $productQA -> productSale -> billingOrders -> customers -> customerFullName;
            if ($productQA) {
                // Elimina la llamada
                $productQA->delete();
                AuditLogs::logActivity(session('idUser'), 'DELETE_QUALITY_CONTROL', 
                'Se ha eliminado el registro de boleta de instalación para el cliente:' . ' ' . $customerName);

                // Devuelve una respuesta exitosa
                return response()->json(['message' => 'La boleta de control de calidad se eliminó existosamente'], 200);
            }
            else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró la boleta de control de calidad'], 404);
            }
        } catch (Exception $e) {
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de la boleta: ' . $e->getMessage()], 500);
        }
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
