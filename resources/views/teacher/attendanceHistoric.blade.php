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

@section('pictureMenu')
    @component('components.teacherPictureMenu')
    @endcomponent
@stop
@section('drawer')
    @component('components.teacherDrawer')
    @endcomponent
@stop

@section('content')
   <div class="page-content">
       <div class=" android-more-section">


           <div class="mdl-grid">
               <h1 style="margin-lef: 0%" class="article-h1">Historial de Asistencia</h1>
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
               </div>
           </div>


           <div id="headerdata" class="mdl-grid">
               <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" >
                   <span class="mdl-chip mdl-chip--deletable" >
                        <button type="button" class="mdl-chip__action"><i class="material-icons">today</i></button>
                        <span id="date_chip" class="mdl-chip__text">  </span>
                   </span>
                   <span class="mdl-chip__text"> &nbsp;</span>
                   <span class="mdl-chip mdl-chip--deletable">
                        <button type="button" class="mdl-chip__action"><i class="material-icons">face</i></button>
                        <span id="curso_chip" class="mdl-chip__text">&nbsp; &nbsp;</span>
                   </span>
                   <span class="mdl-chip__text"> &nbsp;</span>
               </div>
               <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone" >
               <span class="mdl-chip mdl-chip--deletable" style="margin-left: 25%" >
                        <button type="button" class="mdl-chip__action"><i class="material-icons">assignment</i></button>
                        <span id="profesor_chip" class="mdl-chip__text">&nbsp;</span>
                   </span>
               </div>
           </div>

           <div id="alltable" class="mdl-grid">
               <!--tabla-->
               <table id=tabla-data class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:100% !important">
                       <thead>
                       <tr>
                           <th style="text-align: center">Rut</th>
                           <th style="text-align: center">Nombre</th>
                           <th style="text-align: center">Apellido</th>
                           <th style="text-align: center"> Asistencia</th>
                           <th style="text-align: center"> Perfil estudiante</th>
                       </tr>
                       </thead>
                        <tbody id="asistable">


                        </tbody>
               </table>
           </div>

           <div class="mdl-grid">
               <!--mensaje no encontrado-->
               <div id="no-data-msj" class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                   <br>
                   <br>
                   <div  class="article-h2" style="text-align: center;">  Sin registro de asistencia para el día seleccionado ! </div> <br>
                   <br>
                   <br>
               </div>
           </div>

           <div class="mdl-grid" id="loadingtable">
               <!--loading-->
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                   <br><br>
               </div>
               <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone" >
                   <br>
               </div>

               <div  class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone" >
                   <div class="mdl-progress mdl-js-progress mdl-progress__indeterminate"><br><p style="text-align: center"><strong>Buscando registros de asistencia...</strong> </p></div>
                   <br><br>
               </div>

               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" ></div>
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" ></div>
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" ></div>
               <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" ></div>
           </div>

           <div class="mdl-grid">
               <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" ></div>
               <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                   <div style="margin-left: 35%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label text_input">
                       <label style="color: #b6b6c1;" for="fecha_asistencia">Búsqueda por fecha</label>
                       <input class="mdl-textfield__input" value="{{$lastdate}}" type="date" id="fecha_asistencia" onchange="attendancedate({{$id_curso}});" name="fecha_asistencia">
                   </div>
                   <input class="mdl-textfield__input" value="{{$id_curso}}" type="hidden" id="curso">

               </div>
           </div>


       </div>

   </div>
@stop

@section('scripts')


    <script>

    /*prometo encontrar la asistencia*/
    function attendancedate(idcurso){

        $("#no-data-msj").hide();
        $("#loadingtable").show();

        $("#headerdata").hide();
        $("#alltable").hide();

        let fecha = new Date($('#fecha_asistencia').val());
        console.log(fecha);
        let day = ("0" + (fecha.getDate()+1)).slice(-2);
        let month = ("0" + (fecha.getMonth() + 1)).slice(-2);
        let fecha_asis = fecha.getFullYear()+"-"+(month)+"-"+(day);
        console.log(fecha_asis);

        axios({
            method:'get',
            url:'data/'+fecha_asis+'/'+idcurso,
        })
        .then(function (response) {

            $("#loadingtable").hide();
            console.log(response);
            console.log('yay');

            let attendances = response.data;
            var tbody = $('#asistable')[0];

            if(attendances.length>0){
                $("#tabla-data").find('tbody').empty();
                for (var i = 0; i < attendances.length; i++) {
                    var tr = "<tr>";
                    tr += "<td>" + attendances[i]['rut']+ "</td>" + "<td>" + attendances[i]['nombre']+ "</td>" + "<td>" + attendances[i]['apellido'] + "<td>" + attendances[i]['nombre_estado'] + "</td>" + "<td>" + "<a "+ " href='{{url('/')}}/teacher/student/profile/"+attendances[i]['user_id']+"'"+ ">" +
                        "<button  type='button' class='mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--accent'>" +
                        "<i class='material-icons'>" + "face" + "</i>" + "</button>" + "</a>"+ "</td>  </tr>";
                    tbody.innerHTML += tr;
                }

                /* llenando con info los chip (headerdata)-*/
                let chipdate = $("#date_chip")[0];
                let chipprofe = $("#profesor_chip")[0];
                let chipcurso = $("#curso_chip")[0];

                chipdate.innerHTML = "&nbsp; Fecha: " + attendances[0]['fecha'] + "&nbsp;&nbsp;";
                chipprofe.innerHTML = "&nbsp; Registrado por: " + attendances[0]['profesor'] + "&nbsp;&nbsp;";
                chipcurso.innerHTML = "&nbsp; Curso: " + attendances[0]['curso'] + "&nbsp;&nbsp;";

                /* ocultamos */
                $("#no-data-msj").hide();
                /*mostramos*/
                $("#headerdata").show();
                $("#alltable").show();
            }
            else{
                $("#tabla-data").find('tbody').empty();
                $("#no-data-msj").show();
                $("#loadingtable").hide();
            }

        })
        .catch(function (error) {
            $("#tabla-data").find('tbody').empty();
            $("#no-data-msj").show();
            $("#loadingtable").hide();
        });
    }

    $(document).ready(function () {
        $("#headerdata").hide();
        $("#alltable").hide();
        let idcurso = $("#curso").val();
        attendancedate(idcurso);
    });
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

