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


		if ( is_page_template( array( 
				'page-templates/template-events.php',
				'page-templates/template-store.php',
				'page-templates/template-training.php',
			) ) ) :
			the_content(); 
		else:
			echo wpautop( get_post_meta($post->ID, 'mro_page_intro', true) );
		endif;?>
	</header><!-- .entry-header -->
