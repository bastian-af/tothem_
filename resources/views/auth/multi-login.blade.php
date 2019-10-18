<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOTHEM</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/material.min.css')}}">

    <style>
        * {
            overflow-x: hidden;
            margin: 0px;
            padding: 0px;
        }

        body {
            background-image: url(https://lh4.googleusercontent.com/-XplyTa1Za-I/VMSgIyAYkHI/AAAAAAAADxM/oL-rD6VP4ts/w1184-h666/Android-Lollipop-wallpapers-Google-Now-Wallpaper-2.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;

        }

        #login-conatiner{
            margin: auto;
        }

        .mdl-card, .mdl-card__supporting-text {
            overflow: inherit !important;
        }

        .mdl-card {
            overflow: visible !important;
            z-index: auto !important;
        }

        #login-fab {
            border-radius: 50%;
            height: 56px;
            margin: auto;
            min-width: 56px;
            width: 56px;
            overflow: hidden;
            background: rgba(158,158,158,.2);
            box-shadow: 0 1px 1.5px 0 rgba(0,0,0,.12), 0 1px 1px 0 rgba(0,0,0,.24);
            position: absolute;
            top: -30px;
            text-align: center;
            left: 0;
            right: 0;
        }

        #lock-icon{
            line-height: 56px;
        }

        #login-button {
            width: 100%;
            height: 40px;
            min-width: initial;
        }

        #card-heading{
            text-align: center;
            font-weight: 600;
            font-size: 32px;
            height: 30px;
            padding-top: 30px;
            color: rgba(0, 0, 0, 0.31);
        }

        #forgotpassword{
            float: right;
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout">
    <div id="login-conatiner" class="mdl-card mdl-shadow--16dp">
        <div class="mdl-card__supporting-text">

            <div id="card-heading">
                <img class="android-logo-image" src="{{URL::asset('images/tothemlogo.png')}}">
            </div><br>


        <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" id="email"/>
                <label class="mdl-textfield__label" for="email">Email</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" id="password"/>
                <label class="mdl-textfield__label" for="password">Password</label>
            </div>
            <button id="login-button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">
                Login
            </button>-->

            <form method="POST" action="{{ route('multi.login.submit') }}">
                @csrf

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="email" class="mdl-textfield__label">Correo</label>
                        <input id="email" type="email" class="mdl-textfield__input form-control{{ $errors->has('email') ? ' is-invalid' : '' }} " name="email" value="{{ old('email') }}" >
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="password" class="mdl-textfield__label">Contraseña</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} mdl-textfield__input" name="password">

                </div>
                <!--
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-textfield__label">
                                <input class="mdl-textfield__input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                    </div>
-->
                @if ($errors->has('email'))
                    <br><br>
                    <span><b class="mdl-color-text--red">{{ $errors->first('email') }}</b></span> <br><br>
                @endif

                @if ($errors->has('password'))
                    <span><b class="mdl-color-text--red">{{ $errors->first('password') }}</b></span>
                    <br><br><br>
                @endif

                <button id="login-button" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">
                    ENTRAR
                </button>
            </form>
            <br>

            <div id="forgotpassword">
                <button  class="mdl-button mdl-js-button mdl-button--primary">Olvide mi contraseña</button>

            </div>

            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="forgotpassword">
                <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none;">
                    <li class="mdl-menu__item">Soy estudiante</li>
                </a>
                <a class="btn btn-link" href="{{ route('teacher.password.request') }}"  style="text-decoration: none;" >
                    <li class="mdl-menu__item">Soy profesor</li>
                </a>
                <a class="btn btn-link" href="{{ route('admin.password.request') }}"  style="text-decoration: none;">
                    <li class="mdl-menu__item">Soy administrador</li>
                </a>
            </ul>

        </div>


    </div>

</div>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="{{asset('js/material.min.js')}}"></script>
</body>
</html>