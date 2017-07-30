<?php

$modules = get_post_meta($post->ID, 'mro_training_modules', true);
$same_teacher = get_post_meta($post->ID, 'mro_thai_teachers_same', true);



//Modules
if ( !empty($modules[0]['title']) ) :
	foreach ( $modules as $module ) {

		$levels = $module['level'];
		$count = count($levels);

		$module_start = $levels[0]['date_start'];
		$module_start = mandir_convert_date( $module_start );

		$module_end = $levels[$count-1]['date_end'];
		$module_end = mandir_convert_date( $module_end );
		?>

		<h2><?php echo $module['title']; ?></h2>

		<div class="module-meta">

			<span class="module-dates">
				<?php printf( esc_html__( 'From %1$s to %2$s', 'mandir' ), $module_start, $module_end ); ?>
			</span>

			<?php

			$issued_by = $module['certificate'];

			if ( !empty($issued_by[0]) ) { 
				$last = array_pop($issued_by);
				$issued_by = implode(', ', $issued_by).__(' and ', 'mandir').$last; ?>

				<span class="module-certificate">
					<?php printf( esc_html__( 'Certificate issued by %1$s ', 'mandir' ), $issued_by ); ?>
				</span>

			<?php } ?>
		</div>

		<?php echo wpautop( $module['description'] ); ?>

		<?php
		if ( !empty( $module['who'] ) ) : ?>
			<h3><?php _e('Who this course is for','mandir'); ?></h3>
			<?php echo wpautop( $module['who'] ); ?>
		<?php endif; ?>

		<?php

		/*
		 * Levels
		 */

		$levels = ($module['level']);
		if ( !empty( $levels[0]['level_title'] ) ) : ?>

			<div class="row module-levels">

				<?php foreach ( $levels as $level ) { 

					$date_start = $level['date_start'];
					$date_start = mandir_convert_date( $date_start );

					$date_end = $level['date_end'];
					$date_end = mandir_convert_date( $date_end );
					?>

					<div class="large-6 columns">

						<h3><?php echo $level['level_title']; ?></h3>

						<p class="module-dates">
							<?php printf( esc_html__( 'From %1$s to %2$s', 'mandir' ), $date_start, $date_end ); ?>
						</p>

						<?php echo wpautop( $level['curriculum'] ); ?>

					</div>

				<?php } ?>

			</div><!-- .row -->

		<?php endif; ?>


		<?php
		/*
		 * Teacher
		 */

		if ( $same_teacher == 0 ) :
			$teacher_id = $module['teacher_id'];

			$post = get_post( $teacher_id, OBJECT );

			setup_postdata( $post );

			get_template_part( 'template-parts/team/content', 'event-teacher' );

			wp_reset_postdata();
		endif;

		?>

	<?php }
endif;


//One teacher for whiole certification
if ( $same_teacher == 1 ) :
	$teacher_id = get_post_meta($post->ID, 'mro_training_teacher_id', true);

	$post = get_post( $teacher_id, OBJECT );

	setup_postdata( $post );

	get_template_part( 'template-parts/team/content', 'event-teacher' );

	wp_reset_postdata();
endif;