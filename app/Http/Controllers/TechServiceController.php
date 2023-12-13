<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\TechService;
use App\Models\ErrorLogs;
use App\Models\VisitRoutes;
use App\Models\AuditLogs;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class TechServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listTechnicalServices()
    {
        //Obtiene los servicios del sistema de la base de datos
        $techservices = TechService::all();
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        
        //Muestra la vista con el listado de servicios en el sistema
        return View::make('technicalservices.listTechnicalServices', ['techservices' => $techservices, 'technicians' => $technicians]);
    }

    public function showRegistrationForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $routes = VisitRoutes::whereNotIn('routeType', ['Instalación', 'Gira', 'Visita Venta'])
                    ->where('routeStatus', '!=', 'Finalizado')->get();
        //Muestra el formulario para registrar un nuevo techservice
        return View::make('technicalservices.createTechnicalService', ['routes' => $routes]);
    }

    public function showTechService($id)
    {
        //Obtener a la servicio a modificar
        $techservice = TechService::findOrFail($id);
        $techservice->dateCreation = Carbon::parse($techservice->dateCreation);
        $techservice->dateLastEdit = Carbon::parse($techservice->dateLastEdit);
        

        //Mostrar el formulario de edición con los datos de la servicio
        return view('technicalservices.viewTechnicalService', ['techservice' => $techservice]);
    }

    protected function create(Request $request){
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'technicalServiceComments' => ['required', 'string', 'max:200'],
            'technicalServiceEstimateHours' => ['required'],
            'technicalServiceTravelHours' => ['required'],
            'technicalServiceTotalHours' => ['required'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $customer = Customers::findorFail($data['idCustomer']);

        try{
        //Crear el servicio si la validación es exitosa            
        TechService::create([
            'idRoute' => $data['idRoute'],
            'technicalServiceDate' => $data['startDate'],
            'technicalServiceComments' => $data['technicalServiceComments'],
            'technicalServiceEstimateHours' => $data['technicalServiceEstimateHours'],
            'technicalServiceTravelHours' => $data['technicalServiceTravelHours'],
            'technicalServiceTotalHours' => $data['technicalServiceTotalHours'],
            ]);

            AuditLogs::logActivity(session('idUser'), 'NEW_TECHSERVICE_ORDER', 
            'Se ha registrado una nueva boleta de servicio técnico para el cliente: ' . $customer -> customerFullName);

            // Después de crear el servicio exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Boleta de Servicio Técnico registrada exitosamente');
            return redirect() -> route('technicalservices.listTechnicalServices');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_TechService');
            // Si falla al guardar el servicio, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar la bolata de servicio técnico: '. $e->getMessage());
            return redirect() -> back();
        }
    }

    public function showEditForm($id)
    {
        //Obtener a la servicio a modificar
        $techservice = TechService::findOrFail($id);
        //Mostrar el formulario de edición con los datos de la servicio
        return view('technicalservices.editTechnicalService', ['techservice' => $techservice]);
    }

    public function updateTechService(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'technicalServiceComments' => ['required', 'string', 'max:200'],
            'technicalServiceEstimateHours' => ['required'],
            'technicalServiceTravelHours' => ['required'],
            'technicalServiceTotalHours' => ['required'],
        ]);

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $customer = Customers::findorFail($request->input('idCustomer'));

        try{
            //Actualiza los datos del servicio
            $techservice = TechService::findorFail($id);
            $techservice -> idRoute = $request -> input('idRoute');
            $techservice -> technicalServiceComments = $request -> input('technicalServiceComments');
            $techservice -> technicalServiceDate = $request -> input('startDate');
            $techservice -> technicalServiceStatus = $request -> input('technicalServiceStatus');
            $techservice -> technicalServiceEstimateHours = $request -> input('technicalServiceEstimateHours');
            $techservice -> technicalServiceTravelHours = $request -> input('technicalServiceTravelHours');
            $techservice -> technicalServiceTotalHours = $request -> input('technicalServiceTotalHours');
            $techservice -> dateLastEdit = Carbon::now();
            $techservice -> userNameLastEdit = Session::get('systemUser');
            $techservice -> save();

            AuditLogs::logActivity(session('idUser'), 'UPDATE_INSTALL_ORDER', 
            'Se han actualizado los datos de la boleta de Servicio Técnico registrada para el cliente:' . $customer -> customerFullName);

            Session::flash('updateSuccess', 'La boleta de Serivcio Técnico se actualizó exitosamente');
            return redirect() -> route('technicalservices.listTechnicalServices');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_TechService');
            return redirect() -> back();
        }   
    }

    public function deleteTechService($idTechService) {
        try {
            // Encuentra el registro de la servicio por su ID
            $techservice = TechService::find($idTechService);
    
            if ($techservice) {
                // Elimina el registro del servicio
            // Elimina el servicio
            $techservice->delete();
    
                // Devuelve una respuesta exitosa
                return response()->json(['message' => 'El registro del servicio se eliminó existosamente'], 200);
            } else {
                // Devuelve una respuesta de error si no se encuentra el registro del servicio
                return response()->json(['message' => 'No se encontró el registro del servicio'], 404);
            }
        } catch (\Exception $e) {
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de servicio: ' . $e->getMessage()], 500);
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
