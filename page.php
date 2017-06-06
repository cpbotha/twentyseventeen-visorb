<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/* 
 * cpb visorb: if sidebar is active
 * - remove page-two-column, add page-one-column and has-sidebar classes
 * - this will ensure the sidebar on the right, and the page heading to
 *   be shown above the content, not to its left.
 */
function psts_body_classes( $classes ){
if ( is_active_sidebar( 'sidebar-1' ) ) {
                $classes = str_replace('page-two-column', '', $classes);
		$classes[] = 'has-sidebar page-one-column';
	}
	return $classes;
}

add_filter( 'body_class', 'psts_body_classes' );

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

        <!-- cpb visorb: add sidebar on pages -->
        <?php get_sidebar(); ?>


</div><!-- .wrap -->

<?php get_footer();
