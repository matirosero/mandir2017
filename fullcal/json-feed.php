<?php 

// - standalone json feed -
 
header('Content-Type:application/json');
 
// - grab wp load, wherever it's hiding -
if(file_exists('../../../../wp-load.php')) :
    include '../../../../wp-load.php';
else:
    include '../../../../../wp-load.php';
endif;
 
global $wpdb;


				$today = date('Y/m/d');
				$firstofmonth = date('Y/m/01');





				/**
				 * The WordPress Query class.
				 * @link http://codex.wordpress.org/Function_Reference/WP_Query
				 *
				 */
				$args = array(

					//Type & Status Parameters
					'post_type'   => 'mro-event',
					'post_status' => 'publish',

					//Order & Orderby Parameters
					'order'               => 'ASC',
					'orderby'             => 'by_inidividual_dates',

					//Pagination Parameters
					'posts_per_page'         => -1,

					//Custom Field Parameters
					'meta_query'     => array(
						'by_inidividual_dates' => array(
							'key' => 'mro_event_date',
							'value' => $firstofmonth,
							'type' => 'DATE',
							'compare' => '>=', // If date in DB is BEFORE today
						),
					),

					//Parameters relating to caching
					'no_found_rows'          => false,
					'cache_results'          => true,
					'update_post_term_cache' => true,
					'update_post_meta_cache' => true,

				);

				$query = new WP_Query( $args );


				while ( $query->have_posts() ) : $query->the_post();

					$dates = get_post_meta($id, 'mro_event_date', false);

					foreach ($dates as $date) {
						# code...
					}

					$startdate  = $dates[0];
					$enddate = array_pop($dates);


// - grab gmt for start -
// $gmts = date('Y-m-d H:i:s', $startdate);
// $gmts = get_gmt_from_date($startdate); // this function requires Y-m-d H:i:s
$gmts = strtotime($startdate);
 
// - grab gmt for end -
// $gmte = date('Y-m-d H:i:s', $enddate);
// $gmte = get_gmt_from_date($enddate); // this function requires Y-m-d H:i:s
$gmte = strtotime($enddate);
 
// - set to ISO 8601 date format -
$stime = date('c', $gmts);
$etime = date('c', $gmte);


					// - json items -
					$jsonevents[]= array(
					    'title' => get_the_title(),
					    // 'allDay' => false, //  $stime,
					    'start' => $stime,
					    'end' => $etime,
					    'url' => get_permalink()
					    );


				endwhile; //end of events loop

				wp_reset_postdata();

				// - fire away -
				echo json_encode($jsonevents);

