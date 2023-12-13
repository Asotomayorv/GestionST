<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GestionOperativaST</title>
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <!-- Simplebar -->
    <link type="text/css" href="{{asset('HTML/dist/assets/vendor/simplebar.min.css')}}" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/app.rtl.css')}}" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-material-icons.rtl.css')}}" rel="stylesheet">
    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-fontawesome-free.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('HTML/dist/assets/css/vendor-fontawesome-free.rtl.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-133433427-1');
</script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '327167911228268');
  fbq('track', 'PageView');
</script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=327167911228268&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body class="layout-login-centered-boxed">
    <div class="layout-login-centered-boxed__form card">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
            <a href="" class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
                <img src="{{asset('HTML/dist/assets/images/logos/logo.png')}}" width="150" alt="Sistemas de Tiempo S.A">
                <span>Gestión Operativa ST</span>
            </a>
            <p class="m-0">Restablecimiento de Contraseña</p>
        </div>
        <div class="alert alert-soft-warning d-flex" role="alert">
            <i class="material-icons mr-3">info</i>
            <div class="text-body">La nueva contraseña debe tener un mínimo de 8 caracteres entre mayúsculas, minúsculas y números.</div>
        </div>
        <div class="page-separator">
        </div>
        <form id="resetPassword" method="POST" action="{{route('auth.resetPassword')}}">
            @csrf
            <div class="form-group">
                <label class="text-label" for="newPassword">Nueva Contraseña :</label>
                <div class="input-group input-group-merge">
                    <input id="newPassword" type="password" name="newPassword" class="form-control form-control-prepended" placeholder="Nueva Contraseña">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                    <span class="invalid-feedback" id="systemUser-error">La nueva contraseña no debe estar vacía o no cumple con los requerimientos especificados.</span>
                </div>
            </div>
            <div class="form-group">
                <label class="text-label" for="newPassword_confirmation">Confirmar Nueva Contraseña:</label>
                <div class="input-group input-group-merge">
                    <input id="newPassword_confirmation" type="password" name="newPassword_confirmation" class="form-control form-control-prepended" placeholder="Confirmar Nueva Contraseña">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                    <span class="invalid-feedback" id="newPassword_confirmation-error">La confirmación de la contraseña no coincide.</span>
                </div>
            </div>
            <input type="hidden" name="token" value="{{$token}}">
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Reestablecer Contraseña</button>
            </div>
        </form>
    </div>
    <!-- jQuery -->
    <script src="{{asset('HTML/dist/assets/vendor/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('HTML/dist/assets/vendor/popper.min.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/vendor/bootstrap.min.js')}}"></script>
    <!-- Simplebar -->
    <script src="{{asset('HTML/dist/assets/vendor/simplebar.min.js')}}"></script>
    <!-- DOM Factory -->
    <script src="{{asset('HTML/dist/assets/vendor/dom-factory.js')}}"></script>
    <!-- MDK -->
    <script src="{{asset('HTML/dist/assets/vendor/material-design-kit.js')}}"></script>
    <!-- App -->
    <script src="{{asset('HTML/dist/assets/js/toggle-check-all.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/check-selected-row.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/dropdown.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/sidebar-mini.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/app.js')}}"></script>
    <!-- App Settings (safe to remove) -->
    <script src="{{asset('HTML/dist/assets/js/app-settings.js')}}"></script>
    <script src="{{asset('HTML/dist/assets/js/userFormValidation.js')}}"></script> 
    <!-- Mensajes al usuario -->
    @if (session('validationError'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('validationError') }}", "Error de validación");
        });
    </script>
    @endif
    @if (session('tokenError'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('tokenError') }}", "El token de usuario es inválido o ya expiró.");
        });
    </script>
    @endif
</body>
</html>