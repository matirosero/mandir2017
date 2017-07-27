<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

					<?php get_template_part( 'template-parts/page/content', 'header-intro' ); ?>
					<?php get_template_part( 'template-parts/page/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>

			</div><!-- .columns -->
		</div><!-- .row -->

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer();