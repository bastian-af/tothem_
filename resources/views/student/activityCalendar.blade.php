@extends('layouts.principal')

@section('title')
    Calendario - Estudiante
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


    <!-- -->
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
            </div>

            <!-- LIST EVENTS-->
            <div class="mdl-grid" id="contenedor_actividades">
                @foreach($calendario as $actividad)
                    <div id="Actividades{{$actividad['id']}}" data-id="{{$actividad['id']}}" class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
                        <div class="demo-card-event mdl-card mdl-shadow--2dp" style="width: 99%; height :97%;">
                            <div class="mdl-card__title mdl-card--expand">
                                <h4>
                                    {{$actividad['titulo']}}
                                </h4>
                                <div class="mdl-layout-spacer"></div>
                            </div>
                            <div class="mdl-card__title mdl-card--expand">
                                <h6>
                                    <i class="material-icons">date_range</i> {{$actividad['fecha']}}<br>
                                    <i class="material-icons">access_time</i> {{$actividad['hora_inicio']}} - {{$actividad['hora_fin']}}
                                </h6>
                            </div>

                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                    PROFESOR: {{$actividad['data_teacher']['0']['name']}} {{$actividad['data_teacher']['0']['surname']}}
                                </a>
                                <div class="mdl-layout-spacer"></div>
                                <i class="material-icons">face</i>
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


@endsection