<?php

$choice = get_post_meta($post->ID, 'mro_training_teachers_select', true);

if ( $choice == 'select' ) :

	$teacher_id = get_post_meta($post->ID, 'mro_training_teacher_id', true);

	$post = get_post( $teacher_id, OBJECT );

	setup_postdata( $post );

	get_template_part( 'template-parts/team/content', 'event-teacher' );

	wp_reset_postdata();

elseif ( $choice == 'custom' && get_post_meta($post->ID, 'mro_training_teachers', true) ) : 

	if ( get_post_meta($post->ID, 'mro_training_teachers_image', true) ) :
		
		$teachers_img_id = get_post_meta($post->ID, 'mro_training_teachers_image', true);
		$teachers_imgsrcset = wp_get_attachment_image($teachers_img_id, 'medium');
		?>

		<div class="teacher-box">
			<div class="row">
				<div class="medium-3 columns">
					<div class="profile-image"><?php echo $teachers_imgsrcset; ?></div>
				</div>
				<div class="medium-9 columns">
					<h2><?php _e('Teachers','mandir'); ?></h2>
					<?php echo wpautop( get_post_meta($post->ID, 'mro_training_teachers', true) ); ?>
				</div>
			</div><!-- .row -->
		</div><!-- .teacher-box -->

	<?php else: ?>

		<h2><?php _e('Teachers','mandir'); ?></h2>
		<?php echo wpautop( get_post_meta($post->ID, 'mro_training_teachers', true) ); ?>

	<?php endif;

endif;