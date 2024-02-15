<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ErrorLogs;
use App\Models\AuditLogs;
use App\Models\User;
use App\Mail\ResetPasswordEmail;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
        // Otros constructores o configuraciones que puedas tener
    }*/

    
    public function index()
    {
        //Valida si el usuario ya está logueado
        if (Auth::check()) {
            // Si está logado le mostramos la vista de logados
            return redirect()->route('dashboard');
	    }
        return view('auth.login');
    }

    public function forgotPassword()
    {
        //Muestra la vista para ¿Olvidó su contraseña?
        return view('auth.forgotPassword');
    }

    //Comprueba que el correo que el usuario proporciona es real y activo
    public function checkUserEmail(Request $request)
    {
        $userEmail = $request->input('userEmail');
        //Verifica si el correo existe y está asociado a un usuario activo en la BD
        $user = User::where('userEmail', $userEmail)->where('isUserActive', true)->first();
        if($user)
        {
            return response()->json(['exists' => true, 'isActive' => true]);
        }
        return response()->json(['exists' => false, 'isActive' => false]);
    }

    public function login(Request $request)
    {
        try {
            // Valida del lado del servidor el usuario y la contraseña
            $this->validate($request, [
                'systemUser' => 'required',
                'password' => 'required',
            ]);

            // Obtiene el usuario de la BD
            $user = User::where('systemUser', $request->systemUser)->first();

            // Realiza la verificación adicional del estado del usuario
            if ($user) {
                if ($user->isUserActive) {
                    // Usuario activo, verifica la contraseña
                    if (password_verify($request->password, $user->userPassword_hash)) {
                        // Contraseña correcta, inicia sesión
                        Auth::login($user);

                        // Guarda nombre, apellido y rol del usuario en variables de sesión
                        session([
                            'idUser' => $user->idUser,
                            'systemUser' => $user->systemUser,
                            'userName' => $user->userName,
                            'userLastName1' => $user->userLastName1,
                            'userRole' => $user->role->roleName,
                        ]);

                        AuditLogs::logActivity($user->idUser, 'USER_LOGIN', 
                            'El usuario ' . $user->userName .  ' ' . $user->userLastName1 . ' ' . $user->userLastName2 . ' inició sesión en el sistema.');

                        return redirect()->route('dashboard');
                    } else {
                        // Contraseña incorrecta
                        return redirect()->back()->with('failedLogin', true);
                    }
                } else {
                    // Usuario inactivo
                    return redirect()->back()->with('inactiveUser', true);
                }
            }
            // Credenciales incorrectas
            return redirect()->back()->with('failedLogin', true);
        } catch (Exception $e) {
            $this->logError($e->getMessage(), $e->getCode(), 'Auth_User');
            // Manejar la excepción, puedes registrarla o redirigir a una página de error
            return redirect()->back()->with('failedLogin', true);
        }
    }


    public function resetAccount(Request $request)
    {
        try{
            //Obtiene el correo electrónico que ingresa el usuario
            $userEmail = $request->input('recoverUserEmail');
            $user = User::where('userEmail', $userEmail)->first();  
            // Genera un token de restablecimiento de contraseña
            $resetToken = Str::random(60);
            // Actualiza el campo userToken en la base de datos con el nuevo token
            $user->userToken = $resetToken;
            $user->save();
            // Crea el enlace de restablecimiento de contraseña
            $resetLink = route('auth.showChangePasswordForm', ['token' => $resetToken]);
            // Envía el correo electrónico con el enlace
            Mail::to($userEmail)->send(new ResetPasswordEmail($resetLink, $user->userName, $user->userLastName1));
            // Redirige de regreso a la vista del formulario
            return redirect()->back()->with('email_sent', true);
        } catch(Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'SendResetEmail_User');
            return redirect()->back()->with('email_sent', false);
        }
    }

    public function showUpdatePasswordForm()
    {
        //Muestra el formulario para el cambio de contraseña
        return view('auth.updatePassword');
    }

    public function showChangePasswordForm($token)
    {
        //Muestra el formulario para el reestablecimiento de contraseña
        return view('auth.changePassword', ['token' => $token]);
    }

    public function changePassword(Request $request)
    {
        try {
            // Definir reglas de validación
            $rules = [
                'password' => ['required'],
                'newPassword' => ['required', 'min:8', 'confirmed'],
            ];
            // Realizar la validación
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                // Redireccionar de vuelta con errores de validación
                Session::flash('validationError', 'Las contraseña ingresa es incorrecta o la confirmación no coincide.');
                return redirect()->back();
            }

            //Obtiene los datos del usuario que está logueado
            $currentUser = session('idUser');
            $currentPassword = $request->input('password');
            //Se obtiene al usuario de la base de datos
            $user = User::where('idUser', $currentUser)->first();
            //Si la contraseña actual es correcta, permite el cambio de contraseña
            if($user && password_verify($currentPassword, $user->userPassword_hash)){
                $user->userPassword_hash = Hash::make($request->input('newPassword'));
                $user->dateLastEdit = Carbon::now();
                $user->save();
                //Session::flash('passwordSucess', 'La contraseña se cambió con éxito.');
                return redirect()->route('dashboard')->with('password_success', 'La contraseña se cambió con éxito.');
            }
            Session::flash('passwordValidation_error', 'La contraseña actual es incorrecta.');
            return redirect()->back();
        } catch (Exception $e) {
            // Manejar la excepción, puedes registrarla o redirigir a una página de error
            $this -> logError($e -> getMessage(), $e -> getCode(), 'ChangePassword_User');
            Session::flash('password_error', 'Ocurrió un error al cambiar la contraseña.');
            return redirect()->back();
            //return back()->with('error', 'Ocurrió un error al cambiar la contraseña.');
        }
    }

    public function resetPassword(Request $request)
    {
        // Definir reglas de validación
        $rules = [
            'newPassword' => ['required', 'min:8', 'confirmed'],
            'newPassword_confirmation' => ['required'],
        ];
        // Realizar la validación
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // Redireccionar de vuelta con errores de validación
            Session::flash('validationError', 'Las contraseña ingresada es incorrecta o la confirmación no coincide.');
            return redirect()->back();
        }
        // Verificar si el token es válido y obtener el usuario asociado
        $user = User::where('userToken', $request->input('token'))->first();
        if (!$user) {
            Session::flash('tokenError', 'Token Inválido');
            return redirect()->back();
        }
        // Actualizar la contraseña del usuario
        $user->userPassword_hash = Hash::make($request->input('newPassword'));
        $user->userToken = null; // Marcar el token como utilizado
        $user->save();
        return redirect()->route('auth.login')->with('passwordReset', true);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        AuditLogs::logActivity(session('idUser'), 'USER_LOGOUT', 
        'El usuario ' . session('userName') .  ' ' . session('userLastName1') . ' cerró sesión del sistema.');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        return redirect()->route('auth.login');
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
