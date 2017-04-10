<?php
/**
 * Template Name: Event calendar
 * The template for displaying a list of events, by month, on a full width page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>

<div class="row column">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- <div id="calendar"></div> -->
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page-stripped' ); ?>

				<?php

				$today = date('Y-m-d');
				$firstofmonth = date('Y-m-01');


				echo '<section class="events-list row medium-up-2" data-equalizer data-equalize-on="medium">';


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

				// var_dump($query->posts);

				// - declare fresh month -
				$monthcheck = null;

				while ( $query->have_posts() ) : $query->the_post();

					// $all_meta = get_post_meta(get_the_ID());
					// $get_post_custom = get_post_custom($post->ID);


					$first_date = get_post_meta($post->ID, 'mro_event_date', true);

					$dateformatstring = 'F Y';
					$month = date_i18n( $dateformatstring, strtotime( $first_date ) );

					// - determine if it's a new month -
					if ($monthcheck == null || $monthcheck != $month ) :
						echo '<h2 class="full-events row column">' . $month . '</h2>';
					endif;

					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('column column-block'); ?> data-equalizer-watch>

			<?php
			// If a regular post or page, and not the front page, show the featured image.
			if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" class="featured-image">
					<?php the_post_thumbnail(); ?>
				</a><!-- .featured-image -->
			<?php endif; ?>
						<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

						<?php
						/*
						$start_times = get_post_meta($post->ID, 'mro_event_time_start', false);
						$end_times = get_post_meta($post->ID, 'mro_event_time_end', false);
						var_dump($start_times);

						if ( count($start_times) == 1 && count($end_times) == 1 ) :
							echo 'ONE time';
						else:
							echo 'more than one time';
						endif;
						*/
						?>

						<span class="event-date"><?php echo mandir_pretty_event_dates(); ?></span>

						<a href="<?php the_permalink(); ?>"><?php _e('More information', 'mandir'); ?></a>
					</article>


					<?php

					// - fill monthcheck with the current month -
					$monthcheck = $month;

				endwhile; //end of events loop

				wp_reset_postdata();

				echo '</section>';

				?>

			<?php endwhile; // End of the ORIGINAL loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .row -->

<?php get_footer(); ?>
