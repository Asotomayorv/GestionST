@extends('layout.fluidNavbar')
@section('listBillingOrders')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Facturación</li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de Ventas y Cotizaciones</li>
            </ol>
        </nav>
        <h1 class="m-0">Ventas y Cotizaciones</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_invoiceNumer">Filtrar por No.Factura</label>
                    <input id="filter_invoiceNumer" type="text" class="form-control" placeholder="No.Factura">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Cliente</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Cliente">
                </div>
            </div>
            <div class="form-group">
                <label for="filter_seller">Filtrar por Vendedor(a)</label><br>
                <select id="filter_seller" class="custom-select" style="width: 200px;">
                    <option value="Todos">Todos</option>
                    @foreach ($sellers as $seller)
                        <option value="{{$seller -> userName . ' ' . $seller -> userLastName1}}">{{$seller -> userName . ' ' . $seller -> userLastName1}}</option>
                    @endforeach
                </select>
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
            <div class="col-sm-3">
                <div class="form-group text-right">
                    <a href="{{route('billingOrders.createBillingOrders')}}" class="btn btn-success" style="margin-top: 25px;">
                        Nueva Orden de Facturación<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button id="refreshButton" class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0">
        <i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="table-responsive border-bottom">
        <div class="table-responsive border-bottom">
            <table id="billingTable" class="table mb-0 thead-border-top-0 table-striped">
                <thead>
                    <tr>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Factura</span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">business</i><span>Cliente</span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">shop</i><span>Producto<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">person</i><span>Vendedor(a)<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt text-muted mr-1">payment</i><span>Total<span>
                        </th>
                        <th class="text-center">
                            <i class="material-icons icon-16pt mr-1">today</i><span>Fecha de Entrega</span>
                        </th>
                        <th>
                            <i class="material-icons icon-16pt mr-1">settings</i><span>Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach($billingOrders as $billingOrder)
                        <tr>
                            <td class="text-center">
                                <div class="badge badge-light">#{{$billingOrder -> invoiceNumber}}</div>
                            </td>
                            <td class="text-center">
                                <a href="{{route('customers.viewCustomer', ['id' => $billingOrder -> customers -> idCustomer])}}">{{$billingOrder -> customers -> customerFullName}}</a>
                            </td>
                            <td class="text-center"><strong>{{$billingOrder -> productSale -> first() -> products -> productName}}<strong></td>
                            <td class="text-center">{{$billingOrder -> seller}}</span></td>
                            <td class="text-center">₡{{number_format($billingOrder->totalBilling, 2, '.', ',') }}</td>
                            <td class="text-center">{{$billingOrder -> dateCreation}}</td>
                            <div class="dropdown ml-auto">
                                <td class="text-center" style="width: 81px;">
                                    <a href="{{route('billingOrders.viewBillingOrder', ['id' => $billingOrder -> idbillingOrder])}}" data-caret="false" class="text-muted" title="Ver Orden de Facturación">
                                        <i class="material-icons">visibility</i></a>
                                    <a href="{{route('billingOrders.editBillingOrders', ['id' => $billingOrder -> idbillingOrder])}}" data-caret="false" class="text-muted" title="Editar Orden de Facturación">
                                        <i class="material-icons">edit</i></a>
                                    <a href="{{route('billingOrders.deleteBillingOrders', ['id' => $billingOrder -> idbillingOrder])}}" data-id="{{$billingOrder -> idbillingOrder}}" data-caret="false" 
                                        class="text-muted" title="Eliminar Boleta de Facturación"><i class="material-icons">delete</i></a>
                                </td>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
<script src="{{asset('HTML/dist/assets/js/listBillingOrder.js')}}"></script>
@endsection