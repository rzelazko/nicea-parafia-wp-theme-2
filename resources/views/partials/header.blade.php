<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container px-sm-3">
        <a class="nabar-brand bg-primary text-white text-center p-2 d-inline-block my-2"
            href="{{ home_url('/') }}"><span class="lead">Polska Parafia</span><br /><small>Nicea Cannes Monaco</small></a>
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
    </div>
</nav>

@if (is_home())
<header class="container">
    <div id="carouselNiceaParafia" class="carousel slide mb-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselNiceaParafia" data-slide-to="0" class="active"></li>
            <li data-target="#carouselNiceaParafia" data-slide-to="1"></li>
            <li data-target="#carouselNiceaParafia" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active carousel-image-1">
                <div class="np-carousel-caption d-none d-md-flex row justify-content-end align-items-end">
                    <div class="col-md-6 col-lg-5 np-carousel-caption-box py-3">
                        <h5>Chemin de l'Energie Alpy Nadmorskie</h5>
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
                        <h5>Lorem, ipsum.</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-image-3">
                <div class="np-carousel-caption d-none d-md-flex row justify-content-end align-items-end">
                    <div class="col-md-6 col-lg-4 np-carousel-caption-box py-3">
                        <h5>Lorem, ipsum.</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
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
    </div>
</header>
@endif