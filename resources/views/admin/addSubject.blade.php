@extends('layouts.principal')

@section('title')
    Crear Asignatura
@stop

@section('styles')
    <style>/*CSS Imagen*/
        /*CSS Imagen*/
        .container-image {
            margin: 0 auto;
            width: 175%;
            height: 85%;
            margin-top: 5ch;
            box-shadow: 0 3px 6px #0005;
            padding: 10%;
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
            <h1 class="article-h1">Crear Asignatura</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="android-more-section">
            <!-- formulario crear asignatura  -->
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.subject.create',$id_curso)}}">
                @csrf

                <div class="mdl-grid" STYLE="background-color: white; border: solid 1px lightgrey">

                    <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">
                        <!--input nombre de la asignatura-->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="name" name="name">
                            <label class="mdl-textfield__label" for="name">Nombre</label>
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    <!--input descripcion de la asignatura-->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                           <input class="mdl-textfield__input" type="text" id="descripcion" name="descripcion">
                            <label class="mdl-textfield__label" for="descripcion">Descripcion</label>
                        </div>
                        @if ($errors->has('descripcion'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                    <!--input profesor de la asignatura -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select text_input">
                            <input type="text" value="" class="mdl-textfield__input" id="teacher_id" readonly>
                            <input type="hidden" value="" name="teacher_id">
                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            <label for="profesor" class="mdl-textfield__label">Profesor</label>
                            <ul for="profesor" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                @foreach($teachers as $teacher)
                                    <li class="mdl-menu__item" data-val="{{$teacher->id}}">{{$teacher->name}} {{$teacher->surname}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                        <br>
                    <!--input color de la asignatura -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="color" style="color: #b6b6c1;" for="color">Color Asignatura </label>
                            <input  type="color" id="color" name="color">
                        </div>
                        @if ($errors->has('color'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('color') }}</strong></span>
                        @endif
                        <br>
                        <br>
                        @if ($errors->has('teacher_id'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('teacher_id') }}</strong>
                                </span>
                        @endif
                        <br>
                        <br>
                    <!-- input imagen asignatura -->
                        <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">
                            <div class="container-image">
                                <div class="mdl-card card_image mdl-shadow--2dp mdl-card--image-input" id="top-image">
                                    <div class="mdl-card__title mdl-card--expand"></div>
                                    <div class="mdl-card__actions">
                                        <span class="card-image__filename">Subir una imagen</span><input class="card-image__input" type="file" name="img_asignatura" value="{{old('file')}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
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