<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Tothem - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=es">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--SCRIPTS RESOURCES (JS) -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.material.min.js')}}"></script>
    <script src="{{asset('js/jquery.rut.js')}}"></script>
    <script src="{{asset('js/jquery.rut.min.js')}}"></script>

    <script src="{{asset('js/mdl-jquery-modal-dialog.js')}}"></script>
    <script src="{{asset('js/material.min.js')}}"></script>
    <script src="{{asset('js/getmdl-select.min.js')}}"></script>
    <script src="{{asset('js/dialog-polyfill.js')}}"></script>
    <script src="{{asset('js/list.js')}}"></script>

    <!--CSS-->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.material.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/material.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/getmdl-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dialog-polyfill.css')}}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">

    <style>
        .dialog-container,
        .loading-container {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: scroll;
            background: rgba(0, 0, 0, 0.4);
            z-index: 9999;
            opacity: 0;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
        }

        .dialog-container > div {
            position: relative;
            width: 90%;
            max-width: 500px;
            min-height: 25px;
            margin: 10% auto;
            z-index: 99999;
            padding: 16px 16px 0;
        }

        .dialog-button-bar {
            text-align: right;
            margin-top: 8px;
        }

        .loading-container > div {
            position: relative;
            width: 50px;
            height: 50px;
            margin: 10% auto;
            z-index: 99999;
        }

        .loading-container > div > div {
            width: 100%;
            height: 100%;
        }
        .circular--landscape {
            display: inline-block;
            width: 42px;
            height: 42px;
            overflow: auto;
            border-radius: 50%;
        }

        .circular--landscape img {
            width: auto;
            height: 100%;
        }

        .mdl-textfield__input{
            border-bottom: 1px solid #DDDDDD;
        }
        .mdl-textfield__label{
            color: darkslategrey;
        }


        .invalid-feedback{
            color: darkred;
            font-size: 85%;
        }
        .mdl-snackbar__icon {
            color: #ffffff;
            padding: 13px 0 0 24px;
        }
        .wrapper > div{
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

    </style>

<style>
    .user-banner-name{
        color: #424242;
        text-decoration: none;
        margin: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        letter-spacing: 0;
        opacity: .87;
        color: #ffffff;
        font-weight: 700;
        font-size: 14px;
    }

</style>

    <style>
        @keyframes bounceIn {
            0% {
                transform: scale(0.1);
                opacity: 0;
            }
            60% {
                transform: scale(1.2);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }
        .h2 .h1{
            animation: bounceIn 1.5s;
        }
        .article-h1 {
            animation: bounceIn 1.5s;
        }
    </style>

    @yield('styles')
</head>

<body >
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">

        <div class="mdl-layout__header-row">

                <span class="android-title mdl-layout-title" >
                    <a  href="{{route('home')}}"> <img class="android-logo-image" src="{{URL::asset('images/tothemlogow.png')}}"></a>
                </span>
            <div class="android-header-spacer mdl-layout-spacer"></div>

            <!-- Add spacer, to align navigation to the right in desktop
            <div class="android-header-spacer mdl-layout-spacer"></div>

            <div class="android-navigation-container">
                Botones de navegacion -->

        <!--  </div>-->

            <div class="android-navigation-container">
                <!-- Botones de navegacion -->
                @yield('navBarButtons')
            </div>

            @if(Auth::check())

                <div class="android-navigation-container">
                    <div  class="user-banner-name mdl-typography--text-uppercase">{{Auth::user()->name}}</div>
                </div>

                <div class="profilepic-container" id="more-button">
                    <img class="circular--landscape" style="cursor: pointer; border: solid 1px whitesmoke" src="{{URL::asset('profile_pic/'.Auth::user()->url_imagen)}}"/>
                </div>
            @endif
            <!--<span class="android-mobile-title mdl-layout-title">
                <img class="android-logo-image" src="{{URL::asset('images/tothemlogow.png')}}">
            </span>-->

            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect black-picture-menu" for="more-button">
                @yield('pictureMenu')

                @csrf

            </ul>
        </div>
    </div>
    </header>
    @yield('dialogs')

    <div class="mdl-layout__drawer">
        @yield('drawer')
    </div>

    <main class="mdl-layout__content">

        @yield('content')

        <!--Notificaciones (SNACKBAR)-->
        <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar" >

            <div class="mdl-snackbar__icon">
                <i class="material-icons">
                    notifications_active
                </i>
            </div>
            <div class="mdl-snackbar__text"> </div>
            <button class="mdl-snackbar__action" type="button"> </button>
        </div>

        <footer class="mdl-mega-footer" style="border-top: #039870 solid 2px">
            <br><br>
            <div class="mdl-mega-footer--top-section">
                <div class="mdl-mega-footer--left-section">
                    <img class="android-logo-image" src="{{URL::asset('images/tothemlogow.png')}}">
                </div>
                <div class="mdl-mega-footer--right-section">
                </div>
            </div>
            <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">Sistema de gestión de aula y procesos docentes para establecimientos educacionales de enseñanza básica y media</p>
            </div>
            <br><br>
           <!-- <div class="mdl-mega-footer--bottom-section">
                <a class="android-link android-link-menu mdl-typography--font-light" >
                    Quienes somos
                </a>
            </div>-->
        </footer>
    </main>

</div>
<script type="text/javascript">
    $("input#rut").rut({
        formatOn: 'keyup',
        minimumLength: 8, // validar largo mínimo; default: 2
        validateOn: 'change' // si no se quiere validar, pasar null
    });

    // es posible pasar varios eventos separados por espacio, útil
    // para validar el rut aún cuando el browser autocomplete el campo
    $("input#rut").rut({validateOn: 'change keyup'});

</script>
@yield('scripts')


</body>
</html>
