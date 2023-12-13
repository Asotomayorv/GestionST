<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Customers;
use App\Models\ErrorLogs;
use App\Models\AuditLogs;
use App\Models\Call;
use App\Models\VisitRoutes;
use App\Models\billingOrders;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function findCustomer($idCustomer)
    {
        //Obtener el cliente 
        $customer = Customers::where('customerID', $idCustomer)->get();
        return response()->json(['customer' => $customer]);
    }
    
    public function listCustomers()
    {
        //Obtiene los clientes del sistema de la base de datos
        $customers = Customers::all();
        // Recorre la colección de usuarios y formatea las fechas
        $formattedCustomers = $customers->map(function ($customer) {
            $customer->dateCreation = Carbon::parse($customer->dateCreation);
            $customer->dateLastEdit = Carbon::parse($customer->dateLastEdit);
            return $customer;
        });
        //Muestra la vista con el listado de clientes en el sistema
        return view::make('customers.listCustomers', ['customers' => $formattedCustomers]);
    }

    public function showCustomer($id)
    {
        //Obtener el cliente 
        $customer = Customers::findOrFail($id);
        // Asegurarse de que la fecha de creación sea un objeto Carbon
        $customer->dateLastEdit = Carbon::parse($customer->dateLastEdit);
        // Obtener las llamadas realizadas por el cliente
        $calls = Call::where('idCustomer', $id)->get();
        // Obtener las rutas agendadas del cliente 
        $routes = VisitRoutes::where('idCustomer', $id)->get();
        // Obtener las rutas agendadas del cliente 
        $billingOrders = billingOrders::where('idCustomer', $id)->get();
        //Mostrar los datos del usuario
        return view('customers.viewCustomer', ['customer' => $customer, 'calls' => $calls, 'routes' => $routes,
        'billingOrders' => $billingOrders]);
    }

    /*public function listCustomersModal()
    {
        // Obtiene los usuarios del sistema de la base de datos ordenados por fecha de creación de forma descendente
        $customer = Customers::all();

        // Formatea los datos para el ajax
        $formattedCustomers = $customer->map(function ($customer) {
            return [
                'idCustomer' => $customer->idCustomer,
                'customertypeID' => $customer->customertypeID,
                'customerID' => $customer->customerID,
                'customerFullName' => $customer->customerFullName,
                'customerContact' => $customer->customerContact,
                'customerEmail1' => $customer->customerEmail1,
                'customerEmail2' => $customer->customerEmail2,
                'customerPhone1' => $customer->customerPhone1,
                'customerPhone2' => $customer->customerPhone2,
                'customerAddress1' => $customer->customerAddress1,
                'customerAddress2' => $customer->customerAddress2,
                'customerTaxes' => $customer->customerTaxes,
                'dateCreation' => $customer->dateCreation,
                'dateLastEdit' => $customer->dateLastEdit,
            ];
        });

        // Devuelve una respuesta JSON con la clave "customers" que contiene los datos formateados
        return response()->json(['customers' => $formattedCustomers]);
    }*/

    public function showRegistrationForm()
    {
        //Muestra el formulario para registrar un cliente 
        return View::make('customers.createCustomer');
    }

    protected function create(Request $request){
    $data = $request -> all();
    //Realizar la validación 
    $validator = Validator::make($data, [
        'customerID' => ['required', 'string', 'unique:customers'],
        'customerFullName' => ['required', 'string', 'max:75'],
        'customerContact' => ['required', 'string', 'max:75'],
        'customerPhone1' => ['required', 'string', 'max:20'],
        'customerEmail1' => ['required', 'string', 'email', 'max:35', 'unique:customers'],
        'customerAddress1' => ['required', 'string', 'max:150'],
    ]);

    // Si la validación falla, se envía un  mensaje a la sesión
    if ($validator->fails()) {
        Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
        return redirect()->back();
    }

    try{
        //Crear al cliente si la validación es exitosa            
        Customers::create([
            'customertypeID' => $data['customertypeID'],
            'customerID' => $data['customerID'],
            'customerFullName' => $data['customerFullName'],
            'customerContact' => $data['customerContact'],
            'customerEmail1' => $data['customerEmail1'],
            'customerEmail2' => $data['customerEmail2'],
            'customerPhone1' => $data['customerPhone1'],
            'customerPhone2' => $data['customerPhone2'],
            'customerAddress1' => $data['customerAddress1'],
            'customerAddress2' => $data['customerAddress2'],
            'customerTaxes' => $data['customerTaxes'],
            ]);

            AuditLogs::logActivity(session('idUser'), 'NEW_CUSTOMER', 
            'Se ha registrado un nuevo cliente: ' . $data['customerFullName']);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Cliente registrado exitosamente');
            return redirect() -> route('customers.listCustomers');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_User');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar el cliente: '. $e->getMessage());
            return redirect() -> route('customers.createCustomer');
        }
    }

    public function updateCustomer(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'customerID' => ['required', 'string'],
            'customerFullName' => ['required', 'string', 'max:75'],
            'customerContact' => ['required', 'string', 'max:75'],
            'customerPhone1' => ['required', 'string', 'max:20'],
            'customerEmail1' => ['required', 'string', 'email', 'max:35'],
            'customerAddress1' => ['required', 'string', 'max:150'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }
        try{
        //Actualiza los datos del usuario
        $customer = Customers::findorFail($id);
        $customer -> customertypeID = $request -> input('customertypeID');
        $customer -> customerID = $request -> input('customerID');
        $customer -> customerFullName = $request -> input('customerFullName');
        $customer -> customerContact = $request -> input('customerContact');
        $customer -> customerEmail1 = $request -> input('customerEmail1');
        $customer -> customerEmail2 = $request -> input('customerEmail2');
        $customer -> customerPhone1 = $request -> input('customerPhone1');
        $customer -> customerPhone2 = $request -> input('customerPhone2');
        $customer -> customerAddress1 = $request -> input('customerAddress1');
        $customer -> customerAddress2 = $request -> input('customerAddress2');
        $customer -> customerTaxes = $request -> input('customerTaxes', 0);
        $customer -> dateLastEdit = Carbon::now();
        $customer -> userNameLastEdit = Session::get('systemUser');
        $customer -> save();

        AuditLogs::logActivity(session('idUser'), 'UPDATE_CUSTOMER', 
        'Se han actualizado los datos del cliente: ' . $customer -> customerFullName);

        // Después de modificar el usuario exitosamente, genera un mensaje de éxito
        Session::flash('updateSuccess', 'El cliente ha sido actualizado exitosamente');
        return redirect() -> route('customers.listCustomers');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_Product');
            // Si falla al modificar el usuario, mostrará un mensaje de error
            Session::flash('updateError', 'Ocurrió un error al actualizar el cliente: '. $e->getMessage());
            return redirect() -> back();
        } 
    }

    protected function createModal(Request $request)
    {
        //Validar los datos del formulario
        $validatedData = $request->validate([
            'createCustomerID' => 'required',
            'createCustomerFullName' => 'required',
            'createCustomerContact' => 'required',
            'createCustomerEmail1' => 'required|email',
            'createCustomerPhone1' => 'required',
            'createCustomerAddress1' => 'required',
        ]);
    
        // Crear un nuevo objeto de cliente con los datos validados
        $customer = new Customers;
        $customer->customertypeID = $request->createCustomertypeID;
        $customer->customerID = $request->createCustomerID;
        $customer->customerFullName = $request->createCustomerFullName;
        $customer->customerContact = $request->createCustomerContact;
        $customer->customerEmail1 = $request->createCustomerEmail1;
        $customer->customerEmail2 = $request->createCustomerEmail2;
        $customer->customerPhone1 = $request->createCustomerPhone1;
        $customer->customerPhone2 = $request->createCustomerPhone2;
        $customer->customerAddress1 = $request->createCustomerAddress1;
        $customer->customerAddress2 = $request->createCustomerAddress2;
        $customer->customerTaxes = $request->has('createCustomerTaxes');
        // Guardar el cliente en la base de datos
        $customer->save();
        AuditLogs::logActivity(session('idUser'), 'NEW_CUSTOMER', 
        'Se ha registrado un nuevo cliente: ' . $customer->customerFullName);
        // Después de actualizar el cliente, obtén los datos actualizados
        $createdCustomer = Customers::orderBy('dateCreation', 'desc')->first();
        // Devuelve una respuesta JSON con los datos actualizados y el estado de éxito
        return response()->json(['data' => $createdCustomer]);
    }

    /*protected function createModal(Request $request)
    {
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'createCustomerID' => ['required', 'string', 'unique:customers'],
            'createCustomerFullName' => ['required', 'string', 'max:75'],
            'createCustomerContact' => ['required', 'string', 'max:75'],
            'createCustomerPhone1' => ['required', 'string', 'max:20'],
            'createCustomerEmail1' => ['required', 'string', 'email', 'max:35', 'unique:customers'],
            'createCustomerAddress1' => ['required', 'string', 'max:150'],
        ]);
    
        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }
    
        try{
            //Crear al cliente si la validación es exitosa            
            Customers::create([
                'customertypeID' => $data['createCustomertypeID'],
                'customerID' => $data['createCustomerID'],
                'customerFullName' => $data['createCustomerFullName'],
                'customerContact' => $data['createCustomerContact'],
                'customerEmail1' => $data['createCustomerEmail1'],
                'customerEmail2' => $data['createCustomerEmail2'],
                'customerPhone1' => $data['createCustomerPhone1'],
                'customerPhone2' => $data['createCustomerPhone2'],
                'customerAddress1' => $data['createCustomerAddress1'],
                'customerAddress2' => $data['createCustomerAddress2'],
                'customerTaxes' => $data['createCustomerTaxes'],
                ]);
                // Después de actualizar el cliente, obtén los datos actualizados
                $createdCustomer = Customers::latest()->first();

                // Devuelve una respuesta JSON con los datos actualizados
                return response()->json(['data' => $createdCustomer]);
    
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_User');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar el cliente: '. $e->getMessage());
        }
    }*/

    public function updateCustomerModal(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'modifyCustomerID' => ['required', 'string'],
            'modifyCustomerFullName' => ['required', 'string', 'max:75'],
            'modifyCustomerContact' => ['required', 'string', 'max:75'],
            'modifyCustomerPhone1' => ['required', 'string', 'max:20'],
            'modifyCustomerEmail1' => ['required', 'string', 'email', 'max:35'],
            'modifyCustomerAddress1' => ['required', 'string', 'max:150'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }
        //Actualiza los datos del usuario
        $customer = Customers::findorFail($id);
        $customer -> customertypeID = $request -> input('modifyCustomertypeID');
        $customer -> customerID = $request -> input('modifyCustomerID');
        $customer -> customerFullName = $request -> input('modifyCustomerFullName');
        $customer -> customerContact = $request -> input('modifyCustomerContact');
        $customer -> customerEmail1 = $request -> input('modifyCustomerEmail1');
        $customer -> customerEmail2 = $request -> input('modifyCustomerEmail2');
        $customer -> customerPhone1 = $request -> input('modifyCustomerPhone1');
        $customer -> customerPhone2 = $request -> input('modifyCustomerPhone2');
        $customer -> customerAddress1 = $request -> input('modifyCustomerAddress1');
        $customer -> customerAddress2 = $request -> input('modifyCustomerAddress2');
        $customer -> customerTaxes = $request -> input('modifyCustomerTaxes', 0);
        $customer -> dateLastEdit = Carbon::now();
        $customer -> userNameLastEdit = Session::get('systemUser');
        $customer -> save();

        AuditLogs::logActivity(session('idUser'), 'UPDATE_CUSTOMER', 
        'Se han actualizado los datos del cliente: ' . $customer -> customerFullName);

        // Después de actualizar el cliente, obtén los datos actualizados
        $updatedCustomer = Customers::find($id);

        // Devuelve una respuesta JSON con los datos actualizados
        return response()->json(['data' => $updatedCustomer]);
    }

    public function showEditForm($id)
    {
        //Obtener al usuario a modificar
        $customer = Customers::findOrFail($id);
        //Mostrar el formulario de edición con los datos del usuario
        return view('customers.editCustomer', ['customer' => $customer]);
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
