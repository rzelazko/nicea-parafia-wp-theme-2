@if (has_post_thumbnail())
    <a href="@php the_permalink() @endphp" alt="@php the_title_attribute() @endphp" class="entry-thumbnail">
        @php the_post_thumbnail('large', array('class' => 'img-fluid')) @endphp
    </a>
@endif