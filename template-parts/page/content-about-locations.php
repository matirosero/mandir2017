<?php
/**
 * Template part for displaying teacher training content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<div class="row">

	<div class="medium-6 columns">
	<?php
		$map_shortcode = get_post_meta( $id, 'mro_about_map_shortcode', true );
		echo do_shortcode( $map_shortcode );
		?>
	</div><!-- .columns -->

	<div class="medium-6 columns">
		<h2>Dónde estamos</h2>

		<?php
		$locations = get_post_meta( $id, 'mro_about_locations', true ); ?>

		<ul class="locations">
			<?php foreach ( $locations as $location ) {
				echo '<li><h4>'.$location['name'].'</h4>
					<p>'.$location['address'].'</p>
					<p>Tel. '.$location['tel'].'</p></li>';
			}
			?>
		</ul>
	</div><!-- .spotlight-image -->

</div><!-- .row -->




