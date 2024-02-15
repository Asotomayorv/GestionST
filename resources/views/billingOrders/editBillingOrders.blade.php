@extends('layout.fluidNavbar')
@section('editBillingOrders')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Facturación</li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Ventas y Cotizaciones</li>
                </ol>
            </nav>
            <h1 class="m-0">Modificar Venta/Contización</h1>
        </div>
        <a href="{{route('billingOrders.listBillingOrders')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
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
                <input id="idCustomer" type="hidden" name="idCustomer" value="{{$billingOrders -> customers -> idCustomer}}">
                <input id="customerTaxes" type="hidden" name="customerTaxes" value="{{$billingOrders -> customers -> customerTaxes}}">
                <input id="customerAddress2" type="hidden" name="customerAddress2" value="{{$billingOrders -> customers -> customerAddress2}}">
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($billingOrders -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($billingOrders -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" value="{{$billingOrders -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" value="{{$billingOrders -> customers -> customerFullName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" value="{{$billingOrders -> customers -> customerContact}}"readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" value="{{$billingOrders -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" value="{{$billingOrders -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" value="{{$billingOrders -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" value="{{$billingOrders -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly>{{$billingOrders -> customers -> customerAddress1}}</textarea>
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
<div class="card">
    <div class="table-responsive">
        <div class="card-header card-header-large bg-white d-flex align-items-center">
            <h4 class="card-header__title flex m-0">Productos Seleccionados</h4>
            <button data-toggle="modal" data-target="#productSearchModal" 
            id="searchProductButton" class="btn btn-success">Añadir Producto <i class="material-icons">add</i></button>
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
                    <th class="text-center">¿Requiere Instalación?</th>
                </tr>
            </thead>
            <tbody class="list">
            </tbody>
        </table>
    </div>
</div>
<form id="modifyBillingOrder" method="POST" action="{{route('billingOrders.updateBillingOrders', ['id' => $billingOrders -> idbillingOrder])}}">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar el Cliente -->
    <div class="card card-form">
       <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Datos de la boleta</strong></p>
            <p class="text-muted">Ingresa los detalles de la boleta de facturación:</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="{{$billingOrders -> idCustomer}}">
                            <input type="hidden" name="productData" id="productData">
                            <label for="invoiceNumber">No.Orden de Compra*</label>
                            <input id="invoiceNumber" type="text" class="form-control" name="invoiceNumber" value="{{$billingOrders -> invoiceNumber}}" placeholder="No.Orden de Compra">
                            <span class="invalid-feedback" id="invoiceNumber-error">Ingresa un Número de Orden de Compra válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="seller">Vendedor(a)*</label>
                            <select id="seller" type="text" class="form-control" name="seller" placeholder="">
                                @foreach ($sellers as $seller)
                                    <option value="{{$seller->userName . ' ' . $seller->userLastName1}}" {{$billingOrders->seller == $seller->userName . ' ' . $seller->userLastName1 ? 'selected' : ''}}>
                                        {{$seller->userName . ' ' . $seller->userLastName1}}
                                    </option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="paymentMethod">Método de pago*</label>
                            <select id="paymentMethod" name="paymentMethod" class="form-control">
                                <option value="Efectivo" {{ $billingOrders->paymentMethod == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="Tarjeta" {{ $billingOrders->paymentMethod == 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                                <option value="SINPE" {{ $billingOrders->paymentMethod == 'SINPE' ? 'selected' : '' }}>SINPE</option>
                                <option value="Transferencia Bancaria" {{ $billingOrders->paymentMethod == 'Transferencia Bancaria' ? 'selected' : '' }}>Transferencia Bancaria</option>
                                <option value="Depósito" {{ $billingOrders->paymentMethod == 'Depósito' ? 'selected' : '' }}>Depósito</option>
                                <option value="Pago a plazos 8 días" {{ $billingOrders->paymentMethod == 'Pago a plazos 8 días' ? 'selected' : '' }}>Pago a plazos 8 días</option>
                                <option value="Pago a plazos 15 días" {{ $billingOrders->paymentMethod == 'Pago a plazos 15 días' ? 'selected' : '' }}>Pago a plazos 15 días</option>
                                <option value="Pago a plazos 30 días" {{ $billingOrders->paymentMethod == 'Pago a plazos 30 días' ? 'selected' : '' }}>Pago a plazos 30 días</option>
                                <option value="Pago a plazos 60 días" {{ $billingOrders->paymentMethod == 'Pago a plazos 60 días' ? 'selected' : '' }}>Pago a plazos 60 días</option>
                                <option value="Pago a plazos 90 días" {{ $billingOrders->paymentMethod == 'Pago a plazos 90 días' ? 'selected' : '' }}>Pago a plazos 90 días</option>
                            </select>
                            <span class="invalid-feedback" id="paymentMethod-error">Ingresa un método de pago válido.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="deliveryDate">Fecha de Entrega*</label>
                            <input id="deliveryDate" name="deliveryDate" type="date" class="form-control" value="{{$billingOrders -> deliveryDate}}">
                            <span class="invalid-feedback" id="deliveryDate-error">Seleccione una fecha válida.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="totalBilling">Total a Facturar*</label>
                            <input id="totalBilling" type="text" class="form-control" name="totalBilling" placeholder="Total a Facturar" value="{{$billingOrders -> totalBilling}}">
                            <span class="invalid-feedback" id="taxes-error">Ingresa el valor total a facturar.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="totalPrice">Precio general</label>
                            <input id="totalPrice" type="text" class="form-control" name="totalPrice" placeholder="Costo General" value="{{$billingOrders -> totalPrice}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="taxes">Impuestos I.V.A</label>
                            <input id="taxes" type="text" class="form-control" name="taxes" placeholder="Impuestos" value="{{$billingOrders -> taxes}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="saleComments">Comentarios*</label>
                            <textarea id="saleComments" type="text" class="form-control" name="saleComments" placeholder="Observaciones de la venta...">{{$billingOrders -> saleComments}}</textarea>
                            <span class="invalid-feedback" id="saleComments-error">Ingresa un comentario válido.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <a href="{{route('billingOrders.listBillingOrders')}}" class="btn btn-danger ml-3">Cancelar</a>
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
                <th class="text-center">
                    <i class="material-icons icon-16pt text-muted mr-1">class</i><span>Cantidad<span>
                </th>
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
<script src="{{asset('HTML/dist/assets/js/billingOrderEditValidationForm.js')}}"></script> 
@endsection