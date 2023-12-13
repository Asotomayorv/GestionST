<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Call;
use App\Models\Customers;
use App\Models\ErrorLogs;
use App\Models\AuditLogs;
use App\Models\CommentsCall;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listCalls()
    {
        //Obtiene los usuarios del sistema de la base de datos
        $calls = Call::all();
        
        //Muestra la vista con el listado de usuarios en el sistema
        return View::make('calls.callsList', ['calls' => $calls]);
    }

    public function showRegistrationForm()
    {
        //Obtiene los clientes del sistema de la base de datos
        $customers = Customers::all();
        //Muestra el formulario para registrar un nuevo usuario
        return View::make('calls.callRegister', ['customers' => $customers]);
    }

    public function showRegistrationFormId($id)
    {
        //Obtiene los clientes del sistema de la base de datos
        $customer = Customers::findOrFail($id);
        //Muestra el formulario para registrar un nuevo usuario
        return View::make('calls.callRegisterId', ['customer' => $customer]);
    }

    public function showCall($id)
    {
        //Obtener a la llamada a modificar
        $call = Call::findOrFail($id);
        $call->dateCreation = Carbon::parse($call->dateCreation);
        $call->dateLastEdit = Carbon::parse($call->dateLastEdit);
        //Obtener a la llamada a modificar
        $commentsCall = CommentsCall::where('idCall', $id)->get();

        $formattedComment = $commentsCall->map(function ($commentsCall) {
            $commentsCall->dateCreation = Carbon::parse($commentsCall->dateCreation);
            return $commentsCall;
        });
        //Mostrar el formulario de edición con los datos de la llamada
        return view('calls.viewCall', ['call' => $call, 'commentsCall' => $formattedComment]);
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

        // Si la validación falla, se envía un  mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        $customer = Customers::findorFail($data['idCustomer']);

        try{
        //Crear la llamada si la validación es exitosa            
        Call::create([
            'idCustomer' => $data['idCustomer'],
            'callSubject' => $data['callSubject'],
            'callStatus' => $data['callStatus'],
            'callMarketing' => $data['callMarketing'],
            'callComments' => $data['callComments'],
            ]);

            AuditLogs::logActivity(session('idUser'), 'NEW_CALL', 
            'Se ha registrado una nueva llamada para el cliente: ' . $customer -> customerFullName . ' por ' . $data['callSubject']);

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Llamada registrada exitosamente');
            return redirect() -> route('calls.callsList');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Call');
            // Si falla al guardar el usuario, mostrará un mensaje de error
            Session::flash('createError', 'Ocurrió un error al registrar el cliente: '. $e->getMessage());
            return redirect() -> route('calls.newCall');
        }
    }

    public function showEditForm($id)
    {
        //Obtener a la llamada a modificar
        $call = Call::findOrFail($id);
        //Obtener a la llamada a modificar
        $commentsCall = CommentsCall::where('idCall', $id)->get();

        $formattedComment = $commentsCall->map(function ($commentsCall) {
            $commentsCall->dateCreation = Carbon::parse($commentsCall->dateCreation);
            return $commentsCall;
        });
        //Mostrar el formulario de edición con los datos de la llamada
        return view('calls.callEdit', ['call' => $call, 'commentsCall' => $formattedComment]);
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
        $customerName = $call -> customers -> customerFullName;
        $call -> idCustomer = $request -> input('idCustomer');
        $call -> callSubject = $request -> input('callSubject');
        $call -> callStatus = $request -> input('callStatus');
        $call -> callMarketing = $request -> input('callMarketing');
        $call -> callComments = $request -> input('callComments');
        $call -> dateLastEdit = Carbon::now();
        $call -> userNameLastEdit = Session::get('systemUser');
        $call -> save();

        AuditLogs::logActivity(session('idUser'), 'UPDATE_CALL', 
        'Se han actualizado los datos de la llamada registrada para el cliente:' . ' ' . $customerName);

        Session::flash('updateSuccess', 'La llamada se actualizó exitosamente');
        return redirect() -> route('calls.callsList');
        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_Call');
            Session::flash('updateError', 'Ocurrió un error al actualizar el registro de llamada: '. $e->getMessage());
            return redirect() -> back();
        }   
    }

    public function createCommentCall(Request $request)
    {
        //Validar los datos del formulario
        $validatedData = $request->validate([
            'idCall' => ['required', 'integer'],
            'commentCall' => ['required', 'string', 'max:200'],
        ]);
    
        // Crear un nuevo objeto de cliente con los datos validados
        $newCommentCall = new CommentsCall();
        $newCommentCall->idCall = $request->idCall;
        $newCommentCall->commentCall = $request->commentCall;
        $newCommentCall->userNameLastEdit = Session::get('systemUser');
        // Guardar el cliente en la base de datos
        $newCommentCall->save();
        // Devolver una respuesta JSON con un mensaje de éxito
        return response()->json(['message' => 'Nuevo comentario añadido a la llamada con éxito']);
    }

    public function deleteCall($idCall) {
        try {
            // Encuentra el registro de la llamada por su ID
            $call = Call::find($idCall);
            $customerName = $call -> customers -> customerFullName;
    
            if ($call) {
                // Elimina el registro de la llamada
                // Obtén todos los comentarios asociados a la llamada
            $comments = CommentsCall::where('idCall', $idCall)->get();

            // Elimina los comentarios
            foreach ($comments as $comment) {
                $comment->delete();
            }

            // Elimina la llamada
            $call->delete();

            AuditLogs::logActivity(session('idUser'), 'DELETE_CALL', 
            'Se ha eliminado el registro de llamada para el cliente:' . ' ' . $customerName);
    
                // Devuelve una respuesta exitosa
                return response()->json(['message' => 'El registro de la llamada se eliminó existosamente'], 200);
            } else {
                // Devuelve una respuesta de error si no se encuentra el registro de la llamada
                return response()->json(['message' => 'No se encontró el registro de la llamada'], 404);
            }
        } catch (\Exception $e) {
            // Devuelve una respuesta de error si ocurre una excepción
            return response()->json(['message' => 'Ocurrió un error al intentar eliminar el registro de llamada: ' . $e->getMessage()], 500);
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
