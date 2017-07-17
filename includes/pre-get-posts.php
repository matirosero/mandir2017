<?php

add_action( 'pre_get_posts', 'mro_team_archive' );

function mro_team_archive( $query ) {

if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'mro-team' ) ) {

		$query->set( 'posts_per_page', '-1' );
        $query->set( 'order', 'ASC' );

	     $taxquery = array(
	        array(
	            'taxonomy' => 'mro_team_tax',
	            'field' => 'slug',
	            'terms' => array( 'regular' ),
	            'operator'=> 'IN'
	        )
	    );
        $query->set( 'tax_query', $taxquery );
	}

}