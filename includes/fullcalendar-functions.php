<?php

function load_fullcalendar_js() {

	if ( is_page( 'Horarios' )) :
		// ... my other scripts...

		// - fullcalendar -
		wp_enqueue_script('moments', (get_bloginfo('template_url')) . '/assets/vendors/fullcalendar/lib/moment.min.js', array());
		wp_enqueue_script('fullcalendar', (get_bloginfo('template_url')) . '/assets/vendors/fullcalendar/fullcalendar.js', array('jquery'));
		wp_enqueue_script('gcal', (get_bloginfo('template_url')) . '/assets/vendors/fullcalendar/gcal.js', array('jquery'));

		// - set path to json feed -
		$jsonevents = get_bloginfo('template_url') . '/fullcal/json-feed.php';

		// - tell JS to use this variable instead of a static value -
		wp_localize_script( 'fullcalendar', 'themeforce', array(
		    'events' => $jsonevents,
		    ));
	endif;
}

add_action('wp_print_scripts', 'load_fullcalendar_js');


function hook_fullcalendar() {
    if ( is_page( 'Horarios' )) :
    ?>
        <script type="text/javascript">
			jQuery(document).ready(function() {
			    jQuery('#calendar').fullCalendar({
			        events: themeforce.events
			    });
			});
        </script>
    <?php
    endif;
}
add_action('wp_head', 'hook_fullcalendar');