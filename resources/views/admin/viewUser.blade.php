@extends('layout.fluidNavbar')
@section('viewUser')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Administración</li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Usuarios</li>
                </ol>
            </nav>
            <h1 class="m-0">Detalles del Usuario</h1>
        </div>
        <a href="{{route('admin.listUsers')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <h4 class="pricing__title mb-0">{{$user -> role -> roleName}}</h4>
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$user -> userName}} {{$user -> userLastName1}} {{$user -> userLastName2}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userID">Cédula</label>
                        <input id="userID" type="text" class="form-control" name="customerID" value="{{$user -> userID}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userSystem">Usuario</label>
                        <input id="userSystem" type="text" class="form-control" name="userSystem" value="{{$user -> systemUser}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group" style="width: 365px">
                        <label for="userEmail">Correo Electrónico</label>
                        <input id="userEmail" type="email" class="form-control" name="userEmail" value="{{$user -> userEmail}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateCreation">Fecha de Ingreso</label>
                        <input id="dateCreation" type="text" class="form-control" name="dateCreation" value="{{$user -> dateCreation->format('d-m-Y')}}" readonly>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="form-group">
                        <div class="card-header__title text-muted mb-2 ">Estado</div>
                        <span class="h6 m-0 badge badge-{{$user -> isUserActive ? 'success' : 'danger'}}">{{$user -> isUserActive ? 'ACTIVO' : 'INACTIVO'}}</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$user -> dateLastEdit->format('d-m-Y')}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$user -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right mb-5">
    <a href="{{route('admin.listUsers')}}" class="btn btn-primary ml-3">Regresar</a>
    <a href="{{route('admin.editUser', ['id' => $user -> idUser])}}" class="btn btn-success ml-3">
        <i class="material-icons">edit</i> Editar Usuario</a>
</div>
@endsection