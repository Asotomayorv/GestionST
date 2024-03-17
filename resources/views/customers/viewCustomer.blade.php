@extends('layout.fluidNavbar')
@section('viewCustomer')
<div class="mdk-header-layout__content page">   
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Clientes</li>
                </ol>
            </nav>
            <h1 class="m-0">Detalles del Cliente</h1>
        </div>
        <a href="{{route('customers.listCustomers')}}" class="btn btn-primary ml-6"><i class="material-icons">arrow_back</i> Regresar</a>
    </div>
</div>
<div class="card card-group-row__card pricing__card">
    <div class="card-body d-flex flex-column">
        <div class="text-center">
            <div class="d-flex align-items-center justify-content-center border-bottom-2 flex pb-3">
                <span class="pricing__amount headings-color">{{$customer -> customerFullName}}</span>
            </div>
        </div>
        <div class="col-lg-12 card-form__body card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customertypeID">Tipo de Cedula*</label>
                        <select id="customertypeID" name="customertypeID" class="custom-select" disabled>
                            <option value="1" @if($customer->customertypeID == 1) selected @endif>Jurídica</option>
                            <option value="2" @if($customer->customertypeID == 2) selected @endif>Física</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerID">Cédula</label>
                        <input id="customerID" type="text" class="form-control" name="customerID" value="{{$customer -> customerID}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerContact">Contacto</label>
                        <input id="customerContact" type="text" class="form-control" name="customerContact" value="{{$customer -> customerContact}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerTaxes">Paga Impuestos?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customerTaxes" name="customerTaxes" @if($customer->customerTaxes == 1) checked @endif disabled>
                            <label class="custom-control-label" for="customerTaxes">Sí</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail1">Correo Electrónico 1</label>
                        <input id="customerEmail1" type="email" class="form-control" name="customerEmail1" value="{{$customer -> customerEmail1}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="customerEmail2">Correo Electrónico 2</label>
                        <input id="customerEmail2" type="email" class="form-control" name="customerEmail2" value="{{$customer -> customerEmail2}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone1">Telefono 1</label>
                        <input id="customerPhone1" type="text" class="form-control" name="customerPhone1" value="{{$customer -> customerPhone1}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="customerPhone2">Telefono 2</label>
                        <input id="customerPhone2" type="text" class="form-control" name="customerPhone2" value="{{$customer -> customerPhone2}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress1"> Direccion 1*</label>
                        <textarea id="customerAddress1" type="text" class="form-control" name="customerAddress1" placeholder="Dirección Completa" readonly>{{$customer -> customerAddress1}}</textarea>
                        <span class="invalid-feedback" id="customerAddress1-error">Ingresa una dirección.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customerAddress2"> Direccion 2</label>
                        <textarea id="customerAddress2" type="text" class="form-control" name="customerAddress2" placeholder="Dirección Completa" readonly>{{$customer -> customerAddress2}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dateLastEdit">Última Edición</label>
                        <input id="dateLastEdit" type="text" class="form-control" name="dateLastEdit" value="{{$customer -> dateLastEdit->format('d-m-Y')}}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="userLastEdit">Usuario</label>
                        <input id="userLastEdit" type="text" class="form-control" name="userLastEdit" value="{{$customer -> userNameLastEdit}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-right">
                        <a href="{{route('customers.listCustomers')}}" class="btn btn-primary ml-3">Regresar</a>
                        <a href="{{route('customers.editCustomer', ['id' => $customer -> idCustomer])}}" class="btn btn-success ml-3">
                            <i class="material-icons">edit</i> Editar Cliente</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header card-header-large bg-white d-flex align-items-center">
                <h4 class="card-header__title flex m-0">Historial de Servicios</h4>
            </div>
            <div class="card-header card-header-tabs-basic nav" role="tablist">
                <a href="#registered_calls" class="active" data-toggle="tab" role="tab" aria-controls="registered_calls" aria-selected="true">Llamadas Registradas</a>
                <a href="#billing_orders" data-toggle="tab" role="tab" aria-selected="false">Órdenes de Facturación</a>
                <a href="#install_orders" data-toggle="tab" role="tab" aria-selected="false">Instalaciones</a>
                <a href="#repairs" data-toggle="tab" role="tab" aria-selected="false">Reparaciones</a>
                <a href="#technical_Services" data-toggle="tab" role="tab" aria-selected="false">Servicios Técnicos</a>
                <!-- <a href="#install_orders" data-toggle="tab" role="tab" aria-selected="false">Instalaciones</a>
                <a href="#repair_orders" data-toggle="tab" role="tab" aria-selected="false">Reparaciones</a>
                <a href="#technical_services" data-toggle="tab" role="tab" aria-selected="false">Servicios Técnicos</a> -->
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active show fade" id="registered_calls">
                    <div class="row">
                        <div class="col-md-12">
                                <!-- <div class="card-header card-header-large bg-white d-flex align-items-center">
                                    <h4 class="card-header__title flex m-0">Llamadas Registradas</h4>
                                    <a href="{{route('calls.newCallId', ['id' => $customer -> idCustomer])}}" class="btn btn-success"><i class="material-icons">phone_add</i></a>
                                </div> -->
                                <table class="table table-striped border-bottom mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                                            </th>
                                             <th class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Usuario<span>
                                            </th>
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">work</i><span>Asunto<span>
                                            </th> 
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">find_replace</i><span>Estado<span>
                                            </th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($calls as $call)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('calls.viewCall', ['id' => $call -> idCall])}}" class="text-15pt align-items-center"><i class="material-icons icon-16pt mr-1">phone
                                                    </i> <strong>{{$call -> dateCreation}}</strong></a>
                                        </td>
                                        <td class="text-center">{{$call -> userNameLastEdit}}</td>
                                        <td class="text-center"><strong>{{$call -> callSubject}}</strong></td>
                                        <td class="text-center">
                                            <div class="badge badge-success">{{$call -> callStatus}}</div>
                                        </td> 
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane show fade" id="install_orders">
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table table-striped border-bottom mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Instalación</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Técnico(a)<span>
                                            </th>
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">find_replace</i><span>Estado<span>
                                            </th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($installOrders as $installOrder)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('installorders.viewInstallOrder', ['id' => $installOrder -> idinstallation])}}" class="text-15pt align-items-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><strong>{{$installOrder -> idinstallation}}</strong></a>
                                        </td>
                                        <td class="text-center">{{$installOrder -> installationDate}}</td>
                                        <td class="text-center">{{$installOrder -> routes -> routeTechnicianAssigned}}</td>
                                        <td class="text-center">
                                            @if($installOrder -> installationStatus == 0)
                                                <div class="badge badge-warning">PENDIENTE</div>
                                            @elseif($installOrder -> installationStatus == 1)
                                                <div class="badge badge-success">FINALIZADO</div>
                                            @else
                                                <div class="badge badge-danger">Estado Desconocido</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane show fade" id="billing_orders">
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table table-striped border-bottom mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Facturación</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Factura</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">person</i><span>Vendedor(a)<span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">today</i><span>Fecha de Entrega</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">payment</i><span>Total<span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($billingOrders as $billingOrder)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('billingOrders.viewBillingOrder', ['id' => $billingOrder -> idbillingOrder])}}" class="text-15pt align-items-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><strong>{{$billingOrder -> idbillingOrder}}</strong></a>
                                        </td>
                                        <td class="text-center">{{$billingOrder -> invoiceNumber}}</td>
                                        <td class="text-center">{{$billingOrder -> seller}}</td>
                                        <td class="text-center">{{$billingOrder -> deliveryDate}}</td>
                                        <td class="text-center"><strong>{{$billingOrder -> totalBilling}}</strong></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane show fade" id="repairs">
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table table-striped border-bottom mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Reparación</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Técnico(a)<span>
                                            </th>
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">exit_to_app</i><span>Procedencia<span>
                                            </th> 
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">build</i><span>Tipo de Reparación<span>
                                            </th> 
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">find_replace</i><span>Estado<span>
                                            </th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($repairs as $repair)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('repairs.viewRepair', ['id' => $repair -> idrepair])}}" class="text-15pt align-items-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><strong>{{$repair -> idrepair}}</strong></a>
                                        </td>
                                        <td class="text-center">{{$repair -> receivingDate}}</td>
                                        <td class="text-center">{{$repair -> technicianAssigned}}</td>
                                        <td class="text-center">{{$repair -> repairOrigin}}</td>
                                        <td class="text-center">{{$repair -> repairType}}</td>
                                        <td class="text-center">
                                            @if($repair -> repairStatus == 0)
                                                <div class="badge badge-warning">PENDIENTE</div>
                                            @elseif($repair -> repairStatus == 1)
                                                <div class="badge badge-primary">EN PROGRESO</div>
                                            @else
                                                <div class="badge badge-success">REPARADO</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane show fade" id="technical_Services">
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table table-striped border-bottom mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><span>No.Solicitud</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt mr-1">today</i><span>Fecha</span>
                                            </th>
                                            <th class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">account_circle</i><span>Técnico(a)<span>
                                            </th>
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">map</i><span>Tipo de Visita<span>
                                            </th> 
                                            <th  class="text-center">
                                                <i class="material-icons icon-16pt text-muted mr-1">find_replace</i><span>Estado<span>
                                            </th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($techServices as $techService)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('technicalservices.viewTechnicalService', ['id' => $techService -> idtechnicalServiceOrder])}}" class="text-15pt align-items-center">
                                                <i class="material-icons icon-16pt mr-1">receipt</i><strong>{{$techService -> idtechnicalServiceOrder}}</strong></a>
                                        </td>
                                        <td class="text-center">{{$techService -> technicalServiceDate}}</td>
                                        <td class="text-center">{{$techService -> routes -> routeTechnicianAssigned}}</td>
                                        <td class="text-center">{{$techService -> routes -> routeType}}</td>
                                        <td class="text-center">
                                            @if($techService -> technicalServiceStatus == 0)
                                                <div class="badge badge-warning">PENDIENTE</div>
                                            @elseif($techService -> technicalServiceStatus == 1)
                                                <div class="badge badge-success">FINALIZADO</div>
                                            @else
                                                <div class="badge badge-danger">Estado Desconocido</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection