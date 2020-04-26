<footer class="content-info bg-light py-4 mt-4 d-none d-md-block">
  <div class="container">
    <div class="row">
      @php dynamic_sidebar('sidebar-footer') @endphp
    </div>
  </div>
</footer>
<footer class="bg-dark">
  <div class="container px-md-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-0 py-2 justify-content-between">
      <a class="nabar-brand bg-primary text-white text-center p-2 d-inline-flex my-2 small" href="{{ home_url('/') }}" id="np-brand-footer">
        <i class="fas fa-church mr-2"></i>
        <span class="d-inline-block align-middle">
          <span class="d-block lead">Polska Parafia</span>
          <small class="d-block">Nicea Cannes Monaco</small>
        </span>
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-footer-navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu([
              'theme_location' => 'footer_navigation',
              'depth' => 1,
              'container' => 'div',
              'container_class' => 'collapse navbar-collapse flex-grow-0',
              'container_id' => 'navbar-footer-navigation',
              'menu_class' => 'nav navbar-nav ml-auto',
              'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
              'walker' => new WP_Bootstrap_Navwalker()
          ]) !!}
      @endif
      <a class="webperfekt-logo d-none d-lg-inline-flex p-4" href="http://www.webperfekt.pl/">
        <img src="@asset('images/webperfekt-logo.png')" height="24"
          class="d-none d-lg-inline-block align-middle" alt="WebPerfekt.pl" />
      </a>
    </nav>
  </div>
</footer>