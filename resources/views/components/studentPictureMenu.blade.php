<a href="{{route('student.dashboard')}}" style="color: inherit; text-decoration: none;"><li class="mdl-menu__item">Mi portal</li></a>
<a style="color: inherit; text-decoration: none;" href="{{route('student.marks',[Auth::user()->id])}}"><li class="mdl-menu__item">Mis Notas</li></a>
<a href="{{route('uconstruct')}}" style="color: inherit; text-decoration: none;"><li class="mdl-menu__item">QUIZ</li></a>
<a href="{{route('student.logout')}}" style="color: inherit; text-decoration: none;"><li class="mdl-menu__item" style="color: darkred">Salir</li></a>