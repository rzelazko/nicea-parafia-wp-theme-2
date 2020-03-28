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