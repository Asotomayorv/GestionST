@extends('layout.fluidNavbar')
@section('viewSupplier')
<div class="mdk-header-layout__content page">   
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                <li class="breadcrumb-item" aria-current="page">Bodega</li>
                <li class="breadcrumb-item active">Gestión de Proveedores</li>
            </ol>
        </nav>
        <h1 class="m-0">Detalles del Proveedor</h1>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$supplier -> supplierName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="supplierID">Cédula</label>
                        <input id="supplierID" type="text" class="form-control" name="supplierID" value="{{$supplier -> supplierID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="supplierContact">Contacto</label>
                        <input id="supplierContact" type="text" class="form-control" name="supplierContact" value="{{$supplier -> supplierContact}}" readonly>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="form-group">
                        <div class="card-header__title text-muted mb-2 ">Estado</div>
                        <span class="h6 m-0 badge badge-{{$supplier -> isSupplierActive ? 'success' : 'danger'}}">{{$supplier -> isSupplierActive ? 'ACTIVO' : 'INACTIVO'}}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="supplierEmail1">Correo Electrónico 1</label>
                        <input id="supplierEmail1" type="email" class="form-control" name="supplierEmail1" value="{{$supplier -> supplierEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="supplierEmail2">Correo Electrónico 2</label>
                        <input id="supplierEmail2" type="email" class="form-control" name="supplierEmail2" value="{{$supplier -> supplierEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="suppplierPhone1">Telefono 1</label>
                        <input id="supplierPhone1" type="text" class="form-control" name="supplierPhone1" value="{{$supplier -> supplierPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="supplierPhone2">Telefono 2</label>
                        <input id="supplierPhone2" type="text" class="form-control" name="supplierPhone2" value="{{$supplier -> supplierPhone2}}"" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly>{{$supplier -> supplierAddress}}</textarea>
                        <span class="invalid-feedback" id="customerAddress1-error">Ingresa una dirección.</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$supplier -> dateLastEdit->format('d-m-Y')}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$supplier -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right mb-5">
    <a href="{{route('suppliers.listSuppliers')}}" class="btn btn-primary ml-3">Regresar</a>
    <a href="{{route('suppliers.editSupplier', ['id' => $supplier -> idSupplier])}}" class="btn btn-success ml-3">
        <i class="material-icons">edit</i> Editar Proveedor</a>
</div>
@endsection