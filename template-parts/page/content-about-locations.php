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

	<div class="medium-7 large-8 columns">
	<?php
		$map_shortcode = get_post_meta( $id, 'mro_about_map_shortcode', true );
		echo do_shortcode( $map_shortcode );
		?>
	</div><!-- .columns -->

	<div class="medium-5 large-4 columns">
		<h2>Dónde estamos</h2>

		<?php
		$locations = get_post_meta( $id, 'mro_about_locations', true ); ?>

		<ul class="locations">
			<?php foreach ( $locations as $location ) {
				echo '<li><h4 class="location-title">'.$location['name'].'</h4>
					<p>'.$location['address'].'</p>
					<p>Tel. <a href="tel:'.$location['tel'].'">'.$location['tel'].'</a></p></li>';
			}
			?>
		</ul>
	</div><!-- .spotlight-image -->

</div><!-- .row -->




