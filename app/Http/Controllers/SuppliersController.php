<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\Suppliers;
use App\Models\ErrorLogs;
use App\Models\AuditLogs;
use Illuminate\Support\Facades\Validator;


class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listSuppliers()
    {
        //Obtiene los clientes del sistema de la base de datos
        $suppliers = Suppliers::all();
        $formattedSuppliers = $suppliers->map(function ($supplier) {
            $supplier->dateCreation = Carbon::parse($supplier->dateCreation);
            $supplier->dateLastEdit = Carbon::parse($supplier->dateLastEdit);
            return $supplier;
        });
        //Muestra la vista con el listado de clientes en el sistema
        return view::make('suppliers.listSuppliers', ['suppliers' => $formattedSuppliers]);
    }

    public function showSupplier($id)
    {
        //Obtener el usuario 
        $supplier = Suppliers::findOrFail($id);
        // Asegurarse de que la fecha de creación sea un objeto Carbon
        $supplier->dateCreation = Carbon::parse($supplier->dateCreation);
        $supplier->dateLastEdit = Carbon::parse($supplier->dateLastEdit);
        //Mostrar los datos del usuario
        return view('suppliers.viewSupplier', ['supplier' => $supplier]);
    }

    public function showRegistrationForm()
    {
        //Muestra el formulario para registrar un cliente usuario
        return View::make('suppliers.createSupplier');
    }

    protected function create(Request $request){
    $data = $request -> all();
    //Realizar la validación 
    $validator = Validator::make($data, [
        'supplierID' => ['required', 'string', 'unique:suppliers'],
        'supplierName' => ['required', 'string', 'max:75'],
        'supplierContact' => ['required', 'string', 'max:75'],
        'supplierEmail1' => ['required', 'string', 'email', 'max:35', 'unique:suppliers'],
        'supplierPhone1' => ['required', 'string', 'max:20'],
        'supplierAddress' => ['required', 'string', 'max:150'],
    ]);

    // Si la validación falla, se envía un  mensaje a la sesión
    if ($validator->fails()) {
        Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
        return redirect()->back();
    }

    try{
        //Crear al cliente si la validación es exitosa            
        Suppliers::create([
            'supplierID' => $data['supplierID'],
            'supplierName' => $data['supplierName'],
            'supplierContact' => $data['supplierContact'],
            'supplierEmail1' => $data['supplierEmail1'],
            'supplierEmail2' => $data['supplierEmail2'],
            'supplierPhone1' => $data['supplierPhone1'],
            'supplierPhone2' => $data['supplierPhone2'],
            'supplierAddress' => $data['supplierAddress'],
            ]);
            
            AuditLogs::logActivity(session('idUser'), 'NEW_SUPPLIER', 
            'Se ha registrado un nuevo proveedor: ' . $data['supplierName']);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Proveedor registrado exitosamente');
            return redirect() -> route('suppliers.listSuppliers');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Supplier');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar el provedor: '. $e->getMessage());
            return redirect() -> route('suppliers.createSupplier');
        }
    }

    public function updateSupplier(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'supplierID' => ['required', 'string'],
            'supplierName' => ['required', 'string', 'max:75'],
            'supplierContact' => ['required', 'string', 'max:75'],
            'supplierEmail1' => ['required', 'string', 'email', 'max:35'],
            'supplierPhone1' => ['required', 'string', 'max:20'],
            'supplierAddress' => ['required', 'string', 'max:150'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }
        try{
            //Actualiza los datos del usuario
            $supplier = Suppliers::findorFail($id);
            $supplier -> supplierID = $request -> input('supplierID');
            $supplier -> supplierName = $request -> input('supplierName');
            $supplier -> supplierContact = $request -> input('supplierContact');
            $supplier -> supplierEmail1 = $request -> input('supplierEmail1');
            $supplier -> supplierEmail2 = $request -> input('supplierEmail2');
            $supplier -> supplierPhone1 = $request -> input('supplierPhone1');
            $supplier -> supplierPhone2 = $request -> input('supplierPhone2');
            $supplier -> supplierAddress = $request -> input('supplierAddress');
            $supplier -> userNameLastEdit = Session::get('systemUser');
            $supplier->dateLastEdit = Carbon::now();
            $supplier -> save();
            
            AuditLogs::logActivity(session('idUser'), 'UPDATE_SUPPLIER', 
            'Se han actualizado los datos del proveedor: ' . $supplier -> supplierName);

            // Después de modificar el usuario exitosamente, genera un mensaje de éxito
            Session::flash('updateSuccess', 'El proveedor ha sido actualizado exitosamente');
            return redirect() -> route('suppliers.listSuppliers');
            
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_Supplier');
            // Si falla al modificar el usuario, mostrará un mensaje de error
            Session::flash('updateError', 'Ocurrió un error al actualizar el proveedor: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function showEditForm($id)
    {
        //Obtener al usuario a modificar
        $supplier = Suppliers::findOrFail($id);
        //Mostrar el formulario de edición con los datos del usuario
        return view('suppliers.editSupplier', ['supplier' => $supplier]);
    }

    public function changeSupplierStatus($id){
        try{
            //Buscar el usuario en la base de datos
            $supplier = Suppliers::findorFail($id);
            //Cambia el estado del usuario y lo guarda
            $supplier -> isSupplierActive = !$supplier -> isSupplierActive;
            $supplier -> userNameLastEdit = Session::get('systemUser');
            $supplier->dateLastEdit = Carbon::now();
            $supplier -> save();
            $action = $supplier ->isUserActive ? 'Activación' : 'Desactivación';
            AuditLogs::logActivity(session('idUser'), 'SUPPLIER_STATUS_CHANGE', 
            $action . ' del proveedor: ' . $supplier -> supplierName);
            Session::flash('updateSuccess', 'El proveedor ha sido actualizado exitosamente');
            return redirect() -> route('suppliers.listSuppliers');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_Supplier');
            // Si falla al modificar el usuario, mostrará un mensaje de error
            Session::flash('updateError', 'Ocurrió un error al actualizar al proveedor: '. $e->getMessage());
            return redirect() -> back();
        }
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
