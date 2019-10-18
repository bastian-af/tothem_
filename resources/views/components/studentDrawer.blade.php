<div class="mdl-layout-title">
    <br>
    <a  style="color: inherit; text-decoration: none;" href="{{route('student.dashboard')}}">
        ESTUDIANTE
    </a>
</div>

<!-- Opciones dentro del drawer student-->
<nav class="mdl-navigation">
    <div class="android-drawer-separator"></div>
    <a class="mdl-navigation__link" href="{{route('student.dashboard')}}">Inicio</a>
    <a class="mdl-navigation__link" href="{{route('student.activity_calendar')}}">Calendario</a>
    <a class="mdl-navigation__link" href="{{route('student.marks',[Auth::user()->id])}}">Notas</a>
    <a class="mdl-navigation__link" href="{{route('student.attendance',[Auth::user()->id])}}">Asistencia</a>
    <a class="mdl-navigation__link" href="{{route('student.annotations',[Auth::user()->id])}}">Hoja de vida</a>
    <a class="mdl-navigation__link" href="{{route('uconstruct')}}">QUIZ</a>
    <div class="android-drawer-separator"></div>
    <a class="mdl-navigation__link" style="color: darkred" href="{{route('student.logout')}}"><strong>Salir</strong></a>
</nav>