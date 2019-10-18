@extends('layouts.principal')

@section('title')
    Crear curso
@stop

@section('styles')
  <style>

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
            <h1 class="article-h1">Crear curso</h1>
        </div>
    </div>
    <div class="page-content">
        <div class="android-more-section">
            <!-- formulario editar  -->
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.grade.create')}}">
                @csrf

                <div class="mdl-grid" STYLE="background-color: white; border: solid 1px lightgrey">

                    <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">
                        <!--input numero del curso o grado-->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="numero" name="numero">
                            <label class="mdl-textfield__label" for="numero">Numero</label>
                        </div>
                        @if ($errors->has('numero'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('numero') }}</strong></span>
                        @endif
                    <!--input letra Curso-->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                            <input class="mdl-textfield__input" type="text" id="letra" name="letra">
                            <label class="mdl-textfield__label" for="letra">Letra curso</label>
                        </div>
                        @if ($errors->has('letra'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('letra') }}</strong>
                                </span>
                        @endif
                        <br>
                        <br><!--input profesor del curso -->
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
                        @if ($errors->has('teacher_id'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('teacher_id') }}</strong>
                                </span>
                        @endif
                        <br>
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