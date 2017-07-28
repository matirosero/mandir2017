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

	<div class="medium-4 medium-push-8 columns">
		<div id="secondary" class="quick-info" role="complementary">

			<div class="sidebar-heading">
				<h2>Próxima edición</h2>

				<?php $dates = mro_certification_dates(); ?>

				<p><?php echo $dates; ?></p>

			</div><!-- .sidebar-heading -->

			<?php
			//Orientation
			get_template_part( 'template-parts/certification/content', 'orientation' ); 
			?>

			<?php
			//Duration
			if ( get_post_meta($post->ID, 'mro_training_duration', true) ) : ?>

				<div class="sidebar-section">
					<h3><?php _e('Duration','mandir'); ?></h3>

					<?php
					$duration = nl2br( get_post_meta($post->ID, 'mro_training_duration', true) );
					?>

					<p><?php echo $duration; ?></p>

				</div><!-- .sidebar-section -->

			<?php endif; ?>


			<div class="sidebar-section">
				<h3><?php _e('Schedule','mandir'); ?></h3>

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
	<div class="medium-8 medium-pull-4 columns">

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

			<?php if ( get_post_meta($post->ID, 'mro_training_teachers_image', true) ) : ?>

				<?php
				$teachers_img_id = get_post_meta($post->ID, 'mro_training_teachers_image', true);
				$teachers_imgsrcset = wp_get_attachment_image($teachers_img_id, 'medium');
				?>

				<div class="row">


					<div class="medium-8 medium-push-4 large-9 large-push-3 columns">

						<?php echo wpautop( get_post_meta($post->ID, 'mro_training_teachers', true) );
						?>
					</div>

					<div class="medium-4 medium-pull-8 large-3 large-pull-9 columns">

						<div class="profile-image"><?php echo $teachers_imgsrcset; ?></div>
					</div>

				</div><!-- .row -->

			<?php else : 
				echo wpautop( get_post_meta($post->ID, 'mro_training_teachers', true) );
			endif; ?>

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

