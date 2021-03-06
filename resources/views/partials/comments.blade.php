@php
if (post_password_required()) {
  return;
}
@endphp

<section id="comments" class="comments">
  @if (have_comments())
    @if (comments_open())
      <a href="#respond" class="btn btn-outline-primary">{{ __('Add a comment', 'sage')}}</a>
    @endif

    {!! BootstrapContentNavigation::get_the_comments_pagination(array('class' => 'pagination-top')) !!}

    <h2 class="my-3">
      {!! sprintf(_n('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>') !!}
    </h2>

    <ol class="comment-list">
      {!! wp_list_comments(['style' => 'ol', 'short_ping' => true, 'avatar_size' => 48]) !!}
    </ol>

    {!! BootstrapContentNavigation::get_the_comments_pagination(array('class' => 'pagination-bottom')) !!}
  @endif

  @if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments'))
    <div class="alert alert-warning">
      {{ __('Comments are closed.', 'sage') }}
    </div>
  @endif

  @php comment_form() @endphp
</section>
