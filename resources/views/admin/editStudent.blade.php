@extends('layouts.principal')

@section('title')
    Portal Estudiante
@stop

@section('styles')
    <style>
        .demo-card-wide.mdl-card {
            width: 100%;
        }
        .demo-card-square.mdl-card {
            width: 220px;
            height: 270px;
        }
        .demo-card-square > .mdl-card__title {
            color: #46B6AC;
            background: url({{asset('profile_pic/'.$alumno->url_imagen)}}) no-repeat bottom right 35%;
            background-size: 220px auto;
            margin-bottom: auto;
        }
        .asignatura-title{
            margin-bottom: 0px;
            height: 25px !important;
        }
        .nav-text {
            vertical-align: auto;
        }

    </style>
    <!-- Event card -->
    <style>
        .demo-card-event.mdl-card {
            width: 240px;
            height: 200px;
            background: #3E4EB8;
            margin: 10px 5px;
        }
        .demo-card-event > .mdl-card__actions {
            border-color: rgba(255, 255, 255, 0.2);
        }
        .demo-card-event > .mdl-card__title {
            align-items: flex-start;
        }
        .demo-card-event > .mdl-card__title > h4 {
            margin-top: 0;
        }
        .demo-card-event > .mdl-card__actions {
            display: flex;
            box-sizing:border-box;
            align-items: center;
        }
        .demo-card-event > .mdl-card__actions > .material-icons {
            padding-right: 10px;
        }
        .demo-card-event > .mdl-card__title,
        .demo-card-event > .mdl-card__actions,
        .demo-card-event > .mdl-card__actions > .mdl-button {
            color: #fff;
        }
    </style>

    <style>
        /* CLASES MATERIAL.IO*/
        .mdc-typography--headline6 {
            font-size: 1.25rem;
            font-weight: 500;
            letter-spacing: .0125em !important;
        }
        .mdc-typography--headline6 {
            font-family: Roboto,sans-serif;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            line-height: 2rem !important;
            text-decoration: inherit !important;
            text-transform: inherit !important;
        }
        .demo-title {
            border-bottom: 1px solid rgba(0,0,0,.87) !important;
        }
        .mdc-typography {
            font-family: Roboto,sans-serif !important;
        }
        .article-h1{
            font-family: Roboto,sans-serif;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            font-weight: 400;
            letter-spacing: -.02em;
            text-decoration: inherit;
            text-transform: inherit;
            margin-bottom: 0;
            font-size: 4.286rem;
            line-height: 5.143rem;
        }
        .article-h2{
            font-family: Roboto,sans-serif;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            text-decoration: inherit;
            text-transform: inherit;
            font-weight: 400;
            line-height: 3rem;
            letter-spacing: normal;
            font-size: 2.285rem;
            color: #202124;
        }

        .darksupporting-text{
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            color: #1d1d1d;
            font-size: 1rem;
            margin-top: 5px;
            margin-left: 3%;
        }

    </style>

    <!-- collapse cards -->
    <style>

        label{
            cursor: pointer;
            /*   pointer-events: none; */
            user-select: none;
        }
        .mdl-card {
            min-height: 0;
            width: 90%;
            flex-direction: colum;
            margin-bottom: 20px
        }

        .mdl-card .mdl-card__title {
            flex-direction: colum;
            /*   width: 512px; */
        }
        .mdl-card .mdl-card__title h2 {
            margin-right: 30px;
            max-width: 330px;
            min-width: 330px;
        }

        .mdl-card .mdl-card__title:last-child  {
            align-items: left;
        }

        .height-auto{
            height: auto;
        }

        .shadow {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            margin-bottom: 10px;
        }
        .tab-content {
            display: none;
            /*   height: 0; */
            opacity: 0;
            /*   padding: 0; */
            -webkit-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }

        input:checked ~ .tab-content {
            /*   padding: 20px; */
            /*   min-height: 200px; */
            display: block;
            opacity: 1;

        }

        .label{
            /*   transform: rotateX(180deg); */
            -webkit-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }

        input:checked ~ .menu label .label {
            transform: rotateX(180deg);
        }

    </style>
    <style>/*CSS Imagen*/
        /*CSS Imagen*/
        .container-image {
            margin: 0 auto;
            width: 50%;
            height: 30%;
            margin-top: 5ch;
            box-shadow: 0 3px 6px #0005;
            padding: 25px;
            display: flex;
            justify-content: space-evenly;
        }
        .card-body div{
            margin:2%;
            padding: 3%;
        }
        .container-image .mdl-card {
            background: url({{URL::asset('images/userprofilepic.png')}});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
        }
        .card_image .mdl-card__actions {
            background: linear-gradient(transparent, black);
        }

        .card-image__filename {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
        }
        .card-image__input {
            display: none;
        }
    </style>

@stop


@section('navBarButtons')
    @component('components.adminNavButton')
    @endcomponent
@stop

@section('pictureMenu')
    @component('components.adminPictureMenu')
    @endcomponent
@stop

@section('drawer')
    @component('components.adminDrawer')
    @endcomponent
