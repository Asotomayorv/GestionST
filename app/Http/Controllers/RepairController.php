<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repairs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\ErrorLogs;
use App\Models\Customers;
use App\Models\ProductRepair;
use App\Models\User;
use App\Models\AuditLogs;
use App\Models\Product;
use App\Models\RepairDetails;
use App\Models\SpareParts;
use Exception;
use Illuminate\Support\Carbon;

class RepairController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showRepairsList()
    {
        $repairs = Repairs::all(); 
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        return view('repairs.listRepairs', ['repairs' => $repairs, 'technicians' => $technicians]);
    }

    public function showProductRepairsList()
    {
        $repairDetails = RepairDetails::all(); 
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        return view('repairs.listProductRepair', ['repairDetails' => $repairDetails, 'technicians' => $technicians]);
    }

    public function getProducts($idCustomer)
    {
        $customer = Customers::findOrFail($idCustomer);
        $productsToRepair = $customer->billingOrders()->with(['productSale.products', 'productSale.products.brands', 'productSale.products.models'])->get();
        return response()->json($productsToRepair);
    }

    public function getProductsToRepair($id)
    {
        // Obtén la orden de facturación
        $repairs = Repairs::findOrFail($id);
        $productsToRepair = $repairs->productRepair()->get();
            //->whereDoesntHave('repairDetails')
        return response()->json($productsToRepair);
    }

    public function showCreateForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $customers = Customers::all();
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        return view('repairs.createRepair', ['customers' => $customers, 'technicians' => $technicians]);
    }

    public function showCreateProductRepairForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $repairs = Repairs::all();
        $products = Product::where('productQuantity', '>', 0)->where('productCategory', 'Repuesto')->get();
        //Muestra el formulario para registrar un cliente usuario
        return View::make('repairs.createProductRepair', ['repairs' => $repairs, 'products' => $products]);
    }

   public function create(Request $request)
    {
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'idCustomer' => ['required', 'integer'],
            'technicianAssigned' => ['required', 'string', 'max:75'],
            'receivingDate' => ['required', 'date'],
            'repairOrigin' => ['required', 'string', 'max:10'],
            'repairType' => ['required', 'string', 'max:15'],
            'repairComments' => ['required', 'string', 'max:200'],
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

        try {
            //Crear al cliente si la validación es exitosa            
            $repairOrder = Repairs::create([
                'idCustomer' => $data['idCustomer'],
                'repairOrigin' => $data['repairOrigin'],
                'repairType' => $data['repairType'],
                'repairComments' => $data['repairComments'],
                'technicianAssigned' => $data['technicianAssigned'],
                'receivingDate' => $data['receivingDate'],
                ]);

            // Después de crear la boleta de facturación con éxito
            foreach ($selectedProducts as $product) {
                // Crear la relación con la boleta de facturación
                ProductRepair::create([
                'idrepair' => $repairOrder->idrepair,
                'productName' => $product['productName'],
                'productBrand' => $product['productBrand'],
                'productModel' => $product['productModel'],
                'productSeries' => $product['productSerie'],
                'productQuantity' => $product['productQuantity'],
                'productDamageComments' => $product['damageProductReport'],
                ]);
            }

            AuditLogs::logActivity(session('idUser'), 'NEW_REPAIR_ORDER', 
            'Se ha registrado una nueva boleta de reparación para el cliente: ' . $customer -> customerFullName);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Boleta de Reparación registrada exitosamente');
            return redirect() -> route('repairs.listRepairs');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_RepairOrder');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar la boleta de reparación: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function showEditForm($id)
    {
        $repair = Repairs::find($id);
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        // Obtener todos los productos asociados a la boleta de facturación
        $selectedProducts = ProductRepair::where('idrepair', $repair -> idrepair)->get();
        return view('repairs.editRepair', ['repair' => $repair, 'technicians' => $technicians, 'selectedProducts' => $selectedProducts->toArray()]);
    }

    public function showEditProductRepairForm($id)
    {
        $repairDetails = RepairDetails::find($id);
        $products = Product::where('productQuantity', '>', 0)->where('productCategory', 'Repuesto')->get();
        // Obtener todos los productos asociados a la boleta de facturación
        $spareParts = SpareParts::where('idRepairDetails', $repairDetails -> idRepairDetails)
        ->with('products.brands', 'products.models')->get();
        return view('repairs.editProductRepair', ['repairDetails' => $repairDetails, 'products' => $products,
        'spareParts' => $spareParts->toArray()]);
    }

    /*public function showCreateProductRepairForm($id)
    {
        $selectedProduct = ProductRepair::findOrFail($id);
        //Obtiene los productos del sistema de la base de datos
        $products = Product::where('productQuantity', '>', 0)->where('productCategory', 'Repuesto')->get();
        // Obtener todos los productos asociados a la boleta de facturación
        //$selectedProducts = ProductRepair::where('idrepair', $repair -> idrepair)->get();
        return view('repairs.editProductRepair', ['selectedProduct' => $selectedProduct, 'products' => $products]);
    }*/

    public function updateRepair(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idCustomer' => ['required', 'integer'],
            'technicianAssigned' => ['required', 'string', 'max:75'],
            'receivingDate' => ['required', 'date'],
            'repairOrigin' => ['required', 'string', 'max:10'],
            'repairType' => ['required', 'string', 'max:15'],
            'repairComments' => ['required', 'string', 'max:200'],
            'repairStatus' => ['required', 'integer'],
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
            $repair = Repairs::findorFail($id);
            $repair -> idCustomer = $request -> input('idCustomer');
            $repair -> repairOrigin = $request -> input('repairOrigin');
            $repair -> repairType = $request -> input('repairType');
            $repair -> repairComments = $request -> input('repairComments');
            $repair -> technicianAssigned = $request -> input('technicianAssigned');
            $repair -> receivingDate = $request -> input('receivingDate');
            $repair -> repairStatus = $request -> input('repairStatus');
            $repair -> dateLastEdit = Carbon::now();
            $repair -> userNameLastEdit = Session::get('systemUser');
            $repair -> save();
            
            // Obtener las relaciones existentes
            $existingProductRepairs = ProductRepair::where('idrepair', $repair->idrepair)->get();
            // Obtener los IDs de los productos existentes
            $existingProductIds = $existingProductRepairs->pluck('idProductRepair')->toArray();
            // Obtener los IDs de los productos seleccionados
            $selectedProductIds = collect($selectedProducts)->pluck('idProductRepair')->filter();
            // Identificar los productos a eliminar
            $productsToDelete = array_diff($existingProductIds, $selectedProductIds->toArray());
            // Eliminar los productos que ya no están presentes
            ProductRepair::whereIn('idProductRepair', $productsToDelete)->delete();

            foreach ($selectedProducts as $product) {
                // Actualizar o crear la relación con la boleta de facturación
                ProductRepair::updateOrCreate(
                    [
                        //'idProductRepair' => $product['idProductRepair'], 
                        'idrepair' => $repair -> idrepair,
                        'productName' => $product['productName'],
                        'productBrand' => $product['productBrand'],
                        'productModel' => $product['productModel'],
                        'productSeries' => $product['productSerie'],
                        'productQuantity' => $product['productQuantity'],
                        'productDamageComments' => $product['damageProductReport'],
                    ],
                    [
                        'productName' => $product['productName'],
                        'productBrand' => $product['productBrand'],
                        'productModel' => $product['productModel'],
                        'productSeries' => $product['productSerie'],
                        'productQuantity' => $product['productQuantity'],
                        'productDamageComments' => $product['damageProductReport'],
                    ]
                );
            }

            AuditLogs::logActivity(session('idUser'), 'UPDATE_REPAIR_ORDER', 
            'Se han actualizado los datos de la boleta de Reparación registrada para el cliente:' . $customer -> customerFullName);

            // Después de actualizar exitosamente, genera un mensaje de éxito
            Session::flash('updateSuccess', 'Boleta de instalación actualizada exitosamente');
            return redirect()->route('repairs.listRepairs');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_RepairOrder');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('UpdateError', 'Ocurrió un error al actualizar los datos de la  boleta de reparación: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function showRepairDetails($id)
    {
        $repair = Repairs::findOrFail($id);
        // Obtener todos los productos asociados a la boleta de facturación
        $selectedProducts = ProductRepair::where('idrepair', $repair -> idrepair)->get();
        return view('repairs.viewRepair', ['repair' => $repair, 'selectedProducts' => $selectedProducts]);
    }

    public function showProductRepairDetails($id)
    {
        // Cambia 'id' por 'idProductRepair' en la consulta
        $repairDetail = RepairDetails::findorFail($id);
        $spareParts = SpareParts::where('idRepairDetails', $repairDetail -> idRepairDetails)->get();
        /* $spareParts = SpareParts::where('idRepairDetails', $repairDetails -> idRepairDetails)
        ->with('products.brands', 'products.models')->get();*/
        return view('repairs.viewProductRepair', ['repairDetail' => $repairDetail, 'spareParts' => $spareParts]);
    }

    public function deleteRepairOrder($id) {
        try {
            // Encuentra el registro de la llamada por su ID
            $repairOrder = Repairs::findorFail($id);
            $customerName = $repairOrder -> customers -> customerFullName;
            if ($repairOrder) {
                // Elimina el registro de la llamada
                // Obtén todos los comentarios asociados a la llamada
            $products = ProductRepair::where('idrepair', $id)->get();
            // Elimina los comentarios
            foreach ($products as $product) {
                $product->delete();
            }
            // Elimina la llamada
            $repairOrder->delete();
            AuditLogs::logActivity(session('idUser'), 'DELETE_REPAIR_ORDER', 
            'Se ha eliminado el registro de boleta de reparación para el cliente:' . ' ' . $customerName);

            // Devuelve una respuesta exitosa
            return response()->json(['message' => 'La boleta de reparación se eliminó existosamente'], 200);
            }
            else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró la boleta de Reparación'], 404);
            }
        } catch (Exception $e) {
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Delete_RepairOrder');
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de la boleta de Reparación: ' . $e->getMessage()], 500);
        }
    }

    public function deleteProductRepairOrder($id) {
        try {
            // Encuentra el registro de la llamada por su ID
            $repairDetail = RepairDetails::findorFail($id);
            $customerName = $repairDetail -> productRepair -> repairOrders -> customers -> customerFullName;
            if ($repairDetail) {
                // Obtén todos los comentarios asociados a la llamada
            $products = SpareParts::where('idRepairDetails', $id)->get();
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
            // Elimina la llamada
            $repairDetail->delete();

            AuditLogs::logActivity(session('idUser'), 'DELETE_REPAIR_DETAIL', 
            'Se ha eliminado el registro de boleta de reparación para el cliente:' . ' ' . $customerName);
            // Devuelve una respuesta exitosa
            return response()->json(['message' => 'El trabajo de reparación se eliminó existosamente'], 200);
            }
            else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró la el trabajo de Reparación'], 404);
            }
        } catch (Exception $e) {
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Delete_RepairDetail');
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el Trabajo de Reparación: ' . $e->getMessage()], 500);
        }
    }

    public function createProductRepair(Request $request)
    {
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'idCustomer' => ['required', 'integer'],
            'repairDetailsComments' => ['required', 'string', 'max:200'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        // Recuperar los datos de los productos desde el campo oculto
        $selectedProducts = json_decode($request->input('productData'), true);
        $customer = Customers::findorFail($request->input('idCustomer'));
        $damagedProduct = ProductRepair::findorFail($request->input('idProductRepair'));

        try{
            //Crear al cliente si la validación es exitosa            
            $productRepair = RepairDetails::create([
                'idProductRepair' => $data['idProductRepair'],
                'repairDetailsComments' => $data['repairDetailsComments'],
                ]);

            if (!empty($selectedProducts)) {
                // Después de crear la boleta de facturación con éxito
                foreach ($selectedProducts as $product) {
                    // Actualizar el inventario restando la cantidad vendida
                    $existingProduct = Product::find($product['idProduct']);
                    $existingProduct->productQuantity -= $product['productQuantitySelected'];
                    $existingProduct->save();

                    // Crear la relación con la boleta de facturación
                    SpareParts::create([
                        'idRepairDetails' => $productRepair->idRepairDetails,
                        'idproduct' => $product['idProduct'],
                        'productQuantity' => $product['productQuantitySelected'],
                    ]);
                }
            }

            AuditLogs::logActivity(session('idUser'), 'NEW_REPAIR_DETAIL', 
            'Se ha registrado un trabajo de reparación para el equipo ' . $damagedProduct -> productName . ' a nombre del cliente: ' . $customer -> customerFullName);

            // Después de actualizar exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Trabajo de Reparación registrado exitosamente');
            return redirect()->route('repairs.listProductRepair');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_RepairOrder');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar el trabajo de reparación: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function updateProductRepair(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idCustomer' => ['required', 'integer'],
            'idProductRepair' => ['required', 'integer'],
            'repairDetailsComments' => ['required', 'string', 'max:200'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }
            
        $customer = Customers::findorFail($request->input('idCustomer'));
        $damagedProduct = ProductRepair::findorFail($request->input('idProductRepair'));

        try{
            $productRepair = RepairDetails::findorFail($id);
            $productRepair -> idProductRepair = $request -> input('idProductRepair');
            $productRepair -> repairDetailsComments = $request -> input('repairDetailsComments');
            $productRepair -> dateLastEdit = Carbon::now();
            $productRepair -> userNameLastEdit = Session::get('systemUser');
            $productRepair -> save();

            // Recuperar los datos de los productos desde el campo oculto
            $selectedSpareParts = json_decode($request->input('productData'), true);

            if (!empty($selectedSpareParts)) {
                foreach ($selectedSpareParts as $product) {
                    $existingProduct = Product::find($product['idProduct']);
                }
                // Obtener las relaciones existentes
                $existingSpareParts = SpareParts::where('idRepairDetails', $productRepair-> idRepairDetails)->get();

                foreach ($selectedSpareParts as $product) {
                    // Actualizar el inventario solo si la cantidad ha cambiado
                    $existingSparePart = $existingSpareParts->firstWhere('idproduct', $product['idProduct']);
                    $previousQuantity = $existingSparePart ? $existingSparePart->productQuantity : 0;

                    if ($previousQuantity != $product['productQuantitySelected']) {
                        // Actualizar el inventario restando la cantidad vendida
                        $existingProduct = Product::findOrFail($product['idProduct']);
                        $existingProduct->productQuantity += $previousQuantity; // Restaurar la cantidad anterior
                        $existingProduct->productQuantity -= $product['productQuantitySelected']; // Restar la nueva cantidad
                        $existingProduct->save();
                    }

                        // Actualizar o crear la relación con la boleta de facturación
                        SpareParts::updateOrCreate(
                            [
                                'idRepairDetails' => $productRepair->idRepairDetails,
                                'idproduct' => $product['idProduct'],
                            ],
                            [
                                'productQuantity' => $product['productQuantitySelected'],
                            ]
                        );
                }
                // Eliminar las relaciones que ya no están en la lista actualizada
                $currentProductIds = collect($selectedSpareParts)->pluck('idProduct')->toArray();
                $deletedSpareParts = $existingSpareParts->reject(function ($existingSpareParts) use ($currentProductIds) {
                    return in_array($existingSpareParts->idproduct, $currentProductIds);
                });

                foreach ($deletedSpareParts as $deletedSparePart) {
                    // Obtener el producto eliminado
                    $deletedProduct = Product::findOrFail($deletedSparePart->idproduct);
                    // Actualizar el inventario sumando la cantidad eliminada
                    $deletedProduct->productQuantity += $deletedSparePart->productQuantity;
                    $deletedProduct->save();
                    // Eliminar la relación
                    $deletedSparePart->delete();
                }
            }
            AuditLogs::logActivity(session('idUser'), 'UPDATE_REPAIR_DETAIL', 
            'Se han actualizado los datos del trabajo de reparación para el equipo ' . $damagedProduct -> productName . ' a nombre del cliente: ' . $customer -> customerFullName);

            // Después de actualizar exitosamente, genera un mensaje de éxito
            Session::flash('updateSuccess', 'Trabajo de reparación actualizado exitosamente');
            return redirect()->route('repairs.listProductRepair');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_RepairOrder');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('UpdateError', 'Ocurrió un error al actualizar el trabajo de reparación: '. $e->getMessage());
            return redirect() -> back();
        }
    }
   
    /*public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');

        // Encuentra el reparo por ID
        $repairToUpdate = Repairs::find($id);

        if ($repairToUpdate) {
            // Actualiza el estado
            $repairToUpdate->repairStatus = ($status == 0) ? 1 : 0;
            $repairToUpdate->save();

            return response()->json(['message' => 'Estado actualizado correctamente']);
        }

        return response()->json(['message' => 'Error al actualizar el estado'], 400);
    }*/

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
