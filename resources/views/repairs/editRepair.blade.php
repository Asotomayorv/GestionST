@extends('layout.fluidNavbar')
@section('editRepair')
<div class="mdk-header-layout__content page">
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Reparaciones</li>
            </ol>
        </nav>
        <h1 class="m-0">Modificar Boleta de Reparación</h1>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Datos del cliente</strong></p>
            <p class="text-muted">Ingresa los datos del cliente:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($repair -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($repair -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" value="{{$repair -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" value="{{$repair -> customers -> customerFullName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" value="{{$repair -> customers -> customerContact}}"readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" value="{{$repair -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" value="{{$repair -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" value="{{$repair -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" value="{{$repair -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly>{{$repair -> customers -> customerAddress1}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <button class="btn btn-primary ml-3" id="modifyClientButton1" data-toggle="modal" data-target="#modifyClientModal">
                            Actualizar Datos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Equipo a Reparar</strong></p>
            <p class="text-muted">Puedes ingresar los equipos a reparar manualmente:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="product">Producto*</label>
                        <input id="product" type="text" class="form-control" name="product" placeholder="Producto">
                        <span class="invalid-feedback" id="product-error">El producto no puede estar vacío.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Marca*</label>
                        <input id="brand" type="text" class="form-control" name="brand" placeholder="Marca">
                        <span class="invalid-feedback" id="brand-error">La marca no puede estar vacía.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="model">Modelo*</label>
                        <input id="model" type="text" class="form-control" name="model" placeholder="Modelo">
                        <span class="invalid-feedback" id="model-error">El modelo no puede estar vacío</span>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="searchProductButton" style="margin-top: 25px;" title="Buscar Productos Registrados" 
                        data-url="{{route('repairs.getRepairProducts', ['id'])}}" data-id="{{$repair -> idCustomer}}">
                        <i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productSerie">¿Producto con seriales?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="productSerie" name="productSerie" value="1">
                            <label class="custom-control-label" for="productSerie">Sí</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="productSeries">Serie del Producto</label><br>
                            <input id="productSeries" name="productSeries" class="form-control" placeholder="Serie" readonly>
                            <span class="invalid-feedback" id="productSeries-error">Si el equipo lleva serie, debes ingresarla.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productQuantity">Unidades registradas*</label>
                        <input id="productQuantity" type="number" class="form-control" name="productQuantity" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productRepairQuantity">Unidades a reparar*</label>
                        <input id="productRepairQuantity" type="number" class="form-control" name="productRepairQuantity" min="1" value="1">
                        <span class="invalid-feedback" id="productRepairQuantity-error">Si el equipo lleva serie, debes ingresarla.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="damageProductReport">Daños reportados*</label>
                        <textarea id="damageProductReport" type="text" class="form-control" name="damageProductReport" placeholder="Detalle de daños..."></textarea>
                        <span class="invalid-feedback" id="damageProductReport-error">Debes ingresar una descripción de daños</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <button class="btn btn-primary ml-3" id="addProduct">Añadir a la lista</button>
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
                </tr>
            </thead>
            <tbody class="list">
            </tbody>
        </table>
    </div>
</div>
<form id="modifyRepairOrder" method="POST" action="{{ route('repairs.updateRepair', ['id' => $repair -> idrepair])}}">
    @csrf
    @method('PUT')
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Detalles de la Boleta</strong></p>
                <p class="text-muted">Ingrese los datos de la reparación:</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="technicianAssigned">Técnico Asignado*</label><br>
                            <select id="technicianAssigned" name="technicianAssigned" class="custom-select">
                                @foreach ($technicians as $technician)
                                    <option value="{{$technician -> userName . ' ' . $technician -> userLastName1}}" {{$repair -> technicianAssigned == $technician -> userName . ' ' . $technician -> userLastName1 ? 'selected' : ''}}>
                                        {{$technician -> userName . ' ' . $technician -> userLastName1}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="receivingDate">Fecha que se reciben los Equipos*</label>
                            <input id="receivingDate" name="receivingDate" type="date" class="form-control" value="{{$repair -> receivingDate}}">
                            <span class="invalid-feedback" id="receivingDate-error">Debes ingresar una fecha válida</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="repairStatus">Estado</label>
                            <select id="repairStatus" name="repairStatus" class="custom-select">
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
                                <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" value="Cliente" {{ $repair -> repairOrigin == 'Cliente' ? 'checked' : '' }}>
                                <label class="form-check-label" for="repairOrigin">Cliente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" value="Técnico" {{ $repair -> repairOrigin == 'Técnico' ? 'checked' : '' }}>
                                <label class="form-check-label" for="repairOrigin">Técnico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" value="Encomienda" {{ $repair -> repairOrigin == 'Encomienda' ? 'checked' : '' }}>
                                <label class="form-check-label" for="repairOrigin">Encomienda</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="repairOrigin" id="repairOrigin" value="Bodega" {{ $repair -> repairOrigin == 'Bodega' ? 'checked' : '' }}>
                                <label class="form-check-label" for="repairOrigin">Bodega</label>
                            </div>
                        </div>
                        <span class="invalid-feedback" id="repairOrigin-error">Debes seleccionar la procedencia.</span>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="repairType">Tipo de Reparación*</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="repairType" id="repairType" value="Garantía" {{ $repair -> repairType == 'Garantía' ? 'checked' : '' }}>
                                <label class="form-check-label" for="repairType">Garantía</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="repairType" id="repairType" value="Presupuesto" {{ $repair -> repairType == 'Presupuesto' ? 'checked' : '' }}>
                                <label class="form-check-label" for="repairType">Presupuesto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="repairType" id="repairType" value="Reparación" {{ $repair -> repairType == 'Reparación' ? 'checked' : '' }}>
                                <label class="form-check-label" for="repairType">Reparación</label>
                            </div>
                        </div>
                        <span class="invalid-feedback" id="repairType-error">Debes seleccionar el tipo de reparación.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input id="idCustomer" type="hidden" name="idCustomer" value="{{$repair -> idCustomer}}">
                            <input type="hidden" name="productData" id="productData">
                            <label for="repairComments">Observaciones de la reparación*</label>
                            <textarea id="repairComments" type="text" class="form-control" name="repairComments" placeholder="Comentarios de la reparación...">{{$repair -> repairComments}}</textarea>
                            <span class="invalid-feedback" id="repairComments-error">Debes ingresar una observación o comentario.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('repairs.listRepairs')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" class="btn btn-success ml-3">Actualizar</button>
    </div>
</form>
@section('modifyClientModal')
<form id="modifyClientForm" method="POST" data-url="{{route('customers.updateCustomerModal', ['id'])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el Cliente -->
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Información del cliente</strong></p>
                <p class="text-muted">Modifique los datos y luego haga click en "Actualizar".</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomertypeID">Tipo de Cedula*</label>
                            <select id="modifyCustomertypeID" name="modifyCustomertypeID" class="custom-select" required>
                                <option value="1">Jurídica</option>
                                <option value="2">Física</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerID">Cédula*</label>
                            <input id="modifyCustomerID" type="text" class="form-control" name="modifyCustomerID" placeholder="0-000-000000">
                            <span class="invalid-feedback" id="modifyCustomerID-error">Ingresa la cédula en un formato válido (e.g., 1-2345-6789)</span>
                            <span class="invalid-feedback" id="modifyCustomerLegalID-error">Ingresa la cédula en un formato válido (e.g., 1-234-567890)</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="modifyCustomerTaxes">Paga Impuestos?</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="modifyCustomerTaxes" name="modifyCustomerTaxes" value="1">
                                <label class="custom-control-label" for="modifyCustomerTaxes">Sí</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerFullName">Nombre/Razón Social*</label>
                            <input id="modifyCustomerFullName" type="text" class="form-control" name="modifyCustomerFullName" placeholder="Nombre Completo" required>
                            <span class="invalid-feedback" id="modifyCustomerFullName-error">Ingresa un nombre válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerContact">Contacto*</label>
                            <input id="modifyCustomerContact" type="text" class="form-control" name="modifyCustomerContact" placeholder="Contacto" required>
                            <span class="invalid-feedback" id="modifyCustomerContact-error">Ingresa un contacto válido.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerEmail1">Correo Electrónico 1*</label>
                            <input id="modifyCustomerEmail1" type="email" class="form-control" name="modifyCustomerEmail1" placeholder="nombre@correo.com" required>
                            <span class="invalid-feedback" id="modifyCustomerEmail1-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerEmail2">Correo Electrónico 2</label>
                            <input id="modifyCustomerEmail2" type="email" class="form-control" name="modifyCustomerEmail2" placeholder="nombre@correo.com">
                            <span class="invalid-feedback" id="modifyCustomerEmail2-error">Ingresa un correo electrónico válido.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="modifyCustomerPhone1">Telefono 1*</label>
                            <input id="modifyCustomerPhone1" type="text" class="form-control" name="modifyCustomerPhone1" placeholder="0000-0000" required>
                            <span class="invalid-feedback" id="modifyCustomerPhone1-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="modifyCustomerPhone2">Telefono 2</label>
                            <input id="modifyCustomerPhone2" type="text" class="form-control" name="modifyCustomerPhone2" placeholder="0000-0000" >
                            <span class="invalid-feedback" id="modifyCustomerPhone2-error">Ingresa un teléfono en formato válido (e.g., 8888-8888).</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerAddress1"> Direccion 1*</label>
                            <textarea id="modifyCustomerAddress1" type="text" class="form-control" name="modifyCustomerAddress1" placeholder="Dirección Completa"></textarea>
                            <span class="invalid-feedback" id="modifyCustomerAddress1-error">Ingresa una dirección.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="modifyCustomerAddress2"> Direccion 2</label>
                            <textarea id="modifyCustomerAddress2" type="text" class="form-control" name="modifyCustomerAddress2" placeholder="Dirección Completa"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('productModalContent')
<div class="table-responsive">
    <table id="productTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">#Boleta Facturación</th>
                <th class="text-center">#Código</th>
                <th class="text-center">
                    <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Producto<span>
                </th>
                <th class="text-center">Marca</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Serie</th>
                <th class="text-center">
                    <i class="material-icons icon-16pt text-muted mr-1">class</i><span>Categoría<span>
                </th> 
                <th class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody class="list">
        </tbody>
    </table>
</div>
@endsection
<script>
    var selectedProducts = {!! json_encode($selectedProducts) !!};
 </script>
<!-- Mensajes al usuario -->
@if (session('updateError'))
<script>
    $(document).ready(function() {
        toastr.warning("{{ session('updateError') }}", "Error de Actualización");
    });
</script>
@endif
@if (session('validationError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{session('validationError')}}", "Error de validación");
        });
    </script>
@endif
<script src="{{asset('HTML/dist/assets/js/repairOrderEdit.js')}}"></script>
@endsection
