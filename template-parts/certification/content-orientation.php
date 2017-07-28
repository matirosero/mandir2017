<?php
global $post;

// Orientation date
if ( get_post_meta($id, 'mro_training_show_orientation', true) == 1 ):
	$orientation_date = get_post_meta($id, 'mro_training_orientation_date', true);
	$orientation_date = mandir_convert_date($orientation_date, 'l j \d\e F, Y');

	$orientation_time = get_post_meta($id, 'mro_training_orientation_time', true);
	?>
	<div class="sidebar-section">
		<h3>Orientación</h3>
		<p>
			<?php echo $orientation_date; ?> a las <?php echo $orientation_time; ?> en Yoga Mandir.
			<br />
			<strong>Asistencia obligatoria.</strong>
		</p>
	</div><!-- .sidebar-section -->
<?php endif; 