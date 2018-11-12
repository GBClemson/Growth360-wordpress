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
  
  $output = '<article class="col-sm-6 post-summary">';
  $post = get_post();
  $categories = get_the_category( $post->ID );
  
  $output .= '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'img-fluid' ) ) .'</a>';
  
  if ( ! empty( $categories ) ) {
    $output .= '<ul class="list-inline post-summary-category">';
    foreach( $categories as $category ) {
      if ( $category->name != 'Featured' ) {
        $output .= '<li class="list-inline-item post-summary-category-item">';
        $output .=      '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '%s posts', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
        $output .= '</li>';
      }
    }
    $output .= '</ul>';
  }
  
  $output .= '<h4 class="post-summary-title">';
  $output .=    '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a>';
  $output .= '</h4>';
  $output .= '<div class="divider-wrap"><hr class="divider divider-left divider-default"></div>';
  $output .= '<div class="post-summary-body">' . get_the_excerpt() . '</div>';

  $output .= '</article>';

  echo trim( $output );

?>
