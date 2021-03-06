<?php
/**
 * Template Name: Class Schedule
 * The template for displaying class schedule, on a full width page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="row column">
					<?php get_template_part( 'template-parts/page/content', 'header-intro' ); ?>

					<?php get_template_part( 'template-parts/page/content', 'schedule' ); ?>

					<?php get_template_part( 'template-parts/page/content', 'pricing' ); ?>
				</div><!-- .row column -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
