<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\VisitRoutes;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\ErrorLogs;
use App\Models\AuditLogs;
use App\Models\Customers;
use Illuminate\Support\Carbon;
use Exception;


class VisitRoutesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listRoutes()
    {
        $routes = VisitRoutes::all();
        $technicians = User::whereHas('role', function ($query) {
            $query->where('idRole', 3);
        })->get();
        //Muestra la vista con el listado de usuarios en el sistema
        return View::make('routes.listRoutes', ['routes' => $routes, 'technicians' => $technicians]);
    }

    public function showEvents()
    {
        // Obtiene las rutas del sistema de la base de datos
        $routes = VisitRoutes::all();

        // Crea un array para almacenar los eventos de las rutas
        $events = [];
        // Recorre las rutas y crea un evento para cada una
        foreach ($routes as $route) {
            $event = [
                'title' => $route -> customers -> customerFullName, // Título del evento (puedes usar cualquier campo de la ruta)
                'customer' => $route -> customers -> customerContact,
                'idCustomer' => $route -> customers -> idCustomer,
                'start' => $route-> startDate, // Fecha y hora de inicio del evento
                'end' => $route-> endDate, // Fecha y hora de fin del evento
                'startTime' => $route -> startTime, // Fecha y hora de inicio del evento
                'endTime' => $route -> endTime, 
                'idRoute' => $route -> idroute,
                'routeStatus' => $route->routeStatus,
                'routeType' => $route->routeType,
                'technician' => $route -> routeTechnicianAssigned,
                'routePriority' => $route -> routePriority,
                'routeAddress' => $route -> routeAddress,
                'routeProvince' => $route -> provinces -> idProvince,
                'routeCanton' => $route -> cantons -> idCanton,
                'routeDistrict' => $route -> districts -> idDistrict,
                'routeComments' => $route -> routeComments,
                /*'start' => $route->startDate . 'T' . $route->startTime, // Fecha y hora de inicio del evento
                'end' => $route->endDate . 'T' . $route->endTime, // Fecha y hora de fin del evento*/
                // Otros campos del evento...
            ];
            // Agrega el evento al array de eventos
            $events[] = $event;
        }

        // Devuelve los eventos en formato JSON
        return response()->json($events);
    }

    protected function create(Request $request){
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'idCustomer' => ['required', 'integer'],
            'routeType' => ['required', 'string', 'max:15'],
            'routePriority' => ['required', 'string', 'max:5'],
            'routeTechnicianAssigned' => ['required', 'string', 'max:75'],
            'routeAddress' => ['required', 'string', 'max:300'],
            'routeComments' => ['required', 'string', 'max:600'],
            'province' => ['required', 'integer'],
            'canton' => ['required', 'integer'],
            'distric' => ['required', 'integer'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
            'startTime' => ['required'],
            'endTime' => ['required'],
        ]);
    
        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $customer = Customers::findorFail($data['idCustomer']);
    
        try{
            // Formatear las fechas
            $startDate = date('Y-m-d', strtotime($data['startDate']));
            $endDate = date('Y-m-d', strtotime($data['endDate']));
            $startTime = date('H:i:s', strtotime($data['startTime']));
            $endTime = date('H:i:s', strtotime($data['endTime']));

            VisitRoutes::create([
                'idCustomer' => $data['idCustomer'],
                'routeType' => $data['routeType'],
                'routePriority' => $data['routePriority'],
                'routeTechnicianAssigned' => $data['routeTechnicianAssigned'],
                'routeStatus' => 'Pendiente',
                'routeAddress' => $data['routeAddress'],
                'routeComments' => $data['routeComments'],
                'idProvince' => $data['province'],
                'idCanton' => $data['canton'],
                'idDistrict' => $data['distric'],
                'startDate' => $startDate,
                'endDate' => $endDate,
                'startTime' => $startTime,
                'endTime' => $endTime,
                ]);
    
                AuditLogs::logActivity(session('idUser'), 'NEW_ROUTE', 
                'Se ha registrado una nueva Ruta para el cliente: ' . $customer -> customerFullName . ' para ' . $data['routeType']);
    
                // Después de crear el usuario exitosamente, genera un mensaje de éxito
                Session::flash('createSuccess', 'Ruta agendada exitosamente');
                return redirect() -> route('routes.listRoutes');
    
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Route');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al agendar la ruta: '. $e->getMessage());
            return redirect() -> route('routes.listRoutes');
        }
    }

    public function updateRoute(Request $request, $id){
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idCustomer' => ['required', 'integer'],
            'routeType' => ['required', 'string', 'max:15'],
            'routeStatus' => ['required', 'string', 'max:10'],
            'routePriority' => ['required', 'string', 'max:5'],
            'routeTechnicianAssigned' => ['required', 'string', 'max:75'],
            'modifyRouteAddress' => ['required', 'string', 'max:300'],
            'modifyRouteComments' => ['required', 'string', 'max:600'],
            'modifyProvince' => ['required', 'integer'],
            'modifyCanton' => ['required', 'integer'],
            'modifyDistric' => ['required', 'integer'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
            'startTime' => ['required'],
            'endTime' => ['required'],
        ]);
    
        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            /*$errors = $validator->errors()->all();
             Llamar a la función para guardar errores en la base de datos
            $this->logSystemError($errors, 'VALIDATION_ERROR', 'Update_Route');*/
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $customer = Customers::findorFail($request -> input('idCustomer'));
    
        try{
            // Formatear las fechas
            $startDate = date('Y-m-d', strtotime($request -> input('startDate')));
            $endDate = date('Y-m-d', strtotime($request -> input('endDate')));
            $startTime = date('H:i:s', strtotime($request -> input('startTime')));
            $endTime = date('H:i:s', strtotime($request -> input('endTime')));

            $route = VisitRoutes::findorFail($id);
            $route -> idCustomer = $request -> input('idCustomer');
            $route -> routeType = $request -> input('routeType'); 
            $route -> routePriority = $request -> input('routePriority');
            $route -> routeTechnicianAssigned = $request -> input('routeTechnicianAssigned');
            $route -> routeStatus = $request -> input('routeStatus');
            $route -> routeAddress = $request -> input('modifyRouteAddress');
            $route -> routeComments = $request -> input('modifyRouteComments');
            $route -> idProvince = $request -> input('modifyProvince');
            $route -> idCanton = $request -> input('modifyCanton');
            $route -> idDistrict = $request -> input('modifyDistric');
            $route -> startDate = $startDate;
            $route -> endDate = $endDate;
            $route -> startTime = $startTime;
            $route -> endTime = $endTime;
            $route -> userNameLastEdit = Session::get('systemUser');
            $route -> dateLastEdit = Carbon::now();
            $route -> save();

            AuditLogs::logActivity(session('idUser'), 'UPDATE_ROUTE', 
            'Se han actualizado los datos de la ruta para el cliente : ' . $customer -> customerFullName);

            // Después de modificar el usuario exitosamente, genera un mensaje de éxito
            Session::flash('updateSuccess', 'La ruta ha sido actualizada exitosamente');
            return redirect() -> route('routes.listRoutes');
    
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_Route');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al agendar la ruta: '. $e->getMessage());
            return redirect() -> route('routes.listRoutes');
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

    private function logSystemError($errors, $errorCode, $errorSource)
    {
        foreach ($errors as $error) {
            ErrorLogs::create([
                'errorMessage' => $error,
                'errorCode' => $errorCode,
                'errorSource' => $errorSource,
            ]);
        }
    }
}
