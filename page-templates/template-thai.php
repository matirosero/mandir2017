<?php
/**
 * Template Name: Masaje Tai
 * The template for displayingg thai massage course information.
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
				</div><!-- .row column -->

				<div class="row">
					<?php get_template_part( 'template-parts/page/content', 'training' ); ?>
				</div><!-- .row -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
