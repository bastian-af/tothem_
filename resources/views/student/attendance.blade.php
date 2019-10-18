@extends('layouts.principal')

@section('title')
    Asistencia
@stop

@section('styles')
    <style>
        .mdl-table{
            padding-right: 10%;!important;
            padding-left: 10%;!important;
        }
        .demo-card-wide.mdl-card {
            width: 800px;
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

    <div class="page-content">
        <div class="android-more-section">
            <h1 class="article-h1"> Registro de asistencia</h1>
        </div>
    </div>

    <div class="page-content">
        <div class=" android-more-section">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--6-col-phone"></div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--6-col-phone"></div>
                        <br>
                    </div>

                    <div class="demo-card-square mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand"></div>

                        <div class="mdl-card__actions mdl-card--border">
                                <span class="mdl-chip mdl-chip--deletable">
                                 <button type="button" class="mdl-chip__action"><i class="material-icons">face</i></button>
                                 <span class="mdl-chip__text">&nbsp;{{$user->name}} {{$user->surname}}&nbsp;</span>
                             </span>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone">
                    <table id="tabla-data" class="mdl-data-table" style="width:100% !important" >
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Fecha</th>
                        <th class="mdl-data-table__cell--non-numeric">Asistencia</th>
                        <th class="mdl-data-table__cell--non-numeric">Registrado por</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendances as $attendance)
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">{{$attendance['fecha']}}</td>
                        @if($attendance['estado'] == 1)
                            <td class="mdl-data-table__cell--non-numeric">Presente</td>
                            @elseif($attendance['estado']  == 2)
                            <td class="mdl-data-table__cell--non-numeric">Ausente</td>
                            @elseif($attendance['estado']  == 3)
                            <td class="mdl-data-table__cell--non-numeric">Atraso</td>
                            @elseif($attendance['estado'] == 4)
                            <td class="mdl-data-table__cell--non-numeric">Justificado</td>
                        @endif
                        <td class="mdl-data-table__cell--non-numeric">{{$attendance['nombre_profe']}}</td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tabla-data').DataTable( {
                columnDefs: [
                ],
                "paging":  false,
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
@stop