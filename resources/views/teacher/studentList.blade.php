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


    <!-- cursos -->
    <div class="page-content">
        <div class=" android-more-section">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone" >
                    <p class="article-h1">Lista de estudiantes</p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                </div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone" >
                    <span class="mdl-chip__text"> &nbsp;</span>
                    <span class="mdl-chip mdl-chip--deletable">
                        <button type="button" class="mdl-chip__action"><i class="material-icons">face</i></button>
                        <span class="mdl-chip__text">&nbsp; Curso: {{$curso['numero'].' '.$curso['letra']}} &nbsp;&nbsp;</span>
                   </span>
                    <span class="mdl-chip__text"> &nbsp;</span>
                </div>

            </div>

            <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" >
                        <table id="tabla-data" class="mdl-data-table" style="width:100% !important">
                            <thead>
                            <tr>
                                <th >Rut</th>
                                <th >Nombre</th>
                                <th >Apellido</th>
                                <th> e-mail </th>
                                <th> Perfil estudiante</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($alumnos as $student)
                                <tr>
                                    <td> {{$student->rut}}</td>
                                    <td> {{$student->name.' '.$student->second_name}}</td>
                                    <td> {{$student->surname}}</td>
                                    <td> {{$student->email}}</td>
                                    <td>
                                        <a href="{{route('teacher.studentProfile', $student->id)}}">
                                            <button  type="button"class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--accent" style="margin-left: 45%">
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

                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"  >
                    </div>
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"  >
                    </div>
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"  >
                    </div>
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone"  >

                        <a style="color: inherit; text-decoration: none;" onclick="history.back()">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" style=" margin-left: 2%; ">
                                <span> <i class="material-icons"> keyboard_arrow_left </i> Regresar </span>
                            </button>
                        </a>

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
                    {
                        targets: [ 0, 1, 2, 3, 4],
                        className: 'mdl-data-table__cell--non-numeric'
                    }
                ],
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

