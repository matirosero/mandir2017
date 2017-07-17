<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes() {
    add_shortcode('profes', 'mro_list_team_shortcode');
}
add_action( 'init', 'register_shortcodes' );

/*
 * List team callback
 * - [profes]
 *
 * Returns list of team members
 */
function mro_list_team_shortcode($atts) {
    global $wp_query,
        $post;

    extract(shortcode_atts(array(
        'type' => 'regular',
    ), $atts));

    // WP Query
	$args = array(

		//Type & Status Parameters
		'post_type'   => 'mro-team',
		'post_status' => 'publish',

		//Order & Orderby Parameters
		'order'               => 'ASC',
		// 'orderby'             => 'date',

		//Pagination Parameters
		'posts_per_page'         => -1,

		//Posts that have a thumbnail
		'meta_query' => array(
			array(
				'key' => '_thumbnail_id',
			),
		),

		//Taxonomy Parameters
		'tax_query' => array(
			array(
				'taxonomy'         => 'mro_team_tax',
				'field'            => 'slug',
				'terms'            => array( $type ),
				'operator'         => 'IN'
			),
		),

		//Parameters relating to caching
		'no_found_rows'          => false,
		'cache_results'          => true,
		'update_post_term_cache' => true,
		'update_post_meta_cache' => true,

	);

    $query = new WP_Query( $args );

    if( ! $query->have_posts() ) :
        return false;
    else :
    	$team = '<div class="row teachers-list medium-up-2 large-up-3">';

		while( $query->have_posts() ) : $query->the_post();

            $team .= '<div class="column column-block teacher" >
	            	<a href="' . get_permalink() . '" class="profile-image">'.get_the_post_thumbnail().'</a>
	            	<h3 class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>
            	</div>';

        endwhile; 

        wp_reset_postdata();

    	$team .= '</div>';
    	return $team;
    endif;

}