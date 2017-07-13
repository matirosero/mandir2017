<?php
/**
 * Template Name: Full Width (no sidebar)
 * The template for displaying a full width page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="row">
			<div class="medium-10 medium-centered large-9 columns">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/page/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>

			</div><!-- .columns -->
		</div><!-- .row -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
