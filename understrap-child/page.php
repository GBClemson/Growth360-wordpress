<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'home' );

$container   = get_theme_mod( 'understrap_container_type' );

get_template_part( 'global-templates/hero' );

?>

<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <div class="row">

        <!-- Do the left sidebar check and opens the primary div -->
        <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'loop-templates/content', 'empty' ); ?>

        <?php endwhile; // end of the loop. ?>

        <!-- The pagination component -->
        <?php understrap_pagination(); ?>

        <!-- Do the right sidebar check -->
        <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		
	</div><!-- .row -->

</div><!-- Container end -->

<?php get_footer(); ?>
