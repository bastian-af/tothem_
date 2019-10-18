@extends('layouts.principal')

@section('title')
    Agregar Notas
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
        .evaluacion{
            width: 100%;
        }
        .evaluacion_ext{
            width: 50%;
        }

    </style>
    <style>
        /* mdl - popup */


        .fab {
            z-index: 5;
            cursor: pointer;
            border-radius: 50%;
            position: fixed;
            right: 3%;
            bottom: 10%;
            color: #fff;
            background: #00838f;
            height: 62px;
            width: 62px;
            box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.35);
            -webkit-transition: all 600ms cubic-bezier(0.200, 0.965, 0.000, 1.005);
            transition: all 600ms cubic-bezier(0.200, 0.965, 0.000, 1.005);
        }

        .fab.active {
            cursor: default;
            background: #FFF;
            border-radius: .125em;
            width: 60%;
            height: 80%;
            box-shadow: 0 15px 25px 0 rgba(0, 0, 0, 0.35);
            right: calc(50% - 30%);
            top: 15%;
        }

        .fab-icon {
            position: absolute;
            display: block;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-12px, -12px);
            -ms-transform: translate(-12px, -12px);
            transform: translate(-12px, -12px);
            line-height: 24px;
            width: 24px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .active .fab-icon {
            display: none;
        }

        .active .protect {
            background: none;
        }

        .cntt-wrapper {
            display: none;
        }

        .active .cntt-wrapper {
            display: block;
        }

        #fab-hdr {
            position: absolute;
            width: 100%;
            background: #00838f;
        }

        #fab-hdr h3 {
            padding-left: 30px;
        }

        .cntt {
            padding: 15% 5% 10% 15%;
            color: #757575;
        }
        .btn-wrapper {
            position: absolute;
            right: 10%;
            bottom: 10%;
            margin-bottom: 0;
            padding: 10px 10px;
        }

    </style>
    <!--modalnew-->

    <style>
        a {text-decoration: none; color:#666;}


        /* modal */
        #modal {position: fixed; left:0; top:0; width: 100%; height: 100%; display: none; }
        #modal {z-index: 999;}
        #modal .modal-bg {background: rgba(0,0,0,0.7); display:flex; align-items: center; justify-content: center; height: 100%; }
        #modal .modal-bg .modal-cont {position:relative; background: #fff; padding: 20px; max-width: 650px; display: inline-block;}
        #modal .modal-bg .modal-cont h2 {font-size: 30px; margin:0;}
        #modal .modal-bg .modal-cont p {font-size: 18px; }
        #modal .modal-bg .modal-cont .close {position: absolute; top: 0; right:0; margin:20px; padding: 10px; background: #000; border-radius: 50%; }
        #modal .modal-bg .modal-cont .close svg {width: 24px; fill: #fff; vertical-align: top;}
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
    <!--modals-->

    <!--eliminar-->
    <div id="modal">
        <div class="modal-bg">
            <div class="" id="ocultar_form">
                <div class="modal-cont">

                    <div class="mdl-dialog__content">
                        <br>
                        <h4 class="mdl-dialog__title" >Eliminar evaluación</h4>
                        <br><br><br>
                        <form id="eliminar_evaluacion">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                                    <input type="text" value="" class="mdl-textfield__input" id="id_evaluacion_select" name="id_delete_evaluacion" readonly>
                                    <input type="hidden" value="" name="sample5" id="sample5">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    <label for="id_evaluacion_select" class="mdl-textfield__label">Evaluación</label>
                                    <ul for="id_evaluacion_select" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @if(isset($lista_evaluaciones))
                                            @foreach($lista_evaluaciones as $evalu)
                                                @foreach($evalu as $ev)
                                                    <li class="mdl-menu__item" data-val="{{$ev['id']}}">{{$ev['name']}}&nbsp;/{{$ev['asignatura']}}</li>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <li class="mdl-menu__item" data-val="">No hay valores</li>
                                        @endif

                                    </ul>
                                    <br>
                                    <span ><p style="color: red; font-size: 14px"><i class="material-icons" style=" font-size: 14px">report_problem</i> Advertencia: El eliminar una evaluación implica eliminar el registro de todas las notas asociadas<p></span>
                                </div>
                            </div>
                            <br>
                            <div class="mdl-dialog__actions">
                                <button disabled id="button_delete_submit" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Guardar</button>
                            </div>
                        </form>
                    </div>

                    <a href="#" class="close close1">
                        <svg viewBox="0 0 24 24">
                            <path d="M14.1,12L22,4.1c0.6-0.6,0.6-1.5,0-2.1c-0.6-0.6-1.5-0.6-2.1,0L12,9.9L4.1,2C3.5,1.4,2.5,1.4,2,2C1.4,2.5,1.4,3.5,2,4.1
	L9.9,12L2,19.9c-0.6,0.6-0.6,1.5,0,2.1c0.3,0.3,0.7,0.4,1.1,0.4s0.8-0.1,1.1-0.4l7.9-7.9l7.9,7.9c0.3,0.3,0.7,0.4,1.1,0.4
	s0.8-0.1,1.1-0.4c0.6-0.6,0.6-1.5,0-2.1L14.1,12z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- agregar-->
    <div class="mdl-grid">
        <div class="fab">
            <i class="material-icons fab-icon">add</i>

            <form class='cntt-wrapper' id="form_evaluacion">
                @csrf
                <div id="fab-hdr">
                    <h3>Añadir evaluación</h3>
                </div>
                <div class="cntt">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="titulo" name="titulo" />
                            <label class="mdl-textfield__label" for="titulo">Titulo evaluación</label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                                <input type="text" value="" class="mdl-textfield__input" id="tipo_evaluacion" readonly>
                                <input type="hidden" value="" name="tipo">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="tipo_evaluacion" class="mdl-textfield__label">Tipo evaluación</label>
                                <ul for="tipo_evaluacion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="0">Actividad</li>
                                    <li class="mdl-menu__item" data-val="1">Control</li>
                                    <li class="mdl-menu__item" data-val="2">Prueba</li>
                                </ul>
                            </div>
                        </div>

                        <!-- horarios -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="time" name="evaluacionStart" id="evaluacion_start" />
                                <label class="mdl-textfield__label" for="evaluacion_start">Hora inicio</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="time" name="evaluacionEnd" id="evaluacion_end" />
                                <label class="mdl-textfield__label" for="evaluacion_end">Hora término</label>
                            </div>


                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                                <input type="text" value="" class="mdl-textfield__input" id="asignatura_id" readonly>
                                <input type="hidden" value="" name="asignatura">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="asignatura_id" class="mdl-textfield__label">Asignatura</label>
                                <ul for="asignatura_id" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    @foreach($asignaturas as $asignatura)
                                        <li class="mdl-menu__item" data-val="{{$asignatura['id']}}">{{$asignatura['name']}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="id_curso" id="id_curso" value="{{$curso->id}}">

                        <div class="btn-wrapper">
                            <button class="mdl-button mdl-js-button" id="cancel">Cancel</button>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="submit_evaluacion">Añadir</button>
                        </div>

                </div>
            </form>

        </div>
    </div>

    <!--contenido-->
    <div class="page-content">
        <div class=" android-more-section">
            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" style="text-align: center">
                    <button type="button"  onclick="history.back()" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="margin-rigth: 8%; ">
                        <span> <i class="material-icons"> keyboard_arrow_left </i>Regresar</span>
                    </button>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" style="text-align: center">
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" style="text-align: center; margin-left: 8%;">
                    <button type="button"  id="btn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="  ">
                        <span><i class="material-icons">delete_forever</i>Eliminar Evaluaciones</span>
                    </button>
                </div>

            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" >
                </div>
                <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" style="text-align: center">
                    <h1 class="article-h1">REGISTRAR CALIFICACIONES</h1>
                </div>

                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" >
                </div>
            </div>

            <div class="mdl-grid">

            </div>

            <!--Tabla-->
            <form action="{{ route('teacher.marks.submit', $curso->id)}}" method="POST">
                @csrf
                <div class="mdl-grid">

                    <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone"  style=" padding-top: 5%">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select text_input evaluacion_ext">
                            <input type="text" value="" class="mdl-textfield__input evaluacion" id="evaluacion" readonly>
                            <input type="hidden" value="" name="evaluacion_id[]">
                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            <label for="evaluacion" class="mdl-textfield__label evaluacion">Evaluacion</label>
                            <ul for="evaluacion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu evaluacion">
                                @if(!isset($evaluaciones))
                                    <li class="mdl-menu__item" data-val=""></li>
                                @else
                                    @foreach($evaluaciones as $evaluacion)
                                        @foreach($evaluacion as $eval)
                                            <li class="mdl-menu__item" data-val="{{$eval['id']}},{{$eval['curso_asignatura']}}">{{$eval['name']}}&nbsp;/{{$eval['asignatura']}}</li>
                                        @endforeach
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone" style="padding-left: 10%; padding-top: 5%" >
                   <span class="mdl-chip mdl-chip--deletable" >
                        <button type="button" class="mdl-chip__action"><i class="material-icons">today</i></button>
                        <span class="mdl-chip__text">&nbsp;{{$date}}&nbsp;</span>
                   </span>
                        <span class="mdl-chip__text"> &nbsp;</span>
                        <span class="mdl-chip mdl-chip--deletable">
                        <button type="button" class="mdl-chip__action"><i class="material-icons">class</i></button>
                        <span class="mdl-chip__text">&nbsp; Curso: {{$curso['numero'].'°'.$curso['letra']}}&nbsp;</span>
                   </span>
                    </div>


                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                        <table id="tabla-data" class="mdl-data-table" style="width:100% !important">
                            <thead>
                            <tr>
                                <th style="text-align: center"> Rut</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Apellido</th>
                                <th style="text-align: center">Nota</th>
                                <th style="text-align: center">Perfil estudiante</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($alumnos as $alumno)
                                <tr>
                                    <td > {{$alumno->rut}}</td>
                                    <td >{{$alumno->name}}</td>
                                    <td >{{$alumno->surname}}</td>

                                    <td class="td_notas">
                                        <input name="notas[Notas{{$alumno->id}}][{{$alumno->id}}]" id="slider{{$alumno->id}}" class = "mdl-slider mdl-js-slider" type = "range" min = "10" max = "70" value = "40" tabindex = "0">
                                        <div id ="shownota{{$alumno->id}}" >40</div>
                                    </td>

                                    <td class="controls mdl-data-table__cell--non-numeric  td_pefiles" >
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

                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">

                        <a style="color: inherit; text-decoration: none;">
                            <button onclick="history.back()" type="button" class="mdl-button mdl-js-button mdl-button--accent" style=" margin-left: 80%; ">
                                Cancelar
                            </button>
                        </a>

                        <button disabled id="botones_form" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit">
                            Guardar
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@stop

@section('scripts')

    <script>
        $(document).ready(function() {

            $('#evaluacion').change(function () {
                if($(this).val()== ''){
                    $('#botones_form').disabled;
                    showDialog({
                        id: 'dialog-id',
                        title: 'Alerta',
                        text: 'Debe ingresar una evaluación para poder registrar las notas.',
                        negative: {
                            id: 'cancel-button',
                            title: 'Cancel',
                            onClick: function() { }
                        },

                        cancelable: true,
                        contentStyle: {'max-width': '20%'},
                        onLoaded: function() { },
                        onHidden: function() { }
                    });
                }else {
                    $('#botones_form').removeAttr('disabled');
                }
            });

            var overlay = $("#overlay"),
                fab = $(".fab"),
                cancel = $("#cancel"),
                submit = $("#submit_evaluacion");

            //fab click
            fab.on('click', openFAB);
            overlay.on('click', closeFAB);
            cancel.on('click', closeFAB);
            submit.on('click',function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{url('/teacher/evaluation/add')}}',
                    type: 'POST',
                    data: new FormData($('#form_evaluacion')[0]),
                    contentType: false,
                    processData: false,

                })
                    .done(function(data){
                        window.location.reload();
                    })
                    .fail(function(jqXHR){
                        if(jqXHR.status == 404){
                            alert('no se encontro 404');
                        }else if(jqXHR.status == 500){
                            alert('internal server error');
                        }else if(jqXHR.status == 'parsererror'){
                            alert('parser error json');
                        }
                    });
            });
            $('#id_evaluacion_select').on('change',function () {
                if($(this).val =!''){
                    $('#button_delete_submit').removeAttr('disabled');

                }
            });
            $('#button_delete_submit').on('click',function () {
                let id_delete_evaluation = $('#sample5').val();
                alert(id_delete_evaluation);
                axios({
                    method:'get',
                    url:'delete/evaluation/'+id_delete_evaluation,
                }).then(function (response) {
                    window.location.reload();
                })
            });
            function openFAB(event) {
                if (event) event.preventDefault();
                fab.addClass('active');
                overlay.addClass('dark-overlay');

            }

            function closeFAB(event) {
                if (event) {
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }

                fab.removeClass('active');
                overlay.removeClass('dark-overlay');

            }
        })

    </script>
    <script>
        $("#btn").click(function(){
            $("#modal").css("display","block");
        });

        $(".close").click(function(){
            $("#modal").css("display","none");
        });
    </script>



@endsection