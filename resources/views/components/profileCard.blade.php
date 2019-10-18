<div class="mdl-card mdl-shadow--2dp mdl-card--horizontal">

    <div class="mdl-card__media">
        <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone">
        <img class="profile-img"src="{{asset('images/userprofilepic.png')}}" alt="img">
        </div>
    </div>
    <div class="mdl-card__title">
        <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone">
            <div class="article-h2">{{ Auth::user()->name }} {{Auth::user()->second_name}} {{Auth::user()->surname}} {{Auth::user()->second_surname}}</div>
        </div>
    </div>
    <!--<div class="mdl-card__supporting-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Mauris sagittis pellentesque lacus eleifend lacinia...
    </div>-->
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">Get Started</a>
    </div>
    <div class="mdl-card__menu">
         <span class="mdl-chip mdl-chip--contact">
                                  <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">A</span>
                                    <span class="mdl-chip__text">  Administrador</span>
                            </span>
    </div>
</div>



<div class="mdl-card mdl-shadow--2dp mdl-card--horizontal-2">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Welcome</h2>
        <div class="mdl-card__subtitle-text">  Subtitle text</div>
    </div>
    <div class="mdl-card__media">
        <img src="http://placehold.it/112x112/DC143C/FFFFFF" alt="img">
    </div>
    <div class="mdl-card__actions">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">Get Started</a>
    </div>
</div>