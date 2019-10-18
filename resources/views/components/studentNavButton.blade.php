<!-- Navigation -->
<nav class="android-navigation mdl-navigation">
    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{route('student.activity_calendar')}}">Calendario</a>
    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{route('student.attendance',[Auth::user()->id])}}">Asistencia</a>
    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{route('student.annotations',[Auth::user()->id])}}">Anotaciones</a>
    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{route('student.marks',[Auth::user()->id])}}">Notas</a>
</nav>