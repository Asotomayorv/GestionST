@extends('layout.fluidNavbar')
@section('viewUser')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Administración</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Usuarios</li>
            </ol>
        </nav>
        <h1 class="m-0">Detalle del Usuario</h1>
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
                <div class="col text-center">
                    <div class="form-group">
                        <div class="card-header__title text-muted mb-2">Correo Electrónico</div>
                            <span class="h4 m-0">{{$user -> userEmail}}</span>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="form-group">
                        <div class="card-header__title text-muted mb-2">Cédula</div>
                            <span class="h4 m-0">{{$user -> userID}}</span>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="form-group">
                        <div class="card-header__title text-muted mb-2 ">Usuario</div>
                            <span class="h4 m-0">{{$user -> systemUser}}</span>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="form-group">
                        <div class="card-header__title text-muted mb-2 ">Fecha de Ingreso</div>
                            <span class="h4 m-0">{{$user -> dateCreation->format('d-m-Y')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="text-right mb-5">
        <a href="{{route('admin.listUsers')}}" class="btn btn-primary ml-3">Regresar</a>
    </div>
</div>

@endsection