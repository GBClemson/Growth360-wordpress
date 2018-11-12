<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <div class="row">
    <header class="w-100 blog-post-header">
      <div class="col-12 blog-post-box"></div>
    </header><!-- .blog-post-header -->
  </div><!-- .row -->

  <div class="row blog-post-content">

    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div class="col-12 order-1 breadcrumb-wrapper spacer-tl spacer-bl"><p id="breadcrumbs">','</p></div>' );
      }
    ?>

    <div class="col-sm-4 blog-post-side order-3 order-sm-2">            
      <div class="social-icon-list-blog">
        <ul class="list-unstyled">
          <li class="list-item">
            <a href="http://twitter.com/" target="_blank">
              <i class="flaticon-twitter-logo-button"></i>
            </a>
          </li>
          <li class="list-item">
            <a href="http://facebook.com/" target="_blank">
              <i class="flaticon-facebook-logo-button"></i>
            </a>
          </li>
        </ul>
      </div>

      <div class="quote-block">
        <blockquote>
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy tu.
          <footer>Quote author here</footer>
        </blockquote>
      </div>

      <div>
        <button type="button" class="btn btn-outline-secondary" id="btn-resources">Resources</button>
        <div class="w-100"></div>
        <ul class="list-unstyled resources-list">
          <li class="list-item">
            <a href="#" target="_blank">
              Link Number 1
            </a>
          </li>
          <li class="list-item">
            <a href="#" target="_blank">
              Link Number 2
            </a>
          </li>
          <li class="list-item">
            <a href="#" target="_blank">
              Link Number 3
            </a>
          </li>
          <li class="list-item">
            <a href="#" target="_blank">
              Link Number 4
            </a>
          </li>
        </ul>
      </div>
    </div><!-- .blog-post-side -->

    <div class="col-sm-8 blog-post-main order-2 order-sm-3">
      
      <div class="col-12 blog-post-meta">
        <?php meta_heading(); ?>
        <!--<div class="w-100"></div>-->  
        <?php
          $post = get_post();
          if ( $post ) {
            $categories = get_the_category( $post->ID );
            $output = '';
            if ( ! empty( $categories ) ) {
              $output .= '<ul class="list-inline post-category">';
              foreach( $categories as $category ) {
                if ( $category->name != 'Featured' ) {
                  $output .= '<li class="list-inline-item post-category-item">';
                  $output .=      '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '%s posts', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
                  $output .= '</li>';
                }
              }
              $output .= '</ul>';
              echo trim( $output );
            }
          }
        ?>       
        
        <div class="w-100"></div>

      </div><!-- .blog-post-meta -->

      <?php the_content(); ?>

    </div>

  </div><!-- .blog-post-content -->

</article><!-- #post-## -->
