<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\ErrorLogs;
use App\Models\AuditLogs;
use App\Models\Brands;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getSuppliers()
    {
        //Obtiene solo los proveedores activos desde la base de datos
        $suppliers = DB::table('suppliers')->where('isSupplierActive', 1)->get();
        return $suppliers;
    }


    public function getModels($id)
    {
        $models = DB::table('models')->where('idBrand', $id)->get();
        return response()->json($models);
    }
    
    public function listProducts()
    {
        //Obtiene los productos del sistema de la base de datos
        $products = Product::all();
        $brands = Brands::all();
        //Muestra la vista con el listado de productos en el sistema
        return View::make('products.productsList', ['products' => $products, 'brands' => $brands]);
    }

    public function showRegistrationForm()
    {
        $brands = DB::table('brands')->get();
        $suppliers = $this -> getSuppliers();
        //Muestra el formulario para registrar un nuevo producto
        return View::make('products.productRegister', ['suppliers' => $suppliers, 'brands' => $brands]);
    }

    /* Función para convertir valores monetarios a valores numéricos
    protected function convertCurrencyToNumeric($value)
    {
        // Eliminar símbolos de moneda y espacios en blanco, y convertir a un número flotante
        return (float)str_replace(['$', '₡', ',', ' '], '', $value);
    }*/

    protected function create(Request $request){
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'idSupplier' => ['required', 'integer'],
            'productCode' => ['required', 'string', 'max:15', 'unique:products'],
            'productCategory' => ['required', 'string', 'max:30'],
            'productName' => ['required', 'string', 'max:45'],
            'productBrand' => ['required', 'string', 'max:15'],
            'productModel' => ['required', 'string', 'max:25'],
            'productExchangeRateCost' => ['required', 'numeric'],
            'productExchangeRateSale' => ['required', 'numeric'],
            'productCostDollars' => ['required', 'numeric'],
            'productSaleDollars' => ['required', 'numeric'],
            'productCostColones' => ['required', 'numeric'],
            'productSaleColones' => ['required', 'numeric'],
            'productProfitPercentage' => ['required', 'numeric'],
            'productDescription' => ['required', 'string', 'max:200'],
            'productQuantity' => ['required', 'integer'],
            'minimumProduct' => ['required', 'integer'],
            'maximumProduct' => ['required', 'integer'],
            'productLocation1' => ['required', 'string', 'max:10'],
        ]);

         // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        try{
            if (isset($data['productSeries'])) {
                $productSeries = $data['productSeries'];
            } else {
                $productSeries = null;
            }
        /* Convertir los valores de moneda a números
        $productExchangeRateCost = $this->convertCurrencyToNumber($data['productExchangeRateCost']);
        $productExchangeRateSale = $this->convertCurrencyToNumber($data['productExchangeRateSale']);
        $productCostDollars = $this->convertCurrencyToNumber($data['productCostDollars']);
        $productSaleDollars = $this->convertCurrencyToNumber($data['productSaleDollars']);
        $productCostColones = $this->convertCurrencyToNumber($data['productCostColones']);
        $productSaleColones = $this->convertCurrencyToNumber($data['productSaleColones']);
        $productProfitPercentage = $this->convertCurrencyToNumber($data['productProfitPercentage']);*/

        // Crear el producto si la validación es exitosa
        Product::create([
            'idSupplier' => $data['idSupplier'],
            'productCode' => $data['productCode'],
            'productCategory' => $data['productCategory'],
            'productName' => $data['productName'],
            'productSeries' => $productSeries,
            'productBrand' => $data['productBrand'],
            'productModel' => $data['productModel'],
            'productExchangeRateCost' => /*$this->convertCurrencyToNumeric*/($data['productExchangeRateCost']),
            'productExchangeRateSale' => /*$this->convertCurrencyToNumeric*/($data['productExchangeRateSale']),
            'productCostDollars' => /*$this->convertCurrencyToNumeric*/($data['productCostDollars']),
            'productSaleDollars' => /*$this->convertCurrencyToNumeric*/($data['productSaleDollars']),
            'productCostColones' => /*$this->convertCurrencyToNumeric*/($data['productCostColones']),
            'productSaleColones' => /*$this->convertCurrencyToNumeric*/($data['productSaleColones']),
            'productProfitPercentage' => $data['productProfitPercentage'],
            'productDescription' => $data['productDescription'],
            'productQuantity' => $data['productQuantity'],
            'minimumProduct' => $data['minimumProduct'],
            'maximumProduct' => $data['maximumProduct'],
            'productLocation1' => $data['productLocation1'],
            'productLocation2' => $data['productLocation2'],
            ]);

            AuditLogs::logActivity(session('idUser'), 'NEW_PRODUCT', 
            'Se ha registrado un nuevo producto: ' . $data['productName']);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'El Producto/Equipo ha sido registrado exitosamente');
            return redirect() -> route('products.productsList');

            } catch (Exception $e){
                $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Product');
                Session::flash('createError', 'Ocurrió un error al registrar el producto/equipo: '. $e->getMessage());
                return redirect() -> route('products.newProduct');
            }
    }

    public function showEditForm($id)
    {
        //Obtener a el producto a modificar
        $product = Product::findOrFail($id);
        $brands = DB::table('brands')->get();
        $suppliers = $this -> getSuppliers();
        //Mostrar el formulario de edición con los datos de el producto
        return view('products.productEdit', ['product' => $product, 'suppliers' => $suppliers, 'brands' => $brands]);
    }

    public function updateProduct(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idSupplier' => ['required', 'integer'],
            'productCode' => ['required', 'string', 'max:15'],
            'productCategory' => ['required', 'string', 'max:30'],
            'productName' => ['required', 'string', 'max:45'],
            'modifyProductBrand' => ['required', 'string', 'max:15'],
            'productModel' => ['required', 'string', 'max:25'],
            'productExchangeRateCost' => ['required', 'numeric'],
            'productExchangeRateSale' => ['required', 'numeric'],
            'productCostDollars' => ['required', 'numeric'],
            'productSaleDollars' => ['required', 'numeric'],
            'productCostColones' => ['required', 'numeric'],
            'productSaleColones' => ['required', 'numeric'],
            'productProfitPercentage' => ['required', 'numeric'],
            'productDescription' => ['required', 'string', 'max:200'],
            'productQuantity' => ['required', 'integer'],
            'minimumProduct' => ['required', 'integer'],
            'maximumProduct' => ['required', 'integer'],
            'productLocation1' => ['required', 'string', 'max:10'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        try{
            //Actualiza los datos del producto
            $product = Product::findorFail($id);
            $product -> idSupplier = $request -> input('idSupplier');
            $product -> productCode = $request -> input('productCode');
            $product -> productCategory = $request -> input('productCategory');
            $product -> productName = $request -> input('productName');
            // Validar si el campo productSeries tiene información o es nulo
            if (isset($request->productSeries)) {
                $product->productSeries = $request->productSeries;
            } else {
                $product->productSeries = null;
            }
            $product -> productBrand = $request -> input('modifyProductBrand');
            $product -> productModel = $request -> input('productModel');
            $product -> productExchangeRateCost = $request -> input('productExchangeRateCost');
            $product -> productExchangeRateSale = $request -> input('productExchangeRateSale');
            $product -> productCostDollars = $request -> input('productCostDollars');
            $product -> productSaleDollars = $request -> input('productSaleDollars');
            $product -> productCostColones = $request -> input('productCostColones');
            $product -> productSaleColones = $request -> input('productSaleColones');
            $product -> productProfitPercentage = $request -> input('productProfitPercentage');
            $product -> productDescription = $request -> input('productDescription');
            $product -> productQuantity = $request -> input('productQuantity');
            $product -> minimumProduct = $request -> input('minimumProduct');
            $product -> maximumProduct = $request -> input('maximumProduct');
            $product -> productLocation1 = $request -> input('productLocation1');
            $product -> productLocation2 = $request -> input('productLocation2');
            $product -> userNameLastEdit = Session::get('systemUser');
            $product->dateLastEdit = Carbon::now();
            $product -> save();

            AuditLogs::logActivity(session('idUser'), 'EDIT_PRODUCT', 
            'Se han actualizado los datos del producto: ' . $product -> productName);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('updateSuccess', 'El Producto/Equipo se ha actualizado exitosamente');
            return redirect() -> route('products.productsList');
            
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_Product');
            // Si falla al modificar el usuario, mostrará un mensaje de error
            Session::flash('updateError', 'Ocurrió un error al actualizar el producto: '. $e->getMessage());
            return redirect() -> back();
        }   
    }

    public function productView($id)
    {
        // Obtiene el producto por su ID desde la base de datos
        $product = Product::find($id);
        $brands = DB::table('brands')->get();
        $suppliers = $this -> getSuppliers();

        // Verifica si el producto existe
        if (!$product) {
            abort(404); // Devuelve el 404 si no hay un producto con el ID
        }

        // Pasa el producto a la vista y muestra los detalles
        return view('products.productView', ['product' => $product, 'brands' => $brands, 'suppliers' => $suppliers]);
    }

    public function deleteProduct($idProduct) {
        try {
            // Encuentra el registro de el producto por su ID
            $product = Product::find($idProduct);
            $productName = $product -> productName;

            // Si el producto existe, elimínala
            if ($product) {
                $product->delete();
                AuditLogs::logActivity(session('idUser'), 'DELETE_PRODUCT', 
                'Se ha eliminado el producto: ' . $productName);
                // Devuelve una respuesta exitosa
                return response()->json(['message' => 'El producto se eliminó existosamente'], 200);
            } else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró el producto'], 404);
            }
        } catch (Exception $e) {
            // Manejar cualquier error que ocurra durante la eliminación
            return response()->json(['mensaje' => 'Ocurrió un error al intentar eliminar el producto: ' . $e->getMessage()], 500);
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
