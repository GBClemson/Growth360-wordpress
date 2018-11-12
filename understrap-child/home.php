<?php
/**
 * The blog posts template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

      <div class="col-md-8 offset-md-4 order-0 blog-title-wrapper">
        <h1 class="blog-title text-center">Our Blog</h1>
      </div><!-- .archive-title-wrapper -->
      <div class="w-100"></div>

			<!-- Do the left sidebar check and opens the primary div -->
      <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
      
      <div class="row category-list">
        <div class="col-12 blog-filter-box">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a class="blog-filter active" href="http://localhost:3000/growth360/blog">ALL</a>
            </li>
            <?php
            $categories = get_categories( array(
                'orderby' => 'name',
                'order'   => 'ASC',
                'exclude' => array(1,3,7)
            ) );
            
            foreach( $categories as $category ) {
              $category_link = sprintf( 
                '<li class="list-inline-item"><a class="blog-filter" href="%1$s" alt="%2$s">%3$s</a></li>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                esc_html( $category->name )
              );
              
              echo ( $category_link );
            }
            ?>
          </ul>
        </div>
      </div>

			<div class="row recent-posts">

        <?php
          global $query_string;
          query_posts( $query_string . '&posts_per_page=8' );
        ?>

				<?php if ( have_posts() ) : ?>

          <?php /* Start the Loop */ ?>

          <?php
            $gregCount = 0; //set up counter variable
            while (have_posts()) : the_post($gregCount);
          ?>            
              
          <?php
            if (  $gregCount < 2 || $gregCount > 5 ) {
              get_template_part( 'loop-templates/content', 'blog-summary-1' );                
            } else if ( $gregCount == 2 ) {
              get_template_part( 'loop-templates/content', 'blog-summary-2' );            
            } else if ( $gregCount == 3 ) {
              echo ('<div class="col-sm-6 post-summary">');
              get_template_part( 'loop-templates/content', 'blog-summary-3' );
            } else if ( $gregCount > 3 && $gregCount < 5 ) {
              get_template_part( 'loop-templates/content', 'blog-summary-3' );
            } else if ( $gregCount == 5 ) {
              get_template_part( 'loop-templates/content', 'blog-summary-3' );
              echo ('</div>');
            }              

            $gregCount++; //increment the variable by 1 each time the loop executes            
          ?>            

          <?php endwhile; ?>

          <?php else : ?>

            <?php _e('Sorry, no posts matched your criteria.'); ?>

        <?php endif; ?>

			</div><!-- #main -->

			<!-- The pagination component -->
      <?php custom_pagination(); ?>
      
      <!-- About Us Box -->
      <div class="row">          
        <div id="about-us" class="col-12">
          <div class="row align-items-center">
            <div class="col-2 about-left">
              <span class="about-left-text">ABOUT US</span>
            </div><!--.about-left-->
            <div class="col-10 about-right">
              <p>
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum.
              </p>
              <button id="about-btn" type="submit" class="btn btn-outline-dark">LEARN MORE</button>
            </div><!--.about-right-->
          </div><!--.row-->
        </div><!--#about-us-->
      </div><!--.row-->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

<?php get_footer(); ?>
