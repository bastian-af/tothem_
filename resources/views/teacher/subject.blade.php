
@extends('layouts.principal')


@section('title')
    Aula profesor
@stop

@section('styles')
    <style>
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
            /*margin-left: 35%;*/
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

    <!-- submit upload -->
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
            width: 450px;
            height: 65%;
            box-shadow: 0 15px 25px 0 rgba(0, 0, 0, 0.35);
            top: 15%;
            right: calc(50% - 250px);
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
            padding: 25% 10% 45% 18%;
            color: #757575;
        }

     .btn-wrapper {
            position: absolute;
            right: 0;
            bottom: 0;
            margin-bottom: 0;
            padding: 10px 16px;
        }

    </style>

    <style>
        .demo-card-wide.mdl-card {
            width: 100%;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 176px;
            background: url({{asset('images/welcome_card.jpg')}}) center / cover;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
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

    <!-- files card -->
    <style>

    .tpd-tooltip .tpd-content-relative .tpd-content-relative-padder .tpd-content .table-tooltip tr {
        border: none;
        height: 42px;
    }
    .tpd-tooltip .tpd-content-relative .tpd-content-relative-padder .tpd-content .table-tooltip tr:first-child td {
        border-top: none;
    }
    .tpd-tooltip .tpd-content-relative .tpd-content-relative-padder .tpd-content .table-tooltip tr:last-child td {
        border-bottom: none;
    }
    .tpd-tooltip .tpd-content-relative .tpd-content-relative-padder .tpd-content .table-tooltip tr td {
        padding-bottom: 12px;
        height: 42px;
    }


    .mission {
        max-width: 1080px;
    }
    @media (max-width: 1137px) {
        .mission {
            max-width: 814px;
        }
    }
    @media (max-width: 829px) {
        .mission {
            max-width: 549px;
        }
    }
    @media (max-width: 564px) {
        .mission {
            max-width: 282px;
        }
    }
    .mission .mdl-card {
        width: 250px;
        overflow: visible;
    }
    .mission .mdl-card.target .mdl-card-media {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    .mission .mdl-card.action, .mission .mdl-card.status {
        min-height: 48px;
    }
    .mission .mdl-card.action .mdl-card-media, .mission .mdl-card.status .mdl-card-media {
        height: 48px;
    }
    .mission .mdl-card.action .mdl-progress, .mission .mdl-card.status .mdl-progress {
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 250px;
    }
    .mission .mdl-card ul.mdl-menu {
        padding: 0px;
    }
    .mission .mdl-card .mdl-card-media {
        width: 250px;
        min-height: 32px;
        padding: 8px;
        line-height: 16px;
    }
    .mission .mdl-card .mdl-card-media.score-card {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
    .mission .mdl-card .mdl-card-media .minilogo {
        float: left;
        width: 32px;
        height: 32px;
        margin-right: 8px;
    }
    .mission .mdl-card .mdl-card-media .minilogo svg * {
        fill: #757575;
        stroke: #757575;
    }


    .mission .actions button,
    .mission .stats button {
        width: 250px;
    }
    .mission .actions a.btn,
    .mission .stats a.btn {
        width: 250px;
        margin: 0 8px;
    }
    .mission .actions .confirm,
    .mission .stats .confirm {
        padding: 13px 10px;
        width: 266px;
    }
    .mission .actions .confirm input,
    .mission .stats .confirm input {
        height: 36px;
    }
    @media (max-width: 1799px) {
        .mission .actions .confirm,
        .mission .stats .confirm {
            /* background-color: red; */
        }
        .mission .actions .confirm form,
        .mission .stats .confirm form {
            display: block;
            width: 266px;
            padding-top: 125px;
            position: relative;
            bottom: 0px;
        }
        .mission .actions .confirm form input,
        .mission .stats .confirm form input {
            float: none;
        }
        .mission .actions .confirm form button,
        .mission .stats .confirm form button {
            margin-top: 20px;
            float: none;
        }
    }
    @media (max-width: 1137px) {
        .mission .actions .confirm,
        .mission .stats .confirm {
            /* background-color: blue; */
            width: 532px;
        }
        .mission .actions .confirm form,
        .mission .stats .confirm form {
            display: inline;
            padding: 0px;
        }
        .mission .actions .confirm form input,
        .mission .stats .confirm form input {
            float: left;
        }
        .mission .actions .confirm form button,
        .mission .stats .confirm form button {
            float: right;
            margin-top: 0px;
        }
    }
    @media (max-width: 829px) {
        .mission .actions .confirm,
        .mission .stats .confirm {
            /* background-color: green; */
            width: 266px;
        }
        .mission .actions .confirm form,
        .mission .stats .confirm form {
            display: block;
            width: 266px;
            padding-top: 125px;
            position: relative;
            bottom: 0px;
        }
        .mission .actions .confirm form input,
        .mission .stats .confirm form input {
            float: none;
        }
        .mission .actions .confirm form button,
        .mission .stats .confirm form button {
            margin-top: 20px;
            float: none;
        }
    }
    .mission .actions .confirm input,
    .mission .stats .confirm input {
        width: 250px;
    }
    .mission .actions .confirm label,
    .mission .stats .confirm label {
        width: 250px;
    }
    .mission .actions .confirm label.mdl-textfield__label:after,
    .mission .stats .confirm label.mdl-textfield__label:after {
        width: 250px;
        bottom: 16px;
    }
    .mission .bounties {
        display: block;
    }
    @media (min-width: 563px) {
        .mission .bounties {
            display: flex;
        }
    }
    @media (min-width: 814px) {
        .mission .bounties {
            display: flex;
        }
    }
    .mission .bounties .mdl-card.bounty {
        min-height: 0px;
        align-self: flex-start;
    }

</style>

    <!--file input-->
    <style>
        .file_input_div {
            margin: auto;
            width: 300px;
            height: 40px;
        }

        .file_input {
            float: left;
        }

        #file_input_text_div {
            width: 200px;
            margin-top: -8px;
            margin-left: 5px;
        }

        .none {
            display: none;
        }
        #boton_eliminar{
            float: right;!important;
            color: white;!important;
        }
    </style>

    <!--modalnew-->

    <style>
        a {text-decoration: none; color:#666;}


        /* modal */
        .newmodal {position: fixed; left:0; top:0; width: 100%; height: 100%; display: none; }
        .newmodal {z-index: 999;}
         .modal-bg {background: rgba(0,0,0,0.7); display:flex; align-items: center; justify-content: center; height: 100%; }
         .modal-bg .modal-cont {position:relative; background: #fff; padding: 20px; max-width: 650px; display: inline-block;}
        .modal-bg .modal-cont h2 {font-size: 30px; margin:0;}
       .modal-bg .modal-cont p {font-size: 18px; }
        .modal-bg .modal-cont .close {position: absolute; top: 0; right:0; margin:20px; padding: 10px; background: #000; border-radius: 50%; }
        .modal-bg .modal-cont .close svg {width: 24px; fill: #fff; vertical-align: top;}
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
    <div id="modal" class="newmodal">
        <div class="modal-bg">
            <div class="" id="ocultar_form">
                <div class="modal-cont">
                    <div id="upfileloader" style="padding:20% 15% 20% 15%;">

                        <div  class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                            <div class="mdl-progress mdl-js-progress mdl-progress__indeterminate"><br><p style="text-align: center"><strong>Subiendo...</strong> </p></div>
                        </div>

                    </div>

                    <div class="mdl-dialog__content" id="formupfile">
                        <br>
                        <h4 class="mdl-dialog__title" >Subir material</h4>
                        <br><br><br>
                        <p style="text-aling: center;">Selecciona un archivo</p>
                        <div class="file_input_div">
                            <div class="file_input">
                                <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
                                    <i class="material-icons">file_upload</i>
                                    <input id="file_input_file" class="none" type="file" />
                                </label>
                            </div>
                            <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
                                <input class="file_input_text mdl-textfield__input" type="text" disabled readonly id="file_input_text" />
                                <label class="mdl-textfield__label" for="file_input_text"></label>
                            </div>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                                <input type="text" value="" class="mdl-textfield__input" id="tipo_archivo" readonly>
                                <input type="hidden" value="" name="sample5">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="tipo_archivo" class="mdl-textfield__label">Tipo archivo</label>
                                <ul for="tipo_archivo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="PDF">PDF</li>
                                    <li class="mdl-menu__item" data-val="PPT">PPT</li>
                                    <li class="mdl-menu__item" data-val="XLSX">XLSX</li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="mdl-dialog__actions">
                            <button type="button" onclick="formSubirArchivo();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Guardar</button>

                        </div>
                    </div>


                    <a href="#" id="closeupfile" class="close close1">
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

    <div class="mdl-grid">
        <div class="fab">
            <i class="material-icons fab-icon">add</i>

            <form class='cntt-wrapper' id="form_unidad">
                <div id="fab-hdr">
                    <h3>Añadir unidad</h3>
                </div>

                <div class="cntt">
                    <div id="loadingunit">
                        <!--loading-->
                        <div  class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" >
                            <div class="mdl-progress mdl-js-progress mdl-progress__indeterminate"><br><p style="text-align: center; color: black;"><strong>Ingresando unidad...</strong> </p></div>
                            <br><br>
                        </div>

                    </div>
                    <div  id="unitform">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="titulo" name="titulo" />
                            <label class="mdl-textfield__label" for="titulo">Titulo</label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="number" id="numero" name="numero" />
                            <label class="mdl-textfield__label" for="numero">Nro de Unidad</label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" maxrows="3" id="descripcion" name="descripcion" ></textarea>
                            <label class="mdl-textfield__label" for="descripcion">Descripción</label>
                        </div>
                        <div class="btn-wrapper">
                            <button class="mdl-button mdl-js-button" id="cancel">Cancelar</button>
                            <button class="mdl-button mdl-js-button mdl-button--primary" id="submit" onclick="showUnitLoader();">Añadir</button>
                        </div>
                    </div>
                       <input type="hidden" name="id_asignatura" id="id_asignatura" value="{{$asignatura->id}}">
                </div>

            </form>


        </div>
    </div>


    <!-- asignatura -->
    <div class="page-content">

        <div class=" android-more-section">
            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" style="text-align: center">
                    <button type="button"  onclick="history.back()" class="mdl-button mdl-js-button mdl-js-ripple-effect" style=" ">
                        <span> <i class="material-icons"> keyboard_arrow_left </i>Regresar</span>
                    </button>
                </div>
                <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" style="text-align: center">
                </div>
                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" style="text-align: center">
                    <a href="{{route('teacher.subject.marks', $asignatura->id)}}" >
                    <button type="button"   class="mdl-button mdl-js-button mdl-js-ripple-effect" style="  ">
                        <span><i class="material-icons"> class </i> Ver Notas</span>
                    </button>
                    </a>
                </div>

            </div>
            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" style="text-align: center">
                    <h1 class="article-h1">Aula: {{$asignatura->name}}</h1>
                </div>

                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                </div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-card demo-card-wide-header">
                    <div class="mdl-card__title"style="background: url({{asset('subject_pic/'.$asignatura->url_imagen)}}) center / cover;">
                    </div>
                    <div class="mdl-card__supporting-text">
                        {{$asignatura->descripcion}}
                    </div>
                    <div class="mdl-card__supporting-text">

                        <span class="mdl-chip mdl-chip--deletable" style="margin-left: 2%">
                            <button type="button" class="mdl-chip__action"><i class="material-icons">face</i></button>
                            <span class="mdl-chip__text">&nbsp;&nbsp;Curso: <strong>{{$curso->numero}}° {{$curso->letra}}</strong> &nbsp; &nbsp;</span>
                        </span>
                        <span class="mdl-chip mdl-chip--deletable" style="margin-left: 2%">
                            <button type="button" class="mdl-chip__action"><i class="material-icons">account_circle</i></button>
                            <span class="mdl-chip__text">&nbsp;&nbsp;Profesor: <strong>{{Auth::user()->name}} {{Auth::user()->surname}}</strong> &nbsp; &nbsp;</span>
                        </span>

                    </div>

                    <div class="mdl-card__menu">
                        <h3 class="mdl-card__title-text">
                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                <i class="material-icons">book</i>
                            </button>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">


                    <div class="mdl-grid">

                    </div>

                    @if(!isset($unidades))
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                            </div>
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title">
                                    </div>
                                    <div class="mdl-card__supporting-text">
                                        <h2 class="mdl-card__title-text">No contiene unidades.</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" ></div>
                    @else
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                        </div>
                        <div class="mdl-tabs__tab-bar">
                        @foreach($unidades as $unidad)
                            <a href="#u{{$unidad['id']}}-panel" class="mdl-tabs__tab">Unidad {{$unidad['numero']}}</a>
                        @endforeach
                        </div>
                         @foreach($unidades as $unidad)
                        <div class="mdl-tabs__panel" id="u{{$unidad['id']}}-panel">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" >
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                        <div class="mdl-card__title">
                                            <h2 class="mdl-card__title-text">{{$unidad['name']}}</h2>
                                            <div class="mdl-grid buttons_accion_admin" style="margin-right:5%; margin-bottom: 25%;">

                                                <button id="deleteUnidad{{$unidad['id']}}"  data-value="{{$unidad['id']}}" class="mdl-button mdl-js-button mdl-button--icon delete_unidad">
                                                    <div class="mdl-tooltip mdl-tooltip--large" for="deleteUnidad{{$unidad['id']}}">
                                                        Eliminar Unidad {{$unidad['numero']}}
                                                    </div>
                                                    <i class="material-icons">clear</i>
                                                </button>

                                            </div>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            {{$unidad['descripcion']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone" ></div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                                    <span> <h2 class="article-h2"><i class="material-icons" >archive</i> Material de aula</h2>  </span>
                                </div>
                            </div>

                            <div class="mdl-grid" style="background-color: dimgrey;">

                                <div class="mission mdl-grid">
                                    @if(!isset($unidad['content']))
                                        <div class="stats">
                                            <div class="mdl-card status mdl-cell mdl-cell--4-col mdl-shadow--2dp demo-card-wide">
                                                <div class="mdl-card-media mdl-card__supporting-text mdl-color-text--grey-600">
                                                    <div class="minilogo">
                                                        <i class="material-icons" style="font-size: 32px !important">file_copy</i>
                                                    </div>
                                                    <div>
                                                        <strong>No hay material asignado</strong>
                                                        <br>
                                                        <span class="mdl-color-text--grey-600">---</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach($unidad['content'] as $contenido)
                                            <a href="{{route('download.file',$contenido['ruta_archivo'])}}">
                                                <div class="stats" id="stats_material">
                                                    <div class="mdl-card status mdl-cell mdl-cell--4-col mdl-shadow--2dp demo-card-wide">
                                                        <div class="mdl-card-media mdl-card__supporting-text mdl-color-text--grey-600">
                                                            <div class="minilogo">
                                                                <i class="material-icons" style="font-size: 32px !important">file_copy</i>
                                                            </div>
                                                            <strong>{{substr($contenido['nombre'],0,20)}}</strong>
                                                            <span class="mdl-color-text--grey-600">{{$contenido['tipo']}}</span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div id="boton_eliminar">
                                                <button id="delete_at{{$contenido['id']}}" data-id="{{$contenido['id']}}" type="button" class="mdl-button mdl-button--icon delete_at ">
                                                    <div class="mdl-tooltip mdl-tooltip--large" for="delete_at{{$contenido['id']}}">
                                                        Eliminar archivo
                                                    </div>
                                                    <i class="material-icons">clear</i>
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" id="unidad_id">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone" >
                                </div>
                                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" >
                                    <button onclick="mostrarDialogFile({{$unidad['id']}})" type="button" class="btn mdl-button" style="margin-left: 15%"> <i class="material-icons" style="font-size: 24px; ">add_circle</i> Material</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"></div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"></div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"></div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"></div>
            </div>

        </div>

        </div>
@stop

@section('scripts')
<script>
    $(function () {
        $('.mdl-tabs__tab-bar a:first').addClass('is-active');
        $('.mdl-tabs__panel:first').addClass('is-active');
        $('.mdl-tabs__tab-bar').on('click',function () {
            $('.mdl-tabs__tab a:first').removeClass('is-active');
            var enlace=$(this).attr('href');
            $(enlace).fadeIn(1000);
        })
    });

    $('.delete_at').click(function(){
        let id_delete= $(this).attr('data-id');
        console.log(id_delete);
        showDialog({
            id: 'dialog-id',
            title: 'ELIMINAR ARCHIVO',
            text: '¿Realmente deseas eliminar esta ARCHIVO?',
            negative: {
                id: 'cancel-button',
                title: 'Cancel',
                onClick: function() { }
            },
            positive: {
                id: 'ok-button',
                title: 'OK',
                onClick: function() {
                    axios({
                        method:'get',
                        url:'delete/material/'+id_delete,
                    }).then(function (response) {
                        window.location.reload();
                    })
                },
                cancelable: true,
                contentStyle: {'max-width': '45%'},
                onLoaded: function() {

                }
            },
            onHidden: function() {

            }
        });
    });
    $('.delete_unidad').click(function () {
        let id_delete_unidad= $(this).attr('data-value');
        console.log(id_delete_unidad);
        showDialog({
            id: 'dialog-delete-unidad',
            title: 'ELIMINAR ',
            text: '¿Realmente deseas eliminar esta Unidad?',
            negative: {
                id: 'cancel-button',
                title: 'Cancel',
                onClick: function() { }
            },
            positive: {
                id: 'ok-button',
                title: 'OK',
                onClick: function() {
                    axios({
                        method:'get',
                        url:'delete/unidad/'+id_delete_unidad,
                    }).then(function (response) {
                        window.location.reload();
                    })
                },
                cancelable: true,
                contentStyle: {'max-width': '45%'},
                onLoaded: function() {

                }
            },
            onHidden: function() {

            }
        });

    })
    var fileInputTextDiv = document.getElementById('file_input_text_div');
    var fileInput = document.getElementById('file_input_file');
    var fileInputText = document.getElementById('file_input_text');

    fileInput.addEventListener('change', changeInputText);
    fileInput.addEventListener('change', changeState);

    function changeInputText() {
        var str = fileInput.value;
        var i;
        if (str.lastIndexOf('\\')) {
            i = str.lastIndexOf('\\') + 1;
        } else if (str.lastIndexOf('/')) {
            i = str.lastIndexOf('/') + 1;
        }
        fileInputText.value = str.slice(i, str.length);
    }

    function changeState() {
        if (fileInputText.value.length != 0) {
            if (!fileInputTextDiv.classList.contains("is-focused")) {
                fileInputTextDiv.classList.add('is-focused');
            }
        } else {
            if (fileInputTextDiv.classList.contains("is-focused")) {
                fileInputTextDiv.classList.remove('is-focused');
            }
        }
    }

</script>
<script>//Variables
    var overlay = $("#overlay"),
        fab = $(".fab"),
        cancel = $("#cancel"),
        submit = $("#submit");

    //fab click
    fab.on('click', openFAB);
    overlay.on('click', closeFAB);
    cancel.on('click', closeFAB);

    submit.on('click',function(){
        $('#form_unidad').hide();
        $("#loadingtable").show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.ajax({
           url: '{{url('/teacher/subject/addUnit')}}',
           type: 'POST',
           data: new FormData($('#form_unidad')[0]),
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

    function formSubirArchivo(){
        $('#formupfile').hide();
        $('#upfileloader').show();
        let archivo = $('input[type=file]#file_input_file')[0].files[0];
        let unidad_id = $('#unidad_id').val();
        let tipo_archivo = $('#tipo_archivo').val();
        console.log(unidad_id);

        let formData = new FormData();
        formData.append('unidad_id',unidad_id);
        formData.append('tipo_archivo',tipo_archivo);
        formData.append('archivo',archivo);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{url('/teacher/subject/file')}}',
            type: 'POST',
            data: formData,
            mimeType: 'multipart/form-data',
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
            }
        })
            .done(function(data){
                $('#show_loader').hide();
                $('#ocultar_form').show();
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
    }


</script>

    <script>
        function mostrarDialogFile(unidad_id){
            $('#upfileloader').hide();
            $('#formupfile').show();
            $('#unidad_id').val(unidad_id);

        }


    </script>

    <script>
        $(document).ready( function (){
            $("#loadingunit").hide();
        });
        $(".btn").click(function(){
            $("#modal").css("display","block");
        });
        $("#closeupfile").click(function(){
            $("#modal").css("display","none");

        });

        function showUnitLoader(){
            $("#unitform").hide();
            $("#loadingunit").show();
        }
    </script>


@endsection