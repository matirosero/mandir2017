<?php
/**
 * Template part for displaying teacher training content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

// global $mandir_settings;
$mandir_settings = get_option('mandir_fields');
?>

<div class="row">

	<div class="medium-7 large-8 columns">

		<?php
		$map_shortcode = $mandir_settings['mro_locations_map_shortcode'];
		echo do_shortcode( $map_shortcode );
		?>

	</div><!-- .columns -->

	<div class="medium-5 large-4 columns">
		<h2>Dónde estamos</h2>

		<?php
		$locations = $mandir_settings['mro_locations']; ?>

		<ul class="locations">
			<?php foreach ( $locations as $location ) {
				echo '<li><h4 class="location-title">'.$location['title'].'</h4>
					<p>'.$location['address'].'</p>
					<p>Tel. <a href="tel:'.$location['phone'].'">'.mandir_format_phone_link($location['phone']).'</a></p></li>';
			}
			?>
		</ul>
	</div><!-- .spotlight-image -->

</div><!-- .row -->




