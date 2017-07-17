<?php
/**
 * Template part for displaying team content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( has_post_thumbnail() ) : ?>
			<div class="profile-image">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif;
		the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php
	if ( get_post_meta( $id, 'mro_team_secondary_image', true ) ) :
		$img_id = get_post_meta($id, 'mro_team_secondary_image', true);
		$imgsrcset = wp_get_attachment_image($img_id, 'full');
		echo '<div class="profile-image-secondary">'.$imgsrcset.'</div>';
	endif;
	?>

	<footer class="entry-footer">
		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'mandir' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
