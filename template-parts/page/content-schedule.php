<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

//Create array with days of the week
$days = array(
	__('Monday', 'mandir'),
	__('Tuesday', 'mandir'),
	__('Wednesday', 'mandir'),
	__('Thursday', 'mandir'),
	__('Friday', 'mandir'),
	__('Saturday', 'mandir'),
);

global $wpdb;

//Create an events array
$events = array();

//Create posts array, for classes and teachers (pull everything)
$posts = array();

//Grab all classes and teachers, stick them in $posts array
$query = $wpdb->get_results(
	'SELECT ID, post_title, post_content FROM mandir_posts WHERE post_type in ("mro-team", "mro-class") AND post_status = "publish"');

//Loop through query of classes
if ($query) :
	foreach ($query as $key => $post) {
		//Add each class' info to the array
		setup_postdata( $post );
		$posts[get_the_ID()] = array(
			'title' => get_the_title(),
			'content' => wpautop( wp_kses_post( get_the_content() ) ),
			'link' => get_post_permalink(get_the_ID()),
			'class' => $key + 1,
			);
	}
	wp_reset_postdata();
endif;
?>


<!-- Start Schedule -->
<section class="mro-schedule loading">
	<div class="timeline">
		<ul>
			<li><span>07:00</span></li>
			<li><span>07:30</span></li>
			<li><span>08:00</span></li>
			<li><span>08:30</span></li>
			<li><span>09:00</span></li>
			<li><span>09:30</span></li>
			<li><span>10:00</span></li>
			<li><span>10:30</span></li>
			<li><span>11:00</span></li>
			<li><span>11:30</span></li>
			<li><span>12:00</span></li>
			<li><span>12:30</span></li>
			<li><span>13:00</span></li>
			<li><span>13:30</span></li>
			<li><span>14:00</span></li>
			<li><span>14:30</span></li>
			<li><span>15:00</span></li>
			<li><span>15:30</span></li>
			<li><span>16:00</span></li>
			<li><span>16:30</span></li>
			<li><span>17:00</span></li>
			<li><span>17:30</span></li>
			<li><span>18:00</span></li>
			<li><span>18:30</span></li>
			<li><span>19:00</span></li>
			<li><span>19:30</span></li>
			<li><span>20:00</span></li>
			<li><span>20:30</span></li>
		</ul>
	</div><!-- .timeline -->

	<div class="events">
		<ul>
			<?php

			//Grab all schedule options from DB
			$schedule_settings = get_option('mro_schedule_tabs');

			//Start a counter
			$i = 0;


			//Loop through all days of the week array
			foreach ($schedule_settings as $day) { ?>

				<li class="events-group">
					<div class="top-info">
						<span>
							<?php echo $days[$i]; $i++; ?>
						</span><!-- Name day of the week -->
					</div>

					<ul>
						<?php

						//Loop through all classes in a day
						foreach ($day as $key => $class) {

							//Create variables, populate with values from schedule settings
							$block_type = $class['type'];//class, event or manual
							$time_start = $class['time_start'];
							$time_end = $class['time_end'];

							//If it's a class
							if ( $block_type  == 'class' ) :
								$class_id = $class['class_id'];
								$class_name = $posts[$class_id]['title'];
								$content = $posts[$class_id]['content'];
								$teacher_id = $class['class_teacher_id'];
								$class_class = $posts[$class_id]['class'];
							endif;

							//If it's an event
							if ( $block_type  == 'event' ) :
								$event_id = $class['event_id'];

								//Check if event is in array, get values if it is
								if (array_key_exists($event_id, $events)) :
								    $class_name = $events[$event_id]['title'];
									$event_link = $events[$event_id]['link'];
									$content = $events[$event_id]['content'];


								//If not, query, get values and add to array
								else:
									$class_name = get_the_title($event_id);
									$event_link = get_post_permalink($event_id);
									$content = wpautop( wp_kses_post( wp_trim_words( get_post_field('post_content', $event_id), 50) ) );

									$events[$event_id] = array(
										'title' => $class_name,
										'content' => $content,
										'link' => $event_link,
										);


								endif;

							endif;

							//If it's a manual entry
							if ( $block_type  == 'manual' ) :
								$class_name = $class['manual_block_name'];
								$content = null;
							endif;

							if ( $block_type  == 'manual' || $block_type  == 'event' ) :
								$teacher_id = $class['event_teacher_id'];
								$class_class = 0;
							endif;



							//Get teacher details
							if ( $teacher_id == 'other' ) :
								$teacher_name = $class['manual_teacher_name'];
								$teacher_link = null;
							else:
								$teacher_name = $posts[$teacher_id]['title'];
								$teacher_link = $posts[$teacher_id]['link'];
							endif;

							//todo class for manual
							?>
							<li class="single-event" data-start="<?php echo $time_start; ?>" data-end="<?php echo $time_end; ?>" data-event="event-<?php echo $class_class; ?>"<?php if ( $block_type  == 'event' ) { echo 'data-link="'.$event_link.'"'; } ?>>

								<a href="#0">

									<span class="schedule-event-info">
										<span class="schedule-event-name"><?php echo $class_name; ?></span>

										<?php
										if ( $teacher_name ) : ?>
											<span class="schedule-event-teacher" data-link="<?php echo $teacher_link; ?>"><?php echo $teacher_name; ?></span>
										<?php endif; ?>

									</span>


								</a>
								<div class="schedule-event-content">
									<?php echo $content; ?>
									<?php if ( $block_type  == 'event' ) : ?>
										<p><a href="<?php echo $event_link; ?>"><?php _e('Read more', 'mandir'); ?></a></p>
									<?php endif; ?>
								</div>
							</li>
						<?php } ?>
					</ul>
				</li>

				<?php
			}

			?>
		</ul>
	</div><!-- .events -->

	<div class="event-modal">
		<header class="header">
			<div class="content">
				<span class="event-date"></span>
				<h3 class="schedule-event-name"></h3>

			</div>
			<div class="header-bg"></div>
		</header>

		<div class="body">
			<div class="event-info"></div>
			<div class="body-bg"></div>
		</div>

		<a href="#0" class="close">Close</a>
	</div>

	<div class="cover-layer"></div>
</section><!-- .mro-schedule -->
<!-- End Schedule -->




