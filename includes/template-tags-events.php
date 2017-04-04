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