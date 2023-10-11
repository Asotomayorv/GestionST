@extends('layout.fluidNavbar')
@section('editCustomer')
    <div class="mdk-header-layout__content page">   
        <div class="page__heading">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Usuarios</li>
                </ol>
            </nav>
            <h1 class="m-0">Editar Cliente</h1>
        </div>
    </div>
    <form method="POST" action="{{route('customers.updateCustomer', ['id' => $customer -> idCustomer])}}">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar el Cliente -->
        <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-3 card-body">
                <p><strong class="headings-color">Información del cliente</strong></p>
                <p class="text-muted">Ingresa los datos del cliente.</p>
            </div>
            <div class="col-lg-9 card-form__body card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="customerID">Cédula</label>
                            <input id="customerID" type="text" class="form-control" name="customerID" placeholder="Cédula" value="{{$customer -> customerID}}" required>
                        </div>
                        <div class="form-group">
                            <label for="customerName">Nombre</label>
                            <input id="customerName" type="text" class="form-control" name="customerName" placeholder="Nombre" value="{{$customer -> customerName}}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="customerLastName"> Apellido</label>
                            <input id="customerLastName" type="text" class="form-control" name="customerLastName" placeholder="Apellido" value="{{$customer -> customerLastName}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="customerPhone1">Telefono</label>
                            <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" placeholder="Telefono" value="{{$customer -> customerPhone1}}" required pattern="[0-9]+" required>
                        </div>
                    </div>
                    <div class="col">
                        
                        <div class="col">
                        <div class="form-group" style="width: 580px;">
                            <label for="customerEmail1">Correo Electrónico</label>
                            <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" placeholder="Correo Electrónico" value="{{$customer -> customerEmail1}}" required>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                       <div class="form-group">
                            <label for="customerAddress1"> Direccion</label>
                            <input id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Direccion" value="{{$customer -> customerAddress1}}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb-5">
            <button type="submit" class="btn btn-success">Actualizar</a>
        </div>
    </form>
    <!-- <div class="col">
        <div class="text-center p-3">
            <button type="button" class="btn btn-success" data-toggle="toastr" data-toastr-type="success" data-toastr-title="Well Done!" data-toastr-message="You successfully read this important alert message.">
                Click me
            </button>
        </div> -->
    @if(Session::has('toastr'))
    <script>
        var toastrData = {!! json_encode(Session::get('toastr')) !!};
        toastr[toastrData.type](toastrData.message, toastrData.title);
    </script>
    @endif
@endsection