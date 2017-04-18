<?php
global $frontpage_settings;
$events = $frontpage_settings['frontpage_events'];

if ($events[0] != '') : ?>

	<section id="home-events" class="page-section expanded row medium-up-3" data-equalizer data-equalize-on="medium"">

		<h2 class="section-title"> Próximos eventos</h2>

		<?php
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$args = array(

			//Post & Page Parameters
			'post__in'     => $events,

			'post_type'   => 'mro-event',
			'post_status' => 'publish',

			'order'       => 'ASC',
			'orderby'     => 'meta_value',
			'meta_key'	  => 'mro_event_date',

			//Parameters relating to caching
			'no_found_rows'          => false,
			'cache_results'          => true,
			'update_post_term_cache' => true,
			'update_post_meta_cache' => true,

		);

		$query = new WP_Query( $args );

		while ( $query->have_posts() ) : $query->the_post();

			get_template_part( 'template-parts/event/content', 'loop'  );

		endwhile;

		wp_reset_postdata();

		?>

	</section>

<?php endif; ?>