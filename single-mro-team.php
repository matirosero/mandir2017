<?php
/**
 * The template for displaying all team members.
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

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

				<div class="row">
					<div class="medium-10 medium-centered large-9 columns">

					<?php get_template_part( 'template-parts/team/content', 'single' ); ?>

					</div><!-- .columns -->
				</div><!-- .row -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer();