@extends('layouts.principal')

@section('title')
    Portal Profesor
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
            background: url({{asset('images/userprofilepic.png')}}) no-repeat bottom right 35%;
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
    <style/>
    <style>/*CSS Imagen*/
        /*CSS Imagen*/
        .container-image {
            margin: 0 auto;
            width: 30%;!important;
            height: 30%;!important;
            margin-top: 5ch;
            box-shadow: 0 3px 6px #0005;
            padding: 10%;
            justify-content: space-evenly;
        }
        .card-body div{
            margin:2%;
            padding: 3%;
        }
        .container-image .mdl-card {
            background: url({{URL::asset('profile_pic/'.$teacher->url_imagen)}});
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
            <h1 class="article-h1">Editar profesor</h1>
        </div>
    </div>

    <!--datos del profesor-->

    <div class="page-content">
        <div class=" android-more-section">
            <div class="mdl-grid">
                          <!-- formulario editar  -->
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.teacher.edit',$teacher->id)}}">
                @csrf

                <div class="mdl-grid" STYLE="background-color: white; border: solid 1px lightgrey">

                    <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">
                        <div class="container-image">
                            <div class="mdl-card mdl-shadow--2dp mdl-card--image-input" id="top-image">
                                <div class="mdl-card__title mdl-card--expand"></div>
                                <div class="mdl-card__actions">
                                    <span class="card-image__filename">Subir una imagen de perfil</span><input class="card-image__input" type="file" name="img_perfil" value="{{old('file')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone">
                        <!--input nombre del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{$teacher->name}}">
                            <label class="mdl-textfield__label" for="sample3">Nombre</label>
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                        <!--input segundo nombre del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="second_name" name="second_name" value="{{$teacher->second_name}}">
                            <label class="mdl-textfield__label" for="sample3">Segundo Nombre</label>
                        </div>
                        @if ($errors->has('second_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('second_name') }}</strong>
                            </span>
                        @endif

                        <br>
                        <!--input apellido del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="surname" name="surname" value="{{$teacher->surname}}">
                            <label class="mdl-textfield__label" for="surname">Apellido Paterno</label>
                        </div>
                        @if ($errors->has('surname'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('surname') }}</strong></span>
                        @endif

                    <!--input segundo apellido del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="second_surname" name="second_surname" value="{{$teacher->second_surname}}">
                            <label class="mdl-textfield__label" for="second_surname">Apellido Materno</label>
                        </div>
                        @if ($errors->has('second_surname'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('second_surname') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        <br>
                        <!--input rut del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="rut" name="rut" value="{{$teacher->rut}}" >
                            <label class="mdl-textfield__label" for="rut">Rut</label>
                        </div>
                        @if ($errors->has('rut'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('rut') }}</strong></span>
                        @endif
                        <!--input direccion del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="address" name="address" value="{{$teacher->direccion}}">
                            <label class="mdl-textfield__label" for="address">Dirección</label>
                        </div>
                        @if ($errors->has('address'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('address') }}</strong></span>
                        @endif
                        <br>
                        <!--input Fecha de nacimiento del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <label style="color: #b6b6c1;" for="fecha_nacimiento">Fecha nacimiento</label>
                            <input class="mdl-textfield__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$teacher->fecha_nacimiento}}">
                        </div>
                        @if ($errors->has('fecha_nacimiento'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('fecha_nacimiento') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        <br>
                        <!--input Job Title -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="jobTitle" name="jobTitle" value="{{$teacher->job_title}}">
                            <label class="mdl-textfield__label" for="jobTitle">Especialidad</label>
                        </div>
                        @if ($errors->has('jobTitle'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('jobTitle') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        <br>
                        <!--input fono contacto profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="contacto" name="fono_contacto" value="{{$teacher->fono_contacto}}">
                            <label class="mdl-textfield__label" for="apoderado">Número contacto</label>
                        </div>
                        @if ($errors->has('fono_contacto'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('fono_contacto') }}</strong></span>
                        @endif

                    <!--input correo electronico -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="email" name="email" value="{{$teacher->email}}">
                            <label class="mdl-textfield__label" for="email">Correo Electronico</label>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif

                        <br>
                        <br>
                        <br>
                        <!--input pass del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="password"  name="password" >
                            <label class="mdl-textfield__label" for="password">Contraseña</label>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif

                    <!--input confirmar pass del profesor -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="password"  name="password_confirmation" >
                            <label class="mdl-textfield__label" for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                        </div>
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
