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


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<section id="page-intro" class="row">

				<div class="medium-10 medium-centered columns">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

					<?php the_content(); ?>

				<?php endwhile; // End of the loop. ?>
				</div>
			</section><!-- #page-intro -->



			<?php

			$today = date('Y-m-d');
			$firstofmonth = date('Y-m-01');

			?>



			<section id="events-calendar" class="row column">

				<?php


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


					$first_date = get_post_meta($post->ID, 'mro_event_date', true);

					$dateformatstring = 'F Y';
					$month = date_i18n( $dateformatstring, strtotime( $first_date ) );

					// - determine if it's a new month -
					if ($monthcheck == null || $monthcheck != $month ) :

						if ($monthcheck != null) : ?>
							</div><!-- .events-calendar -->
						<?php endif; ?>

						<h2 class="section-title"><?php echo $month; ?></h2>

						<div class="events-calendar-month row medium-up-2">

					<?php endif;

					get_template_part( 'template-parts/event/content', 'loop'  );

					// - fill monthcheck with the current month -
					$monthcheck = $month;

				endwhile; //end of events loop

				wp_reset_postdata();

				?>

				</div><!-- .events-calendar-row -->

			</section><!-- .events-calendar -->

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
