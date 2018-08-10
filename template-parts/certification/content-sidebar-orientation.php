<?php
global $post;

// Orientation date
if ( get_post_meta($id, 'mro_training_show_orientation', true) == 1 ):
	$orientation_date = get_post_meta($id, 'mro_training_orientation_date', true);
	

	$orientation_time = get_post_meta($id, 'mro_training_orientation_time', true);
	?>
	<div class="sidebar-section">

		<?php if ( is_english() ) : ?>

			<h3>Orientation</h3>
			<p>
				<?php echo $orientation_date; ?>, <?php echo $orientation_time; ?> at Yoga Mandir.
				<br />
				<strong>Mandatory attendance.</strong>
			</p>

		<?php else : 
			$orientation_date = mandir_convert_date($orientation_date, 'l j \d\e F, Y');
			?>

			<h3><?php _e('Orientation','mandir'); ?></h3>
			<p>
				<?php echo $orientation_date; ?> a las <?php echo $orientation_time; ?> en Yoga Mandir.
				<br />
				<strong>Asistencia obligatoria.</strong>
			</p>
		<?php endif; ?>



	</div><!-- .sidebar-section -->
<?php endif; 