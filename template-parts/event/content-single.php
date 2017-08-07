<?php
/**
 * Template part for displaying single events.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<div class="medium-8 columns ">

	<header class="entry-header">

		<?php
		// If a regular post or page, and not the front page, show the featured image.
		if ( has_post_thumbnail() ) :
			echo '<div class="event-featured-image">';
			//the_post_thumbnail();
			echo ipq_get_theme_image( get_post_thumbnail_id( get_the_id() ), array(
			        array( 770, 402, true ),
			        array( 657, 343, true ),
			        array( 620, 324, true ),
			        array( 394, 206, true ),
			    ),
			    array(
			        'class' => 'event-image'
			    )
			);

			echo '</div><!-- .event-featured-image -->';
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
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$args = array(

			//Type & Status Parameters
			'post_type'   => 'mro-team',
			'post_status' => 'publish',

			//Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'date', //ID
			'ignore_sticky_posts' => true,

			//Pagination Parameters
			'posts_per_page'         => -1,

			//Permission Parameters -
			'perm' => 'readable',

			//Parameters relating to caching
			'no_found_rows'          => false,
			'cache_results'          => true,
			'update_post_term_cache' => true,
			'update_post_meta_cache' => true,

			//Piklist
			'post_belongs' => $post->ID,
		    'suppress_filters' => false,

		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) : ?>

			<aside class="event-instructor">

				<!-- the loop -->
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'template-parts/team/content', 'event-teacher' ); ?>
				<?php endwhile; ?>
				<!-- end of the loop -->

			</aside><!-- .event-instructor -->

			<?php wp_reset_postdata(); ?>

		<?php endif; 

		// Payment
		get_template_part( 'template-parts/page/content', 'payment' );

		?>
	</div><!-- .entry-content -->
</div>


<div class="medium-4 columns">

	<div id="secondary" class="quick-info" role="complementary">

		<h2 class="sidebar-title"><?php _e('Important information','mandir'); ?></h2>

		<section class="sidebar-section">
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

			<?php if ( get_post_meta($post->ID, 'mro_event_location', true) ) : ?>

				<h3 class="module-title"><?php _e('Venue','mandir'); ?></h3>

				<?php
				$venue = get_post_meta($post->ID, 'mro_event_location', true);
				if ( $venue == 'mandir' ) :
					echo '<p><span class="event-venue">Yoga Mandir</span></p>';
				else:
					$venue = get_post_meta($post->ID, 'mro_event_location_name', true);
					$address = get_post_meta($post->ID, 'mro_event_location_address', true);
					echo '<p><span class="event-venue">'.$venue.'</span>
						<span class="event-address">'.$address.'</span></p>';
				endif;
				?>

			<?php endif; ?>

		<!-- </section> --><!-- .sidebar-module -->
		<!-- <section class="sidebar-section"> -->

			<h3 class="module-title"><?php _e('Cost','mandir'); ?></h3>

			<?php
			$type =	get_post_meta($post->ID, 'mro_event_payment_type', true);

			if ( $type == 'free' ) : ?>

				<p class="event-price"><?php _e('Free','mandir'); ?></p>

			<?php else : ?>

				<?php
				$c = get_post_meta($post->ID, 'mro_event_currency', true);

				if ( $type == 'donation' ) : ?>

					<?php
					$donation = get_post_meta($post->ID, 'mro_event_donation', true);
					?>

					<p><span class="event-price"><?php _e('Voluntary donation','mandir'); ?></span>
						<span class="event-donation">
							<?php _e('Suggested: ','mandir'); ?>
							<?php echo $c.$donation; ?>
						</span>
					</p>

				<?php elseif ( $type == 'price' ) : ?>

					<?php
					$price = get_post_meta($post->ID, 'mro_event_price', true);

					$options = get_post_meta($post->ID, 'mro_event_pricing_options', true);

					if ( empty($options[0]['price']) ) : ?>

						<p class="event-price"><?php echo $c.$price; ?></p>

					<?php else: ?>

						<ul>
							<li>
								<span class="event-price"><?php echo $c.$price; ?></span>
								<span class="event-price-description"><?php _e('Regular price','mandir'); ?></span>
							</li>

							<?php
							$pricing_options = get_post_meta($post->ID, 'mro_event_pricing_options', true);
							foreach ($pricing_options as $option) { ?>
								<li>
									<span class="event-price"><?php echo $c.$option['price']; ?></span>
									<span class="event-price-description"><?php echo $option['description']; ?></span>
								</li>
							<?php } ?>

						</ul>

					<?php endif; ?>

				<?php endif; ?>

			<?php endif; ?>

			<?php
			if ( get_post_meta($post->ID, 'mro_event_pricing_notes', true) ) :

				$pricing_notes = nl2br( get_post_meta($post->ID, 'mro_event_pricing_notes', true) );
				?>
				<p class="event-pricing-notes"><?php echo $pricing_notes; ?></p>

			<?php endif; ?>

		</section><!-- .sidebar-module -->

	</div><!-- .sidebar -->

	<div class="sidebar-form" role="complementary">
		<h2 class="sidebar-title"><?php _e('Reserve your spot','mandir'); ?></h2>
		<section class="sidebar-module">
			<?php echo do_shortcode( '[caldera_form id="CF58e57f617099d"]' ); ?>
		</section><!-- .sidebar-module -->
	</div><!-- .sidebar -->

</div><!-- #secondary -->

<footer class="entry-footer">
	<?php mandir_entry_footer(); ?>
</footer><!-- .entry-footer -->

