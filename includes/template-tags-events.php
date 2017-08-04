<?php
/**
 * Custom template event tags for this theme.
 *
 */

/**
 * Returns  array with specific date format.
 *
 * @return string with nice dates
 */
function mandir_convert_dates_array($dates, $dateformatstring = 'j \d\e F' ) {

	//Check that ID belongs to an event
	if ( empty( $dates ) ) :
		return false;
	else :
		//Change to nice date format
		foreach ($dates as $key => $date) {
			$newdate = date_i18n( $dateformatstring, strtotime( $date ) );
			$dates[$key] = $newdate;
		}
		return $dates;
	endif;
}


/**
 * Returns a string with event's date.
 *
 * @return string with nice dates
 */
function mandir_pretty_event_dates() {

	global $post;
	$id = $post->ID;
	
	//Check that ID belongs to an event
	if ( get_post_type( $id ) != 'mro-event' ) :
		return false;
	else :

		//Array with dates from custom fields
		$dates = get_post_meta($id, 'mro_event_date', false);

		//Check that there date array is not empty
		if ( empty( $dates ) ) :
			return false;
		else:

			$dates = mandir_convert_dates_array( $dates );

			$count = count($dates);

			$is_date_range = get_post_meta($id, 'mro_daterange_checkbox', true);

			if ( $is_date_range == 1 && $count == 2 ) :
				$datestring = 'Del '.implode(' al ', $dates);
			elseif ( $count == 1 ):
				$datestring = $dates[0];
			else:
				$last_date = array_pop($dates);
				$datestring = implode(', ', $dates).' y '.$last_date;
			endif;

			return $datestring;

		endif;
	endif;
}


/**
 * Check that dates, end times and start times array have same number of values.
 *
 * @return true
 */
function mro_events_validate_datetimes() {
	global $post;
	$id = $post->ID;

	$dates = mandir_convert_dates_array( get_post_meta($id, 'mro_event_date', false), $dateformatstring = 'j \d\e F, Y' );

	$start_times = get_post_meta($id, 'mro_event_time_start', false);
	$end_times = get_post_meta($id, 'mro_event_time_end', false);

	if ( ( count($dates) == count($start_times) ) && ( count($end_times) == count($start_times) ) ) :
		return true;
	else:
		return false;
	endif;

}


/**
 * Returns multidimensional array with the events' dates and their respective start and end times.
 *
 * @return $datetimes
 */
function mro_events_join_datetime($dateformatstring = 'j \d\e F') {
	global $post;
	$id = $post->ID;

	if ( mro_events_validate_datetimes() == true ) :

		//Array with dates from custom fields, prettified
		$dates = mandir_convert_dates_array( get_post_meta($id, 'mro_event_date', false), $dateformatstring = $dateformatstring );

		$start_times = get_post_meta($id, 'mro_event_time_start', false);
		$end_times = get_post_meta($id, 'mro_event_time_end', false);

		$datetimes = array();

		foreach ($dates as $i => $val) {
		    $datetimes[] = array(
		    	'date'	=> $val,
		    	'start'	=> $start_times[$i],
		    	'end'	=> $end_times[$i],
		    );
		}

		return $datetimes;
	else:
		return false;
	endif;
}


/**
 * Returns redirect url for events.
 *
 * @return $url
 */
function mandir_redirect_url() {
	global $post;

	if ( !get_post_meta($post->ID, 'mro_event_redirect', true) ) :
		return false;
	else:
		$redirect_id = get_post_meta($post->ID, 'mro_event_redirect', true);
		$url = get_permalink( $redirect_id );
		return $url;
	endif;
}

/**
 * Redirect events.
 */
function mandir_redirect_event() {
	if ( mandir_redirect_url() ) :
		$url = mandir_redirect_url();
		wp_safe_redirect( $url );
		exit;
	endif;
}