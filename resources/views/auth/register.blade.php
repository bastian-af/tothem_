@extends('layouts.principal')

@section('styles')
    <style>
        .demo-card-wide.mdl-card {
            width: 800px;
        }
        .demo-card-square.mdl-card {
            width: 220px;
            height: 270px;
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
            margin-left: 1%;
        }
        /*CSS para contenedor imagen perfil*/
        .container-image {
            margin: 0 auto;
            width: 50%;
            margin-top: 5ch;
            box-shadow: 0 3px 6px #0005;
            padding: 25px;
            display: flex;
            justify-content: space-evenly;
        }
        .container{
            margin: 2%;
            padding: 2%;
        }
        .card-body div{
            margin:2%;
            padding: 3%;
        }
        .mdl-card {
            background: url({{URL::asset('images/userprofilepic.png')}});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
        }
        .mdl-card__actions {
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
        .text_input{
            margin-left: 3%;
            margin-right: 6%;
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
        <div class=" android-more-section">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" >
                    <h1 class="article-h1"> {{ __('Registrar Estudiante') }}</h1>
                </div>
            </div>
            <br>
            <br>

            <div class="mdl-grid" >
               <form method="POST" enctype="multipart/form-data" action="{{ route('student.register.submit') }}">
                @csrf

                   <div class="mdl-grid container mdl-grid--no-spacing" STYLE="background-color: white; border: solid 1px lightgrey">
                            <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">

                                <div class="container-image">
                                    <div class="mdl-card mdl-shadow--2dp mdl-card--image-input" id="top-image">
                                        <div class="mdl-card__title mdl-card--expand"></div>
                                        <div class="mdl-card__actions">
                                            <span class="card-image__filename">Subir una imagen de perfil</span><input class="card-image__input" type="file" name="img_perfil" value="{{old('file')}}"/>
                                        </div>
                                    </div>
                                </div>

                                @if ($errors->has('img_perfil'))
                                    <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('img_perfil') }}</p>
                                @endif
                            </div>
                            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
                                <br>

                                <!--input nombre del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="text" id="name" name="name">
                                    <label class="mdl-textfield__label" for="name">Nombre</label>
                                </div>

                                <div class="invalid-feedback">
                                    @if ($errors->has('name'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <!--input segundo nombre del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="text" id="second_name" name="second_name">
                                    <label class="mdl-textfield__label" for="second_name">Segundo Nombre</label>
                                </div>
                                <br>
                                <!--input apellido del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="text" id="surname" name="surname">
                                    <label class="mdl-textfield__label" for="surname">Apellido Paterno</label>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('surname'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('surname') }}</p>
                                    @endif
                                </div>

                                <!--input segundo apellido del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="text" id="second_surname" name="second_surname">
                                    <label class="mdl-textfield__label" for="second_surname">Apellido Materno</label>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('second_surname'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('second_surname') }}</p>
                                    @endif
                                </div>
                                <br>
                                <br>

                                <!--input rut-->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="text" id="rut" name="rut">
                                    <label class="mdl-textfield__label" for="rut">Rut</label>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('rut'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('rut') }}</p>
                                    @endif
                                </div>

                                <!--input curso del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select text_input">
                                    <input type="text" value="" class="mdl-textfield__input" id="curso" readonly>
                                    <input type="hidden" value="" name="curso">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    <label for="curso" class="mdl-textfield__label">Curso</label>
                                    <ul for="curso" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach($cursos as $curso)
                                            <li class="mdl-menu__item" data-val="{{$curso->id}}">{{$curso->numero}}°{{$curso->letra}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('surname'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('surname') }}</p>
                                    @endif
                                </div>
                                <br>
                                <!--input direccion del estudiante-->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="text" id="address" name="address">
                                    <label class="mdl-textfield__label" for="address">Dirección</label>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('address'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                                <br>
                                <!--input Fecha de nacimiento del estudiante-->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <label style="color: #b6b6c1;" for="fecha_nacimiento">Fecha nacimiento</label>
                                    <input class="mdl-textfield__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" >
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('fecha_nacimiento'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('fecha_nacimiento') }}</p>
                                    @endif
                                </div>
                                <br>
                                <!--input nombre completo apoderado del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="text" id="apoderado" name="apoderado">
                                    <label class="mdl-textfield__label" for="apoderado">Nombre y apellido del apoderado</label>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('apoderado'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('apoderado') }}</p>
                                    @endif
                                </div>
                                <br>

                                <!--input fono contacto apoderado del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="number" id="fono_contacto" name="fono_contacto" >
                                    <label class="mdl-textfield__label" for="fono_contacto">Fono contacto</label>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('fono_contacto'))
                                        <p>&nbsp;   {{ $errors->first('fono_contacto') }}</p>
                                    @endif
                                </div>

                                <!--input correo electronico -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="email" id="email" name="email" >
                                    <label class="mdl-textfield__label" for="email">Correo Electronico del estudiante</label>
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('email'))
                                        <p>&nbsp;&nbsp;&nbsp; {{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <br>

                                <!--input pass del estudiante -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="password"  name="password" >
                                    <label class="mdl-textfield__label" for="password">Contraseña</label>

                                </div>
                                @if ($errors->has('password'))
                                    <br>
                                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                            @endif

                            <!--input confirmar pass -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                                    <input class="mdl-textfield__input" type="password"  name="password_confirmation" >
                                    <label class="mdl-textfield__label" for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>

                       <!--separadores-->
                           <br>
                           <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" style="border: solid 1px #536dfe">
                           </div>
                           <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                           </div>
                        <!--botones-->
                           <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                               <a href="{{route('admin.dashboard')}}">
                                   <button class="mdl-button mdl-js-button mdl-button--accent" type="button" style=" left: 60%; top:35%" >
                                       Cancelar
                                   </button>
                               </a>
                           </div>

                           <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                               <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" style=" left: 20%; top:35%"><span><i class="material-icons">assignment_turned_in</i></span>
                                   {{ __('Registrar') }}
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
                   <br>
                   <br>
               </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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


@endsection
