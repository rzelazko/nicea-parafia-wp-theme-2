<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    <div class="wrap container" role="document">
      @php do_action('get_header') @endphp
      @include('partials.header')

      <div class="content row ">
        <main class="main col-12 col-md">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar col-12 col-md-4 mb-4">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
