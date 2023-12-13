<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use DateTime;
use App\Models\productWarranty;
use App\Models\billingOrders;
use App\Models\Customers;
use App\Models\AuditLogs;
use App\Models\ErrorLogs;
use Illuminate\Support\Facades\Validator;

class productWarrantyController extends Controller
{
    //
    public function ProductWarrantyList()
    {
        //Obtiene los clientes del sistema de la base de datos
        $productWarranties = ProductWarranty::all();
        //Muestra la vista con el listado de clientes en el sistema
        return view::make('productWarranty.productWarrantyList', ['productWarranties' => $productWarranties]);
    }

    public function showRegistrationForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $billingOrders = billingOrders::all();
        //Muestra el formulario para registrar un cliente usuario
        return View::make('productWarranty.createProductWarranty', ['billingOrders' => $billingOrders]);
    }

    public function getProducts($id)
    {
        // Obtén la orden de facturación
        $billingOrder = BillingOrders::findOrFail($id);
        $productsToCheck = $billingOrder->productSale()
            ->whereDoesntHave('productWarranty') // Añade esta línea
            ->with(['products', 'products.brands', 'products.models'])
            ->get();
        return response()->json($productsToCheck);
    }

    public function showProductWarranty($id)
    {
        //Obtener a la servicio a modificar
        $productWarranty = productWarranty::findOrFail($id);
        //Mostrar el formulario de edición con los datos de la servicio
        return view('productWarranty.viewProductWarranty', ['productWarranty' => $productWarranty]);
    }

    protected function create(Request $request){
    $data = $request -> all();
    //Realizar la validación 
    $validator = Validator::make($data, [
        'idProductSale' => ['required', 'integer'],
        'idCustomer' => ['required', 'integer'],
        'totalWarranty' => ['required', 'string', 'max:10'],
        'technicianComments' => ['required', 'string', 'max:200'],
    ]);

    // Si la validación falla, se envía un  mensaje a la sesión
    if ($validator->fails()) {
        Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
        return redirect()->back();
    }

    $customer = Customers::findorFail($data['idCustomer']);

    try{
        // Obtén la fecha de entrega en formato de cadena
        $deliveryDateString = $data['deliveryDate'];
        // Convierte la cadena de fecha a un formato que Carbon pueda analizar
        $formattedDateString = DateTime::createFromFormat('d/m/Y', $deliveryDateString)->format('Y-m-d');
        // Crea un objeto Carbon a partir de la cadena formateada
        $deliveryDate = Carbon::parse($formattedDateString);
        // Formatea la fecha en el formato "yyyy-MM-dd"
        $formattedDate = $deliveryDate->format('Y-m-d');
        // Asigna la fecha formateada al campo de fecha
        $data['deliveryDate'] = $formattedDate;
        //Crear al cliente si la validación es exitosa            
        productWarranty::create([
            'idproductSale' => $data['idProductSale'],
            'purchaseDate' => $data['dateCreation'],
            'deliveryDate' => $data['deliveryDate'],
            'invoiceNumber' => $data['invoiceNumber'],
            'technicianComments' => $data['technicianComments'],
            'totalWarranty' => $data['totalWarranty'],
            ]);

            AuditLogs::logActivity(session('idUser'), 'NEW_PRODUCT_WARRANTY', 
            'Se ha registrado una nueva garantía para el cliente: ' . $customer -> customerFullName);
            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Garantia registrada exitosamente');
            return redirect() -> route('productWarranty.productWarrantyList');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_ProductWarranty');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar la garantia: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function showEditForm($id)
    {
        //Obtener al usuario a modificar
        $productWarranty = ProductWarranty::findOrFail($id);
        //Mostrar el formulario de edición con los datos del usuario
        return view('productWarranty.editProductWarranty', ['productWarranty' => $productWarranty]);
    }

    public function updateProductWarranty(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idProductSale' => ['required', 'integer'],
            'idCustomer' => ['required', 'integer'],
            'totalWarranty' => ['required', 'string', 'max:10'],
            'technicianComments' => ['required', 'string', 'max:200'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $customer = Customers::findorFail($request->input('idCustomer'));

        try{
            //Actualiza los datos del usuario
            $productWarranty = ProductWarranty::findorFail($id);
            $productWarranty -> idproductSale = $request -> input('idProductSale');
            $productWarranty -> technicianComments = $request -> input('technicianComments');
            $productWarranty -> totalWarranty = $request -> input('totalWarranty');
            $productWarranty -> purchaseDate = $request -> input('dateCreation');
            $productWarranty -> deliveryDate = $request -> input('deliveryDate');
            $productWarranty -> invoiceNumber = $request -> input('invoiceNumber');
            $productWarranty -> dateLastEdit = Carbon::now();
            $productWarranty -> userNameLastEdit = Session::get('systemUser');
            $productWarranty -> save();

            AuditLogs::logActivity(session('idUser'), 'UPDATE_PRODUCT_WARRANTY', 
            'Se han actualizado los datos de la garantía para el cliente: ' . $customer -> customerFullName);

            // Después de actualizar exitosamente, genera un mensaje de éxito
            Session::flash('updateSuccess', 'Garantía actualizada exitosamente');
            return redirect()->route('productWarranty.productWarrantyList');
        }catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_ProductWarranty');
            Session::flash('updateError', 'Ocurrió un error al actualizar la garantía: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function delete($id) {
        try {
            // Encuentra el registro de la llamada por su ID
            $productWarranty = productWarranty::findorFail($id);
            $customerName = $productWarranty -> productSale -> billingOrders -> customers -> customerFullName;
            if ($productWarranty) {
                // Elimina la llamada
                $productWarranty->delete();
                AuditLogs::logActivity(session('idUser'), 'DELETE_PRODUCT_WARRANTY', 
                'Se ha eliminado el registro de boleta de garantía para el cliente:' . ' ' . $customerName);

                // Devuelve una respuesta exitosa
                return response()->json(['message' => 'La boleta de garantía se eliminó existosamente'], 200);
            }
            else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró la boleta de garantía'], 404);
            }
        } catch (Exception $e) {
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de la boleta: ' . $e->getMessage()], 500);
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
