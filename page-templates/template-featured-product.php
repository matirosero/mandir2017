<?php
/**
 * Template Name: Featured Product
 * The template for displaying Featured Product page.
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

				<div class="row">
					<div class="medium-10 medium-centered large-9 columns">
						<?php get_template_part( 'template-parts/store/content', 'featured-info' ); ?>
					</div><!-- .columns -->
				</div><!-- .row -->

				<div class="page-section row column">
					<?php get_template_part( 'template-parts/store/content', 'featured-pricing' ); ?>
				</div><!-- .page-section -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->



<?php get_footer(); ?>
