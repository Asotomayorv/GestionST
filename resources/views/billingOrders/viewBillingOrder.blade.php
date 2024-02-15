@extends('layout.fluidNavbar')
@section('viewBillingOrder')
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
            <h1 class="m-0">Detalle de Venta/Contización</h1>
        </div>
        <a href="{{route('billingOrders.listBillingOrders')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$billingOrders -> customers -> customerFullName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input id="idCustomer" type="hidden" name="idCustomer" value="{{$billingOrders -> customers -> idCustomer}}">
                        <input id="customerAddress2" type="hidden" name="customerAddress2" value="{{$billingOrders -> customers -> customerAddress2}}">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($billingOrders -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($billingOrders -> customers -> customertypeID == 1) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerID">Cédula</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" value="{{$billingOrders -> customers -> customerID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" value="{{$billingOrders -> customers -> customerContact}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerTaxes">Paga Impuestos?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customerTaxes" name="customerTaxes" @if($billingOrders -> customers -> customerTaxes == 1) checked @endif disabled>
                            <label class="custom-control-label" for="customerTaxes">Sí</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" value="{{$billingOrders -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" value="{{$billingOrders -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" value="{{$billingOrders -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" value="{{$billingOrders -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly>{{$billingOrders -> customers -> customerAddress1}}</textarea>
                        <span class="invalid-feedback" id="customerAddress1-error">Ingresa una dirección.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="hidden" id="idCustomer" name="idCustomer" value="{{$billingOrders -> idCustomer}}">
                        <input type="hidden" name="productData" id="productData">
                        <label for="invoiceNumber">No.Orden de Compra*</label>
                        <input id="invoiceNumber" type="text" class="form-control" name="invoiceNumber" value="{{$billingOrders -> invoiceNumber}}" placeholder="No.Orden de Compra" readonly>
                        <span class="invalid-feedback" id="invoiceNumber-error">Ingresa un Número de Orden de Compra válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="seller">Vendedor(a)*</label>
                        <select id="seller" type="text" class="form-control" name="seller" placeholder="" disabled>
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
                        <select id="paymentMethod" name="paymentMethod" class="form-control" disabled>
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
                        <input id="deliveryDate" name="deliveryDate" type="date" class="form-control" value="{{$billingOrders -> deliveryDate}}" readonly>
                        <span class="invalid-feedback" id="deliveryDate-error">Seleccione una fecha válida.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="totalBilling">Total a Facturar*</label>
                        <input id="totalBilling" type="text" class="form-control" name="totalBilling" placeholder="Total a Facturar" value="{{$billingOrders -> totalBilling}}" readonly>
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
                        <textarea id="saleComments" type="text" class="form-control" name="saleComments" placeholder="Observaciones de la venta..." readonly>{{$billingOrders -> saleComments}}</textarea>
                        <span class="invalid-feedback" id="saleComments-error">Ingresa un comentario válido.</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$billingOrders -> dateLastEdit}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$billingOrders -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <a href="{{route('billingOrders.listBillingOrders')}}" class="btn btn-primary ml-3">Regresar</a>
                         <!-- <button class="btn btn-primary ml-3" onclick="printInvoice()">Vista Previa</button> -->
                        <a href="{{route('billingOrders.pdfBillingOrder', ['id' => $billingOrders -> idbillingOrder])}}" 
                            class="btn btn-primary ml-3" target="_blank">Vista Previa</a>
                        <a href="{{route('billingOrders.editBillingOrders', ['id' => $billingOrders -> idbillingOrder])}}" 
                            class="btn btn-success ml-3">
                            <i class="material-icons">edit</i> Editar Boleta de Facturación</a>
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
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">¿Requiere Instalación?</th>
                </tr>
            </thead>
            <tbody class="list">
            </tbody>
        </table>
    </div>
</div>
<script>
    var selectedProducts = {!! json_encode($selectedProducts) !!};
 </script>
 <script>
    function printInvoice() {
        // Abre una nueva ventana o pestaña
        var printWindow = window.open('', '_blank');
        
        // Construye el contenido que se imprimirá
        var printContent = '<html><head><title>Boleta de Facturación</title></head><body>';
        printContent += '<h1>Boleta de Facturación</h1>';
        // Agrega el contenido de la boleta aquí (puedes utilizar el mismo contenido que muestras en la vista)
        
        // ...
    
        printContent += '</body></html>';
    
        // Escribe el contenido en la nueva ventana o pestaña
        printWindow.document.write(printContent);
    
        // Llama al método de impresión de la ventana o pestaña
        printWindow.document.close();
        printWindow.print();
    }
</script>
<script src="{{asset('HTML/dist/assets/js/viewBillingOrder.js')}}"></script> 
@endsection