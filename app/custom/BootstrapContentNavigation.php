<?php
/**
 * @package WPStarterTheme
 * @version 1.0.0
 */

/**
 * Class to render several navigation elements in a Bootstrap-compatible way.
 *
 * @since 1.0.0
 */
final class BootstrapContentNavigation {
	/**
	 * Temporary holder for wp_link_pages() alignment.
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var bool
	 */
	private static $_aligned_helper = false;


	/**
	 * Renders the posts pagination.
	 *
	 * This method should be called instead of get_the_posts_pagination() for a Bootstrap-compatible posts pagination.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @param array $args Array of get_the_posts_pagination() arguments.
	 * @return string The posts pagination output.
	 */
	public static function get_the_posts_pagination( $args = array() ) {
		$navigation = '';

		if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
			$args = wp_parse_args( $args, array(
				'mid_size'				=> 1,
				'prev_text'				=> _x( '&laquo; Previous', 'previous post', 'sage' ),
				'next_text'				=> _x( 'Next &raquo;', 'next post', 'sage' ),
				'screen_reader_text'	=> __( 'Posts navigation', 'sage' ),
				'size'					=> 'default',
				'show_disabled'			=> false,
				'class'					=> 'pagination'
			) );

			$args['type'] = 'array';

			$links = paginate_links( $args );

			if ( $links ) {
				$link_count = count( $links );

				$pagination_class = 'pagination';
				if ( 'large' == $args['size'] ) {
					$pagination_class .= ' pagination-lg';
				} elseif ( 'small' == $args['size'] ) {
					$pagination_class .= ' pagination-sm';
				}

				$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
				$total = isset( $wp_query->max_num_pages ) ? intval( $wp_query->max_num_pages ) : 1;

				$navigation .= '<ul class="' . $pagination_class . '">';

				if ( $args['show_disabled'] && 1 === $current ) {
					$navigation .= '<li class="page-item disabled"><a href="page-link" href="#">' . $args['prev_text'] . '</a></li>';
				}

				foreach ( $links as $index => $link ) {
					if ( 0 == $index && 0 === strpos( $link, '<a class="prev' ) ) {
						$navigation .= '<li class="page-item">' . str_replace( 'prev page-numbers', 'page-link', $link ) . '</li>';
					} elseif ( $link_count - 1 == $index && 0 === strpos( $link, '<a class="next' ) ) {
						$navigation .= '<li class="page-item">' . str_replace( 'next page-numbers', 'page-link', $link ) . '</li>';
					} else {
						$link = preg_replace( "/(class|href)='(.*)'/U", '$1="$2"', $link );
						
						if ( false !== strpos( $link, ' class="page-numbers current' ) ) {
							$navigation .= '<li class="page-item active">' . str_replace( array( '<span ', ' class="page-numbers current">', '</span>' ), array( '<a ', ' class="page-link" href="#">', '</a>' ), $link ) . '</li>';
						} elseif ( false !== strpos( $link, ' class="page-numbers dots' ) ) {
							$navigation .= '<li class="page-item disabled">' . str_replace( array( '<span class="page-numbers dots">', '</span>' ), array( '<a class="page-link" href="#">', '</a>' ), $link ) . '</li>';
						} else {
							$navigation .= '<li class="page-item">' . str_replace( 'class="page-numbers', 'class="page-link', $link ) . '</li>';
						}
					}
				}

				if ( $args['show_disabled'] && $current === $total ) {
					$navigation .= '<li class="page-item disabled"><a href="page-link" href="#">' . $args['next_text'] . '</a></li>';
				}

				$navigation .= '</ul>';

				$navigation = _navigation_markup( $navigation, $args['class'], $args['screen_reader_text'] );
			}
		}

