<?php
/**
 * Template Name: Events
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

				<?php

				$today = date('Y/m/d');

				echo 'today is '.$today;

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
						'order'               => 'DESC',
						'orderby'             => 'date',
						
						//Pagination Parameters
						'posts_per_page'         => -1,
						
						//Custom Field Parameters
						'meta_query'     => array(
							'relation' => 'OR', // Optional, defaults to "AND"
							array(
								'key' => 'mro_event_date',
								'value' => $today,
								'type' => 'DATE',
								'compare' => '>=', // If date in DB is BEFORE today
							),
							array(
								'key' => 'mro_event_date_end',
								'value' => $today,
								'type' => 'DATE',
								'compare' => '>=', // If date in DB is BEFORE today
							),
						),
						
						//Taxonomy Parameters
						// 'tax_query' => array(
						// 'relation'  => 'AND',
						// 	array(
						// 		'taxonomy'         => 'color',
						// 		'field'            => 'slug',
						// 		'terms'            => array( 'red', 'blue' ),
						// 		'include_children' => true,
						// 		'operator'         => 'IN'
						// 	),
						// 	array(
						// 		'taxonomy'         => 'actor',
						// 		'field'            => 'id',
						// 		'terms'            => array( 1, 2, 3 ),
						// 		'include_children' => false,
						// 		'operator'         => 'NOT IN'
						// 	)
						// ),
						
						//Parameters relating to caching
						'no_found_rows'          => false,
						'cache_results'          => true,
						'update_post_term_cache' => true,
						'update_post_meta_cache' => true,
						
					);
				
				$query = new WP_Query( $args );

				while ( $query->have_posts() ) : $query->the_post();

					$meta = get_post_meta(get_the_ID());

					$get_post_meta = get_post_meta($post->ID, 'mro_event_date', false);
					$get_post_custom = get_post_custom($post->ID);

					echo '<h3>';
					the_title();
					echo '</h3>';

					var_dump($get_post_meta);

					var_dump($meta);

					echo '<hr />';

				endwhile;				

				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .row -->

<?php get_footer(); ?>
