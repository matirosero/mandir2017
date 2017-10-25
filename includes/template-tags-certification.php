<?php

/**
 * Returns string with certification dates.
 *
 * @return $dates
 */
function mro_certification_dates() {
	global $post;

	if ( !get_post_meta($post->ID, 'mro_training_date_start', true) || !get_post_meta($post->ID, 'mro_training_date_end', true) ) :

		return false;

	else:

		$exact_dates = true;
		if ( get_post_meta($post->ID, 'mro_training_exact_dates', true) == 0 ) :
			$exact_dates = false;
		endif;

		$date_start = get_post_meta($post->ID, 'mro_training_date_start', true);

		if ( $exact_dates ) :

			$date_end = get_post_meta($post->ID, 'mro_training_date_end', true);

			$year_start = mandir_convert_date($date_start, 'Y');
			$year_end = mandir_convert_date($date_end, 'Y');

			if ( $year_start == $year_end ) :

				$dateformatstring = 'j \d\e F';

			else :

				$dateformatstring = 'j \d\e F, Y';

			endif;

			$date_start = mandir_convert_date($date_start, $dateformatstring);
			$date_end = mandir_convert_date($date_end, $dateformatstring);

			$dates = 'Del '.$date_start.' al '.$date_end;

			if ( $year_start == $year_end ) :
				$dates .= ', '.$year_start;
			endif;

		else:
			$dateformatstring = 'F Y';
			$date_start = mandir_convert_date($date_start, $dateformatstring);
			$dates = ucfirst($date_start);
		endif;

		return $dates;

	endif;

}

function mro_certificaction_render_schedule($schedule) {
	// var_dump($schedule);
	$days = $schedule['days'];
	$days = ucfirst( implode ( ', ' , $days ) );

	$time_start = $schedule['time_start'];
	$time_end = $schedule['time_end'];

	if ( isset($schedule['notes']) ) :
		$notes = $schedule['notes'];
	endif;

	?>

	<p><?php echo $days; ?>.<br />
		De <?php echo $time_start; ?> a <?php echo $time_end; ?>.</p>
	<p><?php if ( isset($schedule['notes']) ) { echo $notes; } ?></p>

<?php }