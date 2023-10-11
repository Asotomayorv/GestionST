<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Call;
use App\Models\ErrorLogs;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Carbon;

class CallController extends Controller
{
    public function listCalls()
    {
        //Obtiene los usuarios del sistema de la base de datos
        $calls = Call::all();
        //Muestra la vista con el listado de usuarios en el sistema
        return View::make('calls.callsList', ['calls' => $calls]);
    }

    public function showRegistrationForm()
    {
         //Muestra el formulario para registrar un nuevo usuario
        return View::make('calls.callRegister');
    }

    protected function create(Request $request){
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'idCustomer' => ['required', 'integer'],
            'callSubject' => ['required', 'string', 'max:25'],
            'callStatus' => ['required', 'string', 'max:30'],
            'callMarketing' => ['required', 'string', 'max:30'],
            'callComments' => ['required', 'string', 'max:200'],
        ]);

        //Comprueba si la validación falla
        if ($validator -> fails()){
            return redirect() -> back() -> withErrors($validator) -> withInput();
        }

        try{
            //Crear la llamada si la validación es exitosa            
            Call::create([
                'idCustomer' => $data['idCustomer'],
                'callSubject' => $data['callSubject'],
                'callStatus' => $data['callStatus'],
                'callMarketing' => $data['callMarketing'],
                'callComments' => $data['callComments'],
                ]);

                return redirect() -> route('calls.callsList');


            } catch (Exception $e){
                $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Call');
                return redirect() -> route('calls.listCalls');
                /*
                //Mensaje en caso de error al guardar en la base de datos
                Session::flash('error', 'Error al registrar el usuario: ' . $e -> getMessage());
                return redirect() -> back();*/
                /*return redirect() -> back() -> with('error', 'Error al registrar el usuario: ' . $e -> getMessage());*/
            }
    }

    public function showEditForm($id)
    {
        //Obtener a la llamada a modificar
        $call = Call::findOrFail($id);
        //Mostrar el formulario de edición con los datos de la llamada
        return view('calls.callEdit', ['call' => $call]);
    }

    public function updateCall(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'idCustomer' => ['required', 'numeric'],
            'callSubject' => ['required', 'string', 'max:25'],
            'callStatus' => ['required', 'string', 'max:30'],
            'callMarketing' => ['required', 'string', 'max:30'],
            'callComments' => ['required', 'string', 'max:200'],
        ]);

        //Comprueba si la validación falla
        if ($validator -> fails()){
            return redirect() -> route('calls.callEdit', $id) -> withErrors($validator) -> withInput();
        }

        try{
            //Actualiza los datos del usuario
        $call = Call::findorFail($id);
        $call -> idCustomer = $request -> input('idCustomer');
        $call -> callSubject = $request -> input('callSubject');
        $call -> callStatus = $request -> input('callStatus');
        $call -> callMarketing = $request -> input('callMarketing');
        $call -> callComments = $request -> input('callComments');
        $call->dateLastEdit = Carbon::now();
        $call -> save();

        return redirect() -> route('calls.callsList');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Call');
            return redirect() -> route('calls.listCalls');
        }   
    }

    public function deleteCall($idCall) {
        try {
            // Encuentra el registro de la llamada por su ID
            $call = Call::find($idCall);

            // Si la llamada existe, elimínala
            if ($call) {
                $call->delete();
                return response()->json(['mensaje' => 'Llamada eliminada correctamente']);
            } else {
                return response()->json(['mensaje' => 'Llamada no encontrada'], 404);
            }
        } catch (Exception $e) {
            // Manejar cualquier error que ocurra durante la eliminación
            return response()->json(['mensaje' => 'Error al eliminar la llamada: ' . $e->getMessage()], 500);
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
