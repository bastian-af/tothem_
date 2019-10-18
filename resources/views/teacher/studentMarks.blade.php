@extends('layouts.principal')

@section('title')
    Notas Alumno
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
        .mdl-card__title > label >h2{
            width: 100%;
            color: black;
            padding: 2%;
        }
        .span_info > div >span{
            width: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        .span_info > div{
            width: 60%;
            border-style:solid;
            border-width: 6px;
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
    <!-- notas-->
    <div class="page-content">
        <div class=" android-more-section">
            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" style="text-align: center">
                    <button type="button"  onclick="history.back()" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="margin-rigth: 8%; ">
                        <span> <i class="material-icons"> keyboard_arrow_left </i>Regresar</span>
                    </button>
                </div>
                <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone" style="text-align: center">
                </div>


            </div>

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

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                    <span> <h2 class="article-h2"><i class="material-icons" >bookmark</i>Notas por asignaturas:</h2>  </span>
                </div>
            </div>

                @if(!isset($asignaturas))
                    <h2 class="mdl-card__title-text">El curso no tiene asignaturas asignadas</h2>
                @else
                <div class="mdl-grid" >
                    @foreach($asignaturas as $asignatura)
                        <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone " style="margin-left: 10%">
                                <div class="mdl-card mdl-shadow--4dp" style="width:110%;border-style:solid; border-width: 6px; border-color: {{$asignatura['color']}};">
                                    <input id="course{{$asignatura['id']}}" style="display:none;" type="checkbox" name="tabs"/>

                                    <div class="mdl-card__title mdl-card--border" >
                                        <label for="course{{$asignatura['id']}}" style="margin-right: 45%">
                                            <h2 class="mdl-card__title-text"> <i class="material-icons">assignment</i>{{$asignatura['name']}} </h2>
                                        </label>
                                    </div>

                                    <div class="tab-content darksupporting-text" >
                                        <div class="mdl-grid">
                                            @if (!isset($asignatura['evaluaciones']) || empty($asignatura['evaluaciones']))
                                                <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone" >
                                                    <span > <i class="material-icons">dns</i> Cantidad evaluaciones: 0</span><br>
                                                    <span > <i class="material-icons">chrome_reader_mode</i> Promedio alumno: - </span><br><br>
                                                </div>
                                            @else
                                                <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone" >
                                                    <span > <i class="material-icons">dns</i> Cantidad evaluaciones:{{$asignatura['cantidad']}} </span><br>
                                                    <span > <i class="material-icons">chrome_reader_mode</i> Promedio alumno: {{$asignatura['promedio']}} </span><br><br>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="android-card-container mdl-grid">
                                            @if (!isset($asignatura['evaluaciones']) || empty($asignatura['evaluaciones']))
                                                <table class="mdl-data-table mdl-js-data-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Fecha</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Tipo Actividad</th>
                                                        <th>Nota</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="mdl-data-table__cell--non-numeric">No hay evaluaciones</td>
                                                        <td class="mdl-data-table__cell--non-numeric">-</td>
                                                        <td class="mdl-data-table__cell--non-numeric">-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            @else
                                                <table class="mdl-data-table mdl-js-data-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Fecha</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Tipo Actividad</th>
                                                        <th>Nota</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($asignatura['evaluaciones'] as $nota_asignatura)
                                                    <tr>
                                                        <td class="mdl-data-table__cell--non-numeric">{{$nota_asignatura['name']}}</td>
                                                        <td class="mdl-data-table__cell--non-numeric">{{$nota_asignatura['hora_inicio']}}</td>
                                                        @if($nota_asignatura['tipo_actividad']==0)
                                                            <td class="mdl-data-table__cell--non-numeric">Prueba</td>
                                                        @elseif($nota_asignatura['tipo_actividad']==1)
                                                            <td class="mdl-data-table__cell--non-numeric">Actividad</td>
                                                        @elseif($nota_asignatura['tipo_actividad']==2)
                                                            <td class="mdl-data-table__cell--non-numeric">Control</td>
                                                        @endif
                                                        <td>{{$nota_asignatura['nota']}}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                        <br>
                                    </div>

                                    <div class="menu mdl-card__menu">
                                        <label for="course{{$asignatura['id']}}"><i class="label material-icons"></i></label>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
                @endif
        </div>
    </div>
@stop

@section('scripts')

@endsection