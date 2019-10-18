<div class="mdl-layout-title">
    <br>
    <a  style="color: inherit; text-decoration: none;" href="{{route('teacher.dashboard')}}">
        PROFESOR
    </a>
</div>

<!-- Opciones dentro del drawer teacher-->
<nav class="mdl-navigation">
    <div class="android-drawer-separator"></div>
    <a class="mdl-navigation__link" href="{{route('teacher.dashboard')}}"><strong>Mi Portal</strong></a>
    <a class="mdl-navigation__link" href="{{route('teacher.calendar')}}">Calendario</a>
    <a class="mdl-navigation__link" href="{{route('uconstruct')}}">QUIZ</a>
    <div class="android-drawer-separator"></div>
    <a class="mdl-navigation__link" style="color: darkred" href="{{route('teacher.logout')}}"><strong>Salir</strong></a>
</nav>