@extends('layout.fluidNavbar')
@section('editProductRepair')
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
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Datos de boleta de Reparación</strong></p>
            <p class="text-muted">A continuación se muestra el reporte de reparación asociada al equipo:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($repairDetails -> productRepair -> repairOrders -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($repairDetails -> productRepair -> repairOrders -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" 
                        value="{{$repairDetails -> productRepair -> repairOrders -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" 
                        value="{{$repairDetails -> productRepair -> repairOrders -> customers -> customerFullName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" 
                        value="{{$repairDetails -> productRepair -> repairOrders -> customers -> customerContact}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" 
                        value="{{$repairDetails -> productRepair -> repairOrders -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" 
                        value="{{$repairDetails -> productRepair -> repairOrders -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" 
                        value="{{$repairDetails -> productRepair -> repairOrders -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" 
                        value="{{$repairDetails -> productRepair -> repairOrders -> customers -> customerPhone2}}"  readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="technicianAssigned">No.Boleta de Reparación*</label><br>
                        <input id="technicianAssigned" type="text" class="form-control" name="technicianAssigned" value="{{$repairDetails -> productRepair -> repairOrders -> idrepair}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="technicianAssigned">Técnico Asignado*</label><br>
                        <input id="technicianAssigned" type="text" class="form-control" name="technicianAssigned" value="{{$repairDetails -> productRepair ->  repairOrders -> technicianAssigned}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="receivingDate">Fecha que se reciben los Equipos*</label>
                        <input id="receivingDate" name="receivingDate" type="date" class="form-control" value="{{$repairDetails -> productRepair -> repairOrders -> receivingDate}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="repairComments">Observaciones*</label>
                        <textarea id="repairComments" type="text" class="form-control" name="repairComments" placeholder="Comentarios de la reparación..." readonly>{{$repairDetails -> productRepair -> repairOrders -> repairComments}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Detalles del equipo a reparar</strong></p>
            <p class="text-muted">A continuación se muestran los datos del equipo a reparar:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="product">Marca*</label>
                        <input id="product" type="text" class="form-control" name="product" placeholder="Marca" 
                        value="{{$repairDetails -> productRepair -> productName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Marca*</label>
                        <input id="brand" type="text" class="form-control" name="brand" placeholder="Marca" 
                        value="{{$repairDetails -> productRepair -> productBrand}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="model">Modelo*</label>
                        <input id="model" type="text" class="form-control" name="model" placeholder="Modelo" 
                        value="{{$repairDetails -> productRepair -> productModel}}" readonly>
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
                            <input id="productSeries" name="productSeries" class="form-control" placeholder="Serie" 
                            value="{{$repairDetails -> productRepair -> productSeries}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Unidades registradas*</label>
                        <input type="number" class="form-control" value="{{$repairDetails -> productRepair -> productQuantity}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Daños reportados*</label>
                        <textarea type="text" class="form-control" placeholder="Comentarios del trabajo realizado..." readonly>{{$repairDetails -> productRepair -> productDamageComments}}</textarea>
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
<form id="modifyProductRepair" method="POST" action="{{route('repairs.updateProductRepair', ['id' => $repairDetails -> idRepairDetails])}}">
    @csrf
    @method('PUT')
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
                            <input type="hidden" id="idCustomer" name="idCustomer" value="{{$repairDetails -> productRepair -> repairOrders -> idCustomer}}">
                            <input type="hidden" id="idProductRepair" name="idProductRepair" value="{{$repairDetails -> idProductRepair}}">
                            <input type="hidden" name="productData" id="productData">
                            <label for="repairDetailsComments">Detalles del Trabajo realizado*</label>
                            <textarea id="repairDetailsComments" type="text" class="form-control" name="repairDetailsComments" placeholder="Comentarios de la reparación...">{{$repairDetails -> repairDetailsComments}}</textarea>
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
@section('productModalContent')
<div class="table-responsive">
    <table id="productTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
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
<script>
    var spareParts = {!! json_encode($spareParts) !!};
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
<script src="{{asset('HTML/dist/assets/js/repairProductEditValidation.js')}}"></script>
@endsection