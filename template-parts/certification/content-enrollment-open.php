<?php


$date_start = get_post_meta($post->ID, 'mro_training_date_start', true);
$year_start = mandir_convert_date($date_start, 'Y');

$enroll_method = get_post_meta($post->ID, 'mro_training_enroll_how', true);

?>

<div class="row">
	<div class="small-12 columns">
		<div class="enrollment-notice">
			<h2><?php printf( esc_html__( 'Enrollment open for %d teacher training', 'my-text-domain' ), $year_start ); ?></h2>
			<p>Lea cuidadosamente la información en esta página, y llene el formulario de aplicación.</p>

			<?php
			if ( $enroll_method == 'form' ) : 

				$enroll_shortcode = get_post_meta($post->ID, 'mro_training_enroll_shortcode', true);
				echo apply_filters('the_content', $enroll_shortcode);

			elseif ( $enroll_method == 'url' ) :

				$enroll_url = get_post_meta($post->ID, 'mro_training_enroll_url', true); ?>
				<p><a class="expanded button" href="<?php echo $enroll_url; ?>">Aplique aquí</a></p>

			<?php endif; ?>
		</div>
	</div>
</div><!-- .row -->


