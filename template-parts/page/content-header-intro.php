<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<?php if ( get_post_meta($post->ID, 'mro_page_intro', true) ) : ?>
	<header class="entry-header">
		<?php
		if ( !has_post_thumbnail() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;

		echo wpautop( get_post_meta($post->ID, 'mro_page_intro', true) );

		?>
	</header><!-- .entry-header -->
<?php endif; ?>
