@extends('layout.fluidNavbar')
@section('stockServices')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bodega</li>
                </ol>
            </nav>
            <h1 class="m-0">Categorías de Servicio</h1>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="row card-group-row">
    <div class="col-lg-6 col-md-6 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-primary">
                        <i class="material-icons text-white icon-18pt">phonelink</i>
                    </span>
                </div>
                <a href="{{route('products.productsList')}}" class="text-dark">
                    <strong>Inventario</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 card-group-row__col">
        <div class="card card-group-row__card">
            <div class="p-2 d-flex flex-row align-items-center">
                <div class="avatar avatar-xs mr-2">
                    <span class="avatar-title rounded-circle text-center bg-success">
                        <i class="material-icons text-white icon-18pt">business</i>
                    </span>
                </div>
                <a href="{{route('suppliers.listSuppliers')}}" class="text-dark">
                    <strong>Proveedores</strong>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/stock.jpg')}}" alt="" class="card-img">
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="card stories-card-popular">
            <img src="{{asset('HTML/dist/assets/images/stories/proveedores.jpg')}}" alt="" class="card-img"> 
        </div>
    </div>
</div>
@endsection