<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2 mb-3 justify-content-between">
        <a class="nabar-brand bg-primary text-white text-center p-2 p-lg-4 d-inline-flex my-2 rounded" href="{{ home_url('/') }}">
            <i class="fas fa-church mr-2"></i>
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
    @include('partials.carousel-home')
@else
    @include('partials.carousel-subpage')
@endif

@if (get_theme_mod('holiday_warning'))
    <div id="np-theme-holiday-warning" class="alert alert-warning alert-dismissible fade show" role="alert">
        {!! __('Our <strong>website</strong> in on freeze. Further updates after holidays period.', 'sage') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close', 'sage') }}">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif