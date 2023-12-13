@extends('layout.fluidNavbar')
@section('viewRepair')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Reparaciones</li>
            </ol>
        </nav>
        <h1 class="m-0">Detalles de Reparación</h1>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$repair -> customers -> customerFullName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($repair -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($repair -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerID">Cédula</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" value="{{$repair -> customers -> customerID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" value="{{$repair -> customers -> customerContact}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerTaxes">Paga Impuestos?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customerTaxes" name="customerTaxes" @if($repair -> customers -> customerTaxes == 1) checked @endif disabled>
                            <label class="custom-control-label" for="customerTaxes">Sí</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" value="{{$repair -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" value="{{$repair -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" value="{{$repair -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" value="{{$repair -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="routeAddress">Dirección</label>
                        <textarea id="routeAddress" type="text" class="form-control" name="routeAddress" placeholder="Dirección Completa.." readonly>{{$repair -> customers -> customerAddress1}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="technicianAssigned">Técnico Asignado*</label><br>
                        <input id="technicianAssigned" type="text" class="form-control" name="technicianAssigned" value="{{$repair -> technicianAssigned}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="receivingDate">Fecha que se reciben los Equipos*</label>
                        <input id="receivingDate" name="receivingDate" type="date" class="form-control" value="{{$repair -> receivingDate}}" readonly>
                        <span class="invalid-feedback" id="receivingDate-error">Debes ingresar una fecha válida</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="repairStatus">Estado</label>
                        <select id="repairStatus" name="repairStatus" class="custom-select" disabled>
                            <option value="0" @if($repair -> repairStatus == 0) selected @endif>Pendiente</option>
                            <option value="1" @if($repair -> repairStatus == 1) selected @endif>En Progreso</option>
                            <option value="2" @if($repair -> repairStatus == 2) selected @endif>Reparado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="repairOrigin">Procedencia*</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" disabled value="Cliente" {{ $repair -> repairOrigin == 'Cliente' ? 'checked' : '' }}>
                            <label class="form-check-label" for="repairOrigin">Cliente</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" disabled value="Técnico" {{ $repair -> repairOrigin == 'Técnico' ? 'checked' : '' }}>
                            <label class="form-check-label" for="repairOrigin">Técnico</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" disabled value="Encomienda" {{ $repair -> repairOrigin == 'Encomienda' ? 'checked' : '' }}>
                            <label class="form-check-label" for="repairOrigin">Encomienda</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" disabled value="Bodega" {{ $repair -> repairOrigin == 'Bodega' ? 'checked' : '' }}>
                            <label class="form-check-label" for="repairOrigin">Bodega</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="repairType">Tipo de Reparación*</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="repairType" id="repairType" disabled value="Garantía" {{ $repair -> repairType == 'Garantía' ? 'checked' : '' }}>
                            <label class="form-check-label" for="repairType">Garantía</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="repairType" id="repairType" disabled value="Presupuesto" {{ $repair -> repairType == 'Presupuesto' ? 'checked' : '' }}>
                            <label class="form-check-label" for="repairType">Presupuesto</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="repairType" id="repairType" disabled value="Reparación" {{ $repair -> repairType == 'Reparación' ? 'checked' : '' }}>
                            <label class="form-check-label" for="repairType">Reparación</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="hidden" id="idCustomer" name="idCustomer" value="">
                        <input type="hidden" name="productData" id="productData">
                        <label for="repairComments">Observaciones de la reparación*</label>
                        <textarea id="repairComments" type="text" class="form-control" name="repairComments" placeholder="Comentarios de la reparación..." readonly>{{$repair -> repairComments}}</textarea>
                        <span class="invalid-feedback" id="repairComments-error">Debes ingresar una observación o comentario.</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$repair -> dateLastEdit}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$repair -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <a href="{{route('repairs.listRepairs')}}" class="btn btn-primary ml-3">Regresar</a>
                         <!-- <button class="btn btn-primary ml-3" onclick="printInvoice()">Vista Previa</button> -->
                        <a href="{{route('repairs.editRepair', ['id' => $repair -> idrepair])}}" class="btn btn-success ml-3">
                            <i class="material-icons">edit</i> Editar Boleta de Reparación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="table-responsive">
        <div class="card-header card-header-large bg-white d-flex align-items-center">
            <h4 class="card-header__title flex m-0">Equipos a Reparar</h4>
        </div>
        <table id="selectedProductTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Producto<span>
                    </th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Serie</th>
                    <th class="text-center">Cantidad a Reparar</th>
                    <th class="text-center">Reporte de Daños</th>
                    <!-- <th class="text-center">Ver Reparación</th> -->
                </tr>
            </thead>
            <tbody class="list">
                @foreach($selectedProducts as $selectedProduct)
                <tr>
                    <td class="text-center">{{$selectedProduct -> productName}}</td>
                    <td class="text-center">{{$selectedProduct -> productBrand}}</td>
                    <td class="text-center">{{$selectedProduct -> productModel}}</td>
                    <td class="text-center">{{$selectedProduct -> productSeries}}</td>
                    <td class="text-center">{{$selectedProduct -> productQuantity}}</td>
                    <td class="text-center">{{$selectedProduct -> productDamageComments}}</td>
                    <!-- <div class="dropdown ml-auto">
                        <td class="text-center"><a href="{{route('repairs.viewProductRepair', ['id' => $selectedProduct -> idProductRepair])}}" 
                            type="button" class="btn btn-primary btn-sm" title="Ver Reparación"><i class="material-icons">build</i></a></td>
                    </div> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- <script>
    var selectedProducts = {!! json_encode($selectedProducts) !!};
 </script>
 <script src="{{asset('HTML/dist/assets/js/viewRepairOrder.js')}}"></script> -->
@endsection