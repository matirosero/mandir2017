<?php
//Heading
get_template_part( 'template-parts/certification/content', 'sidebar-heading' );
?>

<?php
//Orientation
get_template_part( 'template-parts/certification/content', 'sidebar-orientation' );
?>

<?php
//Duration
if ( get_post_meta($post->ID, 'mro_training_duration', true) ) : ?>

	<div class="sidebar-section">

		<?php if ( is_english() ) : ?>
			<h3>Duration</h3>
		<?php else : ?>
			<h3><?php _e('Duration','mandir'); ?></h3>
		<?php endif; ?>

		<?php
		$duration = nl2br( get_post_meta($post->ID, 'mro_training_duration', true) );
		?>

		<p><?php echo $duration; ?></p>

	</div><!-- .sidebar-section -->

<?php endif; ?>


<?php
// Simple schedule
$schedule = get_post_meta($post->ID, 'mro_training_schedule', true);

if ( !empty( $schedule['time_start'] ) ) : ?>

	<div class="sidebar-section">

		<?php if ( is_english() ) : ?>
			<h3>Schedule</h3>
		<?php else : ?>
			<h3><?php _e('Schedule','mandir'); ?></h3>
		<?php endif; ?>

		<?php mro_certificaction_render_schedule($schedule); ?>

	</div><!-- .sidebar-section -->

<?php endif; ?>


<?php
//Pricing
get_template_part( 'template-parts/certification/content', 'sidebar-pricing' );
?>