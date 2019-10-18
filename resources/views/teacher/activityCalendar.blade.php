@extends('layouts.principal')

@section('title')
    Calendario - Profesor
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


    <!-- events cards for activity calendar-->
    <style>
        .demo-card-event.mdl-card {
            width: 256px;
            height: auto;
            background: #3E4EB8;
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
        .demo-card-event > .mdl-card__title > h6 {
            margin-top: 0%;
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
        .visible{
            display: flex;
        }
    </style>

    <!--DATEPICKER-->

    <style>
        #calendar,
        #calendar2,
        #calendar3 {
            border: 1px solid #dfdfdf;
            font-family: Roboto, Arial, Helvetica;
            font-size: 14px;
            color: #404040;
        }
        table.main_tbl_calendar td {
            font-family: Roboto, Arial, Helvetica;
            font-size: 14px;
            color: #404040;
        }
        .mdl-dialog{
            width: 40%;
        }
        #dialogDelete{
            width: 20%;
        }
        #Actividades{
            -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
            box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        }
        .sombra {
            -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,.5);
            -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,.5);
            box-shadow: 0px 2px 5px 0px rgba(0,0,0,.5);
            border-radius: 10px;
        }
        .notificacion {

             padding: 1rem 3rem;
             opacity: 0;
             transition: opacity .5s ease;
         }
        .visible {
            width: 45%;
            background-color: darkred;
            color: white;
            opacity: 1;
        }
        #ingresar_actividad{
            width: 100%;
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
@section('dialogs')
    <dialog id="dialog" class="mdl-dialog">
        <h4 class="mdl-dialog__title">Nueva actividad.</h4>
        <div class="mdl-dialog__content">
            <form id="ingresar_actividad">
                @csrf
                <div style="background-color: ghostwhite;">

                    <!-- titulo + fecha -->
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="titulo" id="activity_title" />
                                <label class="mdl-textfield__label" for="activity_title">Título</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="date" name="fecha" id="activity_date" />
                                <label class="mdl-textfield__label" for="activity_date">Fecha</label>
                            </div>
                        </div>

                    </div>

                    <!-- horarios -->
                    <div class="mdl-grid entre">

                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="time" name="hora_inicio" id="activity_start" />
                                <label class="mdl-textfield__label" for="activity_start">Hora inicio</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="time" name="hora_termino" id="activity_end" />
                                <label class="mdl-textfield__label" for="activity_end">Hora término</label>
                            </div>
                        </div>

                    </div>
                    <div class="mdl-grid hasta">
                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                                    <input type="text" value="" class="mdl-textfield__input" id="activity_curso" readonly>
                                    <input type="hidden" value="" name="curso">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    <label for="activity_curso" class="mdl-textfield__label">Curso</label>
                                    <ul for="activity_curso" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach($cursos_profesor as $curso)
                                            <li class="mdl-menu__item" data-val="{{$curso['id']}}">{{$curso['numero']}}{{$curso['letra']}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- botones -->
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone"></div>
                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                            <button id="cancelar" class="mdl-button mdl-js-button mdl-button--accent" type="button" style=" left: 0%; top:35%" >
                                Cancelar
                            </button>
                        </div>
                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                            <button id="ingresar_actividad_submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" style=" left: 5%; top:35%"><span><i class="material-icons">assignment_turned_in</i></span>
                                {{ __('Guardar') }}
                            </button>
                            <br>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </dialog>
@stop
@section('content')
    <div class="page-content">
        <div class=" android-more-section">
            <div class="mdl-grid">
                <h3 class="article-h2"><i class="material-icons" >event_available</i> Calendario Actividades </h3>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" >
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" >
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" >
                </div>
                <button id="show-dialog" type="button" class="mdl-button" style="margin-top:2%;"> <i class="material-icons" style="font-size: 24px;">add_circle</i> Actividad</button>
            </div>

            <!-- LIST EVENTS-->
            <div class="mdl-grid" id="contenedor_actividades">
                @foreach($calendario as $actividad)
                <div id="Actividades{{$actividad['id']}}" class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
                    <div class="demo-card-event mdl-card mdl-shadow--2dp" style="width: 99%; height :97%;">
                        <div class="mdl-card__title mdl-card--expand">
                            <h4>
                               {{$actividad['titulo']}}
                            </h4>
                            <div class="mdl-layout-spacer"></div>
                            <button id="delete_at" data-id="{{$actividad['id']}}" type="button" class="mdl-button mdl-button--icon delete_at ">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <div class="mdl-card__title mdl-card--expand">
                            <h6>
                                <i class="material-icons">date_range</i> {{$actividad['fecha']}}<br>
                                <i class="material-icons">access_time</i> {{$actividad['hora_inicio']}} - {{$actividad['hora_fin']}}
                            </h6>
                        </div>

                        <div class="mdl-card__actions mdl-card--border">
                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                CURSO: {{$actividad['data_curso']['0']['numero']}} {{$actividad['data_curso']['0']['letra']}}
                            </a>
                            <div class="mdl-layout-spacer"></div>
                            <i class="material-icons">event</i>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@stop

@section('scripts')
<script>
    (function() {
        'use strict';
        let dialogButton = document.querySelector('#show-dialog');
        let dialog = document.querySelector('#dialog');
        let cancelar = dialog.querySelector('#cancelar');
        let guardar= dialog.querySelector('#ingresar_actividad_submit');


        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        cancelar.addEventListener('click', function() {
            dialog.close();
        });
        guardar.addEventListener('click',function () {
            let titulo = document.querySelector('#activity_title').value;
            let fecha = document.querySelector('#activity_date').value;
            let inicio = document.querySelector('#activity_start').value;
            let fin = document.querySelector('#activity_end').value;
            let curso = document.querySelector('#activity_curso').value;

            if(titulo === '' || fecha === '' || inicio === '' || fin === '' || curso === '' ){
                mostrarNotificacion('Todos los campos son obligatorios','error');
                dialog.showModal();
            }else{
                let infoActivity = new FormData($('#ingresar_actividad')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('/postajax')}}",
                    type: 'POST',
                    data: infoActivity,
                    contentType: false,
                    processData: false,

                })
                    .done(function(data){
                        location.reload();
                        dialog.close();
                    })
                    .fail(function(jqXHR, textStatus, errorThrown){
                        if (jqXHR.status === 0) {
                            alert('Not connect: Verify Network.');
                        } else if (jqXHR.status == 404) {
                            alert('Requested page not found [404]');
                            console.log('{{url('/teacher/calendar/createActivity')}}')
                        } else if (jqXHR.status == 500) {
                            alert('Internal Server Error [500].');
                        } else if (textStatus === 'parsererror') {
                            alert('Requested JSON parse failed.');
                        } else if (textStatus === 'timeout') {
                            alert('Time out error.');
                        } else if (textStatus === 'abort') {
                            alert('Ajax request aborted.');
                        } else {
                            alert('Uncaught Error: ' + jqXHR.responseText);
                        }
                    });
            }
        });

        function mostrarNotificacion(mensaje, clase) {
            const notificacion = document.createElement('div');
            notificacion.classList.add(clase, 'notificacion', 'sombra');
            notificacion.textContent = mensaje;

            // formulario
            dialog.insertBefore(notificacion, document.querySelector('.entre .hasta'));

            // Ocultar y Mostrar la notificacion
            setTimeout(() => {
                notificacion.classList.add('visible');
                setTimeout(() => {
                    notificacion.classList.remove('visible');
                    setTimeout(() => {
                        notificacion.remove();
                    }, 500)
                }, 3000);
            }, 100);

        }
    }());
    $(document).ready(function () {
        'use strict';
        $('.delete_at').click(function(){
            let id_delete= $(this).attr('data-id');
            console.log(id_delete);
            showDialog({
                id: 'dialog-id',
                title: 'ELIMINAR ACTIVIDAD',
                text: '¿Realmente deseas eliminar esta actividad?',
                negative: {
                    id: 'cancel-button',
                    title: 'Cancel',
                    onClick: function() { }
                },
                positive: {
                    id: 'ok-button',
                    title: 'OK',
                    onClick: function() {
                        location.href = "calendar/delete/"+id_delete;
                    }
                },
                cancelable: true,
                contentStyle: {'max-width': '45%'},
                onLoaded: function() { },
                onHidden: function() { }
            });
        });

    })
</script>
<script>

</script>

@endsection