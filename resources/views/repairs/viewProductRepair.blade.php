@extends('layout.fluidNavbar')
@section('viewProductRepair')
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
                <span class="pricing__amount headings-color">{{$repairDetail -> productRepair -> productName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($repairDetail -> productRepair -> repairOrders -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($repairDetail -> productRepair -> repairOrders -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" 
                        value="{{$repairDetail -> productRepair -> repairOrders -> customers -> customerID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" 
                        value="{{$repairDetail -> productRepair -> repairOrders -> customers -> customerFullName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" 
                        value="{{$repairDetail -> productRepair -> repairOrders -> customers -> customerContact}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" 
                        value="{{$repairDetail -> productRepair -> repairOrders -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" 
                        value="{{$repairDetail -> productRepair -> repairOrders -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" 
                        value="{{$repairDetail -> productRepair -> repairOrders -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" 
                        value="{{$repairDetail -> productRepair -> repairOrders -> customers -> customerPhone2}}"  readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="technicianAssigned">No.Boleta de Reparación*</label><br>
                        <input id="technicianAssigned" type="text" class="form-control" name="technicianAssigned" value="{{$repairDetail -> productRepair -> repairOrders -> idrepair}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="technicianAssigned">Técnico Asignado*</label><br>
                        <input id="technicianAssigned" type="text" class="form-control" name="technicianAssigned" value="{{$repairDetail -> productRepair -> repairOrders -> technicianAssigned}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="receivingDate">Fecha que se reciben los Equipos*</label>
                        <input id="receivingDate" name="receivingDate" type="date" class="form-control" value="{{$repairDetail -> productRepair -> repairOrders -> receivingDate}}" readonly>
                        <span class="invalid-feedback" id="receivingDate-error">Debes ingresar una fecha válida</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="hidden" id="idCustomer" name="idCustomer" value="">
                        <input type="hidden" name="productData" id="productData">
                        <label for="repairComments">Observaciones*</label>
                        <textarea id="repairComments" type="text" class="form-control" name="repairComments" placeholder="Comentarios de la reparación..." readonly>{{$repairDetail -> productRepair -> repairOrders -> repairComments}}</textarea>
                        <span class="invalid-feedback" id="repairComments-error">Debes ingresar una observación o comentario.</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Marca*</label>
                        <input id="brand" type="text" class="form-control" name="brand" placeholder="Marca" 
                        value="{{$repairDetail -> productRepair -> productBrand}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="model">Modelo*</label>
                        <input id="model" type="text" class="form-control" name="model" placeholder="Modelo" 
                        value="{{$repairDetail -> productRepair -> productModel}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productQuantity">Unidades registradas*</label>
                        <input id="productQuantity" type="number" class="form-control" name="productQuantity" 
                        value="{{$repairDetail -> productRepair -> productQuantity}}" readonly>
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
                            value="{{$repairDetail -> productRepair -> productSeries}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="repairComments">Daños reportados*</label>
                        <textarea id="repairComments" type="text" class="form-control" name="repairComments" placeholder="Comentarios de la reparación..." readonly>{{$repairDetail -> productRepair -> productDamageComments}}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="repairComments">Repuestos Utilizados (Si aplica)</label>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <!-- <div class="card-header card-header-large bg-white d-flex align-items-center">
                        <h4 class="card-header__title flex m-0">Repuestos Utilizados (Si aplica)</h4>
                    </div> -->
                    <table id="selectedProductTable" class="table mb-0 thead-border-top-0 table-striped">
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
                            @foreach($spareParts as $sparePart)
                            <tr>
                                <td class="text-center">{{$sparePart -> products -> productName}}</td>
                                <td class="text-center">{{$sparePart -> products -> brands -> brandName}}</td>
                                <td class="text-center">{{$sparePart -> products -> models -> modelName}}</td>
                                <td class="text-center">{{$sparePart -> products -> productSeries}}</td>
                                <td class="text-center">{{$sparePart -> productQuantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="repairComments">Detalles del trabajo realizado*</label>
                        <textarea id="repairComments" type="text" class="form-control" name="repairComments" placeholder="Comentarios de la reparación..." readonly>{{$repairDetail -> repairDetailsComments}}</textarea>
                        <span class="invalid-feedback" id="repairComments-error">Debes ingresar una observación o comentario.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <a href="{{route('repairs.listProductRepair')}}" class="btn btn-primary ml-3">Regresar</a>
                         <!-- <button class="btn btn-primary ml-3" onclick="printInvoice()">Vista Previa</button> -->
                        <a href="{{route('repairs.editProductRepair', ['id' => $repairDetail -> idRepairDetails])}}" class="btn btn-success ml-3">
                            <i class="material-icons">edit</i> Editar Reparación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('HTML/dist/assets/js/viewRepairOrder.js')}}"></script>
@endsection