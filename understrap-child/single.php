<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'other' );

$container   = get_theme_mod( 'understrap_container_type' );
?>


<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

  <div class="row">

    <?php while ( have_posts() ) : the_post(); ?>

    <div class="col-md-8 offset-md-4 order-0 blog-post-title-wrapper">
        <?php the_title( '<h1 class="blog-post-title text-left">', '</h1>' ); ?>
    </div>
    <div class="w-100"></div>

    <!-- Do the left sidebar check -->
    <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

    <main class="blog-post" id="main">            

      <?php get_template_part( 'loop-templates/content', 'single' ); ?>


      <?php
        //for use in the loop, list 5 post titles related to first tag on current post
        // functional example found at: https://bit.ly/2RLVogj
        $tags = wp_get_post_tags($post->ID);
        if ($tags) {
          $first_tag = $tags[0]->term_id;
          $my_query = new WP_Query( array(
            'tag__in' => array($first_tag),
            'post__not_in' => array($post->ID),
            'posts_per_page'=>2,
            'caller_get_posts'=>1
          ));
          if( $my_query->have_posts() ) {
      ?>
            <div class="row">
              <h1 class="post-summary-header">Related Posts</h1>
            </div>
            <div class="row recent-posts">
      <?php
              while ($my_query->have_posts()) : $my_query->the_post();
                  get_template_part( 'loop-templates/content', 'blog-related' );            
              endwhile;

      ?>
            </div>
            <div class= "row">
              <a role="button" class="btn btn-secondary post-summary-btn" href="<?php echo esc_url( get_category_link( $tags[0]->term_id ) ) ?>">LOAD MORE</a>
            </div>

      <?php
          }
        wp_reset_query();
        }
      ?>
            

      <?php
      
        understrap_post_nav();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>

    </main><!-- #main -->
        
    <?php endwhile; // end of the loop. ?>

    <!-- Do the right sidebar check -->
    <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

  </div><!-- .row -->

</div><!-- Container end -->

<?php get_footer(); ?>
