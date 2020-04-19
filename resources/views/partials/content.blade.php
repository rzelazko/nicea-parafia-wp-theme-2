@if (has_excerpt())
<article @php post_class('post-excerpt card bg-primary text-white') @endphp>
  <div class="card-body">
    <h2 class="card-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>

    @include('partials/entry-meta')
    {!! the_excerpt() !!}

    <a href="{{ get_permalink() }}" class="btn btn-light">{{__('Read more', 'sage')}}
      <i class="fas fa-angle-double-right"></i></a>
  </div>
</article>
@else
<article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    @include('partials/entry-meta')
  </header>
  @include('partials/post-thumbnail')
  <div class="entry-summary">
    {!! the_excerpt() !!}

    <a href="{{ get_permalink() }}" class="btn btn-light">{{__('Read more', 'sage')}}
      <i class="fas fa-angle-double-right"></i></a>
  </div>
</article>
@endif