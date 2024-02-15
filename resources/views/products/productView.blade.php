@extends('layout.fluidNavbar')
@section('productView')
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
            <h1 class="m-0">Detalle de Producto</h1>
        </div>
        <a href="{{route('products.productsList')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$product -> productName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productCode">Código de Producto*</label>
                        <input id="productCode" name="productCode" type="text" class="form-control" placeholder="Código" value="{{$product -> productCode}}" readonly>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="form-group">
                        <label for="idSupplier">Proveedor*</label><br>
                        <select id="idSupplier" name="idSupplier" class="custom-select" disabled>
                            @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->idSupplier}}" {{$product->idSupplier == $supplier->idSupplier ? 'selected' : ''}}>
                                    {{$supplier->supplierName}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productCategory">Categoría*</label><br>
                        <select id="productCategory" name="productCategory" class="custom-select" disabled>
                            <option value="Equipo" {{ $product->productCategory == 'Equipo' ? 'selected' : '' }}>Equipo</option>
                            <option value="Repuesto" {{ $product->productCategory == 'Repuesto' ? 'selected' : '' }}>Repuesto</option>
                            <option value="Suministros" {{ $product->productCategory == 'Suministros' ? 'selected' : '' }}>Suministros</option>
                            <option value="Kit o Componentes" {{ $product->productCategory == 'Kit o Componentes' ? 'selected' : '' }}>Kit o Componentes</option>
                            <option value="Accesorio para Reloj Marcador" {{ $product->productCategory == 'Accesorio para Reloj Marcador' ? 'selected' : '' }}>Accesorio para Reloj Marcador</option>
                            <option value="Otros" {{ $product->productCategory == 'Otros' ? 'selected' : '' }}>Otros</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="modifyProductBrand">Marca*</label><br>
                        <select id="modifyProductBrand" name="modifyProductBrand" class="custom-select" data-url="{{route('products.getModels', ['id'])}}"
                        data-id="{{$product -> productModel}}" disabled>
                            <option value="">Seleccionar Marca</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->idBrand }}" {{$product->productBrand == $brand->idBrand ? 'selected' : ''}}>
                                    {{ $brand->brandName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productModel">Modelo*</label>
                        <select id="productModel" name="productModel" class="form-control" disabled>
                            <option value="">Seleccionar Modelo</option>
                        </select>
                    </div>
                </div> 
                <div class="col">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="productSeries">Serie del Producto</label><br>
                            <input id="productSeries" name="productSeries" class="form-control" placeholder="Serie" value="{{$product -> productSeries}}" readonly>
                            <span class="invalid-feedback" id="productSeries-error">Si el equipo lleva serie, debes ingresarla.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="productDescription">Descripción del Producto*</label><br>
                            <textarea id="productDescription" name="productDescription" class="form-control" placeholder="Descripción del producto..." readonly>{{$product -> productDescription}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="viewProductExchangeRateCost">Tipo de Cambio Costo ₡*</label><br>
                        <input id="viewProductExchangeRateCost"  name="viewProductExchangeRateCost" type="text" class="form-control" placeholder="Compra CRC" value="{{$product -> productExchangeRateCost}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="viewProductCostDollars">Costo $*</label><br>
                        <input id="viewProductCostDollars"  name="viewProductCostDollars" type="text" class="form-control" placeholder="Costo USD" value="{{$product -> productCostDollars}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="viewProductCostColones">Costo ₡*</label><br>
                        <input id="viewProductCostColones"  name="viewProductCostColones" type="text" class="form-control" value="{{$product -> productCostColones}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="viewProductExchangeRateSale">Tipo de Cambio Venta ₡*</label><br>
                        <input id="viewProductExchangeRateSale"  name="viewProductExchangeRateSale" type="text" class="form-control" placeholder="Venta CRC" value="{{$product -> productExchangeRateSale}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="viewProductSaleDollars">Venta $*</label><br>
                        <input id="viewProductSaleDollars"  name="viewProductSaleDollars" type="text" class="form-control" placeholder="Venta USD" value="{{$product -> productSaleDollars}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="viewProductSaleColones">Venta ₡*</label><br>
                        <input id="viewProductSaleColones"  name="viewProductSaleColones" type="text" class="form-control" value="{{$product -> productSaleColones}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productProfitPercentage">Utilidad %*</label><br>
                        <input id="productProfitPercentage"  name="productProfitPercentage" type="text" class="form-control" value="{{$product -> productProfitPercentage}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="productQuantity">Cantidad*</label><br>
                        <input id="productQuantity"  name="productQuantity" type="number" class="form-control" placeholder="Cantidad" value="{{$product -> productQuantity}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="minimumProduct">Mínimo*</label><br>
                        <input id="minimumProduct" name="minimumProduct" type="number" class="form-control" placeholder="Mínimo" value="{{$product -> minimumProduct}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="maximumProduct">Máximo*</label><br>
                        <input id="maximumProduct" name="maximumProduct" type="number" class="form-control" placeholder="Máximo" value="{{$product -> maximumProduct}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productLocation1">Localización 1*</label><br>
                        <input id="productLocation1" name="productLocation1" type="text" class="form-control" placeholder="Localización 1" value="{{$product -> productLocation1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="productLocation2">Localización 2*</label><br>
                        <input id="productLocation2" name="productLocation2" type="text" class="form-control" placeholder="Localización 2" value="{{$product -> productLocation2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$product -> dateLastEdit}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$product -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right mb-5">
    <a href="{{route('products.productsList')}}" class="btn btn-primary ml-3">Regresar</a>
    <a href="{{route('products.productEdit', ['id' => $product -> idproduct])}}" class="btn btn-success ml-3"">
        <i class="material-icons">edit</i> Editar Producto</a>
</div>
<script src="{{asset('HTML/dist/assets/js/productFormValidation.js')}}"></script> 
@endsection