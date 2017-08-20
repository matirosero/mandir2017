<?php
/**
 * Template part for displaying single team content.
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

				<?php
				$srcset_sizes = array(
					array( 600, 600, true ),
					array( 400, 400, true ),
					array( 300, 300, true ),
					array( 200, 200, true ),
					);
				$sizes = '(min-width: 640px) 300px, 200px';
				$alt = get_the_title();
				$srcset = mandir_srcset($srcset_sizes, $sizes, $alt);
				echo $srcset;
				?>

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
		// $imgsrcset = wp_get_attachment_image($img_id, 'full');
		$imgsrcset = ipq_get_theme_image( $img_id, array(
				        array( 1280, 640, true ),
				        array( 900, 450, true ),
				        array( 640, 320, true ),
				        array( 414, 207, true ),
				    ),
				    array(
				        'class' => ''
				    )
				);
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
