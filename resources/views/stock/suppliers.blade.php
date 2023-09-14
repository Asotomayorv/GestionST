@extends('layout.fluidNavbar')
@section('suppliers')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Bodega</li>
            </ol>
        </nav>
        <h1 class="m-0">Consulta de Proveedores</h1>
    </div>
</div>
    <div class="card card-form d-flex flex-column flex-sm-row">
        <div class="card-form__body card-body-form-group flex">
            <div class="row">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter_name">Filtrar por Cédula</label>
                        <input id="filter_name" type="text" class="form-control" placeholder="Cédula del Proveedor">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <a href="" class="btn btn-success" style="margin-top: 25px;">Nuevo Proveedor<i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
    </div>
    <div class="card">
        <div class="card-header card-header-large bg-white">
            <h4 class="card-header__title">Lista de Proveedores</h4> 
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
                        <th class="text-center" style="width: 122px;">Cédula</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center" style="width: 101px;">Teléfono</th>
                        <th class="text-center">Contacto</th>
                        <th class="text-center"></th>
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
                                    <a class="js-lists-values-employee-name" href='#'>Muebles EGM</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">3-101-568596</span>
                        </td>
                        <td><span class="text-muted">mueblesegm@gmail.com</span></td>
                        <td><span class="text-muted">8768-7751</span></td>
                        <td><span class="text-muted">Wagner Guerrero Marín</span></td>
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="index.html">Ver detalle del Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Editar Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Inactivar Proveedor</a>
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
                                    <a class="js-lists-values-employee-name" href='#'>Hospital de las Mujeres Dr.Adolfo Carit Eva</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">3-101-568596</span>
                        </td>
                        <td><span class="text-muted">maovares@ccss.sa.cr</span></td>
                        <td><span class="text-muted">2523-5969</span></td>
                        <td><span class="text-muted">Alejandra Ovares Ulate</span></td>
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="index.html">Ver detalle del Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Editar Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Inactivar Proveedor</a>
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
                                    <a class="js-lists-values-employee-name" href='#'>Lighthouse International School S. A.</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">3-102-417896</span>
                        </td>
                        <td><span class="text-muted">max_cabrera@lic.ed.cr</span></td>
                        <td><span class="text-muted">8871-9690</span></td>
                        <td><span class="text-muted">Erick Cabrera Alfaro</span></td>
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="index.html">Ver detalle del Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Editar Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Inactivar Proveedor</a>
                                    </div>
                            </td>
                        </div> 
                    </tr>
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck4_4">
                                <label class="custom-control-label" for="customCheck4_4"><span class="text-hide">Check</span></label>
                            </div>
                        </td>
                        <td>
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <a class="js-lists-values-employee-name" href='#'>Hospital de San Vito C.C.S.S. </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">3-101-467352</span>
                        </td>
                        <td><span class="text-muted">jmondragon@ccss.sa.cr</span></td>
                        <td><span class="text-muted">2773-1181</span></td>
                        <td><span class="text-muted">Javier Mondragón Barahona</span></td>
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="index.html">Ver detalle del Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Editar Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Inactivar Proveedor</a>
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
                                    <a class="js-lists-values-employee-name" href='#'>Translogistic Cargo S. A.</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">3-102-768146</span>
                        </td>
                        <td><span class="text-muted">financiero@translagisticcr.com	</span></td>
                        <td><span class="text-muted">2265-1525</span></td>
                        <td><span class="text-muted">Marian Quirós Sanchéz</span></td>
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="index.html">Ver detalle del Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Editar Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Inactivar Proveedor</a>
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
                                    <a class="js-lists-values-employee-name" href='#'>Hospital Nacional de Salud Mental Manuel Antonio Chapuí y Torres</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">3-101-134576</span>
                        </td>
                        <td><span class="text-muted">aflopez@ccss.sa.cr</span></td>
                        <td><span class="text-muted">2242-6300</span></td>
                        <td><span class="text-muted">Allan Fernando López Ureña </span></td>
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="index.html">Ver detalle del Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Editar Proveedor</a>
                                        <a class="dropdown-item" href="profile.html">Inactivar Proveedor</a>
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