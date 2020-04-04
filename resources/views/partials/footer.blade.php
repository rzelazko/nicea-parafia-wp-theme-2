<footer class="content-info bg-light py-4 mt-4">
  <div class="container">
    <div class="row">
      @php dynamic_sidebar('sidebar-footer') @endphp
    </div>
  </div>
</footer>
<footer class="bg-dark">
  <div class="container px-md-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-0 py-2 mb-3 justify-content-between">
      <a class="nabar-brand bg-primary text-white text-center p-2 d-inline-flex my-2 small" href="{{ home_url('/') }}">
        <img src="@asset('images/nicea-parafia-logo.png')" width="21" height="28"
          class="d-none d-lg-inline-block align-middle" alt="" />
        <span class="d-inline-block align-middle">
          <span class="d-block">Polska Parafia</span>
          <small class="d-block">Nicea Cannes Monaco</small>
        </span>
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary-navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
              'theme_location' => 'primary_navigation',
              'depth' => 1,
              'container' => 'div',
              'container_class' => 'collapse navbar-collapse',
              'container_id' => 'navbar-primary-navigation',
              'menu_class' => 'nav navbar-nav ml-auto',
              'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
              'walker' => new WP_Bootstrap_Navwalker()
          ]) !!}
      @endif
      <a class="d-none d-lg-inline-flex ml-4" href="http://www.webperfekt.pl/">
        <img src="@asset('images/webperfekt-logo.png')" height="24"
          class="d-none d-lg-inline-block align-middle" alt="WebPerfekt.pl" />
      </a>
    </nav>
  </div>
</footer>