<?php
/**
 * Template Name: About Us
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

			<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

				<div class="row">
					<div class="medium-10 medium-centered large-9 columns">
						<?php get_template_part( 'template-parts/page/content', 'header-intro' ); ?>
					</div><!-- .columns -->
				</div><!-- .row -->

				<div class="row">
					<div class="medium-10 medium-centered large-9 columns">	
						<?php get_template_part( 'template-parts/page/content', 'about-us' ); ?>
					</div><!-- .columns -->
				</div><!-- .row -->

		
			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->



<?php get_footer(); ?>
