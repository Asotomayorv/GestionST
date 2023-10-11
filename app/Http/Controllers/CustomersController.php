<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Customers;
use App\Models\ErrorLogs;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Carbon;

class CustomersController extends Controller
{
    public function listCustomers()
    {
        //Obtiene los usuarios del sistema de la base de datos
        $customers = Customers::all();
        //Muestra la vista con el listado de usuarios en el sistema
        return view::make('customers.listCustomers', ['customers' => $customers]);
    }

    public function showRegistrationForm()
    {
        //Muestra el formulario para registrar un nuevo usuario
        return View::make('customers.createCustomer');
    }


protected function create(Request $request){
    $data = $request -> all();
    //Realizar la validación 
    $validator = Validator::make($data, [
        'customerID' => ['required', 'integer', 'unique:customers'],
        'customerName' => ['required', 'string', 'max:75'],
        'customerLastName' => ['required', 'string', 'max:50'],
        'customerPhone1' => ['required', 'string', 'max:20'],
        'customerEmail1' => ['required', 'string', 'email', 'max:35', 'unique:customers'],
        'customerAddress1' => ['required', 'string', 'max:150'],
    ]);

    //Comprueba si la validación falla
    if ($validator -> fails()){
        return redirect() -> back() -> withErrors($validator) -> withInput();
    }

    try{
        //Crear el usuario si la validación es exitosa            
        Customers::create([
            'customerID' => $data['customerID'],
            'customerName' => $data['customerName'],
            'customerLastName' => $data['customerLastName'],
            'customerPhone1' => $data['customerPhone1'],
            'customerEmail1' => $data['customerEmail1'],
            'customerAddress1' => $data['customerAddress1'],
            ]);
            return redirect() -> route('customers.listCustomers');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Customer');
            return redirect() -> back();
        }
    }

    public function updateCustomer(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'customerID' => ['required', 'integer'],
            'customerName' => ['required', 'string', 'max:75'],
            'customerLastName' => ['required', 'string', 'max:50'],
            'customerPhone1' => ['required', 'string', 'max:20'],
            'customerEmail1' => ['required', 'string', 'email', 'max:35'],
            'customerAddress1' => ['required', 'string', 'max:150'],
        ]);

        //Comprueba si la validación falla
        if ($validator -> fails()){
            return redirect() -> route('customers.editCustomer', $id) -> withErrors($validator) -> withInput();
        }

        //Actualiza los datos del usuario
        $customer = Customers::findorFail($id);
        $customer -> customerID = $request -> input('customerID');
        $customer -> customerName = $request -> input('customerName');
        $customer -> customerLastName = $request -> input('customerLastName');
        $customer -> customerEmail1 = $request -> input('customerEmail1');
        $customer -> customerAddress1 = $request -> input('customerAddress1');
        $customer->dateLastEdit = Carbon::now();
        $customer -> save();

        return redirect() -> route('customers.listCustomers');
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
        ErrorLogs::create([
            'errorMessage' => $errorMessage,
            'errorCode' => $errorCode,
            'errorSource' => $errorSource,
        ]);
    }
}
