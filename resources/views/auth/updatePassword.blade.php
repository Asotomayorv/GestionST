@extends('layout.fluidNavbar')
@section('updatePassword')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Cuenta de Usuario</li>
            </ol>
        </nav>
        <h1 class="m-0">Cambiar Contraseña</h1>
    </div>
</div>
<form method="POST" action="{{route('auth.changePassword')}}">
    @csrf
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Cambiar Contraseña</strong></p>
                <p class="text-muted">La nueva contraseña debe tener un mínimo de 8 caracteres entre mayúsculas, minúsculas y números.</p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <div class="form-group">
                    <label for="currentPassword">Contraseña Actual</label>
                    <input style="width: 270px;" id="password" name="password" type="password" class="form-control" placeholder="Contraseña Actual">
                    <span class="invalid-feedback" id="userPassword-error">Ingresa tu contraseña actual para continuar.</span>
                </div>
                <div class="form-group">
                    <label for="newPassword">Nueva Contraseña </label>
                    <input style="width: 270px;" id="newPassword" name="newPassword" type="password" class="form-control" placeholder="Nueva Contraseña">
                    <span class="invalid-feedback" id="newPassword-error">La nueva contraseña no debe estar vacía o no cumple con los requerimientos especificados.</span>
                </div>
                <div class="form-group">
                    <label for="newPassword_confirmation">Confirmar Nueva Contraseña</label>
                    <input style="width: 270px;" id="newPassword_confirmation" name="newPassword_confirmation" type="password" class="form-control" placeholder="Confirmar Nueva Contraseña">
                    <span class="invalid-feedback" id="newPassword_confirmation-error">La confirmación de la contraseña no coincide.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('dashboard')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" class="btn btn-success ml-3">Cambiar Contraseña</button>
    </div>
</form>
<!-- Mensajes al usuario -->
@if (session('password_error'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('password_error') }}", "Error al actualizar");
        });
    </script>
@endif
<!-- Mensajes al usuario -->
@if (session('validationError'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('validationError') }}", "Error de validación");
        });
    </script>
@endif
<script src="{{asset('HTML/dist/assets/js/userFormValidation.js')}}"></script> 
@endsection