<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

	<header class="entry-header">
		<?php 
		if ( !has_post_thumbnail() ) :
			the_title( '<h1 class="entry-title">', '</h1>' ); 
		endif;
		?>
		<?php the_content(); ?>
	</header><!-- .entry-header -->
