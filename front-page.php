<?php
/**
 * The front-page.php template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section id="page-intro" class="page-section row">

				<div class="medium-10 medium-centered columns">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_title( '<h2 class="section-title">', '</h2>' ); ?>

					<?php the_content(); ?>

				<?php endwhile; // End of the loop. ?>
				</div>
			</section><!-- .page-section -->

			<?php get_template_part( 'template-parts/home/content', 'links' ); ?>

			<?php get_template_part( 'template-parts/home/content', 'events' ); ?>

			<?php //get_template_part( 'template-parts/home/content', 'spotlight' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
