@extends('layout.fluidNavbar')
@section('inventory')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Bodega</li>
            </ol>
        </nav>
        <h1 class="m-0">Inventario</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Producto</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Producto">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Marca</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Todos</option>
                        <option value="all">Easy Way</option>
                        <option value="all">Acroprint</option>
                        <option value="all">Badgy</option>
                        <option value="all">Canon</option>
                        <option value="all">Deggy</option>
                        <option value="all">Garret</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Categoría</label><br>
                    <select id="filter_category" class="custom-select" style="width: 200px;">
                        <option value="all">Todos</option>
                        <option value="all">Equipo</option>
                        <option value="all">Repuesto</option>
                        <option value="all">Suministro</option>
                        <option value="all">Accesorio</option>
                        <option value="all">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <a href="" class="btn btn-success" style="margin-top: 25px;">Nuevo Producto<i class="material-icons">add</i></a>
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
                    <th class="text-center">#Código</th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">work</i> <span>Producto<span>
                    </th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serie</th>
                    <th class="text-center">Categoría</th>
                    <th class="text-center">Cantidad</th>
                    <th >Estado</th>
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
                    <td>
                        <div class="badge badge-light">#29177</div>
                    </td>
                    <td class="text-center">Lector de Rondas</td>
                    <td class="text-center">Easy Way</td>
                    <td class="text-center">ACSI052</td>
                    <td class="text-center">466</td>
                    <td class="text-center">Equipo</td>
                    <td class="text-center">325</td>
                    <td>
                        <div class="badge badge-success">DISPONIBLE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Producto</a>
                                    <a class="dropdown-item" href="profile.html">Editar Producto</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Producto</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="badge badge-light">#29178</div>
                    </td>
                    <td class="text-center">Detector de Metal</td>
                    <td class="text-center">Acroprint</td>
                    <td class="text-center">Face AXS</td>
                    <td class="text-center">DM0114</td>
                    <td class="text-center">Repuesto</td>
                    <td class="text-center">450</td>
                    <td>
                        <div class="badge badge-success">DISPONIBLE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Producto</a>
                                    <a class="dropdown-item" href="profile.html">Editar Producto</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Producto</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="badge badge-light">#29179</div>
                    </td>
                    <td class="text-center">Reloj Biométrico</td>
                    <td class="text-center">Badgy</td>
                    <td class="text-center">Neo Connect Plus</td>
                    <td class="text-center">ZXLK02317810</td>
                    <td class="text-center">Suministro</td>
                    <td class="text-center">0</td>
                    <td>
                        <div class="badge badge-danger">AGOTADO</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Producto</a>
                                    <a class="dropdown-item" href="profile.html">Editar Producto</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Producto</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="badge badge-light">#29180</div>
                    </td>
                    <td class="text-center">Reloj Facial</td>
                    <td class="text-center">Canon</td>
                    <td class="text-center">Planten</td>
                    <td class="text-center">3929203760382</td>
                    <td class="text-center">Accesorio</td>
                    <td class="text-center">575</td>
                    <td>
                        <div class="badge badge-success">DISPONIBLE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Producto</a>
                                    <a class="dropdown-item" href="profile.html">Editar Producto</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Producto</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="badge badge-light">#29181</div>
                    </td>
                    <td class="text-center">Reloj Marcador</td>
                    <td class="text-center">Deggy</td>
                    <td class="text-center">S-PL-F30</td>
                    <td class="text-center">1922830 </td>
                    <td class="text-center">Otros</td>
                    <td class="text-center">0</td>
                    <td>
                        <div class="badge badge-danger">AGOTADO</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Producto</a>
                                    <a class="dropdown-item" href="profile.html">Editar Producto</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Producto</a>
                                </div>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                            <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                        </div>
                    </td>
                    <td>
                        <div class="badge badge-light">#291827</div>
                    </td>
                    <td class="text-center">Reloj de Huella Dactilar</td>
                    <td class="text-center">Garret</td>
                    <td class="text-center">PR600</td>
                    <td class="text-center">SP0000002968</td>
                    <td class="text-center">Equipo</td>
                    <td class="text-center">600</td>
                    <td>
                        <div class="badge badge-success">DISPONIBLE</div>
                    </td>
                    <div class="dropdown ml-auto">
                        <td>
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="index.html">Ver Producto</a>
                                    <a class="dropdown-item" href="profile.html">Editar Producto</a>
                                    <a class="dropdown-item" href="edit-account.html">Eliminar Producto</a>
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
@endsection