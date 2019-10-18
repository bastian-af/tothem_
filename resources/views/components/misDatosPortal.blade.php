<div class="android-more-section" >
    <div class="mdl-grid">
        <div class="wrapper">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                <img class="profile-img"src="{{URL::asset('profile_pic/'.Auth::user()->url_imagen)}}" alt="img">
                <div class="article-h2">{{ Auth::user()->name }} {{Auth::user()->second_name}} {{Auth::user()->surname}} {{Auth::user()->second_surname}}</div>
                 @if (Auth::guard('admin')->check())
                    <span class="mdl-chip mdl-chip--contact"><span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">A</span> <span class="mdl-chip__text">Administrador</span></span>
                @elseif (Auth::guard('teacher')->check())


                    <span class="mdl-chip">
                        <button id="esp" type="button" class="mdl-chip__action"> <i id="esp" class="material-icons">import_contacts</i></button>
                        <span class="mdl-chip__text">
                        &nbsp;&nbsp;&nbsp;{{ Auth::user()->job_title }}
                        </span>
                    </span>
                    <div class="mdl-tooltip" data-mdl-for="esp">
                        <strong>Especialidad</strong>
                    </div>
                    @if(isset($curso_jefe))
                        <span class="mdl-chip">

                            <button id="jefatura" type="button" class="mdl-chip__action"><i id="jefatura"class="material-icons">business_center</i></button>
                            <span class="mdl-chip__text">
                                 &nbsp;&nbsp;&nbsp;{{$curso_jefe->numero}}°{{strtoupper($curso_jefe->letra)}}
                             </span>
                        </span>
                        <div class="mdl-tooltip" data-mdl-for="jefatura">
                            <strong>Jefatura<br>curso</strong>
                        </div>
                    @endif
                    <br>
                    <span class="mdl-chip mdl-chip--contact"><span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">P</span> <span class="mdl-chip__text">Profesor</span></span>

                @elseif (Auth::guard('web')->check())
                     @if(isset($cursos))
                        <h6><span class="nav-text "> <span class="nav-text">{{$cursos->numero}} ° {{$cursos->letra}} </span></span></h6>

                    @endif
                    <span class="mdl-chip mdl-chip--contact"><span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">E</span> <span class="mdl-chip__text">Estudiante</span></span>
                @endif
               </div>
        </div>
    </div>
    <br><br>
    <div class="mdl-grid" >

        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone" style="border-top: dashed 1px #009688 ">
            <div class="darksupporting-text">
                <h6> <span class="nav-text"><i class="material-icons">info</i> </span><span class="nav-text">Mis datos:</span></h6>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone"></div>
        <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
            <ul class="demo-list-two mdl-list">
                <li class="mdl-list__item mdl-list__item--two-line" style="background-color: whitesmoke; border: dotted 1px #1d1d1d">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">perm_identity</i>
                        @if(isset(Auth::user()->rut))
                            <span>{{Auth::user()->rut}}</span>
                            <span class="mdl-list__item-sub-title">Rut</span>
                        @else
                            <span class="mdl-list__item-sub-title">Rut</span>
                        @endif
                    </span>
                </li>
            </ul>
            <ul class="demo-list-two mdl-list">
                <li class="mdl-list__item mdl-list__item--two-line" style="background-color: whitesmoke; border: dotted 1px #1d1d1d">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">location_on</i>
                        @if(isset(Auth::user()->direccion))
                            <span>{{Auth::user()->direccion}}</span>
                            <span class="mdl-list__item-sub-title">Dirección</span>
                        @else
                            <span class="mdl-list__item-sub-title">Dirección</span>
                        @endif
                    </span>
                </li>
            </ul>
        </div>

        <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone">
            <ul class="demo-list-two mdl-list">
                <li class="mdl-list__item mdl-list__item--two-line" style="background-color: whitesmoke; border: dotted 1px #1d1d1d">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">email</i>
                        @if(isset(Auth::user()->email))
                            <span>{{Auth::user()->email}}</span>
                            <span class="mdl-list__item-sub-title">e-mail</span>
                        @else
                            <span class="mdl-list__item-sub-title">e-mail</span>
                        @endif
                    </span>
                </li>
            </ul>
            <ul class="demo-list-two mdl-list">
                <li class="mdl-list__item mdl-list__item--two-line" style="background-color: whitesmoke; border: dotted 1px #1d1d1d">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">perm_phone_msg</i>
                        @if(isset(Auth::user()->fono_contacto))
                            <span>{{Auth::user()->fono_contacto}}</span>
                            <span class="mdl-list__item-sub-title">Fono</span>
                        @else
                            <span class="mdl-list__item-sub-title">Fono</span>
                        @endif
                    </span>
                </li>

            </ul>
        </div>
        <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone"></div>

    </div>

</div>