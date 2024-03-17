@extends('layout.fluidNavbar')
@section('productEdit')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Bodega</li>
                    <li class="breadcrumb-item active">Gestión de Inventario</li>
                </ol>
            </nav>
            <h1 class="m-0">Modificar Producto</h1>
        </div>
        <a href="{{route('products.productsList')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<form id="modifyProduct" method="POST" action="{{route('products.updateProduct', ['id' => $product -> idproduct])}}">
@csrf
@method('PUT') <!-- Método PUT para actualizar el usuario -->
<div class="card card-form">
    <div class="row no-gutters">
        <div class="col-lg-3 card-body">
            <p><strong class="headings-color">Información del Producto</strong></p>
            <p class="text-muted">Modifique los datos y luego haga click en "Actualizar".</p>
        </div>
        <div class="col-lg-9 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productCode">Código de Producto*</label>
                        <input id="productCode" name="productCode" type="text" class="form-control" placeholder="Código" value="{{$product -> productCode}}">
                        <span class="invalid-feedback" id="productCode-error">Ingresa un código de producto válido.</span>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="form-group">
                        <label for="productCategory">Categoría*</label><br>
                        <select id="productCategory" name="productCategory" class="custom-select">
                            <option value="Equipo" {{ $product->productCategory == 'Equipo' ? 'selected' : '' }}>Equipo</option>
                            <option value="Repuesto" {{ $product->productCategory == 'Repuesto' ? 'selected' : '' }}>Repuesto</option>
                            <option value="Suministros" {{ $product->productCategory == 'Suministros' ? 'selected' : '' }}>Suministros</option>
                            <option value="Kit o Componentes" {{ $product->productCategory == 'Kit o Componentes' ? 'selected' : '' }}>Kit o Componentes</option>
                            <option value="Accesorio para Reloj Marcador" {{ $product->productCategory == 'Accesorio para Reloj Marcador' ? 'selected' : '' }}>Accesorio para Reloj Marcador</option>
                            <option value="Otros" {{ $product->productCategory == 'Otros' ? 'selected' : '' }}>Otros</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="form-group">
                        <label for="idSupplier">Proveedor*</label><br>
                        <select id="idSupplier" name="idSupplier" class="custom-select">
                            @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->idSupplier}}" {{$product->idSupplier == $supplier->idSupplier ? 'selected' : ''}}>
                                    {{$supplier->supplierName}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productName">Producto/Equipo*</label>
                        <input id="productName" name="productName" type="text" class="form-control" placeholder="Nombre del Producto" value="{{$product -> productName}}">
                        <span class="invalid-feedback" id="productName-error">Ingresa un nombre de producto válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="modifyProductBrand">Marca*</label><br>
                        <select id="modifyProductBrand" name="modifyProductBrand" class="custom-select" data-url="{{route('products.getModels', ['id'])}}"
                        data-id="{{$product -> productModel}}">
                            <option value="">Seleccionar Marca</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->idBrand }}" {{$product->productBrand == $brand->idBrand ? 'selected' : ''}}>
                                    {{ $brand->brandName }}
                                </option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" id="modifyProductBrand-error">Debe seleccionarse una marca.</span>
                    </div>
                </div>
                    <div class="col">
                    <div class="form-group">
                        <label for="productModel">Modelo*</label>
                        <select id="productModel" name="productModel" class="form-control">
                            <option value="">Seleccionar Modelo</option>
                        </select>
                        <span class="invalid-feedback" id="productName-error">Debe seleccionarse un modelo.</span>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="productDescription">Descripción del Producto*</label><br>
                            <textarea id="productDescription" name="productDescription" class="form-control" placeholder="Descripción del producto...">{{$product -> productDescription}}</textarea>
                            <span class="invalid-feedback" id="productDescription-error">Ingresa una descripción de producto válida.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productSerie">¿Producto con seriales?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="productSerie" name="productSerie" value="1" data-id="{{$product -> productSeries}}">
                            <label class="custom-control-label" for="productSerie">Sí</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="productSeries">Serie del Producto</label><br>
                            <input id="productSeries" name="productSeries" class="form-control" placeholder="Serie" value="{{$product -> productSeries}}" disabled>
                            <span class="invalid-feedback" id="productSeries-error">Si el equipo lleva serie, debes ingresarla.</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productExchangeRateCost">Tipo de Cambio Costo ₡*</label><br>
                        <input id="productExchangeRateCost"  name="productExchangeRateCost" type="text" class="form-control" placeholder="Compra CRC" value="{{$product -> productExchangeRateCost}}" oninput="calculateValues()">
                        <span class="invalid-feedback" id="productExchangeRateCost-error">Ingresa un tipo de cambio de costo válido.</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productCostDollars">Costo $*</label><br>
                        <input id="productCostDollars"  name="productCostDollars" type="text" class="form-control" placeholder="Costo USD" value="{{$product -> productCostDollars}}" oninput="calculateValues()">
                        <span class="invalid-feedback" id="productExchangeRateCost-error">Ingresa el costo en dólares en un formato válido.</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productCostColones">Costo ₡</label><br>
                        <input id="productCostColones"  name="productCostColones" type="text" class="form-control" value="{{$product -> productCostColones}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productExchangeRateSale">Tipo de Cambio Venta ₡*</label><br>
                        <input id="productExchangeRateSale"  name="productExchangeRateSale" type="text" class="form-control" placeholder="Venta CRC" value="{{$product -> productExchangeRateSale}}" oninput="calculateValues()">
                        <span class="invalid-feedback" id="productExchangeRateCost-error">Ingresa un tipo de cambio de venta válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productSaleDollars">Venta $*</label><br>
                        <input id="productSaleDollars"  name="productSaleDollars" type="text" class="form-control" placeholder="Venta USD" value="{{$product -> productSaleDollars}}" oninput="calculateValues()">
                        <span class="invalid-feedback" id="productExchangeRateCost-error">Ingresa la venta en dólares en un formato válido.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productSaleColones">Venta ₡</label><br>
                        <input id="productSaleColones"  name="productSaleColones" type="text" class="form-control" value="{{$product -> productSaleColones}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productProfitPercentage">Utilidad %</label><br>
                        <input id="productProfitPercentage"  name="productProfitPercentage" type="text" class="form-control" value="{{$product -> productProfitPercentage}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productQuantity">Cantidad*</label><br>
                        <input id="productQuantity"  name="productQuantity" type="number" class="form-control" placeholder="Cantidad" value="{{$product -> productQuantity}}">
                        <span class="invalid-feedback" id="productQuantity-error">Se debe definir una cantidad para el producto.</span>
                        <span class="invalid-feedback" id="quantityError">La cantidad debe estar entre el mínimo y el máximo.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="minimumProduct">Mínimo*</label><br>
                        <input id="minimumProduct" name="minimumProduct" type="number" class="form-control" placeholder="Mínimo" value="{{$product -> minimumProduct}}">
                        <span class="invalid-feedback" id="minimumProduct-error">Se debe definir la cantidad mínima para el producto.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="maximumProduct">Máximo*</label><br>
                        <input id="maximumProduct" name="maximumProduct" type="number" class="form-control" placeholder="Máximo" value="{{$product -> maximumProduct}}">
                        <span class="invalid-feedback" id="maximumProduct-error">Se debe definir la cantidad máxima para el producto.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productLocation1">Localización 1*</label><br>
                        <input id="productLocation1" name="productLocation1" type="text" class="form-control" placeholder="Localización 1" value="{{$product -> productLocation1}}">
                        <span class="invalid-feedback" id="productDescription-error">Debe ingresar al menos una locación válida.</span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productLocation2">Localización 2</label><br>
                        <input id="productLocation2" name="productLocation2" type="text" class="form-control" placeholder="Localización 2" value="{{$product -> productLocation2}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right mb-5">
    <a href="{{route('products.productsList')}}" class="btn btn-danger ml-3">Cancelar</a>
    <button type"submit" class="btn btn-success ml-3">Actualizar</button>
</div>
</form>
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
<script src="{{asset('HTML/dist/assets/js/editProductForm.js')}}"></script> 
@endsection