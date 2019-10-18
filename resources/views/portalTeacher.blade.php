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
        .backgroundFixed{
            position: relative;
            width: 100%;
            height: 2%;
            background-color: #171a1d;!important;
            margin: 3%;
            font-max-size: 50%;
            color: honeydew;
            margin-inside: 0%;
        }
        .backgroundFixed h5{
            background-color: #222222;
            width: 110%;
            height: 100%;
            border-style: groove;
            text-align: -moz-left;
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
        @component('components.misDatosPortal',['curso_jefe'=>$cursos,'user'=>$teacher])
        @endcomponent
    <br>
    <!-- cursos -->
    <div class="page-content">
        <div class="android-more-section">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                    <span> <h2 class="article-h2"><i class="material-icons" >face</i> Mis Cursos</h2>  </span>
                </div>
            </div>

            <div class="mdl-grid">
                @if(!isset($prof_cur_asig))
                    <h2 class="mdl-card__title-text">Sin cursos asignados</h2>
                @else
                @foreach($prof_cur_asig as $curso)
                    <div class="mdl-grid" >
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone " style="margin-left: 10%">
                            <div class="mdl-card mdl-shadow--4dp">
                                <input id="course{{$curso['datos_curso']['id']}}" style="display:none;" type="checkbox" name="tabs"/>

                                <div class="mdl-card__title mdl-card--border">
                                    <label for="course{{$curso['datos_curso']['id']}}" style="margin-right: 45%">
                                        <h2 class="mdl-card__title-text"> <i class="material-icons">school</i> &nbsp; Curso: {{$curso['datos_curso']['numero']}}° {{$curso['datos_curso']['letra']}} </h2>
                                    </label>
                                </div>

                                <div class="tab-content darksupporting-text">
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone" >
                                            <span > <i class="material-icons">school</i> Curso: {{$curso['datos_curso']['numero']}}° {{$curso['datos_curso']['letra']}} </span><br>
                                            <span > <i class="material-icons">person_pin</i> Profesor jefe: {{$curso['profe_jefe']['name']}} {{$curso['profe_jefe']['surname']}}</span><br>
                                            <span > <i class="material-icons">face</i> Matrícula:{{$curso['matricula']}} </span><br><br>
                                        </div>
                                    </div>
                                    <div class="android-card-container mdl-grid">
                                        @foreach($curso['asignaturas'] as $asignatura)
                                            <div class="demo-card-event mdl-card mdl-shadow--2dp" style="background-color: {{$asignatura['color']}};">

                                                <div class="mdl-card__title backgroundFixed">
                                                   <h5> <i class="material-icons md-14">supervised_user_circle</i> {{$asignatura['name']}}</h5>
                                                </div>

                                                <div class="mdl-card__actions mdl-card--border">
                                                    <div class="mdl-layout-spacer"></div>
                                                    <a href="{{route('teacher.subject',$asignatura['id'])}}" style="color: inherit; text-decoration: none;"><button class="mdl-button mdl-js-button mdl-button--icon">
                                                            <i class="material-icons">arrow_forward</i>
                                                        </button></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <br>
                                </div>

                                <div class="menu mdl-card__menu">
                                    <label for="course{{$curso['datos_curso']['id']}}"><i class="label material-icons"></i></label>
                                </div>
                            </div>
                        </div>

                        <div class="mdl-grid" >
                            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
                                <a href="{!! route('teacher.student.list', ['id'=>$curso['datos_curso']['id']]) !!}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">perm_contact_calendar</i> Lista Estudiantes</button></a>
                            </div>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone">
                                <a href="{!! route('teacher.marks', ['id'=>$curso['datos_curso']['id']]) !!}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">plus_one</i> Notas</button></a>
                            </div>
                            <div class="mdl-cell mdl-cell--5-col mdl-cell--4-col-phone">
                                <a href="{!! route('teacher.attendance', ['id'=>$curso['datos_curso']['id']]) !!}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" ><i class="material-icons">playlist_add_check</i> Asistencia</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
        </div>
        </div>
    </div>

@stop


