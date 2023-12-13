@extends('fluidNavbar3')
@section('modal')
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page">
    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header card-header-large bg-white">
                        <h4 class="card-header__title">Bootstrap</h4>
                    </div>
                    <div class="card-body button-list">
                        <p>A rendered modal with header, body, and set of actions in the footer.</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-standard">Standard Modal</button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-large">Large Modal</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-small">Small Modal</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-large bg-white">
                        <h4 class="card-header__title">Alerts</h4>
                    </div>
                    <div class="card-body button-list">
                        <p>Show different contexual alert messages using modal component.</p>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">Success Alert</button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">Info Alert</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">Warning Alert</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Error Alert</button>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-header card-header-large bg-white">
                        <h4 class="card-header__title">Pages</h4>
                    </div>
                    <div class="card-body button-list">
                        <p>Examples of modals with custom content.</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-signup">Sign Up Modal</button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-login">Login Modal</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-large bg-white">
                        <h4 class="card-header__title">Vertically Centered</h4>
                    </div>
                    <div class="card-body button-list">
                        <p>By default, modals will be positioned at the top of the page, but you can change this to vertically centered by adding the <code>.modal-dialog-centered</code> class to the <code>&lt;div class=&quot;modal-dialog&quot;&gt;...&lt;/div&gt;</code> element.</p>

                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-center">Vertically Centered Modal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // END header-layout__content -->
@endsection
