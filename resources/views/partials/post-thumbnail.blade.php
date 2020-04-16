@if (has_post_thumbnail())
    <a href="@php the_permalink() @endphp" alt="@php the_title_attribute() @endphp" class="entry-thumbnail">
        @php the_post_thumbnail('large', array('class' => 'img-fluid')) @endphp
    </a>
@elseif (!is_single() && has_post_format('gallery'))
    @php
        $gallery_images = get_post_gallery_images();
        $gallery_size = count($gallery_images);
        $gallery_image = $gallery_size > 0 ? $gallery_images[0] : null;
    @endphp

    @isset($gallery_image)
        <a href="@php the_permalink() @endphp" alt="@php the_title_attribute() @endphp" class="entry-thumbnail">
            <img src="{{ $gallery_image }}" class="img-fluid" alt="" />
        </a>
        <p>{{ sprintf(__('Gallery contains %s images', 'sage'), $gallery_size) }}</p>
    @endisset
@endif