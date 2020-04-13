<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2 mb-3 justify-content-between">
        <a class="nabar-brand bg-primary text-white text-center p-2 p-lg-4 d-inline-flex my-2" href="{{ home_url('/') }}">
            <img src="@asset('images/nicea-parafia-logo.png')" width="39" height="52" class="d-none d-lg-inline-block align-middle" alt="" />
            <span class="d-inline-block align-middle">
                <span class="lead d-block">Polska Parafia</span>
                <small class="d-block">Nicea Cannes Monaco</small>
            </span>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'navbar-primary-navigation',
                'menu_class' => 'nav navbar-nav ml-auto',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker()
            ]) !!}
        @endif
    </nav>
</header>

@if (is_home())
<header id="carouselNiceaParafia" class="carousel slide mb-3" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselNiceaParafia" data-slide-to="0" class="active"></li>
        <li data-target="#carouselNiceaParafia" data-slide-to="1"></li>
        <li data-target="#carouselNiceaParafia" data-slide-to="2"></li>
        <li data-target="#carouselNiceaParafia" data-slide-to="3"></li>
        <li data-target="#carouselNiceaParafia" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active carousel-image-1">
            <div class="np-carousel-caption d-none d-md-flex row justify-content-end align-items-end">
                <div class="col-md-6 col-lg-5 np-carousel-caption-box py-3">
                    <h5>Chemin de l&apos;Energie Alpy Nadmorskie</h5>
                    <p>
                        A potem Bóg rzekł «Niech zbiorą się wody spod nieba w jedno miejsce i niech się ukaże
                        powierzchnia sucha!»
                    </p>
                    <p class="small text-right">
                        Rdz 1
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item carousel-image-2">
            <div class="np-carousel-caption d-none d-md-flex row justify-content-end align-items-end">
                <div class="col-md-6 col-lg-4 np-carousel-caption-box py-3">
                    <h5>Col de Villefranche, Nicea</h5>
                    <p>I mówili nawzajem do siebie: «Czy serce nie pałało w nas, kiedy rozmawiał z nami w drodze i Pisma nam wyjaśniał?»</p>
                    <p class="small text-right">Łk 24,32</p>
                </div>
            </div>
        </div>
        <div class="carousel-item carousel-image-3">
            <div class="np-carousel-caption d-none d-md-flex row justify-content-end align-items-end">
                <div class="col-md-6 col-lg-4 np-carousel-caption-box py-3">
                    <h5>Kaplica, Plac Garibaldi, Nicea</h5>
                    <p>O, gwiazdo najświętsza wiedź nas w niebios kraj. I wieczną szczęśliwość, o Boże, nam daj.</p>
                    <p class="small text-right">Po górach dolinach</p>
                </div>
            </div>
        </div>
        <div class="carousel-item carousel-image-4">
            <div class="np-carousel-caption d-none d-md-flex row justify-content-end align-items-end">
                <div class="col-md-6 col-lg-4 np-carousel-caption-box py-3">
                    <h5>Promenade des Anglais, Nicea</h5>
                    <p>Pan kiedyś stanął nad brzegiem; Szukał ludzi gotowych pójść za Nim; By łowić serca; Słów Bożych prawdą</p>
                    <p class="small text-right">Barka</p>
                </div>
            </div>
        </div>
        <div class="carousel-item carousel-image-5">
            <div class="np-carousel-caption d-none d-md-flex row justify-content-end align-items-end">
                <div class="col-md-6 col-lg-4 np-carousel-caption-box py-3">
                    <h5>Val d'Allos, Alpy Prowansalskie</h5>
                    <p>Błogosław, duszo moja, Pana! O Boże mój, Panie, jesteś bardzo wielki! Odziany we wspaniałość i majestat, światłem okryty jak płaszczem. Rozpostarłeś niebo jak namiot, wzniosłeś swe komnaty nad wodami.</p>
                    <p class="small text-right">Ps 104</p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselNiceaParafia" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Poprzedni</span>
    </a>
    <a class="carousel-control-next" href="#carouselNiceaParafia" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Następny</span>
    </a>
</header>
@endif