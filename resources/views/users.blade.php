@extends('dashboard.navbar')
@section('users')
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Administración</li>
                    </ol>
                </nav>
                <h1 class="m-0">Empleados</h1>
            </div>
            <!-- <a href="" class="btn btn-success ml-3">Nuevo Empleado</a> -->
        </div>
    </div>
    <div class="container page__container">
        <div class="card">
            <div class="card-header">
                <form class="form-inline">
                    <label class="mr-sm-2" for="inlineFormFilterBy">Filtrar por Departamento:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormFilterBy" placeholder="Departamento">
                    <label class="mr-sm-2" for="inlineFormFilterBy">Filtrar por:</label>
                    <label class="sr-only" for="inlineFormRole">Role</label>
                    <select id="inlineFormRole" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                        <option value="All Roles">Roles</option>
                    </select>
                    <!-- <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                        <input type="checkbox" class="custom-control-input" id="inlineFormPurchase">
                        <label class="custom-control-label" for="inlineFormPurchase">Made a Purchase?</label>
                    </div> -->
                    <a href="" class="btn btn-success ml-3">Registrar Empleado<i class="material-icons">add</i></a>
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
                            <th>Nombre</th>
                            <th style="width: 150px;">Departamento</th>
                            <th style="width: 48px;">Estado</th>
                            <th style="width: 37px;">Rol</th>
                            <th style="width: 120px;">Fecha de Ingreso</th>
                            <th style="width: 51px;">Última Edición</th>
                            <th style="width: 24px;"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="staff">
                        <tr class="selected">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-check-selected-row" checked="" id="customCheck1_1">
                                    <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <!--<div class="avatar avatar-xs mr-2">
                                         <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div> -->
                                    <div class="media-body">
                                        <span class="js-lists-values-employee-name">Alberto Alvarado Vargas</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <a href="">Técnico</a>
                                    <!-- <a href="#" class="rating-link"><i class="material-icons ml-2">star</i></a> -->
                                </div>
                            </td>
                            <td><span class="badge badge-success">ACTIVO</span></td>
                            <td><span class="badge badge-primary">SOPORTE</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;12,402</td>-->
                            <div class="dropdown ml-auto">
                                <td>
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong>Adrian Demian</strong></div>
                                                <div>@adriandemian</div>
                                            </div>
                                            <div class="dropdown-divider"></div> -->
                                            <a class="dropdown-item" href="index.html">Visualizar Empleado</a>
                                            <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                            <a class="dropdown-item" href="edit-account.html">Eliminar Empleado</a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.html">Logout</a> -->
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
                                   <!-- <img src="assets/images/avatar/green.svg" class="mr-2" alt="avatar" /> -->
                                    <div class="media-body">
                                        <span class="js-lists-values-employee-name">Angie Acuña Salas</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <a href="#">Contabilidad</a>
                                    <!-- <a href="#" class="rating-link active"><i class="material-icons ml-2">star</i></a> -->
                                </div>
                            </td>
                            <td><span class="badge badge-success">ACTIVO</span></td>
                            <td><span class="badge badge-info">FACTURACIÓN</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <div class="dropdown ml-auto">
                                <td>
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong>Adrian Demian</strong></div>
                                                <div>@adriandemian</div>
                                            </div>
                                            <div class="dropdown-divider"></div> -->
                                            <a class="dropdown-item" href="index.html">Visualizar Empleado</a>
                                            <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                            <a class="dropdown-item" href="edit-account.html">Eliminar Empleado</a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.html">Logout</a> -->
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
                                   <!-- <img src="assets/images/avatar/green.svg" class="mr-2" alt="avatar" /> -->
                                    <div class="media-body">
                                        <span class="js-lists-values-employee-name">Carlos Martinez Azofeifa</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <a href="#">Ventas</a>
                                    <!-- <a href="#" class="rating-link active"><i class="material-icons ml-2">star</i></a> -->
                                </div>
                            </td>
                            <td><span class="badge badge-success">ACTIVO</span></td>
                            <td><span class="badge badge-info">FACTURACIÓN</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <div class="dropdown ml-auto">
                                <td>
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong>Adrian Demian</strong></div>
                                                <div>@adriandemian</div>
                                            </div>
                                            <div class="dropdown-divider"></div> -->
                                            <a class="dropdown-item" href="index.html">Visualizar Empleado</a>
                                            <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                            <a class="dropdown-item" href="edit-account.html">Eliminar Empleado</a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.html">Logout</a> -->
                                        </div>
                                </td>
                            </div>
                        </tr>
                        <tr class="selected">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-check-selected-row" checked="" id="customCheck1_1">
                                    <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <!--<div class="avatar avatar-xs mr-2">
                                         <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div> -->
                                    <div class="media-body">
                                        <span class="js-lists-values-employee-name">Gustavo Campos Calderón</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <a href="">Técnico</a>
                                    <!-- <a href="#" class="rating-link"><i class="material-icons ml-2">star</i></a> -->
                                </div>
                            </td>
                            <td><span class="badge badge-danger">INACTIVO</span></td>
                            <td><span class="badge badge-primary">SOPORTE</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;12,402</td>-->
                            <div class="dropdown ml-auto">
                                <td>
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong>Adrian Demian</strong></div>
                                                <div>@adriandemian</div>
                                            </div>
                                            <div class="dropdown-divider"></div> -->
                                            <a class="dropdown-item" href="index.html">Visualizar Empleado</a>
                                            <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                            <a class="dropdown-item" href="edit-account.html">Eliminar Empleado</a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.html">Logout</a> -->
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
                                   <!-- <img src="assets/images/avatar/green.svg" class="mr-2" alt="avatar" /> -->
                                    <div class="media-body">
                                        <span class="js-lists-values-employee-name">Johanna Vasquez Chavarría</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <a href="#">Bodega</a>
                                    <!-- <a href="#" class="rating-link active"><i class="material-icons ml-2">star</i></a> -->
                                </div>
                            </td>
                            <td><span class="badge badge-success">ACTIVO</span></td>
                            <td><span class="badge badge-dark">INVENTARIO</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <div class="dropdown ml-auto">
                                <td>
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong>Adrian Demian</strong></div>
                                                <div>@adriandemian</div>
                                            </div>
                                            <div class="dropdown-divider"></div> -->
                                            <a class="dropdown-item" href="index.html">Visualizar Empleado</a>
                                            <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                            <a class="dropdown-item" href="edit-account.html">Eliminar Empleado</a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.html">Logout</a> -->
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
                                   <!-- <img src="assets/images/avatar/green.svg" class="mr-2" alt="avatar" /> -->
                                    <div class="media-body">
                                        <span class="js-lists-values-employee-name">Ronald Chinchilla Porras</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <a href="#">Gerencia</a>
                                    <!-- <a href="#" class="rating-link active"><i class="material-icons ml-2">star</i></a> -->
                                </div>
                            </td>
                            <td><span class="badge badge-success">ACTIVO</span></td>
                            <td><span class="badge badge-warning">ADMIN</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <div class="dropdown ml-auto">
                                <td>
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong>Adrian Demian</strong></div>
                                                <div>@adriandemian</div>
                                            </div>
                                            <div class="dropdown-divider"></div> -->
                                            <a class="dropdown-item" href="index.html">Visualizar Empleado</a>
                                            <a class="dropdown-item" href="profile.html">Editar Empleado</a>
                                            <a class="dropdown-item" href="edit-account.html">Eliminar Empleado</a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.html">Logout</a> -->
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