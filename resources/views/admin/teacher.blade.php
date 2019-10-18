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
        <h4 class="mdl-dialog__title">¿Está seguro de eliminar este profesor?</h4>
        <div class="mdl-dialog__content">
        </div>
        <div id="dialog_actions" class="mdl-dialog__actions ">
            <a href="{{route('admin.teacher.delete',$user->id)}}"><button id="aceptar" type="button" class="mdl-button ">Eliminar</button></a>
            <button id="cancelar" type="button" class="mdl-button">Cancelar</button>
        </div>
    </dialog>
@stop

@section('content')

    <div class="page-content">
        <div class="android-more-section">
            <div class="mdl-grid buttons_accion_admin">
                <div class="div">
                    <a href="{{route('admin.teacher.edit',$user->id)}}" style="color: inherit; text-decoration: none;">
                        <button id="editTeacher" class="mdl-button mdl-js-button mdl-button--icon">
                            <div class="mdl-tooltip mdl-tooltip--large" for="editTeacher">
                                Editar Profesor
                            </div>
                            <i class="material-icons">create</i>
                        </button>
                    </a>

                    <button id="deleteTeacher"  class="mdl-button mdl-js-button mdl-button--icon">
                        <div class="mdl-tooltip mdl-tooltip--large" for="deleteTeacher">
                            Eliminar Profesor
                        </div>
                        <i class="material-icons">clear</i>
                    </button>
                </div>
            </div>
            @component('components.misDatosPerfilTeacher',['curso'=>$curso,'user'=>$user])
            @endcomponent
        </div>
    </div>
@stop
@section('scripts')
    <script>
        (function() {
            'use strict';
            var dialogButton = document.querySelector('#deleteTeacher')
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
    </script>
@endsection