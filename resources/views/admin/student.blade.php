@extends('layouts.principal')

@section('title')
    Portal Estudiante
@stop

@section('styles')
    <style>
        .demo-card-wide.mdl-card {
            width: 730px;
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
            margin-left: 1%;
        }

    </style>
    <style>
        .profile-img{
            display: inline-block;
            width: 180px;
            height: 180px;
            overflow: auto;
            border-radius: 50%;
            border-color: #222222;
        }
        .wrapper{
            display: table;
            width: 100%; /* Add or remove this depending on your layout */
        }
        .wrapper > div{
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }
        #botonesTeacher{
            text-align: center;
        }
        .buttons_accion_admin{
            margin-left: 80%;
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
@section('dialogs')
    <dialog id="dialog" class="mdl-dialog">
        <h4 class="mdl-dialog__title">¿Está seguro de eliminar este estudiante?</h4>
        <div class="mdl-dialog__content">
        </div>
        <div id="dialog_actions" class="mdl-dialog__actions ">
            <a href="{{route('admin.student.delete',$user->id)}}"><button id="aceptar" type="button" class="mdl-button ">Eliminar</button></a>
            <button id="cancelar" type="button" class="mdl-button">Cancelar</button>
        </div>
    </dialog>
    <dialog id="dialogInfo" class="mdl-dialog" style="width: 25%">
        <h6 class="mdl-dialog__title">Información apoderado</h6>
        <div class="mdl-dialog__content">
            <ul class="demo-list-two mdl-list">
                <li class="mdl-list__item mdl-list__item--two-line" style="background-color: whitesmoke; border: dotted 1px #1d1d1d">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">perm_identity</i>
                        @if(isset($user->apoderado))
                            <span>{{strtoupper($user->apoderado)}}</span>
                            <br>
                            <span class="mdl-list__item-sub-title">Nombre Apoderado</span>
                        @else

                            <span class="mdl-list__item-sub-title">Informacion registrada</span>
                        @endif
                    </span>
                </li>
            </ul>
            <ul class="demo-list-two mdl-list">
                <li class="mdl-list__item mdl-list__item--two-line" style="background-color: whitesmoke; border: dotted 1px #1d1d1d">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">perm_phone_msg</i>
                        @if(isset($user->fono_contacto))
                            <span>{{$user->fono_contacto}}</span>
                            <span class="mdl-list__item-sub-title">Fono-contacto:</span>
                        @else
                            <span class="mdl-list__item-sub-title">Fono no ingresado</span>
                        @endif
                    </span>
                </li>
            </ul>
        </div>
        <div id="dialog_actions" class="mdl-dialog__actions ">
            <button id="cancelar" type="button" class="mdl-button">Cerrar</button>
        </div>
    </dialog>
@stop

@section('content')

    <div class="page-content">
        <div class="android-more-section">
            <div class="mdl-grid buttons_accion_admin">
                <div class="div">
                    <a href="{{route('admin.student.edit',$user->id)}}" style="color: inherit; text-decoration: none;">
                        <button id="editStudent" class="mdl-button mdl-js-button mdl-button--icon">
                            <div class="mdl-tooltip mdl-tooltip--large" for="editStudent">
                                Editar estudiante
                            </div>
                            <i class="material-icons">create</i>
                        </button>
                    </a>

                    <button id="deleteStudent"  class="mdl-button mdl-js-button mdl-button--icon">
                        <div class="mdl-tooltip mdl-tooltip--large" for="deleteStudent">
                            Eliminar estudiante
                        </div>
                        <i class="material-icons">clear</i>
                    </button>
                </div>
            </div>
            @component('components.misDatosPerfilStudent',['curso'=>$cursos,'user'=>$user])
            @endcomponent
            <div class="mdl-grid" id="botonesTeacher">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
                    <button id="infoApoderado" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">how_to_reg</i>Info Apoderado</button>
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone">
                    <a href="{{route('admin.student.annotations.list',$user->id)}}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">ballot</i>Informe personalidad</button></a>
                </div>
                <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">
                    <a href="{{route('admin.student.marks',$user->id)}}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" ><i class="material-icons">playlist_add_check</i>Notas</button></a>
                </div>
            </div>
            <br>
            <br>
            <a style="color: inherit; text-decoration: none;" onclick="history.back()">
                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" style=" margin-left: 2%; ">
                    <span> <i class="material-icons"> keyboard_arrow_left </i> Regresar </span>
                </button>
            </a>
        </div>
    </div>
@stop
@section('scripts')
<script>
    (function() {
        'use strict';
        var dialogButton = document.querySelector('#deleteStudent')
        var dialog = document.querySelector('#dialog')
        var cancelar = dialog.querySelector('#cancelar')
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        cancelar.addEventListener('click', function() {
            dialog.close();
        });
    }());
    (function() {
        'use strict';
        var dialogButton = document.querySelector('#infoApoderado')
        var dialog = document.querySelector('#dialogInfo')
        var cancelar = dialog.querySelector('#cancelar')
        if (!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialogButton.addEventListener('click', function () {
            dialog.showModal();
        });
        cancelar.addEventListener('click', function () {
            dialog.close();
        });
    }());
</script>
@endsection