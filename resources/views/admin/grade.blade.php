@extends('layouts.principal')

@section('title')
    Portal Curso {{$curso->numero}} ° {{$curso->letra}}
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
            margin-left: 35%;
            /*  border-bottom: solid 1px darkslategrey;*/

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

    <style>
        .demo-card-wide.mdl-card {
            width: 100%;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 176px;

        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
        .mdl-asignatura-cell {
            box-sizing: border-box;
            /*   background-color: #999;*/
            padding: 3px;
            color: black;
            margin: 0 auto;
        }
        .mdl-card__title-text{
            color:#202124;
        }
    </style>

    <style>
        .demo-card-wide-header.mdl-card {
            width: 90%;
            margin: 0 auto;
        }
        .demo-card-wide-header > .mdl-card__title {
            color: #fff;
            height: 176px;
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/welcome_card_tuts.png') center / cover;
        }
        .demo-card-wide-header > .mdl-card__menu {
            color: #fff;
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
            margin-outside: 10%;
            min-height: 0;
            width: 100%;
            flex-direction: column;
            margin-bottom: 20px
        }

        .mdl-card .mdl-card__title {
            flex-direction: column;
            width: 100%;
        }
        .mdl-card__title {
            padding-left: 0%;!important;
            flex-direction: column;
            width: 100%;
        }
        .mdl-card .mdl-card__title h2 {
            margin-right: 30px;
            max-width: 330px;
            min-width: 330px;
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
    <!--TABLA-->
    <style>
        .mdl-data-table td{
            text-align: center;
        }
        input + table {
            margin-top: 1em;
        }

        th.sort {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            min-width: 75px;
        }
        th.sort:hover {
            cursor: pointer;
            text-decoration: none;
        }
        th.sort:focus {
            outline: none;
        }
        th.sort:after {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid transparent;
            content: "";
            position: relative;
            top: -10px;
            right: -5px;
        }
        th.sort.asc:after {
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #000;
            content: "";
            position: relative;
            top: 4px;
            right: -5px;
        }
        th.sort.desc:after {
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid #000;
            content: "";
            position: relative;
            top: -4px;
            right: -5px;
        }
        #dialog{
            width: 45%;
        }
        .buttons_fixed{
            margin-right: 5%;
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
        <h4 class="mdl-dialog__title">¿Desea elimiar el curso del sistema?</h4>
        <div class="mdl-dialog__content">
            <h5>Se eliminaran además los siguientes registros</h5>
            @if(!isset($asignaturas))
                <li></li>
                    <ul>-</ul>
            @else
                <li>Asignaturas</li>
                @foreach($asignaturas as $asignatura)
                    <ul>- {{$asignatura['name']}}</ul>
                    @endforeach
            @endif
            @if(!isset($alumnos))

            @else
                <li>Alumnos</li>
                @foreach($alumnos as $alumno)
                    <ul>- {{$alumno['name']}} {{$alumno['surname']}} {{$alumno['second_surname']}}  Rut: {{$alumno['rut']}}</ul>
                @endforeach
            @endif

        </div>
        <div id="dialog_actions" class="mdl-dialog__actions ">
            <a href="{{route('admin.grade.delete',$curso->id)}}"><button id="aceptar" type="button" class="mdl-button ">Si, eliminar</button></a>
            <button id="cancelar" type="button" class="mdl-button">Cancelar</button>
        </div>
    </dialog>
@stop
@section('content')

    <!-- Asignatura curso -->
    <div class="page-content">
        <div class="android-more-section">

            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" style="text-align: center">
                    <button type="button"  onclick="history.back()" class="mdl-button mdl-js-button mdl-js-ripple-effect" style=" ">
                        <span> <i class="material-icons"> keyboard_arrow_left </i>Regresar</span>
                    </button>
                </div>

                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" style="text-align: center">
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" style="text-align: center">
                    <div class="mdl-grid buttons_accion_admin" style="margin-left: 30%">

                        <a href="{{route('admin.grade.edit', $curso->id)}}" style="color: inherit; text-decoration: none;">
                            <button id="editCurso" class="mdl-button mdl-js-button mdl-button--icon">
                                <div class="mdl-tooltip mdl-tooltip--large" for="editCurso">
                                    Editar curso
                                </div>
                                <i class="material-icons">create</i>
                            </button>
                        </a>

                        <button id="deleteCurso"  class="mdl-button mdl-js-button mdl-button--icon">
                            <div class="mdl-tooltip mdl-tooltip--large" for="deleteCurso">
                                Eliminar curso
                            </div>
                            <i class="material-icons">clear</i>
                        </button>

                    </div>
                </div>

            </div>

            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <h1 class="article-h1">CURSO: {{$curso->numero}}° {{$curso->letra}}</h1>
                </div>

                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                </div>
            </div>


            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
                    <span class="mdl-chip mdl-chip--deletable" >
                           <a href="{{route('admin.teacher', $teacher->id)}}" style="color: inherit; text-decoration: none;">
                                <button type="button" class="mdl-chip__action"><i class="material-icons">business_center</i></button>
                                <span id="profesor_chip" class="mdl-chip__text">&nbsp;Profesor Jefe: {{$teacher->name}} {{$teacher->surname}} {{$teacher->second_surname}}&nbsp;&nbsp;</span>
                           </a>
                       </span>
                </div>
            </div>

            <!--Tabla-->
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                    <table id="tabla-data" class="mdl-data-table" style="width:100% !important">
                        <thead>
                        <tr>
                            <th style="text-align: center">Rut</th>
                            <th style="text-align: center">Nombre</th>
                            <th style="text-align: center">Apellido</th>
                            <th style="text-align: center">Perfil estudiante</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($alumnos as $alumno)
                            <tr>
                                <td>{{$alumno->rut}}</td>
                                <td >{{$alumno->name}}</td>
                                <td >{{$alumno->surname}}</td>
                                <td >
                                    <a href="{{route('admin.student', $alumno->id)}}">
                                        <button  type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--accent" style="margin-left: 45%">
                                            <i class="material-icons">face</i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>


            <div class="mdl-grid">
                <div  class="logo-font android-slogan">Asignaturas</div>
            </div>

            <div class="mdl-grid">
                @if(!isset($asignaturas))
                    <h2 class="mdl-card__title-text">Sin asignaturas</h2>
                @else
                    @foreach($asignaturas as $asignatura)

                        <div class="mdl-asignatura-cell murray-cell mdl-cell--4-col" >
                            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                            </div>
                            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                <div class="mdl-card__title" style="background: url({{asset('subject_pic/'.$asignatura['url_imagen'])}}) center / cover;">
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <h2 class="mdl-card__title-text"><strong>{{strtoupper($asignatura['name'])}}</strong></h2><br>
                                    {{$asignatura['descripcion']}}
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <a href="{{route('admin.subject.show',$asignatura['id'])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                        <i class="material-icons">keyboard_tab</i>
                                        Aula
                                    </a>
                                </div>
                                <div class="mdl-card__menu">

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" >
                </div>
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone" >
                    <a href="{{route('admin.subject.add',$curso->id)}}" style="color: inherit; text-decoration: none;"><button id="addAsignatura" type="button" class="mdl-button" style="margin-left: 40%"> <i class="material-icons" style="font-size: 24px">add_circle</i> Crear Asignatura</button></a>
                </div>
            </div>

            <div class="mdl-grid"><div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"></div></div>

        </div>
    </div>

@stop
@section('scripts')

    <script>
        $(document).ready(function() {
        $('#tabla-data').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2, 3 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ],
            "paging":   true,
            "info": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        } );
    } );

</script>
<script>

    $(window).load(function() {
        $('#tabla-data_filter').addClass('mdl-textfield mdl-js-textfield');
    } );

</script>
<script>
    //manejo del modal eliminar
    (function() {
        'use strict';
        var dialogButton = document.querySelector('#deleteCurso')
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
