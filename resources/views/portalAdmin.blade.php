@extends('layouts.principal')


@section('title')
    Admin
@stop

@section('styles')
    <style>
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
        .circulo_admin{
            font-size: 10px;
            width: 35px;
            height: 35px;
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
<!-- fabbutton-->
    <style>
        .mdl-sheet__container {
            position: fixed;
            right: 32px;
            bottom: 32px;
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            z-index: 9999;
        }

        .mdl-sheet {
            position: absolute;
            right: 0;
            bottom: 0;
            background: #039870;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 180ms;
        }
        .mdl-sheet .mdl-sheet__content {
            display: none;
        }

        .mdl-sheet__icon {
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-12px, -12px);
            transform: translate(-12px, -12px);
            font-size: 24px;
            width: 24px;
            height: 24px;
            line-height: 24px;
        }

        .mdl-sheet--opened {
            background: #fff;
            color: #263238;
            border-radius: 2px;
            width: 240px;
            height: auto;
            min-height: 150px;
            max-height: 80vh;
            overflow-y: auto;
        }
        .mdl-sheet--opened .mdl-sheet__icon {
            display: none;
        }
        .mdl-sheet--opened .mdl-sheet__content {
            display: block;
        }
    </style>
    <style>

    .mdl-card + .mdl-card {
        margin-top: 40px;
    }
    .profile-img{
        display: inline-block;
        width: 180px;
        height: 180px;
        overflow: auto;
        border-radius: 50%;
        border-color: #222222;
    }
    .circular--landscape img {
        width: auto;
        height: 100%;
    }
    .mdl-card--horizontal {
        flex-direction: column;
        height: 1vh;
        /* 1 */
        padding-left: 150px;
        width: 100%;
    }
    .mdl-card--horizontal .mdl-card__media {
        left: 0;
        position: absolute;
        width: 150px;
    }
    .mdl-card--horizontal .mdl-card__supporting-text {
        flex: 1 1 auto;
        width: auto;
    }

    .mdl-card--horizontal-2 {
        flex-direction: row;
        flex-wrap: wrap;
        min-height: 0px;
    }
    .mdl-card--horizontal-2 .mdl-card__title {
        align-items: flex-start;
        flex-direction: column;
        flex: 1 auto;
        float: left;
    }
    .mdl-card--horizontal-2 .mdl-card__title-text {
        align-self: flex-start;
    }
    .mdl-card--horizontal-2 .mdl-card__media {
        flex: 0 auto;
        float: right;
        height: 112px;
        margin: 16px 16px 0 0;
        width: 112px;
    }
    .mdl-card--horizontal-2 .mdl-card__actions {
        clear: both;
        flex: 1 auto;
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

</style>
    <!-- Two Line List with secondary info and action -->
    <style>
        .demo-list-two {
            width: 300px;
        }
    </style>
    <!-- Cursos cards -->
    <style>
        .mdl-cursos-cell {
            box-sizing: border-box;
            /*   background-color: #999;*/
            padding: 3px;
            color: black;
            margin: 0 auto;
            margin-top: 35px;
            margin-bottom: 35px;
        }
        .murray-card-square.mdl-card {
            width: 100%;
            height: 100%;
            background-color: black;
        }
        .mdl-card__title-text{
            color:white;
        }

        .mdl-card__supporting-text{
            background-color: #004D40;
        }
    </style>

@stop

@section('navBarButtons')
    @component('components.adminNavButton')
    @endcomponent
@stop

@section('pictureMenu')
    @component('components.adminPictureMenu')
    @endcomponent
@stop
@section('drawer')
    @component('components.adminDrawer')
    @endcomponent
@stop

@section('content')

<!--FAB BUTTON CON BOTONES DE REGISTRAR-->
    <div class="mdl-sheet__container">
        <div class="mdl-sheet mdl-shadow--2dp">
            <i class="material-icons mdl-sheet__icon">add</i>

            <div class="mdl-sheet__content">
                <div class="mdl-list">
                    <div class="mdl-list__item">
                        <a href="{{route('admin.register')}}" style="color: inherit; text-decoration: none;">
                        <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">person</i>
                          <span>Registrar Administrador</span>
                        </span>
                        <a class="mdl-list__item-secondary-action" href="{{route('admin.register')}}"><i class="material-icons">add</i></a>
                        </a>
                    </div>

                    <div class="mdl-list__item">
                        <a href="{{route('teacher.register')}}" style="color: inherit; text-decoration: none;">
                        <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">person</i>
                          <span>Registrar Profesor</span>
                        </span>
                            <a class="mdl-list__item-secondary-action" href="{{route('teacher.register')}}"><i class="material-icons">add</i></a>
                        </a>
                    </div>

                    <div class="mdl-list__item">
                        <a href="{{route('student.register')}}" style="color: inherit; text-decoration: none;">
                        <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">person</i>
                          <span>Registrar Alumno</span>
                        </span>
                            <a class="mdl-list__item-secondary-action" href="{{route('student.register')}}"><i class="material-icons">add</i></a>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>


<!--PERFIL-->
<!--extra space-->
    <div class="page-content">
    <div class="android-more-section">

    </div>
</div>
    <div class="page-content">
     <!-- Sección de información del usuario logueado -->
        @component('components.misDatosPortal',['user' => $admin])
        @endcomponent
    </div>

<!--CURSOS-->
    <div class="page-content">
        <div class=" android-more-section">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                    <span> <h2 class="article-h2"><i class="material-icons" >face</i> Cursos</h2>  </span>
                </div>
            </div>

             <div class="mdl-grid" style="border-left: 8px solid #00695C; background-color: lightgrey;">
                @foreach($cursos as $curso)
                    <div class="mdl-cursos-cell murray-cell mdl-cell--4-col" >
                        <a href="{{route('admin.grade', $curso->id)}}" style="color: inherit; text-decoration: none;">
                            <div class="murray-card-square mdl-card mdl-shadow--2dp">
                                <div class="mdl-card__title mdl-card--expand">
                                    <h2 class="mdl-card__title-text"><!--<span><i class="material-icons md-18">people</i></span>-->Curso: {{$curso->numero}} ° {{$curso->letra}}</h2>
                                </div>
                                @foreach($teachers as $teacher)
                                    @if($curso->teacher_id == $teacher->id)
                                        <div class="mdl-card__supporting-text" >
                                            <span><i class="material-icons md-14" style="color: whitesmoke;">person_pin</i> </span><span class="nav-text" style="color: whitesmoke;">  {{$teacher->name}} {{$teacher->second_name}} {{$teacher->surname}} {{$teacher->second_surname}}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </a>
                    </div>

                @endforeach


            </div>
            <div class="mdl-grid"></div>

                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone" >
                    </div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone" >
                        <a href="{{route('admin.gradeAdd')}}" style="color: inherit; text-decoration: none;"><button id="show-dialog" type="button" class="mdl-button"> <i class="material-icons" style="font-size: 24px">add_circle</i> Crear Curso </button></a>
                    </div>
                </div>


        </div>
    </div>

<!--PROFESORES-->
    <div class="page-content">
        <div class=" android-more-section">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                    <span> <h2 class="article-h2"><i class="material-icons" >how_to_reg</i> Profesores</h2>  </span>
                </div>
            </div>

            <div class="mdl-grid" style="border-left: 6px solid indigo; background-color: lightgrey; ">
                <!--<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone">
                </div>-->
                @foreach($teachers as $teacher)
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone" >
                    <ul class="demo-list-two mdl-list">
                        <li class="mdl-list__item mdl-list__item--two-line" style="background-color: whitesmoke">

                                <span class="mdl-list__item-primary-content">

                                    <a class="mdl-list__item-secondary-action" href="{{route('admin.teacher', $teacher->id)}}" style="color: inherit; text-decoration: none;"><i class="material-icons mdl-list__item-avatar">person</i></a>
                                  <span>{{$teacher->name}} {{substr($teacher->second_name,0,1)}}. {{$teacher->surname}} {{substr($teacher->second_surname,0,1)}}.</span>
                                  <span class="mdl-list__item-sub-title">{{$teacher->job_title}}</span>

                                </span>
                                <span class="mdl-list__item-secondary-content">
                                <a class="mdl-list__item-secondary-action" href="{{route('admin.teacher', $teacher->id)}}" style="color: inherit; text-decoration: none;"><i class="material-icons">chevron_right</i></a>
                                </span>

                        </li>

                    </ul>
                </div>
                @endforeach
            </div>

        </div>
    </div>

<!--extra space-->
    <div class="page-content">
        <div class=" android-more-section">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone" >
                </div>
            </div>
        </div>
    </div>




@stop

@section('scripts')
    <!--FABBUTTON-->
<script>
    var $sheet = $('.mdl-sheet');

    if($sheet.length > 0) {
        $('html').on('click', function() {
            $sheet.removeClass('mdl-sheet--opened')
        });

        $sheet.on('click', function(event) {
            event.stopPropagation();

            $sheet.addClass('mdl-sheet--opened');
        });
    }
</script>
<script>
    $('.mdl-grid').children('.mdl-cursos-cell')
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
        var notification = document.querySelector('#demo-toast-example');
        notification.MaterialSnackbar.showSnackbar(
            {
                message: '' + msg,
                timeout: 5000,
                actionText: 'Undo'
            }
        );
    });

    function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
</script>



@endsection