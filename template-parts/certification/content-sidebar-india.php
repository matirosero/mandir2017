<?php
//Heading
get_template_part( 'template-parts/certification/content', 'sidebar-heading' );
?>

<?php
//Orientation
get_template_part( 'template-parts/certification/content', 'sidebar-orientation' );
?>


<?php
// Simple schedule
$other_dates = get_post_meta($post->ID, 'mro_india_dates', true);

if ( !empty( $other_dates[0]['title'] ) ) : ?>

	<div class="sidebar-section">
		<h3><?php _e('Trip dates','mandir'); ?></h3>

		<ul class="dates">

			<?php
			foreach ($other_dates as $date) {
				// var_dump($date);
				$date_start = $date['date_start'];
				$date_start = mandir_convert_date($date_start, 'j \d\e F');
				$date_info = $date_start;
				if ( !empty($date['date_end']) ) :
					$date_end = $date['date_end'];
					$date_end = mandir_convert_date($date_end, 'j \d\e F');
					$date_info .= ' al '.$date_end;
				endif;
				?>
				<span class="event-name"><?php echo $date['title']; ?></span>
				<span class="event-date"><?php echo $date_info; ?></span>
			<?php } ?>

		</ul>

	</div><!-- .sidebar-section -->

<?php endif; ?>


<?php
//Pricing
get_template_part( 'template-parts/certification/content', 'sidebar-pricing' );
?>