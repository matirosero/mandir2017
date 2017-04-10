<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

$days = array(
	__('Monday', 'mandir'),
	__('Tuesday', 'mandir'),
	__('Wednesday', 'mandir'),
	__('Thursday', 'mandir'),
	__('Friday', 'mandir'),
	__('Saturday', 'mandir'),
);

$posts = array();
global $wpdb;
$query = $wpdb->get_results(
	'SELECT ID, post_title, post_content FROM mandir_posts WHERE post_type in ("mro-team", "mro-class") AND post_status = "publish"');
if ($query) :
	foreach ($query as $key => $post) {
		setup_postdata( $post );
		$posts[get_the_ID()] = array(
			'title' => get_the_title(),
			'content' => get_the_content(),
			'link' => get_post_permalink(get_the_ID()),
			'class' => $key + 1,
			);
	}
	wp_reset_postdata();
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php

		?>
	</div><!-- .entry-content -->

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
				$schedule_settings = get_option('mro_class_schedule_settings');

				$i = 0;

				foreach ($schedule_settings as $day) { ?>

					<li class="events-group">
						<div class="top-info">
							<span><?php echo $days[$i]; $i++; ?></span>
						</div>

						<ul>
							<?php
							foreach ($day as $key => $class) {
								$time_start = $class['time_start'];
								$time_end = $class['time_end'];
								$class_id = $class['class_id'];
								$teacher_id = $class['team_id'];
								$content = $posts[$class_id]['content'];
								$manual_class_name = $class['manual_block_name'];

								//todo class for manual
								?>
								<li class="single-event" data-start="<?php echo $time_start; ?>" data-end="<?php echo $time_end; ?>" data-content="event-abs-circuit" data-event="event-<?php echo $posts[$class_id]['class']; ?>">
									<a href="#0">
										<?php
										// var_dump($class);
										if ( $class['class_id'] != '' ) :
											$class_name = $posts[$class_id]['title'];

										else:
											$class_name = $class['manual_block_name'];
										endif;


										?>
										<span class="schedule-event-info">
											<span class="schedule-event-name"><?php echo $class_name; ?></span>

											<?php
											if ( $class['team_id'] != '' ) :
												$teacher_name = $posts[$teacher_id]['title'];
												$teacher_link = $posts[$teacher_id]['link'];
												?>
												<span class="schedule-event-teacher" data-link="<?php echo $teacher_link; ?>"><?php echo $teacher_name; ?></span>
											<?php endif; ?>

										</span>


									</a>
									<div class="schedule-event-content"><?php echo $content; ?></div>
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
					<a class="schedule-event-teacher"></a>
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

	<footer class="entry-footer">
		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'mandir' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
