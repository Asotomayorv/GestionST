@extends('layout.fluidNavbar')
@section('editQA')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Control de Calidad</li>
            </ol>
        </nav>
        <h1 class="m-0">Modificar Control de Calidad</h1>
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
                            <option value="1" @if($productQA -> productSale -> billingOrders -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($productQA -> productSale -> billingOrders -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" 
                        value="{{$productQA -> productSale -> billingOrders -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" 
                        value="{{$productQA -> productSale -> billingOrders -> customers -> customerFullName}}" readonly>
                        <span class="invalid-feedback" id="customerFullName-error">Ingresa un nombre válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" 
                        value="{{$productQA -> productSale -> billingOrders -> customers -> customerContact}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" 
                        value="{{$productQA -> productSale -> billingOrders -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" 
                        value="{{$productQA -> productSale -> billingOrders -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" 
                        value="{{$productQA -> productSale -> billingOrders -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" 
                        value="{{$productQA -> productSale -> billingOrders -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="billingOrder">No.Boleta Facturación*</label>
                        <input id="billingOrder" type="text" class="form-control" name="billingOrder" placeholder="No.Boleta de Facturación" 
                        value="{{$productQA -> productSale -> billingOrders -> idbillingOrder}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="invoiceNumber">No.Factura*</label>
                        <input id="invoiceNumber" type="text" class="form-control" name="invoiceNumber" placeholder="No.Factura" 
                        value="{{$productQA -> productSale -> billingOrders -> invoiceNumber}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="seller">Vendedor(a)*</label>
                        <input id="seller" type="text" class="form-control" name="seller" placeholder="Vendedor(a)" 
                        value="{{$productQA -> productSale -> billingOrders -> seller}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-label" for="deliveryDate">Fecha de Entrega*</label>
                        <input id="deliveryDate" name="deliveryDate" type="date" class="form-control" placeholder="Fecha" 
                        value="{{$productQA -> productSale -> billingOrders -> deliveryDate}}" readonly>
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
                        <input id="productCode" name="productCode" type="text" class="form-control" placeholder="Código" 
                        value="{{$productQA -> productSale -> products -> productCode}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="product">Producto*</label>
                        <input id="product" type="text" class="form-control" name="product" placeholder="Producto" 
                        value="{{$productQA -> productSale -> products -> productName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Marca*</label>
                        <input id="brand" type="text" class="form-control" name="brand" placeholder="Marca" 
                        value="{{$productQA -> productSale -> products -> brands -> brandName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="model">Modelo*</label>
                        <input id="model" type="text" class="form-control" name="model" placeholder="Modelo" 
                        value="{{$productQA -> productSale -> products -> models -> modelName}}" readonly>
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
                            value="{{$productQA -> productSale -> products -> productSeries}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productQuantity">Unidades registradas*</label>
                        <input id="productQuantity" type="number" class="form-control" name="productQuantity" 
                        value="{{$productQA -> productSale -> productQuantity}}" readonly>
                    </div>
                </div>
            </div>
            <form id="modifyQualityControl" method="POST" action="{{route('qualityControl.updateQA', ['id' => $productQA -> idQualityControl])}}">
                @csrf
                @method('PUT') <!-- Método PUT para actualizar el usuario -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Control de Calidad*</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="accesories" id="accesories" value="1" {{ $productQA -> accesories ? 'checked' : '' }}>
                                <label class="form-check-label" for="accesories">Accesorios</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="adapter" id="adapter" value="1" {{ $productQA -> adapter ? 'checked' : '' }}>
                                <label class="form-check-label" for="adapter">Adaptador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="display" id="display" value="1" {{ $productQA -> display ? 'checked' : '' }}>
                                <label class="form-check-label" for="display">Pantalla</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="keyboard" id="keyboard" value="1" {{ $productQA -> keyboard ? 'checked' : '' }}>
                                <label class="form-check-label" for="keyboard">Teclado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cases" id="cases" value="1" {{ $productQA -> cases ? 'checked' : '' }}>
                                <label class="form-check-label" for="cases">Tapas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="carReader" id="carReader" value="1" {{ $productQA -> carReader ? 'checked' : '' }}>
                                <label class="form-check-label" for="carReader">Tarjeta Próx.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="battery" id="battery" value="1" {{ $productQA -> battery ? 'checked' : '' }}>
                                <label class="form-check-label" for="battery">Batería</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="sound" id="sound" value="1" {{ $productQA -> sound ? 'checked' : '' }}>
                                <label class="form-check-label" for="sound">Sonido</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="wifi" id="wifi" value="1" {{ $productQA -> wifi ? 'checked' : '' }}>
                                <label class="form-check-label" for="wifi">WiFi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="installationBase" id="installationBase" value="1" {{ $productQA -> installationBase ? 'checked' : '' }}>
                                <label class="form-check-label" for="installationBase">Base de Instalación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="communication" id="communication" value="1" {{ $productQA -> communication ? 'checked' : '' }}>
                                <label class="form-check-label" for="communication">Comunicación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="camera" id="camera" value="1" {{ $productQA -> camera ? 'checked' : '' }}>
                                <label class="form-check-label" for="camera">Cámara</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tcpIp" id="tcpIp" value="1" {{ $productQA -> tcpIp ? 'checked' : '' }}>
                                <label class="form-check-label" for="tcpIp">TCP/IP</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="downUSB" id="downUSB" value="1" {{ $productQA -> downUSB ? 'checked' : '' }}>
                                <label class="form-check-label" for="downUSB">Descarga USB</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="rs485" id="rs485" value="1" {{ $productQA -> rs485 ? 'checked' : '' }}>
                                <label class="form-check-label" for="rs485">RS485</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="downSDCard" id="downSDCard" value="1" value="1" {{ $productQA -> downSDCard ? 'checked' : '' }}>
                                <label class="form-check-label" for="downSDCard">Descarga SD</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="miniUSB" id="miniUSB" value="1" value="1" {{ $productQA -> miniUSB ? 'checked' : '' }}>
                                <label class="form-check-label" for="miniUSB">Mini USB</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="rs232" id="rs232" value="1" value="1" {{ $productQA -> rs232 ? 'checked' : '' }}>
                                <label class="form-check-label" for="rs232">RS232</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="reader" id="reader" value="1" value="1" {{ $productQA -> reader ? 'checked' : '' }}>
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
                                    <option value="{{$technician -> userName . ' ' . $technician -> userLastName1}}" 
                                        {{$productQA -> technicianAssigned == $technician -> userName . ' ' . $technician -> userLastName1 ? 'selected' : ''}}>
                                        {{$technician -> userName . ' ' . $technician -> userLastName1}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idProductSale" name="idProductSale" value="{{$productQA -> idProductSale}}">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="{{$productQA -> productSale -> billingOrders -> customers -> idCustomer}}">
                            <label for="technicianComments">Observaciones*</label>
                            <textarea id="technicianComments" type="text" class="form-control" name="technicianComments" placeholder="Detalle de la revisión realizada...">{{$productQA -> technicianComments}}</textarea>
                            <span class="invalid-feedback" id="technicianComments-error">Debes ingresar una descripción de revisión realizada</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-right">
                            <a href="{{route('qualityControl.listQA')}}" class="btn btn-danger ml-3">Cancelar</a>
                            <button type="submit" id="submitBtn" class="btn btn-success ml-3">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
<script src="{{asset('HTML/dist/assets/js/productQAFormValidation.js')}}"></script> 
@endsection