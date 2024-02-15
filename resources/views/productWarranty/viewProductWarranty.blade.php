@extends('layout.fluidNavbar')
@section('viewProductWarranty')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Facturación</li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Garantías</li>
                </ol>
            </nav>
            <h1 class="m-0">Detalles de Garantía</h1>
        </div>
        <a href="{{route('productWarranty.productWarrantyList')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$productWarranty -> productSale -> billingOrders -> customers -> customerFullName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($productWarranty -> productSale -> billingOrders -> customers -> customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($productWarranty -> productSale -> billingOrders -> customers -> customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerID">Cédula*</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" placeholder="0-000-000000" 
                        value="{{$productWarranty -> productSale -> billingOrders -> customers -> customerID}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerFullName">Nombre/Razón Social*</label>
                        <input id="customerFullName" type="text" class="form-control" name="customerFullName" placeholder="Nombre Completo" 
                        value="{{$productWarranty -> productSale -> billingOrders -> customers -> customerFullName}}" readonly>
                        <span class="invalid-feedback" id="customerFullName-error">Ingresa un nombre válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto*</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" placeholder="Contacto" 
                        value="{{$productWarranty -> productSale -> billingOrders -> customers -> customerContact}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1*</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="nombre@correo.com" 
                        value="{{$productWarranty -> productSale -> billingOrders -> customers -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" placeholder="nombre@correo.com" 
                        value="{{$productWarranty -> productSale -> billingOrders -> customers -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1*</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="0000-0000" 
                        value="{{$productWarranty -> productSale -> billingOrders -> customers -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" placeholder="0000-0000" 
                        value="{{$productWarranty -> productSale -> billingOrders -> customers -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="billingOrder">No.Boleta Facturación*</label>
                        <input id="billingOrder" type="text" class="form-control" name="billingOrder" placeholder="No.Boleta de Facturación" 
                        value="{{$productWarranty -> productSale -> billingOrders -> idbillingOrder}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="seller">Vendedor(a)*</label>
                        <input id="seller" type="text" class="form-control" name="seller" placeholder="Vendedor(a)" 
                        value="{{$productWarranty -> productSale -> billingOrders -> seller}}" readonly>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productCode">Código de Producto*</label>
                        <input id="productCode" name="productCode" type="text" class="form-control" placeholder="Código" 
                        value="{{$productWarranty -> productSale -> products -> productCode}}"  readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="product">Producto*</label>
                        <input id="product" type="text" class="form-control" name="product" placeholder="Producto" 
                        value="{{$productWarranty -> productSale -> products -> productName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Marca*</label>
                        <input id="brand" type="text" class="form-control" name="brand" placeholder="Marca" 
                        value="{{$productWarranty -> productSale -> products -> brands -> brandName}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="model">Modelo*</label>
                        <input id="model" type="text" class="form-control" name="model" placeholder="Modelo" 
                        value="{{$productWarranty -> productSale -> products -> models -> modelName}}"  readonly>
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
                            value="{{$productWarranty -> productSale -> products -> productSeries}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productQuantity">Unidades registradas*</label>
                        <input id="productQuantity" type="number" class="form-control" name="productQuantity" 
                        value="{{$productWarranty -> productSale -> products -> productQuantity}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="dateCreation">Fecha de Compra*</label>
                            <input id="dateCreation" name="dateCreation" type="date" class="form-control" value="{{$productWarranty -> purchaseDate}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="text-label" for="deliveryDate">Fecha de Entrega*</label>
                            <input id="deliveryDate" name="deliveryDate" type="date" class="form-control" placeholder="Fecha" 
                            value="{{$productWarranty -> deliveryDate}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="invoiceNumber">No.Factura*</label>
                            <input id="invoiceNumber" type="text" class="form-control" name="invoiceNumber" placeholder="No.Factura" 
                            value="{{$productWarranty -> invoiceNumber}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="totalWarranty">Periodo de Garantía</label>
                            <input id="totalWarranty" type="text" class="form-control" name="totalWarranty" placeholder="Total de la garantia" 
                            value="{{$productWarranty -> totalWarranty}}" readonly>
                            <span class="invalid-feedback" id="totalWarranty-error">Ingresa un plazo válido en meses.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idProductSale" name="idProductSale" value="{{$productWarranty -> productSale -> idProductSale}}">
                            <input type="hidden" id="idCustomer" name="idCustomer" value="{{$productWarranty -> productSale -> billingOrders -> customers -> idCustomer}}">
                            <label for="technicianComments">Observaciones*</label>
                            <textarea id="technicianComments" type="text" class="form-control" name="technicianComments" placeholder="Comentarios de la garantía..." readonly>{{$productWarranty -> technicianComments}}</textarea>
                            <span class="invalid-feedback" id="technicianComments-error">Debes ingresar una descripción de la garantía</span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="dateLastEdit">Última Edición</label>
                            <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$productWarranty -> dateLastEdit}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="userLastEdit">Usuario</label>
                            <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$productWarranty -> userNameLastEdit}}" readonly>
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
<div class="text-right mb-5">
    <a href="{{route('productWarranty.productWarrantyList')}}" class="btn btn-primary ml-3">Regresar</a>
    <a href="{{route('productWarranty.editProductWarranty', ['id' => $productWarranty -> idproductWarranty])}}" class="btn btn-success ml-3"">
        <i class="material-icons">edit</i> Editar Garantía</a>
</div>  
<script src="{{asset('HTML/dist/assets/js/productWarrantyForm.js')}}"></script> 
@endsection