		return $navigation;
	}

	/**
	 * Renders the comments pagination.
	 *
	 * This method should be called instead of get_the_comments_pagination() for a Bootstrap-compatible comments pagination.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @param array $args Array of get_the_comments_pagination() arguments.
	 * @return string The comments pagination output.
	 */
	public static function get_the_comments_pagination( $args = array() ) {
		$navigation = '';
		
		if (get_comment_pages_count() > 1 && get_option('page_comments')) {
			$args = wp_parse_args( $args, array(
				'prev_text'				=> _x( '&laquo; Previous', 'previous comment', 'sage' ),
				'next_text'				=> _x( 'Next &raquo;', 'next comment', 'sage' ),
				'screen_reader_text'	=> __( 'Comments navigation', 'sage' ),
				'size'					=> 'default',
				'show_disabled'			=> false,
				'class'					=> 'comments-pagination'
			) );

			$args['type'] = 'array';
			$args['echo'] = false;

			$links = paginate_comments_links( $args );

			if ( $links ) {
				$link_count = count( $links );

				$pagination_class = 'pagination';
				if ( 'large' == $args['size'] ) {
					$pagination_class .= ' pagination-lg';
				} elseif ( 'small' == $args['size'] ) {
					$pagination_class .= ' pagination-sm';
				}

				$current = get_query_var( 'cpage' ) ? intval( get_query_var( 'cpage' ) ) : 1;
				$total = get_comment_pages_count();

				$navigation .= '<ul class="' . $pagination_class . '">';

				if ( $args['show_disabled'] && 1 === $current ) {
					$navigation .= '<li class="page-item disabled"><a href="page-link" href="#">' . $args['prev_text'] . '</a></li>';
				}

				foreach ( $links as $index => $link ) {
					if ( 0 == $index && 0 === strpos( $link, '<a class="prev' ) ) {
						$navigation .= '<li class="page-item">' . str_replace( 'prev page-numbers', 'page-link', $link ) . '</li>';
					} elseif ( $link_count - 1 == $index && 0 === strpos( $link, '<a class="next' ) ) {
						$navigation .= '<li class="page-item">' . str_replace( 'next page-numbers', 'page-link', $link ) . '</li>';
					} else {
						$link = preg_replace( "/(class|href)='(.*)'/U", '$1="$2"', $link );
						if ( false !== strpos( $link, ' class="page-numbers current' ) ) {
							$navigation .= '<li class="page-item active">' . str_replace( array( '<span ', ' class="page-numbers current">', '</span>' ), array( '<a ', ' class="page-link" href="#">', '</a>' ), $link ) . '</li>';
						} elseif ( false !== strpos( $link, ' class="page-numbers dots' ) ) {
							$navigation .= '<li class="page-item disabled">' . str_replace( array( '<span class="page-numbers dots">', '</span>' ), array( '<a class="page-link" href="#">', '</a>' ), $link ) . '</li>';
						} else {
							$navigation .= '<li class="page-item">' . str_replace( 'class="page-numbers', 'class="page-link', $link ) . '</li>';
						}
					}
				}

				if ( $args['show_disabled'] && $current === $total ) {
					$navigation .= '<li class="page-item disabled"><a href="page-link" href="#">' . $args['next_text'] . '</a></li>';
				}

				$navigation .= '</ul>';

				$navigation = _navigation_markup( $navigation, $args['class'], $args['screen_reader_text'] );
			}
		}

		return $navigation;
	}

	/**
	 * Renders links for a paged post.
	 *
	 * This method should be called instead of wp_link_pages() for Bootstrap-compatible page links.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @param array $args Array of wp_link_pages() arguments.
	 * @return string The page links output.
	 */
	public static function wp_link_pages( $args = array() ) {
		$echo = ! isset( $args['echo'] ) || $args['echo'];

		$args['echo'] = false;

		if ( ! isset( $args['next_or_number'] ) ) {
			$args['next_or_number'] = 'next';
		}

		if ( isset( $args['aligned'] ) && $args['aligned'] ) {
			self::$_aligned_helper = true;
		} else {
			self::$_aligned_helper = false;
		}

		add_filter( 'wp_link_pages_link', array( __CLASS__, '_link_pages_link' ), 10, 2 );

		$navigation = \wp_link_pages( $args );

		remove_filter( 'wp_link_pages_link', array( __CLASS__, '_link_pages_link' ), 10, 2 );

		if ( $navigation ) {
			$navigation = '<ul class="pager">' . $navigation . '</ul>';

			$screen_reader_text = isset( $args['screen_reader_text'] ) ? $args['screen_reader_text'] : __( 'Post page navigation', 'sage' );
			$navigation = _navigation_markup( $navigation, 'post-page-navigation', $screen_reader_text );
		}

		if ( $echo ) {
			echo $navigation;
		}

		return $navigation;
	}

	/**
	 * Wraps a link from wp_link_pages() in a list element.
	 *
	 * This method is used as callback and should not be called directly.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @internal
	 *
	 * @param string $link  The link output.
	 * @param int    $index The index of the link.
	 * @return string The wrapped link.
	 */
	public static function _link_pages_link( $link, $index ) {
		global $page;

		if ( $index < $page ) {
			return '<li class="pager-prev">' . $link . '</li>';
		} elseif ( $index > $page ) {
			return '<li class="pager-next">' . $link . '</li>';
		}

		return '<li>' . $link . '</li>';
	}
}