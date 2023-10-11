@extends('layout.fluidNavbar')
@section('userRegister')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Administración</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Usuarios</li>
            </ol>
        </nav>
        <h1 class="m-0">Modificar Usuario</h1>
    </div>
</div>
<form method="POST" action="{{route('admin.updateUser', ['id' => $user -> idUser])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el usuario -->
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Información del usuario</strong></p>
                <p class="text-muted">Ingresa los datos del empleado.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group" style="width: 272px;">
                            <label for="userID">Cédula</label>
                            <input id="userID" type="text" class="form-control" name="userID" value="{{$user -> userID}}">
                            <span class="invalid-feedback" id="userID-error">Ingresa la cédula en un formato válido (e.g., 1-2345-6789)</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="userName">Nombre</label>
                            <input id="userName" type="text" class="form-control" name="userName" value="{{$user -> userName}}">
                            <span class="invalid-feedback" id="userName-error">Ingresa un Nombre válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="userLastName1">Primer Apellido</label>
                            <input id="userLastName1" type="text" class="form-control" name="userLastName1" value="{{$user -> userLastName1}}">
                            <span class="invalid-feedback" id="userLastName1-error">Ingresa un Apellido válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="userLastName2">Segundo Apellido</label>
                            <input id="userLastName2" type="text" class="form-control" name="userLastName2" value="{{$user -> userLastName2}}">
                            <span class="invalid-feedback" id="userLastName2-error">Ingresa un Apellido válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="userEmail">Correo Electrónico</label>
                            <input id="userEmail" type="email" class="form-control" name="userEmail" value="{{$user -> userEmail}}">
                            <span class="invalid-feedback" id="userEmail-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="systemUser">Usuario</label>
                            <input id="systemUser" type="text" class="form-control" name="systemUser"  value="{{$user -> systemUser}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group" style="width: 272px;">
                            <label for="idRole">Rol</label><br>
                            <select id="roles" name="idRole" class="custom-select">
                                @foreach ($roles as $role)
                                    <option value="{{$role -> idRole}}" {{$user -> idRole == $role -> idRole ? 'selected' : ''}}>
                                        {{$role -> roleName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('admin.listUsers')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" class="btn btn-success ml-3">Actualizar</a>
    </div>
</form>
<!-- Mensajes al usuario -->
@if (session('updateError'))
<script>
    $(document).ready(function() {
        toastr.success("{{ session('updateError') }}", "Error de Actualización");
    });
</script>
@endif
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="{{asset('HTML/dist/assets/js/userFormValidation.js')}}"></script> 
@endsection