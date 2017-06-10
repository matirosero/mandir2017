<?php
/**
 * Template Name: Store
 * The template for displaying Store page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>



<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/page/content', 'store' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->



<?php get_footer(); ?>
