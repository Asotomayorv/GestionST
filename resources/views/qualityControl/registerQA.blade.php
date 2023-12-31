@extends('layout.fluidNavbar')
@section('registerQA')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Control de Calidad</li>
            </ol>
        </nav>
        <h1 class="m-0">Registrar Nuevo Control de Calidad</h1>
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
                        <label for="billingOrder">No.Boleta Facturación*</label>
                        <input id="billingOrder" type="text" class="form-control" name="billingOrder" placeholder="No.Boleta de Facturación" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="invoiceNumber">No.Factura*</label>
                        <input id="invoiceNumber" type="text" class="form-control" name="invoiceNumber" placeholder="No.Factura" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="seller">Vendedor(a)*</label>
                        <input id="seller" type="text" class="form-control" name="seller" placeholder="Vendedor(a)" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="deliveryDate">Fecha de Entrega*</label>
                        <input id="deliveryDate" name="deliveryDate" type="text" class="form-control" placeholder="Fecha" readonly>
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
            <p><strong class="headings-color">Equipo a Revisar</strong></p>
            <p class="text-muted">Seleccione el equipo al que desea realizar el control de calidad:</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productCode">Código de Producto*</label>
                        <input id="productCode" name="productCode" type="text" class="form-control" placeholder="Código" readonly>
                    </div>
                </div>
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
                        <button type="button" class="btn btn-primary" id="searchProductButton" style="margin-top: 25px;" title="Buscar Productos Registrados" 
                        data-url="{{route('qualityControl.getProducts', ['id'])}}"><i class="material-icons">search</i></button>
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
            <form id="registerQualityControl" method="POST" action="{{route('qualityControl.register')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Control de Calidad*</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="accesories" id="accesories" value="1">
                                <label class="form-check-label" for="accesories">Accesorios</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="adapter" id="adapter" value="1">
                                <label class="form-check-label" for="adapter">Adaptador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="display" id="display" value="1">
                                <label class="form-check-label" for="display">Pantalla</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="keyboard" id="keyboard" value="1">
                                <label class="form-check-label" for="keyboard">Teclado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cases" id="cases" value="1">
                                <label class="form-check-label" for="cases">Tapas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="carReader" id="carReader" value="1">
                                <label class="form-check-label" for="carReader">Tarjeta Próx.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="battery" id="battery" value="1">
                                <label class="form-check-label" for="battery">Batería</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="sound" id="sound" value="1">
                                <label class="form-check-label" for="sound">Sonido</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="wifi" id="wifi" value="1">
                                <label class="form-check-label" for="wifi">WiFi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="installationBase" id="installationBase" value="1">
                                <label class="form-check-label" for="installationBase">Base de Instalación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="communication" id="communication" value="1">
                                <label class="form-check-label" for="communication">Comunicación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="camera" id="camera" value="1">
                                <label class="form-check-label" for="camera">Cámara</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tcpIp" id="tcpIp" value="1">
                                <label class="form-check-label" for="tcpIp">TCP/IP</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="downUSB" id="downUSB" value="1">
                                <label class="form-check-label" for="downUSB">Descarga USB</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="rs485" id="rs485" value="1">
                                <label class="form-check-label" for="rs485">RS485</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="downSDCard" id="downSDCard" value="1">
                                <label class="form-check-label" for="downSDCard">Descarga SD</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="miniUSB" id="miniUSB" value="1">
                                <label class="form-check-label" for="miniUSB">Mini USB</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="rs232" id="rs232" value="1">
                                <label class="form-check-label" for="rs232">RS232</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="reader" id="reader" value="1">
                                <label class="form-check-label" for="reader">Lector</label>
                            </div>
                        </div>
                        <span class="invalid-feedback" id="checkDetails-error">Debes seleccionar las casillas que cumplen con lo revisado.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="technicianAssigned">Técnico que Revisó*</label><br>
                            <select id="technicianAssigned" name="technicianAssigned" class="custom-select">
                                @foreach ($technicians as $technician)
                                    <option value="{{$technician -> userName . ' ' . $technician -> userLastName1}}">{{$technician -> userName . ' ' . $technician -> userLastName1}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idProductSale" name="idProductSale" value="">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="">
                            <label for="technicianComments">Observaciones*</label>
                            <textarea id="technicianComments" type="text" class="form-control" name="technicianComments" placeholder="Detalle de la revisión realizada..."></textarea>
                            <span class="invalid-feedback" id="technicianComments-error">Debes ingresar una descripción de revisión realizada</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-right">
                            <a href="{{route('qualityControl.listQA')}}" class="btn btn-danger ml-3">Cancelar</a>
                            <button type="submit" id="submitBtn" class="btn btn-success ml-3">Registrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@section('clientModalContent')
<div class="table-responsive">
    <div class="table-responsive">
        <table id="customerTable" class="table mb-0 thead-border-top-0 table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">receipt</i><span>No.Boleta Facturación<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">receipt</i><span>No.Factura<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">folder_shared</i><span>Cédula</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">user</i><span>Vendedor(a)<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($billingOrders as $billingOrder)
                <tr data-customer-email2="{{$billingOrder -> customers -> customerEmail2}}" data-customer-phone2="{{$billingOrder -> customers -> customerPhone2}}" 
                    data-customer-id="{{$billingOrder -> customers -> idCustomer}}" data-customer-phone1="{{$billingOrder -> customers -> customerPhone1}}"
                    data-customer-email1="{{$billingOrder -> customers -> customerEmail1}}" data-customer-contact="{{$billingOrder -> customers -> customerContact}}"
                    data-customer-typeid="{{$billingOrder -> customers -> customertypeID}}">
                        <td class="text-center">{{$billingOrder -> idbillingOrder}}</td>
                        <td class="text-center">{{$billingOrder -> invoiceNumber}}</td>
                        <td class="text-center">{{$billingOrder -> customers -> customerID}}</td>
                        <td class="text-center">{{$billingOrder -> customers -> customerFullName}}</td>
                        <td class="text-center">{{$billingOrder -> seller}}</td>
                        <td class="text-center">{{$billingOrder -> deliveryDate}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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
<!-- Mensajes al usuario -->
@if (session('createError'))
    <script>
        $(document).ready(function() {
            toastr.warning("{{ session('createError') }}", "Error al registrar la Boleta de Instalación");
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
<script src="{{asset('HTML/dist/assets/js/productQAFormValidation.js')}}"></script> 
@endsection