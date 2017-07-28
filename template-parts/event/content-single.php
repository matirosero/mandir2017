<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>


<div class="medium-8 columns">

	<header class="entry-header">

		<?php
		// If a regular post or page, and not the front page, show the featured image.
		if ( has_post_thumbnail() ) :
			echo '<div class="event-featured-image">';
			//the_post_thumbnail();
			echo ipq_get_theme_image( get_post_thumbnail_id( get_the_id() ), array(
			        array( 620, 324, true ),
			        array( 1000, 524, true ),
			        array( 1200, 628, true ),
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
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mandir' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

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
				<h2><?php the_title(); ?></h2>
			<?php endwhile; ?>
			<!-- end of the loop -->

		</aside><!-- .event-instructor -->

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>

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

		</section><!-- .sidebar-module -->


		<?php if ( get_post_meta($post->ID, 'mro_event_location', true) ) : ?>

			<section class="sidebar-section">
				<h3 class="module-title"><?php _e('Venue','mandir'); ?></h3>

				<?php
				$venue = get_post_meta($post->ID, 'mro_event_location', true);
				if ( $venue == 'mandir' ) :
					echo '<p class="event-venue">Yoga Mandir</p>';
				else:
					//
				endif;
				?>
			</section><!-- .sidebar-module -->

		<?php endif; ?>


		<?php
		if ( get_post_meta($post->ID, 'mro_event_price', true) ) : ?>

			<section class="sidebar-section">
				<h3 class="module-title"><?php _e('Costs','mandir'); ?></h3>

				<?php
				$c = get_post_meta($post->ID, 'mro_event_currency', true);
				$price = get_post_meta($post->ID, 'mro_event_price', true);
				?>

				<p>
				<span class="event-price"><?php echo $c.$price; ?></span></p>

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

