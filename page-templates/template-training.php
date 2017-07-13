<?php
/**
 * Template Name: Teacher Training
 * The template for displaying Teacher Training program information.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="row column">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/page/content', 'training' ); ?>

			<?php endwhile; // End of the loop. ?>

		</div><!-- .row -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
