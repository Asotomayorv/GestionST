<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\ErrorLogs;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use RegistersUsers;

    public function getRoles()
    {
        //Obtiene todos los roles desde la base de datos
        $roles = DB::table('roles') -> get();
        return $roles;
    }
    
    public function listUsers()
    {
        // Obtiene los usuarios del sistema de la base de datos ordenados por fecha de creación de forma descendente
        $users = User::orderBy('dateCreation', 'desc')->get();
        //Muestra la vista con el listado de usuarios en el sistema
        return View::make('admin.usersList', ['users' => $users]);
    }

    /*public function refreshUsers()
    {
        // Obtiene los usuarios del sistema de la base de datos ordenados por fecha de creación de forma descendente
        $users = User::orderBy('dateCreation', 'desc')->get();

        // Formatea los datos para el ajax
        $formattedUsers = $users->map(function ($user) {
            return [
                'userName' => $user->userName,
                'userLastName1' => $user->userLastName1,
                'userLastName2' => $user->userLastName2,
                'systemUser' => $user->systemUser,
                'roleName' => $user->role->roleName,
                'isUserActive' => $user->isUserActive ? 'ACTIVO' : 'INACTIVO',
                'dateCreation' => $user->dateCreation,
                'dateLastEdit' => $user->dateLastEdit,
            ];
        });

        // Devuelve una respuesta JSON con la clave "users" que contiene los datos formateados
        return response()->json(['users' => $formattedUsers]);
    }*/

    public function showUser($id)
    {
        //Obtener el usuario 
        $user = User::findOrFail($id);
        // Asegurarse de que la fecha de creación sea un objeto Carbon
        $user->dateCreation = Carbon::parse($user->dateCreation);
        //Llama la función getRoles para obtener los roles de la base de datos
        $roles = $this -> getRoles();
        //Mostrar los datos del usuario
        return view('admin.viewUser', ['user' => $user, 'roles' => $roles]);
    }

    public function showRegistrationForm()
    {
        //Llama la función getRoles para obtener los roles de base de datos
        $roles = $this -> getRoles();
        //Muestra el formulario para registrar un nuevo usuario
        return View::make('admin.userRegister', ['roles' => $roles]);
    }

    protected function create(Request $request){
        $data = $request -> all();
        //Realizar la validación 
        $validator = Validator::make($data, [
            'userID' => ['required', 'string', 'unique:users'],
            'userName' => ['required', 'string', 'max:25'],
            'userLastName1' => ['required', 'string', 'max:25'],
            'userLastName2' => ['required', 'string', 'max:25'],
            'userEmail' => ['required', 'string', 'email', 'max:35', 'unique:users'],
            'idRole' => ['required', 'integer'],
        ]);

        // Si la validación falla, puedes agregar un mensaje a la sesión
        if ($validator->fails()) {
            Session::flash('validationError', 'Por favor, verifica los datos ingresados.');
            return redirect()->back();
        }

        //Genera el usuario del sistema a partir del nombre (2) y el primer apellido (4)
        $baseSystemuser = strtolower(substr($data['userName'], 0, 2) . substr($data['userLastName1'], 0, 4));

        //Verifica si el nombre de usuario ya existe y agrega un número en caso de ser necesario
        $suffix = 0;
        $systemUser = $baseSystemuser;
        while (User::where('systemUser', $systemUser)->exists()) {
            $suffix++;
            $systemUser = $baseSystemuser . $suffix;
        }

        //Generar una contraseña aleatoria para el usuario
        $password = Str::random(8) . rand(0, 9);

        try{
            //Crear el usuario si la validación es exitosa            
            User::create([
                'userID' => $data['userID'],
                'userName' => $data['userName'],
                'userLastName1' => $data['userLastName1'],
                'userLastName2' => $data['userLastName2'],
                'userEmail' => $data['userEmail'],
                'idRole' => $data['idRole'],
                'systemUser' => $systemUser,
                'userPassword_hash' => Hash::make($password), //Se encripta la contraseña
            ]);

            //Enviar la notificación por correo electrónico al usuario registrado
            Mail::to($data['userEmail'])->send(new \App\Mail\UserCreated($systemUser, $password, $data['userName'],
            $data['userLastName1']));

            // Después de crear el usuario exitosamente, genera un mensaje de éxito
            Session::flash('createSuccess', 'Usuario registrado exitosamente');
            return redirect() -> route('admin.listUsers');

            } catch (Exception $e){
                $this -> logError($e -> getMessage(), $e -> getCode(), 'Create_User');
                // Si falla al guardar el usuario, mostrará un mensaje de error
                Session::flash('createError', 'Ocurrió un error al registrar el usuario: '. $e->getMessage());
                return redirect() -> route('admin.listUsers');
                /*return redirect() -> back();*/
            }
    }

    public function showEditForm($id)
    {
        //Obtener al usuario a modificar
        $user = User::findOrFail($id);
        //Llama la función getRoles para obtener los roles de base de datos
        $roles = $this -> getRoles();
        //Mostrar el formulario de edición con los datos del usuario
        return view('admin.userEdit', ['user' => $user, 'roles' => $roles]);
    }

    public function updateUser(Request $request, $id)
    {
        //Validar los datos del formulario de edición
        $validator = Validator::make($request -> all(), [
            'userID' => ['required', 'string'],
            'userName' => ['required', 'string', 'max:25'],
            'userLastName1' => ['required', 'string', 'max:25'],
            'userLastName2' => ['required', 'string', 'max:25'],
            'userEmail' => ['required', 'string', 'email', 'max:35'],
            'idRole' => ['required', 'integer'],
        ]);

        //Comprueba si la validación falla
        if ($validator -> fails()){
            return redirect() -> route('admin.editUser', $id) -> withErrors($validator) -> withInput();
        }

        try{
            //Actualiza los datos del usuario
            $user = User::findorFail($id);
            $user -> userID = $request -> input('userID');
            $user -> userName = $request -> input('userName');
            $user -> userLastName1 = $request -> input('userLastName1');
            $user -> userLastName2 = $request -> input('userLastName2');
            $user -> userEmail = $request -> input('userEmail');
            $user -> idRole = $request -> input('idRole');
            $user-> dateLastEdit = Carbon::now();
            $user -> save();

            // Después de modificar el usuario exitosamente, genera un mensaje de éxito
            Session::flash('updateSuccess', 'El usuario ha sido actualizado exitosamente');
            return redirect() -> route('admin.listUsers');

        } catch (Exception $e){
                $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_User');
                // Si falla al modificar el usuario, mostrará un mensaje de error
                Session::flash('updateError', 'Ocurrió un error al actualizar el usuario: '. $e->getMessage());
                return redirect() -> back();
            }
    }

    public function changeUserStatus($id){
        try{
            //Buscar el usuario en la base de datos
            $user = User::findorFail($id);
            //Cambia el estado del usuario y lo guarda
            $user -> isUserActive = !$user -> isUserActive;
            $user->dateLastEdit = Carbon::now();
            $user -> save();
            Session::flash('updateSuccess', 'El usuario ha sido actualizado exitosamente');
            return redirect() -> route('admin.listUsers');

        } catch (Exception $e){
            $this -> logError($e -> getMessage(), $e -> getCode(), 'Update_User');
            // Si falla al modificar el usuario, mostrará un mensaje de error
            Session::flash('updateError', 'Ocurrió un error al actualizar el usuario: '. $e->getMessage());
            return redirect() -> back();
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
