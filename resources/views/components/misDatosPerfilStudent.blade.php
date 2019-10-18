    <div class="mdl-grid">
        <div class="wrapper">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                @if(isset($user))
                <img class="profile-img" src="{{URL::asset('profile_pic/'.$user->url_imagen)}}" alt="img">
                <div class="article-h2">{{$user->name }} {{$user->second_name}} {{$user->surname}} {{$user->second_surname}}</div>
                @if(isset($curso))
                    <span class="nav-text"> <span class="nav-text">{{$curso->numero}} ° {{$curso->letra}} </span></span><br>
                    <span class="mdl-chip mdl-chip--contact"><span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">E</span> <span class="mdl-chip__text">Estudiante</span></span>
                @endif
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
                        @if(isset($user->rut))
                            <span>{{$user->rut}}</span>
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
                        @if(isset($user->direccion))
                            <span>{{$user->direccion}}</span>
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
                        @if(isset($user->email))
                            <span>{{$user->email}}</span>
                            <span class="mdl-list__item-sub-title">e-mail</span>
                        @else
                            <span class="mdl-list__item-sub-title">e-mail</span>
                        @endif
                    </span>
                </li>
            </ul>

        </div>
        <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone"></div>

    </div>
