@extends('layout.fluidNavbar')
@section('modal')
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
        <!-- // END Header Layout Content -->

    </div>

    <!-- Sign Up Modal -->
    <div id="modal-signup" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3">
                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">
                            <a href="fixed-dashboard.html" class="navbar-brand" style="min-width: 0">
                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">
                                <span>Stack</span>
                            </a>
                        </div>

                        <form action="#">
                            <div class="form-group">
                                <label for="username">Name:</label>
                                <input class="form-control" type="text" id="username" required="" placeholder="John Doe" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input class="form-control" type="email" id="email" required="" placeholder="john@doe.com" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" />
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" />
                                    <label class="custom-control-label" for="terms">I accept <a href="#">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <!-- Login Modal -->
    <div id="modal-login" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3">
                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">
                            <a href="fixed-dashboard.html" class="navbar-brand" style="min-width: 0">
                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">
                                <span>Stack</span>
                            </a>
                        </div>

                        <form action="#">
                            <div class="form-group">
                                <label for="email_2">Email Address:</label>
                                <input class="form-control" type="email" id="email_2" required="" placeholder="john@doe.com">
                            </div>
                            <div class="form-group">
                                <label for="password_2">Password:</label>
                                <input class="form-control" type="password" required="" id="password_2" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" checked="" id="remember">
                                    <label class="custom-control-label" for="remember">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <!-- Success Alert Modal -->
    <div id="modal-success" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-success">
                <div class="modal-body text-center p-4">
                    <i class="material-icons icon-40pt text-white mb-2">check</i>
                    <h4 class="text-white">Well Done!</h4>
                    <p class="text-white mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt eaque explicabo, itaque iusto unde quas magni non, quae expedita eveniet, incidunt molestiae tempora maiores odit hic perspiciatis. Eveniet, porro illo.</p>
                    <button type="button" class="btn btn-light my-2" data-dismiss="modal">Continue</button>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <!-- Info Alert Modal -->
    <div id="modal-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <i class="material-icons icon-40pt text-info mb-2">info_outline</i>
                    <h4>Heads Up!</h4>
                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt eaque explicabo, itaque iusto unde quas magni non, quae expedita eveniet, incidunt molestiae tempora maiores odit hic perspiciatis. Eveniet, porro illo.</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Continue</button>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <!-- Warning Alert Modal -->
    <div id="modal-warning" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <i class="material-icons icon-40pt text-warning mb-2">warning</i>
                    <h4>Warning!</h4>
                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt eaque explicabo, itaque iusto unde quas magni non, quae expedita eveniet, incidunt molestiae tempora maiores odit hic perspiciatis. Eveniet, porro illo.</p>
                    <button type="button" class="btn btn-warning my-2" data-dismiss="modal">Continue</button>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <!-- Danger Alert Modal -->
    <div id="modal-danger" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-body text-center p-4">
                    <i class="material-icons icon-40pt text-white mb-2">report_problem</i>
                    <h4 class="text-white">Ohhh Snap!</h4>
                    <p class="text-white mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt eaque explicabo, itaque iusto unde quas magni non, quae expedita eveniet, incidunt molestiae tempora maiores odit hic perspiciatis. Eveniet, porro illo.</p>
                    <button type="button" class="btn btn-light my-2" data-dismiss="modal">Continue</button>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <div id="modal-center" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-center-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-center-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                </div> <!-- // END .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> <!-- // END .modal-footer -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->


    <div id="modal-large" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-large-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-large-title">Large modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae aliquam tempora quibusdam rem facere? Nulla dolorum, velit cumque maiores architecto officiis reprehenderit adipisci magnam doloribus dolores ratione error omnis quos voluptate culpa excepturi, autem ipsum! Vitae exercitationem cumque provident, aliquid repudiandae placeat necessitatibus?</p>
                    <p>Temporibus delectus soluta necessitatibus a est dolores quos esse enim, sint maxime assumenda sapiente harum tempora eius ullam. Earum quam, explicabo magni, blanditiis sint, nam reprehenderit porro suscipit voluptates cum eius. Pariatur vel rerum, saepe, rem harum, nam ipsum deserunt vitae odio, quaerat sapiente nulla! Nulla nesciunt labore, distinctio aut, aliquam possimus sapiente qui adipisci quae fuga, consectetur hic. Facilis nostrum officiis saepe quia nemo, adipisci libero illo sint omnis. Placeat doloremque, omnis eligendi ullam fugit, aut.</p>
                    <p>Aliquam maxime nobis ut porro sit, repellendus beatae provident suscipit at soluta sapiente, cupiditate dolore similique alias doloribus aperiam, veritatis quibusdam numquam adipisci sequi quasi rerum architecto inventore vitae fugiat. Odio corporis est, temporibus earum molestias quos, labore dignissimos eligendi, laboriosam, incidunt illum!</p>
                    <p>Itaque officia repellat temporibus quis quasi ipsum reprehenderit dicta pariatur tenetur nisi officiis ad eaque veritatis velit dolore eos iste, beatae labore. Quo, incidunt vitae sint tempore, delectus sapiente pariatur labore illo veniam itaque molestiae consequatur doloribus.</p>
                </div> <!-- // END .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> <!-- // END .modal-footer -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <div id="modal-small" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-small-title" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-small-title">Small modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                </div> <!-- // END .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> <!-- // END .modal-footer -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->
</body>
</html>