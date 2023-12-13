@extends('layout.fluidNavbar')
@section('createProductRepair')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Facturación</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Garantías</li>
            </ol>
        </nav>
        <h1 class="m-0">Nuevo Trabajo de Reparación</h1>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Datos del Cliente</strong></p>
            <p class="text-muted">Seleccione los  datos del Cliente:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1">Jurídica</option>
                            <option value="2">Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" readonly>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientSearchModal" 
                        id="searchClientButton" style="margin-top: 25px;" title="Buscar Cliente">
                            <i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" readonly>
                        <span class="invalid-feedback" id="customerFullName-error">Ingresa un nombre válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="idrepair">No.Boleta Reparación*</label>
                        <input id="idrepair" type="text" class="form-control" name="idrepair" placeholder="No.Boleta de Reparación" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="technicianAssigned">Técnico(a)*</label>
                        <input id="technicianAssigned" type="text" class="form-control" name="technicianAssigned" placeholder="Técnico(a)" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="receivingDate">Fecha que se reciben los Equipos*</label>
                        <input id="receivingDate" name="receivingDate" type="text" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col">
                    <div class="text-right">
                        <button class="btn btn-primary ml-3" id="modifyClientButton" data-toggle="modal" data-target="#modifyClientModal">
                            Actualizar Datos</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Datos del Producto a Reparar</strong></p>
            <p class="text-muted">Seleccione el equipo a reparar:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="product">Producto*</label>
                        <input id="product" type="text" class="form-control" name="product" placeholder="Producto" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Marca*</label>
                        <input id="brand" type="text" class="form-control" name="brand" placeholder="Marca" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="model">Modelo*</label>
                        <input id="model" type="text" class="form-control" name="model" placeholder="Modelo" readonly>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="searchRepairProductButton" style="margin-top: 25px;" title="Buscar Productos a Reparar" 
                        data-url="{{route('repairs.getProductsToRepair', ['id'])}}"><i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productSerie">¿Producto con seriales?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="productSerie" name="productSerie" value="1" disabled>
                            <label class="custom-control-label" for="productSerie">Sí</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="productSeries">Serie del Producto</label><br>
                            <input id="productSeries" name="productSeries" class="form-control" placeholder="Serie" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productQuantity">Unidades registradas*</label>
                        <input id="productQuantity" type="number" class="form-control" name="productQuantity" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Daños reportados*</label>
                        <textarea type="text" class="form-control" id="productDamageComments" name="productDamageComments" 
                        placeholder="Comentarios del trabajo realizado..." readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="table-responsive">
        <div class="card-header card-header-large bg-white d-flex align-items-center">
            <h4 class="card-header__title flex m-0">Selección de Repuestos</h4>
            <button data-toggle="modal" data-target="#productSearchModal" 
            id="searchProductButton" class="btn btn-success">Añadir Repuesto <i class="material-icons">add</i></button>
        </div>
        <table id="selectedProductTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
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
                    <th class="text-center">Unidades Disponibles</th>
                    <th class="text-center">Cantidad</th>
                </tr>
            </thead>
            <tbody class="list">
            </tbody>
        </table>
    </div>
</div>
<form id="createProductRepair" method="POST" action="{{route('repairs.registerProductRepair')}}">
    @csrf
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Detalles del trabajo realizado</strong></p>
                <p class="text-muted">Ingrese las observaciones del trabajo realizado:</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="">
                            <input type="hidden" id="idProductRepair" name="idProductRepair" value="">
                            <input type="hidden" name="productData" id="productData">
                            <label for="repairDetailsComments">Detalles del Trabajo realizado*</label>
                            <textarea id="repairDetailsComments" type="text" class="form-control" name="repairDetailsComments" placeholder="Comentarios de la reparación..."></textarea>
                            <span class="invalid-feedback" id="repairDetailsComments-error">Por favor ingresa el detalle del trabajo realizado.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('repairs.listProductRepair')}}" class="btn btn-danger ml-3">Cancelar</a>
        <button type="submit" class="btn btn-success ml-3">Actualizar</button>
    </div>
</form>
@section('clientModalContent')
<div class="table-responsive">
    <div class="table-responsive">
        <table id="customerTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">receipt</i><span>No.Boleta Reparación<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">folder_shared</i><span>Cédula</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">user</i><span>Técnico(a)<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha recibimiento</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($repairs as $repair)
                <tr data-customer-email2="{{$repair -> customers -> customerEmail2}}" data-customer-phone2="{{$repair -> customers -> customerPhone2}}" 
                    data-customer-id="{{$repair -> customers -> idCustomer}}" data-customer-phone1="{{$repair -> customers -> customerPhone1}}"
                    data-customer-email1="{{$repair -> customers -> customerEmail1}}" data-customer-contact="{{$repair -> customers -> customerContact}}"
                    data-customer-typeid="{{$repair -> customers -> customertypeID}}">
                    <td class="text-center">{{$repair -> idrepair}}</td>
                    <td class="text-center">{{$repair -> customers -> customerID}}</td>
                    <td class="text-center">{{$repair -> customers -> customerFullName}}</td>
                    <td class="text-center">{{$repair -> technicianAssigned}}</td>
                    <td class="text-center">{{$repair -> receivingDate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('productRepairModalContent')
<div class="table-responsive">
    <table id="productTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">
                    <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Producto<span>
                </th>
                <th class="text-center">Marca</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Serie</th>
                <th class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody class="list">
        </tbody>
    </table>
</div>
@endsection
@section('productModalContent')
<div class="table-responsive">
    <table id="sparePartsTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
        <thead>
            <tr>
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
                <th class="text-center">Uni.Disponibles</th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach($products as $product)
            <tr data-product-id="{{$product -> idproduct}}">
                <td class="text-center">{{$product -> productCode}}</td>
                <td class="text-center">{{$product -> productName}}</td>
                <td class="text-center">{{$product -> brands -> brandName}}</td>
                <td class="text-center">{{$product -> models -> modelName}}</td>
                <td class="text-center">{{$product -> productSeries}}</td>
                <td class="text-center">{{$product -> productCategory}}</td>
                <td class="text-center">{{$product -> productQuantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<!-- Mensajes al usuario -->
@if (session('createError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{ session('createError') }}", "Error al registrar el proveedor");
        });
    </script>
@endif
@if (session('validationError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{ session('validationError') }}", "Error de validación");
        });
    </script>
@endif
<script src="{{asset('HTML/dist/assets/js/repairProductValidation.js')}}"></script> 
@endsection