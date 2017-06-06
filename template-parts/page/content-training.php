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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/page/content', 'header-intro' ); ?>

	<div class="row entry-content">

		<div class="large-8 columns">

			<?php
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

			<h2>Profesorado</h2>
			<?php
			echo get_post_meta($post->ID, 'mro_training_teachers', true);
			?>



			<?php
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

		<div class="large-4 columns">
			<div class="sidebar">
				<h2>Próximo entrenamiento</h2>

				<?php
				$exact_dates = true;
				if ( get_post_meta($post->ID, 'mro_training_exact_dates', true) == 0 ) :
					$exact_dates = false;
				endif;

				if ( $exact_dates ) :
					$dateformatstring = 'j \d\e F, Y';
				else:
					$dateformatstring = 'F Y';
				endif;

				$date_start = get_post_meta($id, 'mro_training_date_start', true);
				$date_start = mandir_convert_date($date_start, $dateformatstring);

				$date_end = get_post_meta($id, 'mro_training_date_end', true);
				$date_end = mandir_convert_date($date_end, $dateformatstring);

				if ( $exact_dates ) :
					$dates = 'Del '.$date_start.' al '.$date_end;
				else:
					$dates = 'De '.$date_start.' a '.$date_end;
				endif;
				?>

				<p><?php echo $dates; ?></p>

				<?php
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
				$days = get_post_meta( $id, 'mro_training_days', false );
				$days = ucfirst( implode ( ', ' , $days ) );

				$time_start = get_post_meta( $id, 'mro_training_time_start', true );
				$time_end = get_post_meta( $id, 'mro_training_time_end', true );

				$workshops = get_post_meta( $id, 'mro_training_workshops', true );
				?>
				<div class="sidebar-section">
					<h3>Horario</h3>
					<p>
						<?php echo $days; ?>.<br />
						De <?php echo $time_start; ?> a <?php echo $time_end; ?>.
					</p>
					<p>
						<?php echo $workshops; ?>
					</p>
				</div><!-- .sidebar-section -->

			</div>
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->