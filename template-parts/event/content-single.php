<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="medium-7 large-8 columns">
		<header class="entry-header">
			<?php
			// If a regular post or page, and not the front page, show the featured image.
			if ( has_post_thumbnail() ) :
				echo '<div class="single-featured-image-header">';
				the_post_thumbnail();
				echo '</div><!-- .single-featured-image-header -->';
			endif;
			?>

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


			<!-- <div class="entry-meta">
				<?php mandir_posted_on(); ?>
			</div> --><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			// $meta = get_post_meta(get_the_ID());
			// $custom = get_post_custom($post->ID);
			// var_dump($meta);
			// echo '<hr />';
			// var_dump($custom);
			?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mandir' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>

<?php

?>
	<div class="medium-5 large-4 columns" id="secondary" role="complementary">

		<div class="sidebar">

			<h2><?php _e('Important information','mandir'); ?></h2>

			<section class="sidebar-module">
				<h3 class="module-title"><?php _e('Dates','mandir'); ?></h3>

				<?php $datetimes = mro_events_join_datetime(); ?>

				<ul>
					<?php
					foreach ($datetimes as $date) { ?>
						<li>
							<span class="event-date"><?php echo $date['date']; ?></span>
							<span class="event-time">De <?php echo $date['start']; ?> a <?php echo $date['end']; ?></span>
						</li>

					<?php }
					?>
				</ul>

			</section><!-- .sidebar-module -->


			<?php if ( get_post_meta($post->ID, 'mro_event_location', true) ) : ?>

				<section class="sidebar-module">
					<h3 class="module-title"><?php _e('Venue','mandir'); ?></h3>

					<?php
					$venue = get_post_meta($post->ID, 'mro_event_location', true);
					if ( $venue == 'mandir' ) :
						echo '<span class="event-venue">Yoga Mandir</span>';
					else:
						//
					endif;
					?>
				</section><!-- .sidebar-module -->

			<?php endif; ?>


			<?php
			if ( get_post_meta($post->ID, 'mro_event_price', true) ) : ?>

				<section class="sidebar-module">
					<h3 class="module-title"><?php _e('Costs','mandir'); ?></h3>

					<?php
					$c = get_post_meta($post->ID, 'mro_event_currency', true);
					$price = get_post_meta($post->ID, 'mro_event_price', true);
					?>

					<span class="event-price"><?php echo $c.$price; ?></span>

					<?php
					if ( get_post_meta($post->ID, 'mro_event_pricing_options', true) ) :
						$pricing_options = get_post_meta($post->ID, 'mro_event_pricing_options', true);
						?>
						<ul>

						<?php
						foreach ($pricing_options as $option) { ?>
							<li>
								<span class="event-price-option"><?php echo $c.$option['price']; ?></span>
								<span class="event-price-description"><?php echo $option['description']; ?></span>
							</li>
						<?php } ?>
						</ul>

					<?php endif; ?>


					<?php
					if ( get_post_meta($post->ID, 'mro_event_pricing_notes', true) ) :
						$pricing_notes = nl2br( get_post_meta($post->ID, 'mro_event_pricing_notes', true) );
						?>
						<span class="event-pricing-notes"><?php echo $pricing_notes; ?></span>
					<?php endif; ?>

				</section><!-- .sidebar-module -->

			<?php endif; ?>

		</div><!-- .sidebar -->

	</div><!-- #secondary -->

	<footer class="entry-footer">
		<?php mandir_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
