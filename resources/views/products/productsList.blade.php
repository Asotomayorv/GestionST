@extends('layout.fluidNavbar')
@section('productsList')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Bodega</li>
                <li class="breadcrumb-item active">Gestión de Inventario</li>
            </ol>
        </nav>
        <h1 class="m-0">Lista de Productos</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_product">Filtrar por Producto</label>
                    <input id="filter_product" type="text" class="form-control" placeholder="Producto">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_brand">Filtrar por Marca</label><br>
                    <select id="filter_brand" class="custom-select" style="width: 200px;">
                        <option value="Todos">Todos</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->brandName }}">{{ $brand->brandName }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_category">Filtrar por Categoría</label><br>
                    <select id="filter_category" class="custom-select">
                        <option value="Todos">Todos</option>
                        <option value="Equipo">Equipo</option>
                        <option value="Repuesto">Repuesto</option>
                        <option value="Suministros">Suministros</option>
                        <option value="Kit o Componentes">Kit o Componentes</option>
                        <option value="Accesorio para Reloj Marcador">Accesorio para Reloj Marcador</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-right">
                    <a href="{{route('products.newProduct')}}" class="btn btn-success ml-3" style="margin-top: 25px;">
                        Nuevo Producto <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive">
        <table id="productTable" class="table mb-0 thead-border-top-0 table-striped">
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
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">autorenew</i><span>Estado<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($products as $product)
                <tr>
                    <td class="text-center">{{$product -> productCode}}</td>
                    <td class="text-center">{{$product -> productName}}</td>
                    <td class="text-center">{{$product -> brands -> brandName}}</td>
                    <td class="text-center">{{$product -> models -> modelName}}</td>
                    <td class="text-center">{{$product -> productSeries}}</td>
                    <td class="text-center">{{$product -> productCategory}}</td>
                    <td class="text-center">{{$product -> productQuantity}}</td>
                    <td class="text-center productStatus" data-quantity="{{$product -> productQuantity}}"></td>
                    <div class="dropdown ml-auto">
                        <td class="text-center" style="width: 81px;">
                            <a href="{{route('products.productView', ['id' => $product -> idproduct])}}" data-caret="false" class="text-muted" title="Ver Producto">
                                <i class="material-icons">visibility</i></a>
                            <a href="{{route('products.productEdit', ['id' => $product -> idproduct])}}" data-caret="false" class="text-muted" title="Editar Producto">
                                <i class="material-icons">edit</i></a>
                            <a href="{{route('products.deleteProduct', ['id' => $product -> idproduct])}}" data-id="{{$product -> idproduct}}" data-caret="false" class="text-muted" 
                                title="Eliminar Producto">
                                <i class="material-icons">delete</i></a>
                        </td>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Mensajes al usuario -->
@if (session('createSuccess'))
<script>
    $(document).ready(function() {
        toastr.success("{{ session('createSuccess') }}", "¡Registro Exitoso!");
    });
</script>
@endif
@if (session('updateSuccess'))
<script>
    $(document).ready(function() {
        toastr.success("{{ session('updateSuccess') }}", "¡Actualización Exitosa!");
    });
</script>
@endif 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener todas las celdas de disponibilidad con la clase "productStatus".
        const availabilityCells = document.querySelectorAll('.productStatus');

        // Función para verificar la disponibilidad y actualizar el contenido de la celda.
        function verificarDisponibilidad(numero) {
            if (numero > 0) {
                return '<span class="badge badge-success">DISPONIBLE</span>';
            } else {
                return '<span class="badge badge-danger">AGOTADO</span>';
            }
        }

        // Iterar a través de las celdas de disponibilidad y actualizar su contenido.
        availabilityCells.forEach(function(cell) {
            const quantity = parseInt(cell.getAttribute('data-quantity'));
            const availabilityMessage = verificarDisponibilidad(quantity);
            cell.innerHTML = availabilityMessage;
        });
    });
</script>
<script src="{{asset('HTML/dist/assets/js/productList.js')}}"></script> 
@endsection
