@extends('layout.fluidNavbar')
@section('systemLogs')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Administración</li>
            </ol>
        </nav>
        <h1 class="m-0">Bitácora del Sistema</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Empleado</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Empleado">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Evento</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Todos</option>
                        <option value="all">Nuevo Registro</option>
                        <option value="all">Registro Editado</option>
                        <option value="all">Registro Eliminado</option>
                        <option value="all">Error Inesperado</option>
                        <option value="all">Acceso al sistema</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group" style="width: 200px;">
                    <label for="filter_date">Filtrar por Fecha</label>
                    <input id="filter_date" type="text" class="form-control" placeholder="Select date ..." value="20/08/2023 to 27/08/2023" data-toggle="flatpickr" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <a href="" class="btn btn-success" style="margin-top: 25px;">Generar Reporte <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th style="width: 5px;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                            <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                        </div>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">account_circle</i> <span>Usuario<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                    </th>
                    <th class="text-center">Mensaje</th>
                    <th >Evento</th>
                </tr>
            </thead>
            <tbody class="list" id="companies">
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td class="text-center">Alberto Alvarado</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Registro de LLamada Añadido</td>
                    <td>
                        <div class="badge badge-success">NUEVO REGISTRO</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td class="text-center">Gustavo Campos</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Usuario Autenticado, ingreso al sistema</td>
                    <td>
                        <div class="badge badge-success">ACCESO AL SISTEMA</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td class="text-center">Michelle Mora</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Cierre de Sesión, salida del sistema</td>
                    <td>
                        <div class="badge badge-success">ACCESO AL SISTEMA</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td class="text-center">Rene Diaz</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Edición de Ruta</td>
                    <td>
                        <div class="badge badge-warning">REGISTRO EDITADO</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td class="text-center">Sandra Vasquez</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Cancelación de Orden de Instalación</td>
                    <td>
                        <div class="badge badge-danger">REGISTRO ELIMINADO</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td class="text-center">Sebastián Guerrero</td>
                    <td class="text-center">05/05/2019</td>
                    <td class="text-center">Error Inesperado</td>
                    <td>
                        <div class="badge badge-danger">ERROR INESPERADO</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body text-right">
        15 <span class="text-muted">de 1,430</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
    </div>
</div>
@endsection