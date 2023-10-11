@extends('layout.fluidNavbar')
@section('listCustomers')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
        <h1 class="m-0">Consulta de Clientes</h1>
    </div>
</div>
<div class="card card-form d-flex flex-column flex-sm-row">
    <div class="card-form__body card-body-form-group flex">
        <div class="row">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter_name">Filtrar por Cédula</label>
                    <input id="filter_name" type="text" class="form-control" placeholder="Cédula del Cliente">
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="form-group">
                    <a href="{{route('customers.createCustomer')}}" class="btn btn-success" style="margin-top: 25px;">Nuevo Cliente<i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>
    <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
</div>
<div class="card">
    <div class="card-header card-header-large bg-white">
        <h4 class="card-header__title">Lista de Clientes</h4> 
    </div>
    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
            <div class="search-form search-form--light m-3">
                <input type="text" class="form-control search" placeholder="Search">
                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
            </div>
        <table class="table mb-0 thead-border-top-0">
            <thead>
                <tr>
                    <th style="width: 18px;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll">
                            <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                        </div>
                    </th>
                    <th class="text-center">Cédula</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center" style="width: 122px;">Apellido</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center" style="width: 101px;">Teléfono</th>
                    <th class="text-center">Contacto</th>
                    <th class="text-center">Dirección</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="list" id="staff">
                @foreach($customers as $customer)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input js-check-selected-row" id="{{$customer -> idCustomer}}">
                                <label class="custom-control-label" for="{{$customer -> idCustomer}}"><span class="text-hide">Check</span></label>
                            </div>
                        </td>
                        <td class="text-center">{{$customer -> customerID}}</td>
                        <td class="text-center"><span class="js-lists-values-employee-name">{{$customer -> customerName}}</span></td>
                        <td class="text-center">{{$customer -> customerLastName}}</td>
                        <td class="text-center">{{$customer -> customerEmail1}}</td>
                        <td class="text-center">{{$customer -> customerPhone1}}</td>
                        <td class="text-center">{{$customer -> customerContact}}</td>
                        <td class="text-center">{{$customer -> customerAddress1}}</td>
                        <div class="dropdown ml-auto">
                            <td>
                                <a href="{{route('customers.editCustomer', ['id' => $customer -> idCustomer])}}" data-caret="false" class="text-muted"><i class="material-icons">edit</i></a>
                            </td>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body text-right">
        15 <span class="text-muted">de 1,430</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
    </div>
</div>
</div>
@endsection