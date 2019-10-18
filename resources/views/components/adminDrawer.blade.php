<div class="mdl-layout-title">
    <br>
    <a  style="color: inherit; text-decoration: none;" href="{{route('admin.dashboard')}}">
        ADMINISTRADOR
    </a>
</div>


<!-- Opciones dentro del drawer Admin-->
<nav class="mdl-navigation">
    <div class="android-drawer-separator"></div>
    <a class="mdl-navigation__link" href="{{route('admin.dashboard')}}">Inicio</a>
    <a class="mdl-navigation__link" href="{{route('student.register')}}">Registrar Estudiantes</a>
    <a class="mdl-navigation__link" href="{{route('teacher.register')}}">Registrar Profesor</a>
    <a class="mdl-navigation__link" href="{{route('admin.register')}}">Registrar Administrador</a>
    <div class="android-drawer-separator"></div>
    <a class="mdl-navigation__link" style="color: darkred" href="{{route('admin.logout')}}"><strong>Salir</strong></a>
</nav>