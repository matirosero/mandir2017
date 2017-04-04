<?php
/**
 * Template Name: Event calendar
 * The template for displaying a full width page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>

<div class="row column">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page-stripped' ); ?>

				<?php

				$today = date('Y/m/d');
				$firstofmonth = date('Y/m/01');
				$currentmonth = date('F Y');


				echo '<section class="events-list row" data-equalizer data-equalize-on="medium">';


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

					$dates = get_post_meta($post->ID, 'mro_event_date', false);
					$first_date = get_post_meta($post->ID, 'mro_event_date', true);

					$dateformatstring = 'F Y';
					$month = date_i18n( $dateformatstring, strtotime( $first_date ) );

					// - determine if it's a new month -
					if ($monthcheck == null || $monthcheck != $month ) :
						echo '<h2 class="full-events medium-12 columns">' . $month . '</h2>';
						// echo $eq_row_start;
					endif;

					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('medium-6 columns'); ?> data-equalizer-watch>
						<h6><?php the_title(); ?></h6>

						<?php

						//Change to nice date format
						foreach ($dates as $key => $date) {
							$dateformatstring = 'j \d\e F';
							$newdate = date_i18n( $dateformatstring, strtotime( $date ) );
							$dates[$key] = $newdate;
						}

						$is_date_range = get_post_meta($post->ID, 'mro_daterange_checkbox', true);

						if ( $is_date_range == 1 && count($dates) == 2 ) :
							$datestring = 'Del '.implode(' al ', $dates);
						elseif ( count($dates) == 1 ):
							$datestring = $dates[0];
						else:
							$last_date = array_pop($dates);
							$datestring = implode(', ', $dates).' y '.$last_date;
						endif;

				    	echo $datestring;
						?>
						<a href="<?php the_permalink(); ?>"><?php _e('More information', 'mandir'); ?></a>
					</article>


					<?php

					// - fill monthcheck with the current month -
					$monthcheck = $month;

				endwhile; //end of events loop

				// echo $eq_row_end;

				wp_reset_postdata();

				echo '</section';

				?>

				<?php //get_template_part( 'template-parts/content', 'page-stripped-end' ); ?>



			<?php endwhile; // End of the ORIGINAL loop. ?>


		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .row -->

<?php get_footer(); ?>
