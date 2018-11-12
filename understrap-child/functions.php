<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'flaticon-css', get_stylesheet_directory_uri() . '/css/flaticon.css');
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );




// Allow .svg files to be uploaded
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

////////////// BLOG POST CATEGORIES /////////////////////
function wp_post_categories() {
  $categories = get_the_category($post->ID);
  if ( ! empty( $categories ) ) {
      $string .= '<ul class="list-inline post-summary-category">';
    foreach( $categories as $category ) {
      $string .= '<li class="list-inline-item post-summary-category-item">';
      $string .=      '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '%s posts', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
      $string .= '</li>';
    }
    $string .= '</ul>';
  }
}


/////////////// Recent Posts Shortcode ///////////////////
function wp_recentposts() {
  // the query
  $the_query = new WP_Query( array( 'posts_per_page' => 4 ) ); 
     
	// The Loop
  if ( $the_query->have_posts() ) {
    $string .= '<div class="row recent-posts">';
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      
      $string .= '<article class="col-sm-6 post-summary">';            
      if ( has_post_thumbnail() ) {

        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $string .= '<ul class="list-inline post-summary-category">';
          foreach( $categories as $category ) {
            if ( $category->name != 'Featured' ) {
              $string .= '<li class="list-inline-item post-summary-category-item">';
              $string .=      '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '%s posts', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
              $string .= '</li>';
            }
          }
          $string .= '</ul>';
        }				

        $string .= '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'img-fluid' ) ) .'</a>';
        $string .= '<h4 class="post-summary-title">';
        $string .=      '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a>';
        $string .= '</h4>';
        $string .= '<div class="divider-wrap"><hr class="divider divider-left divider-default"></div>';
        $string .= '<div class="post-summary-body">' . get_the_excerpt() . '</div>';

      } else {
          // if no featured image is found
          $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $string .= '<ul class="list-inline post-summary-category">';
          foreach( $categories as $category ) {
            if ( $category->name != 'Featured' ) {
              $string .= '<li class="list-inline-item post-summary-category-item">';
              $string .=      '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '%s posts', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
              $string .= '</li>';
            }
          }
          $string .= '</ul>';
        }				

        $string .= '<h4 class="post-summary-title">';
        $string .=      '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a>';
        $string .= '</h4>';
        $string .= '<div class="divider-wrap"><hr class="divider divider-left divider-default"></div>';
        $string .= '<div class="post-summary-body">' . get_the_excerpt() . '</div>';
      }
      $string .= '</article>';
    } 
    $string .= '</div>';
    return $string;
  /* Restore original Post Data */
  wp_reset_postdata();
  }
}
// Add a shortcode
add_shortcode('recentposts', 'wp_recentposts');

/////////////// Featured Posts Shortcode ///////////////////
function wp_featuredposts() {
  // the query
  $the_query = new WP_Query(
    array(
      'posts_per_page' => 4,
      'category_name' => 'featured',
    )
  ); 
     
	// The Loop
  if ( $the_query->have_posts() ) {
    $string .= '<div class="row recent-posts">';
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      
      $string .= '<article class="col-sm-6 post-summary">';            
      if ( has_post_thumbnail() ) {

        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $string .= '<ul class="list-inline post-summary-category">';
          foreach ( $categories as $category ) {
            if ( $category->name != 'Featured' ) {
              $string .= '<li class="list-inline-item post-summary-category-item">';
              $string .=      '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '%s posts', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
              $string .= '</li>';
            }
          }
          $string .= '</ul>';
        }				

        $string .= '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'img-fluid' ) ) .'</a>';
        $string .= '<h4 class="post-summary-title">';
        $string .=      '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a>';
        $string .= '</h4>';
        $string .= '<div class="divider-wrap"><hr class="divider divider-left divider-default"></div>';
        $string .= '<div class="post-summary-body">' . get_the_excerpt() . '</div>';

      } else {
          // if no featured image is found
          $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $string .= '<ul class="list-inline post-summary-category">';
          foreach( $categories as $category ) {
            if ( $category->name != 'Featured' ) {
              $string .= '<li class="list-inline-item post-summary-category-item">';
              $string .=      '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '%s posts', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
              $string .= '</li>';
            }
          }
          $string .= '</ul>';
        }				

        $string .= '<h4 class="post-summary-title">';
        $string .=      '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a>';
        $string .= '</h4>';
        $string .= '<div class="divider-wrap"><hr class="divider divider-left divider-default"></div>';
        $string .= '<div class="post-summary-body">' . get_the_excerpt() . '</div>';
      }
      $string .= '</article>';
    } 
    $string .= '</div>';
    return $string;
  /* Restore original Post Data */
  wp_reset_postdata();
  }
}
// Add a shortcode
add_shortcode('featuredposts', 'wp_featuredposts');

///////////////// Enable shortcodes in text widgets /////////////////////////
add_filter('widget_text', 'do_shortcode');

////////////////// Overwrite Understrap excerpt settings ////////////////
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
	return $post_excerpt . '...';
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );


//////////// Enable Yoast SEO Customizer //////////////
add_theme_support( 'yoast-seo-breadcrumbs' );

///////////////// BLOG POST META HEADING ////////////////////
if ( ! function_exists ( 'meta_heading' ) ) {
	function meta_heading() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'M j Y' ) ),
			esc_html( get_the_date( 'M j Y' ) )
		);
		$posted_on   = apply_filters(
			'meta_heading', sprintf(
				'<span>%3$s</span>',
				esc_html_x( 'post date', 'understrap' ),
				esc_url( get_permalink() ),
				apply_filters( 'meta_heading_time', $time_string ) 
			)
    );
    
		echo $posted_on; // WPCS: XSS OK.
	}
}

///////////////// CUSTOM PAGINATION STYLING //////////////
if ( ! function_exists ( 'custom_pagination' ) ) {

  function custom_pagination( $args = array(), $class = 'row text-center spacer-tf spacer-bh' ) {

    if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

    $args = wp_parse_args( $args, array(
      'mid_size'           => 2,
      'prev_next'          => false,
      'screen_reader_text' => __( 'Posts navigation' ),
      'type'               => 'array',
      'class'               => 'greg',
      'current'            => max( 1, get_query_var('paged') ),
    ) );

    $links = paginate_links($args);

?>

    <nav aria-label="<?php echo $args['screen_reader_text']; ?>">
      <ul class="row list-inline pagination text-center spacer-tf spacer-bf">
        <?php
          foreach ( $links as $key => $link ) { ?>
            <li class="list-inline-item pagination-number">
                <?php echo( $link ); ?>
            </li>
        <?php } ?>
      </ul>
    </nav>
  <?php
  }
}


////////////// Customizing Understrap Post Navigation  ///////////////
/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists ( 'understrap_post_nav' ) ) {
	function understrap_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
				<nav class="row w-100 navigation post-navigation">
					<h2 class="sr-only"><?php _e( 'Post navigation', 'understrap' ); ?></h2>
					<div class="row nav-links justify-content-between">
						<?php

							if ( get_previous_post_link() ) {
								previous_post_link( '<span class="nav-previous">%link</span>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'understrap' ) );
							}
							if ( get_next_post_link() ) {
								next_post_link( '<span class="nav-next">%link</span>',     _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'understrap' ) );
							}
						?>
					</div><!-- .nav-links -->
				</nav><!-- .navigation -->

		<?php
	}
}
?>
