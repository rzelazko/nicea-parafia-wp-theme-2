<p class="my-2 p-0 byline text-muted">
  {!! 
      sprintf( __('Updated: %1$s, author: <span class="author vcard"><a href="%2$s" rel="author" class="fn">%3$s</a></span>', 'sage'),
      get_the_date(),
      get_author_posts_url(get_the_author_meta('ID')),
      get_the_author())
  !!}
</p>