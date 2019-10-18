@extends('layouts.principal')

@section('title')
    Portal Estudiante
@stop

@section('styles')
    <style>
        .demo-card-wide.mdl-card {
            width: 730px;
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
            background: #171a1d;!important;
            margin: 3%;
            font-max-size: 50%;
            color: honeydew;
            margin-inside: 0%;
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


    <!--extra space-->
    <div class="page-content">
        <div class="android-more-section">

        </div>
    </div>
    <!--PERFIL-->
    <div class="page-content">
        @component('components.misDatosPortal',['cursos'=>$cursos,'user'=>$user])
        @endcomponent
    </div>

    <div class="page-content">
        <div class=" android-more-section">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone">
                    <span> <h2 class="article-h2"><i class="material-icons">class</i> Asignaturas</h2>  </span>
                </div>
            </div>

            <div class="android-card-container mdl-grid ">
                @foreach($subjects as $subject)
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">

                        <div class="demo-card-event mdl-card mdl-shadow--2dp"  style="background-color: {{$subject->color}};" >
                            <div class="mdl-card__title backgroundFixed">
                               <h4>{{$subject->name}}</h4>
                            </div>
                            <br>
                            <div class="mdl-card__title" style="padding-top: 0%;padding-bottom: 1%;">
                                <span><i class="material-icons md-14">record_voice_over </i></span><span class="nav-text">&nbsp; Profesor: {{$subject['profesor']['name']}} {{$subject['profesor']['surname']}}</span>
                            </div>
                            <br>
                            <div class="mdl-card__actions mdl-card--border">
                                <div class="mdl-layout-spacer"></div>
                                <a href="{{route('student.subjectContent',$subject->id)}}"  class="mdl-button mdl-js-button mdl-button--icon">
                                    <i class="material-icons">arrow_forward</i>
                                </a>
                            </div>
                        </div>

                </div>
                @endforeach
            </div>


        </div>
    </div>
    <!--extra space-->
    <div class="page-content">
        <div class="android-more-section">

        </div>
    </div>
@stop