@php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
@endphp
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
            <p class="m-0">Inicie sesión para acceder al sistema</p>
        </div>
        @if(session('email_sent'))
        <div class="alert alert-soft-success d-flex" role="alert">
            <i class="material-icons mr-3">check_circle</i>
            <div class="text-body">Se cambió la contraseña exitosamente, porfavor inicia sesión.</div>
        </div>
        <div class="page-separator">
        </div> 
        @endif
        @if(session('failedLogin'))
        <div class="alert alert-soft-danger d-flex" role="alert">
            <i class="material-icons mr-3">error</i>
            <div class="text-body">El nombre de usuario o la contraseña son incorrectos.</div>
        </div>
        <div class="page-separator">
        </div> 
        @endif
        @if(session('passwordReset'))
        <div class="alert alert-soft-success d-flex" role="alert">
            <i class="material-icons mr-3">check_circle</i>
            <div class="text-body">La contraseña ha sido reestablecida correctamente. Porfavor, inicie sesión.</div>
        </div>
        <div class="page-separator">
        </div> 
        @endif
        <form id="loginForm" method="POST" action="{{route('auth.login.post')}}">
            @csrf
            <div class="form-group">
                <label class="text-label" for="systemUser">Usuario:</label>
                <div class="input-group input-group-merge">
                    <input id="systemUser" type="text" name="systemUser" class="form-control form-control-prepended" placeholder="Usuario">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-user"></span>
                        </div>
                    </div>
                    <span class="invalid-feedback" id="systemUser-error">Ingresa un usuario válido.</span>
                </div>
            </div>
            <div class="form-group">
                <label class="text-label" for="password">Contraseña:</label>
                <div class="input-group input-group-merge">
                    <input id="password" type="password" name="password" class="form-control form-control-prepended" placeholder="Contraseña">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                    <span class="invalid-feedback" id="userPassword-error">Ingresa tu contraseña para continuar.</span>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Iniciar Sesión</button>
            </div>
            <div class="form-group text-center">
                <a href="{{route('auth.forgotPassword')}}">¿Olvidó su Contraseña?</a> <br>
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
    @if (session('password_success'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('password_success') }}", "La contraseña ha sido reestablecida exitosamente");
        });
    </script>
    @endif
</body>
</html>