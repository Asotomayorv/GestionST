<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\billingOrders;
use App\Models\Customers;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\ErrorLogs;
use App\Models\AuditLogs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class billingOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listBillingOrders()
    {
        //Obtiene los clientes del sistema de la base de datos
        $billingOrders = billingOrders::all();
        $sellers = $this -> getSeller();
        //Muestra la vista con el listado de clientes en el sistema
        return view::make('billingOrders.listBillingOrders', ['billingOrders' => $billingOrders, 'sellers' => $sellers]);
    }

    public function getSeller()
    {
        //Obtiene todos los vendedores desde la base de datos
        $seller = DB::table('users') ->join('roles', 'users.idRole', '=', 'roles.idRole')    ->where('roles.roleName', 'Ventas')    ->get();return $seller;
    }

    public function showRegistrationForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $customers = Customers::all();
        //Obtiene los productos del sistema de la base de datos
        $products = Product::where('productQuantity', '>', 0)->get();
        //Muestra el formulario para registrar un cliente usuario
        $sellers = $this -> getSeller();
        return View::make('billingOrders.createBillingOrders', ['sellers' => $sellers, 'customers' => $customers,
        'products' => $products]);
    }

    public function showEditForm($id)
    {
        //Obtener al usuario a modificar
        $billingOrders = billingOrders::findOrFail($id);
        // Obtener todos los productos asociados a la boleta de facturación
        $selectedProducts = ProductSale::where('idbillingOrder', $billingOrders -> idbillingOrder)->with('products.brands', 'products.models')->get();
        //Obtiene los productos del sistema de la base de datos
        $products = Product::all();
        $sellers = $this -> getSeller();
        //Mostrar el formulario de edición con los datos del usuario
        return view('billingOrders.editBillingOrders', ['billingOrders' => $billingOrders, 'sellers' => $sellers,
        'products' => $products, 'selectedProducts' => $selectedProducts->toArray()]);
    }

    protected function create(Request $request)
    {
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'idCustomer' => ['required', 'integer'],
            'invoiceNumber' => ['required', 'string', 'max:20'],
            'seller' => ['required', 'string', 'max:75'],
            'paymentMethod' => ['required', 'string', 'max:25'],
            'deliveryDate' => ['required', 'date'],
            'totalBilling' => ['required', 'numeric'],
            'saleComments' => ['required', 'string', 'max:200'],
            'productData' => ['required'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        // Recuperar los datos de los productos desde el campo oculto
        $selectedProducts = json_decode($request->input('productData'), true);

        foreach ($selectedProducts as $product) {
            $existingProduct = Product::find($product['idProduct']);
        
            // Verificar si hay suficientes existencias en el inventario
            if ($existingProduct->productQuantity < $product['productQuantitySelected']) {
                Session::flash('createError', 'No hay suficientes existencias en el inventario para el producto ' . $existingProduct->productName);
                return redirect()->route('billingOrders.createBillingOrders');
            }
        }

        $customer = Customers::findorFail($data['idCustomer']);

        try{
            //Crear al cliente si la validación es exitosa            
            $billingOrder = billingOrders::create([
                'idCustomer' => $data['idCustomer'],
                'invoiceNumber' => $data['invoiceNumber'],
                'seller' => $data['seller'],
                'paymentMethod' => $data['paymentMethod'],
                'deliveryDate' => $data['deliveryDate'],
                'totalBilling' => $data['totalBilling'],
                'totalPrice' => $data['totalPrice'], //$totalPrice, 
                'taxes' => $data['taxes'], //$taxes, 
                'saleComments' => $data['saleComments'],
                ]);

                // Después de crear la boleta de facturación con éxito
                foreach ($selectedProducts as $product) {
                    // Actualizar el inventario restando la cantidad vendida
                    $existingProduct = Product::find($product['idProduct']);
                    $existingProduct->productQuantity -= $product['productQuantitySelected'];
                    $existingProduct->save();

                    // Crear la relación con la boleta de facturación
                    ProductSale::create([
                        'idbillingOrder' => $billingOrder->idbillingOrder,
                        'idproduct' => $product['idProduct'],
                        'productQuantity' => $product['productQuantitySelected'],
                        'installationRequired' => $product['installationRequired'], // Si está marcado, establece 1; de lo contrario, establece 0
                    ]);
                }
                AuditLogs::logActivity(session('idUser'), 'NEW_BILLING_ORDER', 
                'Se ha registrado una nueva boleta de facturación para el cliente: ' . $customer -> customerFullName);

                // Después de crear el usuario exitosamente, genera un mensaje de éxito
                Session::flash('createSuccess', 'Venta/Cotización registrada exitosamente');
                return redirect() -> route('billingOrders.listBillingOrders');

            } catch (Exception $e){
                $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_BillingOrder');
                // Si falla al guardar el usuario, mostrará un mensaje de error
                Session::flash('createError', 'Ocurrió un error al registrar la boleta de facturación: '. $e->getMessage());
                return redirect() -> back();
            }
    }
    
    public function updateBillingOrders(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idCustomer' => ['required', 'integer'],
            'invoiceNumber' => ['required', 'string', 'max:20'],
            'seller' => ['required', 'string', 'max:75'],
            'paymentMethod' => ['required', 'string', 'max:25'],
            'saleComments' => ['required', 'string', 'max:200'],
            'deliveryDate' => ['required', 'date'],
            'totalBilling' => ['required', 'numeric'],
            'productData' => ['required'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        // Recuperar los datos de los productos desde el campo oculto
        $selectedProducts = json_decode($request->input('productData'), true);

        foreach ($selectedProducts as $product) {
            $existingProduct = Product::find($product['idProduct']);
        
            // Verificar si hay suficientes existencias en el inventario
            if ($existingProduct->productQuantity < $product['productQuantitySelected']) {
                Session::flash('updateError', 'No hay suficientes existencias en el inventario para el producto ' . $existingProduct->productName);
                return redirect()->route('billingOrders.createBillingOrders');
            }
        }
        try{
            //Actualiza los datos del usuario
            $billingOrders = billingOrders::findorFail($id);
            $customerName = $billingOrders -> customers -> customerFullName;
            $billingOrders -> idCustomer = $request -> input('idCustomer');
            $billingOrders -> invoiceNumber = $request -> input('invoiceNumber');
            $billingOrders -> seller = $request -> input('seller');
            $billingOrders -> paymentMethod = $request -> input('paymentMethod');
            $billingOrders -> deliveryDate = $request -> input('deliveryDate');
            $billingOrders -> totalBilling = $request -> input('totalBilling');
            $billingOrders -> totalPrice = $request -> input('totalPrice');
            $billingOrders -> taxes = $request -> input('taxes');
            $billingOrders -> saleComments = $request -> input('saleComments');
            $billingOrders->dateLastEdit = Carbon::now();
            $billingOrders -> userNameLastEdit = Session::get('systemUser');
            $billingOrders -> save();

            // Obtener las relaciones existentes
            $existingProductSales = ProductSale::where('idbillingOrder', $billingOrders->idbillingOrder)->get();

            foreach ($selectedProducts as $product) {
                // Actualizar el inventario solo si la cantidad ha cambiado
                $existingProductSale = $existingProductSales->firstWhere('idproduct', $product['idProduct']);
                $previousQuantity = $existingProductSale ? $existingProductSale->productQuantity : 0;

                if ($previousQuantity != $product['productQuantitySelected']) {
                    // Actualizar el inventario restando la cantidad vendida
                    $existingProduct = Product::findOrFail($product['idProduct']);
                    $existingProduct->productQuantity += $previousQuantity; // Restaurar la cantidad anterior
                    $existingProduct->productQuantity -= $product['productQuantitySelected']; // Restar la nueva cantidad
                    $existingProduct->save();
                }

                // Actualizar o crear la relación con la boleta de facturación
                ProductSale::updateOrCreate(
                    [
                        'idbillingOrder' => $billingOrders->idbillingOrder,
                        'idproduct' => $product['idProduct'],
                    ],
                    [
                        'productQuantity' => $product['productQuantitySelected'],
                        'installationRequired' => $product['installationRequired'],
                    ]
                );
        }
        // Eliminar las relaciones que ya no están en la lista actualizada
        $currentProductIds = collect($selectedProducts)->pluck('idProduct')->toArray();
        $deletedProductSales = $existingProductSales->reject(function ($existingProductSale) use ($currentProductIds) {
            return in_array($existingProductSale->idproduct, $currentProductIds);
        });

        foreach ($deletedProductSales as $deletedProductSale) {
            // Obtener el producto eliminado
            $deletedProduct = Product::findOrFail($deletedProductSale->idproduct);
            // Actualizar el inventario sumando la cantidad eliminada
            $deletedProduct->productQuantity += $deletedProductSale->productQuantity;
            $deletedProduct->save();
            // Eliminar la relación
            $deletedProductSale->delete();
        }

        AuditLogs::logActivity(session('idUser'), 'UPDATE_BILLING_ORDER', 
        'Se han actualizado los datos de la boleta de facturación registrada para el cliente:' . ' ' . $customerName);

        // Después de actualizar exitosamente, genera un mensaje de éxito
        Session::flash('updateSuccess', 'Boleta de facturación actualizada exitosamente');
        return redirect()->route('billingOrders.listBillingOrders');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_BillingOrder');
            Session::flash('updateError', 'Ocurrió un error al actualizar la boleta de Facturación: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    /*public function deleteBillingOrder($idbillingOrder) {
        try {
            // Encuentra el registro de la llamada por su ID
            $billingOrder = billingOrders::find($idbillingOrder);
            $customerName = $billingOrder -> customers -> customerFullName;
            if ($billingOrder) {
                // Elimina el registro de la llamada
                // Obtén todos los comentarios asociados a la llamada
            $products = ProductSale::where('idbillingOrder', $idbillingOrder)->get();
            // Elimina los comentarios
            foreach ($products as $product) {
                $product->delete();
            }
            // Elimina la llamada
            $billingOrder->delete();
            AuditLogs::logActivity(session('idUser'), 'DELETE_BILLING_ORDER', 
            'Se ha eliminado el registro la boleta de facturación para el cliente:' . ' ' . $customerName);

            // Devuelve una respuesta exitosa
            return response()->json(['message' => 'La boleta de facturación se eliminó existosamente'], 200);
            }
            else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró la boleta de facturación'], 404);
            }
        } catch (Exception $e) {
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de la boleta: ' . $e->getMessage()], 500);
        }
    }*/

    public function deleteBillingOrder($idbillingOrder) {
        try {
            // Encuentra el registro de la llamada por su ID
            $billingOrder = billingOrders::findorFail($idbillingOrder);
            $customerName = $billingOrder -> customers -> customerFullName;
            if ($billingOrder) {
                // Obtén todos los productos asociados a la boleta de facturación
                $products = ProductSale::where('idbillingOrder', $idbillingOrder)->get();
                // Ajusta el inventario para cada producto
                foreach ($products as $product) {
                    // Encuentra el producto en el inventario
                    $existingProduct = Product::find($product['idproduct']);
                    // Suma la cantidad del producto en la boleta de facturación al inventario
                    $existingProduct->productQuantity += $product['productQuantity'];
                    $existingProduct->save();
                }
                // Elimina los productos asociados a la boleta de facturación
                foreach ($products as $product) {
                    $product->delete();
                }
                // Elimina la boleta de facturación
                $billingOrder->delete();
                AuditLogs::logActivity(session('idUser'), 'DELETE_BILLING_ORDER', 
                'Se ha eliminado el registro la boleta de facturación para el cliente:' . ' ' . $customerName);
                // Devuelve una respuesta exitosa
                return response()->json(['message' => 'La boleta de facturación se eliminó existosamente'], 200);
            }
            else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró la boleta de facturación'], 404);
            }
        } catch (Exception $e) {
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Delete_BillingOrder');
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de la boleta: ' . $e->getMessage()], 500);
        }
     }

    public function showBillingOrder($id)
    {
        //Obtener al usuario a modificar
        $billingOrders = billingOrders::findOrFail($id);
        // Obtener todos los productos asociados a la boleta de facturación
        $selectedProducts = ProductSale::where('idbillingOrder', $billingOrders -> idbillingOrder)->with('products.brands', 'products.models')->get();
        $sellers = $this -> getSeller();
        //Mostrar el formulario de edición con los datos del usuario
        return view('billingOrders.viewBillingOrder', ['billingOrders' => $billingOrders, 'sellers' => $sellers,
        'selectedProducts' => $selectedProducts->toArray()]);
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
