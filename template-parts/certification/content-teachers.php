<?php

$choice = get_post_meta($post->ID, 'mro_training_teachers_select', true);

if ( $choice == 'select' ) :

	$teacher_id = get_post_meta($post->ID, 'mro_training_teacher_id', true);

	$post = get_post( $teacher_id, OBJECT );

	setup_postdata( $post );

	get_template_part( 'template-parts/team/content', 'event-teacher' );

	wp_reset_postdata();

endif;