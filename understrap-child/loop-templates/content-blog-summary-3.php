<?php
/**
 * Blog post summary partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>


<?php


  $post = get_post();

  $categories = get_the_category( $post->ID );
  $output =  '<a class="post-bullet-wrap" href="' . get_the_permalink() . '">';
  $output .=  '<div class="col-12 post-bullet btn-white spacer-bh">';
  if ( ! empty( $categories ) ) {
    $output .= '<ul class="list-inline post-bullet-category w-100">';
    foreach( $categories as $category ) {
      if ( $category->name != 'Featured' ) {
        $output .= '<li class="list-inline-item post-bullet-category-item">' . esc_html( $category->name ) . '</li>';
      }
    }
    $output .= '</ul>';
  }
  $output .= '<h4 class="post-bullet-title">' . get_the_title() . '</h4>';
  $output .=  '</div>';
  $output .= '</a>';

  echo trim( $output );

?>
