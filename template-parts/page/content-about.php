<?php
/**
 * Template part for displaying teacher training content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<?php


?>

<div class="spotlight expanded collapse row" data-equalizer data-equalize-on="medium">

	<div class="medium-6 large-5 columns">
		<div class="spotlight-content" data-equalizer-watch>
			<?php the_content( ); ?>
		</div><!-- .spotlight-content -->
	</div><!-- .columns -->

	<div class="spotlight-image medium-6 large-7 columns hide-for-small-only" data-equalizer-watch>
		<?php
		if ( get_post_meta( $id, 'mro_about_secondary_image', true ) ) :
			$img_id = get_post_meta($id, 'mro_about_secondary_image', true);
			// $imgsrcset = wp_get_attachment_image($img_id, 'full');
			$srcset_sizes = array(
				array( 1280, 9999, false ),
				array( 1024, 9999, false ),
				array( 640, 9999, false ),
				array( 512, 9999, false ),
				array( 20, 20, true ),
				);
			$sizes = '(min-width: 1024px) 60vw, (min-width: 640px) 50vw, 1vw';
			$alt = 'Los profes de Yoga Mandir';
			$imgsrcset = mandir_srcset($srcset_sizes, $sizes, $alt, $img_id);
			echo $imgsrcset;
		endif;
		?>
	</div><!-- .spotlight-image -->

</div><!-- .row -->




