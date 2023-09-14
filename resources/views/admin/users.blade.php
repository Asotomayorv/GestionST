@extends('layout.fluidNavbar')
@section('users')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Administración</li>
            </ol>
        </nav>
        <h1 class="m-0">Consulta de Empleados</h1>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <form class="form-inline">
            <label class="mr-sm-2" for="inlineFormFilterBy">Filtrar por Departamento:</label>
            <label class="sr-only" for="inlineFormRole">Departamentos</label>
            <select id="inlineFormRole" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                <option value="All Roles">Técnico</option>
                <option value="All Roles">Contabilidad</option>
                <option value="All Roles">Ventas</option>
                <option value="All Roles">Bodega</option>
                <option value="All Roles">Gerencia</option>
                <option value="All Roles">Todos</option>
            </select>
            <label class="mr-sm-2" for="inlineFormFilterBy">Filtrar por Roles:</label>
            <label class="sr-only" for="inlineFormRole">Roles</label>
            <select id="inlineFormRole" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                <option value="All Roles">Soporte</option>
                <option value="All Roles">Facturación</option>
                <option value="All Roles">Inventario</option>
                <option value="All Roles">Admin</option>
                <option value="All Roles">Todos</option>
            </select>
            <a href="" class="btn btn-success ml-3">Nuevo Empleado<i class="material-icons">add</i></a>
        </form>
    </div>
    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
            <div class="search-form search-form--light m-3">
                <input type="text" class="form-control search" placeholder="Search">
                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
            </div>
        <table class="table mb-0 thead-border-top-0">
            <thead>
                <tr>
                    <th style="width: 18px;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll">
                            <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                        </div>
                    </th>
                    <th class="text-center">Nombre</th>
                    <th >Departamento</th>
                    <th >Estado</th>
                    <th >Rol</th>
                    <th >Fecha de Ingreso</th>
                    <th >Última Edición</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody class="list" id="staff">
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Alberto Alvarado Vargas</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <span class="text-center">Técnico</span>
                        </div>
                    </td>
                    <td><span class="badge badge-success">ACTIVO</span></td>
                    <td><span class="badge badge-primary">SOPORTE</span></td>
                    <td>01/01/2023</td>
                    <td >01/01/2023</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Empleado</a>
                                    <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                    <a class="dropdown-item" href="edit-account.html">Inactivar Empleado</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck2_1">
                            <label class="custom-control-label" for="customCheck2_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Angie Acuña Salas</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <span>Contabilidad</span>
                        </div>
                    </td>
                    <td><span class="badge badge-success">ACTIVO</span></td>
                    <td><span class="badge badge-info">FACTURACIÓN</span></td>
                    <td>01/01/2023</td>
                    <td>01/01/2023</td>
                    <!-- <td>&dollar;1,943</td> -->
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Empleado</a>
                                    <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                    <a class="dropdown-item" href="edit-account.html">Inactivar Empleado</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck2_1">
                            <label class="custom-control-label" for="customCheck2_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Carlos Martinez Azofeifa</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <span>Ventas</span>
                        </div>
                    </td>
                    <td><span class="badge badge-success">ACTIVO</span></td>
                    <td><span class="badge badge-info">FACTURACIÓN</span></td>
                    <td>01/01/2023</td>
                    <td>01/01/2023</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Empleado</a>
                                    <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                    <a class="dropdown-item" href="edit-account.html">Inactivar Empleado</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Gustavo Campos Calderón</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <span>Técnico</span>
                        </div>
                    </td>
                    <td><span class="badge badge-danger">INACTIVO</span></td>
                    <td><span class="badge badge-primary">SOPORTE</span></td>
                    <td>01/01/2023</td>
                    <td>01/01/2023</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Empleado</a>
                                    <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                    <a class="dropdown-item" href="edit-account.html">Inactivar Empleado</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck2_1">
                            <label class="custom-control-label" for="customCheck2_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Johanna Vasquez Chavarría</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <span>Bodega</span>
                        </div>
                    </td>
                    <td><span class="badge badge-success">ACTIVO</span></td>
                    <td><span class="badge badge-dark">INVENTARIO</span></td>
                    <td>01/01/2023</td>
                    <td>01/01/2023</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Empleado</a>
                                    <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                    <a class="dropdown-item" href="edit-account.html">Inactivar Empleado</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck2_1">
                            <label class="custom-control-label" for="customCheck2_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="js-lists-values-employee-name">Ronald Chinchilla Porras</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media align-items-center">
                            <span>Gerencia</span>
                        </div>
                    </td>
                    <td><span class="badge badge-success">ACTIVO</span></td>
                    <td><span class="badge badge-warning">ADMIN</span></td>
                    <td>01/01/2023</td>
                    <td>01/01/2023</td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Empleado</a>
                                    <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                    <a class="dropdown-item" href="edit-account.html">Inactivar Empleado</a>
                                </div>
                        </td>
                    </div>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body text-right">
        15 <span class="text-muted">de 1,430</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
    </div>
</div>
</div>
</div>
@endsection