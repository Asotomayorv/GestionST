@extends('dashboard.navbar')
@section('userAccount')
    <div class="container  page__heading-container">
        <div class="page__heading">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cuenta</li>
                </ol>
            </nav>
            <h1 class="m-0">Cambiar Contraseña</h1>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Cambiar Contraseña</strong></p>
                    <p class="text-muted">Actualiza tu contraseña.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <div class="form-group">
                        <label for="opass">Contraseña Anterior</label>
                        <input style="width: 270px;" id="opass" type="password" class="form-control" placeholder="Old password" value="****">
                    </div>
                    <div class="form-group">
                        <label for="npass">Contraseña Nueva</label>
                        <input style="width: 270px;" id="npass" type="password" class="form-control" placeholder="Nueva Contraseña">
                        <!-- <small class="invalid-feedback">La nueva contraseña no debe estar vacía.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="cpass">Confirmar Contraseñad</label>
                        <input style="width: 270px;" id="cpass" type="password" class="form-control" placeholder="Confirmar Nueva Contraseña">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection