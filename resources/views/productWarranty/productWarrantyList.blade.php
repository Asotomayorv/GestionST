@extends('layout.fluidNavbar')
@section('productWarrantyList')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Servicios Técnicos</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Garantías</li>
            </ol>
        </nav>
        <h1 class="m-0">Garantías de Equipos</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Cliente</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Cliente">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_id">Filtrar por No.Facturación</label>
                    <input id="filter_id" type="text" class="form-control" placeholder="No.Boleta Facturación">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="dateFilter">Filtrar por Fecha</label><br>
                    <select id="dateFilter" class="custom-select" style="width: 160px;">
                        <option value="all">Todos</option>
                        <option value="today">Hoy</option>
                        <option value="yesterday">Ayer</option>
                        <option value="thisWeek">Esta Semana</option>
                        <option value="thisMonth">Este Mes</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group text-right">
                    <a href="{{route('productWarranty.createProductWarranty')}}" class="btn btn-success" style="margin-top: 25px;">
                        Nueva Garantía <i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive">
        <table id="productWarrantyTable" class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">map</i><span>No.Garantía</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Boleta Facturación</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Equipo<span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Fecha de Inicio</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Vigencia</span>
                    </th>
                    <th class="text-center">
                        <i class="material-icons icon-16pt mr-1">today</i><span>Estado</span>
                    </th>
                    <th>
                        <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="list" id="companies">
                @foreach($productWarranties as $productWarranty)
                <tr>
                    <td class="text-center">
                        <div class="badge badge-light">#{{$productWarranty -> idproductWarranty}}</div>
                    </td>
                    <td class="text-center">
                        <a href="{{route('billingOrders.viewBillingOrder', ['id' => $productWarranty -> productSale -> billingOrders -> idbillingOrder])}}">
                            #{{$productWarranty -> productSale -> billingOrders -> idbillingOrder}}</a>
                    </td>
                    <td class="text-center">
                        <a href="{{route('customers.viewCustomer', ['id' => $productWarranty -> productSale -> billingOrders -> customers -> idCustomer])}}">
                            {{$productWarranty -> productSale -> billingOrders -> customers -> customerFullName}}</a>
                    </td>
                    <td class="text-center"><strong>{{$productWarranty -> productSale -> products -> productName}}<strong></td>
                    <td class="text-center">{{$productWarranty -> purchaseDate}}</td>
                    <td class="text-center">{{$productWarranty -> totalWarranty}}</td>
                    <td class="text-center">
                        @php
                        $purchaseDate = new DateTime($productWarranty->purchaseDate);
                        $currentDate = new DateTime();
                        $interval = $purchaseDate->diff($currentDate);
                        $totalMonths = $interval->y * 12 + $interval->m;
                        @endphp
                        @if ($totalMonths <= 12)
                            <div class="badge badge-success">VIGENTE</div>
                        @else
                            <div class="badge badge-danger">VENCIDO</div>
                        @endif
                      </td>
                    <div class="dropdown ml-auto">
                        <td class="text-center" style="width: 81px;">
                            <a href="{{route('productWarranty.viewProductWarranty', ['id' => $productWarranty -> idproductWarranty])}}" data-caret="false" class="text-muted" title="Ver Orden de Facturación">
                                <i class="material-icons">visibility</i></a>
                            <a href="{{route('productWarranty.editProductWarranty', ['id' => $productWarranty -> idproductWarranty])}}" data-caret="false" class="text-muted" title="Editar Orden de Facturación">
                                <i class="material-icons">edit</i></a>
                            <a href="{{route('productWarranty.deleteProductWarranty', ['id' => $productWarranty -> idproductWarranty])}}" data-id="{{$productWarranty -> idproductWarranty}}" data-caret="false" 
                                class="text-muted" title="Eliminar Garantía"><i class="material-icons">delete</i></a>
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
<script src="{{asset('HTML/dist/assets/js/productWarrantyList.js')}}"></script>
@endsection