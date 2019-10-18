@extends('layouts.principal')

@section('title')
    Mis anotaciones
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

        input:checked ~ .menu label .label {
            transform: rotateX(180deg);
        }
        .demo-list-three{
            width: 100%;
            height: 25%;
        }
        .list-anotations {
            background-color: #cccccc;
            height: 100%;

        }

        .list-anotations-time{
            background-color: #222222;
            height: 50%;
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
        #boton_eliminar{
            float: right;!important;
            color: white;!important;
            margin-left: 65%;!important;
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
    @component('components.studentNavButton')
    @endcomponent
@stop

@section('pictureMenu')
    @component('components.studentPictureMenu')
    @endcomponent
@stop
@section('drawer')
    @component('components.studentDrawer')
    @endcomponent
@stop
@section('content')
    <!-- cursos -->
    <div class="page-content">
        <div class=" android-more-section">

            <div class="mdl-grid">
                <div class="wrapper">
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                        @if(isset($alumno))
                            <img class="profile-img" src="{{URL::asset('profile_pic/'.$alumno->url_imagen)}}" alt="img">
                            <div class="article-h2">{{$alumno->name }} {{$alumno->second_name}} {{$alumno->surname}} {{$alumno->second_surname}}</div>
                            @if(isset($curso))
                                <span class="nav-text"> <span class="nav-text">{{$curso->numero}} ° {{$curso->letra}} </span></span><br>
                                <span class="mdl-chip mdl-chip--contact"><span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">E</span> <span class="mdl-chip__text">Estudiante</span></span>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="mdl-grid"></div>
            <div class="mdl-grid">
                <h3 class="article-h2">Lista de anotaciones:</h3>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                </div>

            </div>

            <div class="mdl-grid" >
                @if(!isset($anotaciones))
                    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" style="text-align: center"><strong> El alumno no registra anotaciones a su nombre</strong></div>

                @else
                    @foreach($anotaciones as $anotacion)
                        <ul class="demo-list-three mdl-list">
                            <li class="mdl-list__item mdl-list__item--three-line list-anotations" >

                                <span class="mdl-list__item-primary-content">
                                    <img class="circular--landscape" style="border: solid 1px whitesmoke; margin: 2%;" src="{{URL::asset('profile_pic/'.$anotacion['profesor']['url_imagen'])}}"/>
                                    <span> <strong>PROFESOR</strong>:&nbsp;{{strtoupper($anotacion['profesor']['name'])}} {{strtoupper($anotacion['profesor']['surname'])}}</span>
                                </span>


                                @if($anotacion['tipo']==1)
                                    <span id="anotacionPositiva" class="mdl-list__item-secondary-content">
                                        <label class="mdl-tooltip mdl-tooltip--large" for="anotacionPositiva">
                                            Anotacion positiva
                                        </label>
                                        <i class="material-icons">sentiment_satisfied_alt</i>
                                    </span>
                                @elseif($anotacion['tipo']==2)
                                    <span id="anotacionNegativa" class="mdl-list__item-secondary-content">
                                        <label class="mdl-tooltip mdl-tooltip--large" for="anotacionNegativa">
                                            Anotacion negativa
                                        </label>
                                        <i class="material-icons">sentiment_very_dissatisfied</i>
                                    </span>
                                @elseif($anotacion['tipo']==0)
                                    <span id="otra" class="mdl-list__item-secondary-content">
                                        <label class="mdl-tooltip mdl-tooltip--large" for="otra">
                                            Otros
                                        </label>
                                        <i class="material-icons">adjust</i>
                                    </span>
                                @endif

                            </li>
                            <li class="mdl-list__item-text-body list-anotations">
                                <br><br>
                                <p style="padding-left: 2%;" class="text-aling:center">{{$anotacion['descripcion']}}</p>
                                <br><br>
                            </li>

                            <li class="mdl-list__item mdl-list__item--three-line list-anotations-time">
                            <span class="mdl-chip " style="margin-left: 2%">
                                <button type="button" class="mdl-chip__action"><i class="material-icons">today</i></button>
                                <span class="mdl-chip__text">&nbsp;Fecha: {{$anotacion['fecha']['day']}}/{{$anotacion['fecha']['month']}}/{{$anotacion['fecha']['year']}} &nbsp;&nbsp;</span>
                            </span>
                                <span class="mdl-chip " style="margin-left: 2%">
                                <button type="button" class="mdl-chip__action"><i class="material-icons">schedule</i></button>
                                <span class="mdl-chip__text">&nbsp;Hora: {{$anotacion['fecha']['hour']}}:{{$anotacion['fecha']['minute']}}&nbsp;&nbsp;</span>
                            </span>
                                <div id="boton_eliminar">
                                    <button id="delete_at{{$anotacion['id']}}" data-id="{{$anotacion['id']}}" type="button" class="mdl-button mdl-button--icon delete_at ">
                                        <div class="mdl-tooltip mdl-tooltip--large" for="delete_at{{$anotacion['id']}}">
                                            Eliminar anotación
                                        </div>
                                        <i class="material-icons">clear</i>
                                    </button>
                                </div>

                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <br>
            <br>
            <div class="mdl-grid">
                <button type="button"  onclick="history.back()" class="mdl-button mdl-js-button mdl-js-ripple-effect" style=" ">
                    <span> <i class="material-icons"> keyboard_arrow_left </i>Regresar</span>
                </button>
            </div>
            <br>
            <br>
        </div>
    </div>
@stop

@section('scripts')
@endsection