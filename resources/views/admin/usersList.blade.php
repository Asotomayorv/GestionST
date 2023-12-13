@extends('layout.fluidNavbar')
@section('usersList')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Administración</li>
                <li class="breadcrumb-item active">Gestión de Usuarios</li>
            </ol>
        </nav>
        <h1 class="m-0">Consulta de Usuarios</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_user">Filtrar por Usuario</label>
                    <input id="filter_user" type="text" class="form-control" placeholder="Nombre de Usuario">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Departamento</label><br>
                    <select id="inlineFormRole" class="custom-select" style="width: 200px;">
                        <option value="Todos">Todos</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Recepcion">Recepcion</option>
                        <option value="Tecnico">Tecnico</option>
                        <option value="Ventas">Ventas</option>
                        <option value="Bodega">Bodega</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="filter_stock">Estado Usuario</label>
                <div class="custom-control custom-checkbox mt-sm-2">
                    <input type="checkbox" class="custom-control-input" id="inlineFormStatus">
                    <label class="custom-control-label" for="inlineFormStatus">Inactivo</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group text-right">
                    <a href="{{route('admin.newUser')}}" class="btn btn-success" style="margin-top: 25px;">Nuevo Usuario 
                        <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" data-url="{{url('admin/refreshUsers')}}" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <!-- <div class="card-header">
        <form class="form-inline">
            <a href="{{route('admin.newUser')}}" class="btn btn-success ml-3">Nuevo Usuario <i class="material-icons">add</i></a>
            <a href="#" id="editSelectedUserButton" data-url="{{url('admin/editUser')}}" class="btn btn-primary ml-3">
                Modificar Usuario <i class="material-icons">edit</i></a>
            <a href="#" id="changeStatusButton" data-url="{{url('admin/changeUserStatus')}}" class="btn btn-warning ml-3">
                Cambiar Estado de Usuario <i class="material-icons">autorenew</i></a>
        </form>
    </div> -->
    <div class="table-responsive border-bottom">
        <div class="table-responsive border-bottom">
            <table id="userTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
                <thead>
                    <tr>
                        <!-- <th style="width: 18px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll">
                                <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                            </div>
                        </th> -->
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Nombre<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">folder_shared</i><span>Usuario<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">group</i><span>Departamento<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">find_replace</i><span>Estado<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">today</i><span>Fecha de Ingreso</span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">today</i><span>Última Edición</span>
                        </th>
                        <th >
                            <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <!-- <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input js-check-selected-row" id="checkbox_{{$user -> idUser}}">
                                <label class="custom-control-label" for="checkbox_{{$user -> idUser}}"><span class="text-hide">Check</span></label>
                            </div>
                        </td> -->
                        <td class="text-center"><span>{{$user -> userName . ' ' . $user -> userLastName1 . ' ' . $user -> userLastName2}}</span></td>
                        <td class="text-center">{{$user -> systemUser}}</td>
                        <td class="text-center"><span class="badge badge-{{$user -> role -> roleName == 'Administrador' ? 'dark' 
                        : ($user -> role -> roleName == 'Recepcion' ? 'secondary' 
                        : ($user -> role -> roleName == 'Tecnico' ? 'primary'
                        : ($user -> role -> roleName == 'Ventas' ? 'info' : 'warning')))}}">{{strtoupper($user -> role -> roleName)}}</span></td>
                        <td class="text-center"><span class="badge badge-{{$user -> isUserActive ? 'success' : 'danger'}}">{{$user -> isUserActive ? 'ACTIVO' : 'INACTIVO'}}</span></td>
                        <td class="text-center">{{$user -> dateCreation->format('d/m/Y')}}</td>
                        <td class="text-center">{{$user -> dateLastEdit->format('d/m/Y')}}</td>
                        <div class="dropdown ml-auto">
                            <td>
                                <!-- <button type="button" class="btn btn-sm btn-outline-primary view-user" data-url="{{route('admin.viewUser', ['id' => $user->idUser])}}">
                                    <i class="material-icons">visibility</i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-warning edit-user" data-url="{{route('admin.editUser', ['id' => $user->idUser])}}">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger change-status" data-id="{{ $user->idUser }}" data-url="{{route('admin.changeUserStatus', ['id' => $user -> idUser])}}">
                                    <i class="material-icons">autorenew</i>
                                </button> -->
                                <a href="{{route('admin.viewUser', ['id' => $user -> idUser])}}" data-caret="false" class="text-muted" title="Ver usuario">
                                    <i class="material-icons">visibility</i></a>
                                <a href="{{route('admin.editUser', ['id' => $user -> idUser])}}" data-caret="false" class="text-muted" title="Editar usuario">
                                    <i class="material-icons">edit</i></a>
                                <a href="{{route('admin.changeUserStatus', ['id' => $user -> idUser])}}" data-id="{{$user -> idUser}}" data-caret="false" class="text-muted" title="Cambiar estado usuario">
                                    <i class="material-icons">autorenew</i></a> 
                            </td>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Mensajes al usuario -->
@if (session('createSuccess'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('createSuccess') }}", "¡Registro Exitoso!");
        });
    </script>
@endif
@if (session('updateSuccess'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('updateSuccess') }}", "¡Actualización Exitosa!");
        });
    </script>
@endif
<script src="{{asset('HTML/dist/assets/js/userFormValidation.js')}}"></script> 
@endsection