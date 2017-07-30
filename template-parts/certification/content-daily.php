<h2><?php _e('Daily schedule','mandir'); ?></h2>

<?php

$schedule = get_post_meta($post->ID, 'mro_training_schedule', true);

if ( !empty( $schedule['days'] ) ) :

	$days = $schedule['days'];
	?>

	<p><?php echo $days; ?>.</p>

<?php endif;

$blocks = get_post_meta($post->ID, 'mro_training_daily_schedule', true);

// var_dump($blocks);

if ( !empty( $blocks[0]['time_start'] ) && !empty( $blocks[0]['description'] ) ) : ?>

	<ul class="training-daily">

		<?php
		foreach ( $blocks as $block ) { 
			$time_start = $block['time_start'];
			$time_end = $block['time_end'];
			$time = $time_start;
			if ( !empty($block['time_end']) ) : 
				$time .= ' – '.$block['time_end'];
			endif;
			?>

			<li>
				<span class="training-block-time"><?php echo $time; ?></span>
				<span class="training-block-description"><?php echo $block['description']; ?></span>
			</li>

		<?php } ?>

	</ul>

<?php endif;


if ( !empty( $schedule['notes'] ) ) :

	$notes = $schedule['notes'];

	?>

	<p><?php echo wpautop($notes); ?></p>

<?php endif;