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
$exact_dates = true;
if ( get_post_meta($post->ID, 'mro_training_exact_dates', true) == 0 ) :
	$exact_dates = false;
endif;

$date_start = get_post_meta($id, 'mro_training_date_start', true);
$date_end = get_post_meta($id, 'mro_training_date_end', true);
$state = get_post_meta($post->ID, 'mro_training_state', true);
$types = get_post_meta($post->ID, 'mro_training_types', true);
$reservation = get_post_meta($post->ID, 'mro_training_reserve', true);
$options  = get_post_meta($post->ID, 'mro_training_payment_options', true);
?>

<?php
/*
 TO DO:
 Move main and side column into their own template part
 Training folder?
*/
?>

<div class="entry-content">

	<div class="medium-5 medium-push-7 large-4 large-push-8 columns">
		<div id="secondary" class="quick-info" role="complementary">
			
			<div class="sidebar-heading">
				<h2>Próximo entrenamiento</h2>

				<?php
				if ( $exact_dates ) :
					$dateformatstring = 'j \d\e F, Y';
				else:
					$dateformatstring = 'F Y';
				endif;

				$date_start = mandir_convert_date($date_start, $dateformatstring);
				$date_end = mandir_convert_date($date_end, $dateformatstring);

				if ( $exact_dates ) :
					$dates = 'Del '.$date_start.' al '.$date_end;
				else:
					$dates = 'De '.$date_start.' a '.$date_end;
				endif;
				?>

				<p><?php echo $dates; ?></p>

			</div><!-- .sidebar-heading -->

			<?php
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
			<?php endif; ?>

			<?php
			//Types
			if ( count($types) > 0 ) : ?>

				<div class="sidebar-section">
					<h3>Modalidad<?php if ( count($types) > 1 ) { echo 'es'; } ?></h3>

					<?php
					foreach ($types as $type) { ?>
						<p>
							<strong><?php echo $type['title']; ?>:</strong><br />
							<?php echo nl2br($type['description']); ?>
						</p>
					<?php } ?>
				</div><!-- .sidebar-section -->

			<?php endif; ?>


			<?php
			// Schedule

			// Schedule as separate meta
			// $days = get_post_meta( $id, 'mro_training_days', false );
			// $days = ucfirst( implode ( ', ' , $days ) );
			// $time_start = get_post_meta( $id, 'mro_training_time_start', true );
			// $time_end = get_post_meta( $id, 'mro_training_time_end', true );
			// $workshops = get_post_meta( $id, 'mro_training_workshops', true );


			?>
			<div class="sidebar-section">
				<h3>Horario</h3>

				<?php
				$i = 0;
				foreach ($types as $schedule) {
					$days = $schedule['days'];
					$days = ucfirst( implode ( ', ' , $days ) );

					$time_start = $schedule['time_start'];
					$time_end = $schedule['time_end'];

					$workshops = $schedule['workshops'];

					?>
					<p>
						<?php
						if ( $i != 0) :
							echo '<strong>Adicional para '.$schedule['title'].':</strong><br />';
						endif;
						echo $days; ?>.<br />
						De <?php echo $time_start; ?> a <?php echo $time_end; ?>.
					</p>
					<p>
						<?php echo $workshops; ?>
					</p>

					<?php
					$i++;
				} ?>

			</div><!-- .sidebar-section -->

			<div class="sidebar-section">
				<h3>Inversión</h3>
				<ul>
				<?php
				foreach ($types as $price) { ?>
					<li>
						$<?php echo $price['price'].' – '.$price['title']; ?>
					</li>
				<?php } ?>
				</ul>
			</div><!-- .sidebar-section -->

			<div class="sidebar-section">
				<h3>Reserva de cupo</h3>
				<p>
					<strong>$<?php echo $reservation['price']; ?></strong><br />
					<?php echo $reservation['description']; ?>
				</p>
			</div><!-- .sidebar-section -->

			<div class="sidebar-section">
				<h3>Forma de pago</h3>
				<ul>
				<?php
				//var_dump($options);
				foreach ($options as $option) { ?>
					<li>
						<?php
						$option_title ='';
						$payments = $option['payments'];

						if ( $payments > 1 ) :
							$option_title = '<strong>'.$payments.' pagos adicionales</strong>';
						elseif ( $payments == 1 ):
							$option_title = '<strong>'.$payments.' pago adicional</strong>';
						endif;

						if ( $option['discount'] ) :
							$option_title .= ' <span class="discount">Descuento de $'.$option['discount'].'</span>';
						endif; 

						echo $option_title;

						$desc = $option['description']; 

						echo '<ul>';

						foreach ($types as $type) { 
							$payment = ( $type['price']-$option['discount'] ) / $payments;
							?>
							<?php //var_dump($type); ?>
							<li>
								<?php echo '<strong>'.$type['title'].':</strong> $'.$payment.' '.$desc; ?>
							</li>
						<?php }

						echo '</ul>';

						?>
					</li>

				<?php } ?>
				</ul>
			</div><!-- .sidebar-section -->

		</div>
	</div>
	<div class="medium-7 medium-pull-5 large-8 large-pull-4 columns">

		<?php

		the_content();
		//Curriculum
		if ( get_post_meta($post->ID, 'mro_training_curriculum', true) ) :
			$curriculum = get_post_meta($post->ID, 'mro_training_curriculum', true);
			?>
			<h2>Curriculum</h2>
			<ul>
			<?php
			foreach ( $curriculum as $module ) {
				echo '<li><strong>'.$module['title'].':</strong> '.$module['length'].'<br />
					'.$module['description'].'</li>';
			} ?>
			</ul>
		<?php endif; ?>

		<?php
		//Recommendations
		if ( get_post_meta($post->ID, 'mro_training_recs', true) ) :
			$recs = get_post_meta($post->ID, 'mro_training_recs', true);
			?>
			<h2>Recomendaciones</h2>
			<ul>
			<?php
			foreach ( $recs as $rec ) {
				echo '<li>'.$rec['rec'].'</li>';
			} ?>
			</ul>
		<?php endif; ?>

		<?php
		// Certification
		if ( get_post_meta($post->ID, 'mro_training_certification', true) ) :
			$certification_list = get_post_meta($post->ID, 'mro_training_certification', true);
			?>
			<h2>Reconocimiento</h2>
			<ul>
			<?php
			foreach ( $certification_list as $li ) {
				echo '<li>'.$li['point'].'</li>';
			} ?>
			</ul>
		<?php endif; ?>

		<?php
		// Teachers
		if ( get_post_meta($post->ID, 'mro_training_teachers', true) ) :
			?>
			<h2>Profesorado</h2>
			<?php
			$teachers_img_id = get_post_meta($post->ID, 'mro_training_teachers_image', true);

			$teachers_imgsrcset = wp_get_attachment_image($teachers_img_id, 'medium');

			echo '<div class="profile-image alignleft">'.$teachers_imgsrcset.'</div>';

			echo wpautop( get_post_meta($post->ID, 'mro_training_teachers', true) );
			?>
		<?php endif; ?>


		<?php
		// How to enroll
		if ( get_post_meta($post->ID, 'mro_training_howtoenroll', true) ) :
			$steps = get_post_meta($post->ID, 'mro_training_howtoenroll', true);
			?>
			<h2>Proceso de matrícula</h2>
			<ol>
			<?php
			foreach ( $steps as $step ) {
				echo '<li>'.$step['point'].'</li>';
			} ?>
			</ol>
		<?php endif; ?>
	</div>

</div><!-- .entry-content -->

