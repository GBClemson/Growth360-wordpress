<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article class="col-sm-6 post-summary" id="post-<?php the_ID(); ?>">	
  
  <a href=" <?php echo get_the_permalink() ?> " rel="bookmark"> <?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'img-fluid' ) ) ?> </a>

	<h4 class="post-summary-title">
    <a href=" <?php echo get_the_permalink() ?> " rel="bookmark"> <?php echo get_the_title() ?> </a>
  </h4>

  <div class="divider-wrap"><hr class="divider divider-left divider-default"></div>
  <div class="post-summary-body"> <?php the_excerpt() ?> </div>

</article>
