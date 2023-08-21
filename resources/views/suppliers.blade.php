@extends('dashboard.navbar')
@section('suppliers')
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inventario</li>
                    </ol>
                </nav>
                <h1 class="m-0">Proveedores</h1>
            </div>
            <!-- <a href="" class="btn btn-success ml-3">Nuevo Empleado</a> -->
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form d-flex flex-column flex-sm-row">
            <div class="card-form__body card-body-form-group flex">
                <div class="row">
                    <div class="col-sm-auto">
                        <div class="form-group">
                            <label for="filter_name">Filtrar por Cédula</label>
                            <input id="filter_name" type="text" class="form-control" placeholder="Cédula del Proveedor">
                        </div>
                    </div>
                   <!-- <div class="col-sm-auto">
                        <div class="form-group">
                            <label for="filter_stock">Has Sales</label>
                            <div class="custom-control custom-checkbox mt-sm-2">
                                <input type="checkbox" class="custom-control-input" id="filter_stock" checked="">
                                <label class="custom-control-label" for="filter_stock">Yes</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-sm-auto">
                        <div class="form-group">
                            <a href="" class="btn btn-success" style="margin-top: 25px;">Registrar Proveedor<i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
        </div>
        <div class="card">
            <!-- <div class="card-header card-header-large bg-white">
                <h4 class="card-header__title">Clientes</h4> 
            </div> -->
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
                            <th style="width: 150px;">Cédula</th>
                            <th style="width: 48px;">Correo</th>
                            <th style="width: 37px;">Teléfono</th>
                            <th style="width: 120px;">Contacto</th>
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
                                        <a class="js-lists-values-employee-name" href='#'>Muebles EGM</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">3101568596</span>
                            </td>
                            <td><span class="text-muted">mueblesegm@gmail.com</span></td>
                            <td><span class="text-muted">87687751</span></td>
                            <td><span class="text-muted">Wagner Guerrero Marín</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;12,402</td>-->
                            <td class="ml-auto">
                                <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                                <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            </td> 
                           
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
                                        <a class="js-lists-values-employee-name" href='#'>Hospital de las Mujeres Dr.Adolfo Carit Eva</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">3101568596</span>
                            </td>
                            <td><span class="text-muted">maovares@ccss.sa.cr</span></td>
                            <td><span class="text-muted">25235969</span></td>
                            <td><span class="text-muted">Alejandra Ovares Ulate</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <td class="ml-auto">
                                <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                                <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            </td> 
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
                                        <a class="js-lists-values-employee-name" href='#'>Lighthouse International School S. A.</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">3102417896</span>
                            </td>
                            <td><span class="text-muted">max_cabrera@lic.ed.cr</span></td>
                            <td><span class="text-muted">88719690</span></td>
                            <td><span class="text-muted">Erick Cabrera Alfaro</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <td class="ml-auto">
                                <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                                <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            </td> 
                        </tr>
                        <tr class="selected">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-check-selected-row" checked="" id="customCheck4_4">
                                    <label class="custom-control-label" for="customCheck4_4"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="media align-items-center">
                                    <!--<div class="avatar avatar-xs mr-2">
                                         <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div> -->
                                    <div class="media-body">
                                        <a class="js-lists-values-employee-name" href='#'>Hospital de San Vito C.C.S.S. </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">3101467352</span>
                            </td>
                            <td><span class="text-muted">jmondragon@ccss.sa.cr</span></td>
                            <td><span class="text-muted">27731181</span></td>
                            <td><span class="text-muted">Javier Mondragón Barahona</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;12,402</td>-->
                            <td class="ml-auto">
                                <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                                <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            </td> 
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
                                        <a class="js-lists-values-employee-name" href='#'>Translogistic Cargo S. A.</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">3102768146</span>
                            </td>
                            <td><span class="text-muted">financiero@translagisticcr.com	</span></td>
                            <td><span class="text-muted">22651525</span></td>
                            <td><span class="text-muted">Marian Quirós Sanchéz</span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <td class="ml-auto">
                                <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                                <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            </td> 
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
                                        <a class="js-lists-values-employee-name" href='#'>Hospital Nacional de Salud Mental Manuel Antonio Chapuí y Torres</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">3101134576</span>
                            </td>
                            <td><span class="text-muted">aflopez@ccss.sa.cr</span></td>
                            <td><span class="text-muted">22426300</span></td>
                            <td><span class="text-muted">Allan Fernando López Ureña </span></td>
                            <td><small class="text-muted">01/01/2023</small></td>
                            <!-- <td>&dollar;1,943</td> -->
                            <td class="ml-auto">
                                <a href="#" class="text-muted"><i class="material-icons">visibility</i></a>
                                <a href="#" class="text-muted"><i class="material-icons">edit</i></a>
                            </td> 
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