@stop
@section('content')
    <div class="page-content">
        <div class="android-more-section">
            <h1 class="article-h1">Editar estudiante</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="android-more-section">
            <!-- formulario editar  -->
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.student.update',$alumno->id)}}">
                @csrf

                <div class="mdl-grid" STYLE="background-color: white; border: solid 1px lightgrey">

                    <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">
                        <div class="container-image">
                            <div class="mdl-card card_image mdl-shadow--2dp mdl-card--image-input" id="top-image">
                                <div class="mdl-card__title mdl-card--expand"></div>
                                <div class="mdl-card__actions">
                                    <span class="card-image__filename">Subir una imagen de perfil</span><input class="card-image__input" type="file" name="img_perfil" value="{{old('file')}}" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone">
                        <!--input nombre del alumno-->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{$alumno->name}}">
                            <label class="mdl-textfield__label" for="sample3">Nombre</label>
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                        <!--input segundo nombre del alumno-->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="second_name" name="second_name" value="{{$alumno->second_name}}">
                            <label class="mdl-textfield__label" for="sample3">Segundo Nombre</label>
                        </div>
                        @if ($errors->has('second_name'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('second_name') }}</strong>
                                </span>
                        @endif
                        <br>
                        <!--input apellido del alumno -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="surname" name="surname" value="{{$alumno->surname}}">
                            <label class="mdl-textfield__label" for="surname">Apellido Paterno</label>
                        </div>
                        @if ($errors->has('surname'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('surname') }}</strong></span>
                        @endif
                        <!--input segundo apellido del alumno -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="second_surname" name="second_surname" value="{{$alumno->second_surname}}">
                            <label class="mdl-textfield__label" for="second_surname">Apellido Materno</label>
                        </div>
                        @if ($errors->has('second_surname'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('second_surname') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        <br>
                        <!--input rut del alumno -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="rut" name="rut" value="{{$alumno->rut}}" >
                            <label class="mdl-textfield__label" for="rut">Rut</label>
                        </div>
                        @if ($errors->has('rut'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('rut') }}</strong></span>
                        @endif
                        <!--input direccion del alumno -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="address" name="address" value="{{$alumno->direccion}}">
                            <label class="mdl-textfield__label" for="address">Dirección</label>
                        </div>
                        @if ($errors->has('address'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('address') }}</strong></span>
                        @endif
                        <br>
                        <!--input Fecha de nacimiento del alumno -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <label style="color: #b6b6c1;" for="fecha_nacimiento">Fecha nacimiento</label>
                            <input class="mdl-textfield__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$alumno->fecha_nacimiento}}">
                        </div>
                        @if ($errors->has('fecha_nacimiento'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('fecha_nacimiento') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        <br><!--input curso del alumno -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select text_input">
                            <input type="text" value="" class="mdl-textfield__input" id="curso" readonly>
                            <input type="hidden" value="" name="id_curso">
                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            <label for="curso" class="mdl-textfield__label">Curso</label>
                            <ul for="curso" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                @foreach($cursos as $curso)
                                    <li class="mdl-menu__item" data-val="{{$curso->id}}">{{$curso->numero}}°{{$curso->letra}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                        <!--input correo electronico -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="email" name="email" value="{{$alumno->email}}">
                            <label class="mdl-textfield__label" for="email">Correo Electronico</label>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        <br>
                        <!--input pass del alumon -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="password"  name="password" >
                            <label class="mdl-textfield__label" for="password">Contraseña</label>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    <!--input confirmar pass del alumno -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="password"  name="password_confirmation" >
                            <label class="mdl-textfield__label" for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                        </div>
                        <h4 class="article-h4">Datos de contacto apoderado</h4>
                        <!--input Nombre apoderado -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="apoderado" name="name_apoderado" value="{{$alumno->apoderado}}">
                            <label class="mdl-textfield__label" for="apoderado">Nombre Apoderado</label>
                        </div>
                        @if ($errors->has('name_apoderado'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('name_apoderado') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        <br>
                        <!--input fono contacto apoderado -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="contacto" name="fono_contacto" value="{{$alumno->fono_contacto}}" >
                            <label class="mdl-textfield__label" for="apoderado">Número contacto</label>
                        </div>
                        @if ($errors->has('fono_contacto'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('fono_contacto') }}</strong></span>
                        @endif

                        <br>
                        <br>
                        <br>
                    </div>
                    <br>
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" style="border: solid 1px #536dfe">
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                    </div>

                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                        <a onclick="history.back()">
                            <button class="mdl-button mdl-js-button mdl-button--accent" type="button" style=" left: 60%; top:35%" >
                                Cancelar
                            </button>
                        </a>
                    </div>
                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" style=" left: 20%; top:35%"><span><i class="material-icons">assignment_turned_in</i></span>
                            {{ __('Guardar') }}
                        </button>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
            </form>
        </div>
    </div>
@stop
@section ('scripts')
    <script>
        function changeImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(input).parents('.mdl-card').css('background', `url(${e.target.result})`).css('background-size', 'cover')
                        .css('background-repeat', 'no-repeat')
                        .css('background-position', 'center');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.mdl-card--image-input').on('click', ({target}) => {
            $(target).closest('.mdl-card--image-input').find('input.card-image__input').click();
        })

        $('input.card-image__input').on('click', (e) => {
            e.stopPropagation();
        })

        $('input.card-image__input').on('change', changeImage)
    </script>
@stop
