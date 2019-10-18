@extends('layouts.principal')

@section('title')
    Portal Profesor
@stop

@section('styles')
    <!-- fabbutton-->
    <style>
        .mdl-sheet__container {
            position: fixed;
            right: 32px;
            bottom: 32px;
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            z-index: 9999;
        }

        .mdl-sheet {
            position: absolute;
            right: 0;
            bottom: 0;
            background: #039870;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 180ms;
        }
        .mdl-sheet .mdl-sheet__content {
            display: none;
        }

        .mdl-sheet__icon {
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-12px, -12px);
            transform: translate(-12px, -12px);
            font-size: 24px;
            width: 24px;
            height: 24px;
            line-height: 24px;
        }

        .mdl-sheet--opened {
            background: #fff;
            color: #263238;
            border-radius: 2px;
            width: 240px;
            height: auto;
            min-height: 150px;
            max-height: 80vh;
            overflow-y: auto;
        }
        .mdl-sheet--opened .mdl-sheet__icon {
            display: none;
        }
        .mdl-sheet--opened .mdl-sheet__content {
            display: block;
        }
    </style>
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
            flex-direction: column;
            margin-bottom: 20px
        }

        .mdl-card .mdl-card__title {
            flex-direction: column;
            /*   width: 512px; */
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
            margin-left: 3%;
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

    </style>
@stop
@section('navBarButtons')
    @component('components.teacherNavButton')
    @endcomponent
@stop

@section('pictureMenu')
    @component('components.teacherPictureMenu')
    @endcomponent
@stop
@section('drawer')
    @component('components.teacherDrawer')
    @endcomponent
@stop

@section('content')

    <!--FAB BUTTON-->
    <div class="mdl-sheet__container">
        <div class="mdl-sheet mdl-shadow--2dp">
            <i class="material-icons mdl-sheet__icon">access_time</i>

            <div class="mdl-sheet__content">
                <div class="mdl-list">
                    <div class="mdl-list__item">
                        <a href="{{route('teacher.attendance.historic',$curso->id)}}" style="color: inherit; text-decoration: none;">
                            <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-avatar">access_time</i>
                                <span>Hisotrial de asistencia</span>
                            </span>
                            <a class="mdl-list__item-secondary-action" href="{{route('teacher.attendance.historic',$curso->id)}}"><i class="material-icons">assignment</i></a>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
   <!-- -->


   <div class="page-content">
       <div class=" android-more-section">

           <div class="mdl-grid">
               <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone" >
                   <p class="article-h1">Asistencia</p>
               </div>
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
               </div>
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
               </div>
           </div>

           <div class="mdl-grid">
               <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" >
                   <span class="mdl-chip mdl-chip--deletable" style="margin-left: 2%">
                        <button type="button" class="mdl-chip__action"><i class="material-icons">today</i></button>
                        <span class="mdl-chip__text">&nbsp; Fecha: {{$hoy}} &nbsp;&nbsp;</span>
                   </span>
                   <span class="mdl-chip__text"></span>
                   <span class="mdl-chip mdl-chip--deletable">
                        <button type="button" class="mdl-chip__action"><i class="material-icons">face</i></button>
                        <span class="mdl-chip__text">&nbsp; Curso: {{$curso['numero'].' '.$curso['letra']}} &nbsp;&nbsp;</span>
                   </span>
                   <span class="mdl-chip__text"> &nbsp;</span>
               </div>
               <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone" >
               <span class="mdl-chip mdl-chip--deletable" style="margin-left: 40%" >
                        <button type="button" class="mdl-chip__action"><i class="material-icons">assignment</i></button>
                        <span class="mdl-chip__text">&nbsp; Estado: @if($estado) {{'Ya registrado'}}@else {{'Sin registrar'}}@endif &nbsp;</span>
                   </span>
               </div>
           </div>

            <!--Tabla-->
            <form action="{{ route('teacher.attendance.submit', $curso->id) }}" method="POST">
                   @csrf
                   <div class="mdl-grid" style="@if($estado) {{'display: none'}}@else {{'display:block'}}@endif">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                            <table id="tabla-data" class="mdl-data-table" style="width:100% !important">
                           <thead>
                           <tr>
                               <th >Rut</th>
                               <th >Nombre</th>
                               <th >Apellido</th>
                               <th> Presente </th>
                               <th> Ausente </th>
                               <th> Atraso </th>
                               <th> Justificado </th>
                               <th> Perfil estudiante</th>
                           </tr>
                           </thead>

                           <tbody>
                           @foreach($alumnos as $alumno)
                               <tr>
                                   <td>{{$alumno->rut}}</td>
                                   <td >{{$alumno->name}}</td>
                                   <td >{{$alumno->surname}}</td>
                                   <td>
                                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-{{$alumno->id}}-1">
                                           <input type="radio" id="option-{{$alumno->id}}-1" class="mdl-radio__button" name="options[{{$alumno->id}}][estado]" value="1" checked>
                                           <input type="hidden" name=options[{{$alumno->id}}][id]" value="{{$alumno->id}}">
                                       </label>
                                   </td>
                                   <td>
                                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-{{$alumno->id}}-2">
                                           <input type="radio" id="option-{{$alumno->id}}-2" class="mdl-radio__button" name="options[{{$alumno->id}}][estado]" value="2">
                                           <input type="hidden" name=options[{{$alumno->id}}][id]" value="{{$alumno->id}}">
                                       </label>
                                   </td>
                                   <td>
                                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-{{$alumno->id}}-3">
                                           <input type="radio" id="option-{{$alumno->id}}-3" class="mdl-radio__button" name="options[{{$alumno->id}}][estado]" value="3">
                                           <input type="hidden" name=options[{{$alumno->id}}][id]" value="{{$alumno->id}}">
                                       </label>
                                   </td>
                                   <td>
                                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-{{$alumno->id}}-4">
                                           <input type="radio" id="option-{{$alumno->id}}-4" class="mdl-radio__button" name="options[{{$alumno->id}}][estado]" value="4">
                                           <input type="hidden" name=options[{{$alumno->id}}][id]" value="{{$alumno->id}}">
                                       </label>
                                   </td>
                                   <td class="controls mdl-data-table__cell--non-numeric" >
                                      <a href="{{route('teacher.studentProfile', $alumno->id)}}">
                                          <button  type="button"class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--primary" style="margin-left: 45%">
                                              <i class="material-icons">face</i>
                                          </button>
                                      </a>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                           <tfoot>
                                <tr>

                                </tr>
                                </tfoot>

                       </table>
                        </div>

                        <input type="hidden" name="id_curso" value="{{$curso->id}}">

                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"  >

                            <a style="color: inherit; text-decoration: none;" href="{{route('teacher.attendance', $curso->id)}}">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--accent" style=" margin-left: 75%; ">
                               Cancelar
                            </button>
                            </a>

                           <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit">
                               Guardar
                           </button>

                        </div>
                   </div>
                </form>

            <div class="mdl-grid" style=" @if($estado) {{'display: block'}}@else {{'display:none'}}@endif">
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                   <br>
                   <br>
                   <br>
                   <div class="article-h2" style="text-align: center;">  Asistencia del día ya registrada ! </div> <br>
                   <a style="color: inherit; text-decoration: none; text-align: center;" href="{{route('teacher.attendance.historic', $curso->id)}}">
                       <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" style=" text-align: center; margin-left: 40%">
                           Ver registros de asistencia
                       </button>
                   </a>
                   <br>
                   <br>
                   <br>
               </div>
           </div>
       </div>
   </div>
@stop

@section('scripts')
    <!--FABBUTTON-->
    <script>
        var $sheet = $('.mdl-sheet');

        if($sheet.length > 0) {
            $('html').on('click', function() {
                $sheet.removeClass('mdl-sheet--opened')
            });

            $sheet.on('click', function(event) {
                event.stopPropagation();

                $sheet.addClass('mdl-sheet--opened');
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#tabla-data').DataTable( {
                columnDefs: [
                    {
                        targets: [ 0, 1, 2 ],
                        className: 'mdl-data-table__cell--non-numeric'
                    },
                    {
                        targets: [ 3, 4, 5, 6, 7 ],
                        orderable: false
                    }
                ],
                "paging":   false,
                "info": false,
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
    <!--Notificaciones snackbar: HTML se encuentra layout principal-->
    <script>
        r(function(){
            'use strict';
            var msg = '<?php
                if(!empty($_GET['notificacion'])){
                    echo $_GET['notificacion'];
                }
                else echo 'Bienvenido Administrador';
                ?>';
            var notify = '<?php if(!empty($_GET['notificacion'])){
                echo $_GET['notificacion'];
            } ?>';

            if (notify){
                var notification = document.querySelector('#demo-toast-example');
                notification.MaterialSnackbar.showSnackbar(
                    {
                        message: '' + msg,
                        timeout: 5000,
                        actionText: 'Undo'
                    }
                );
            }

        });

        function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
    </script>
@stop

