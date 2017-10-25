<?php

$enroll_method = get_post_meta($post->ID, 'mro_training_enroll_how', true);

if ( $enroll_method == 'form' ) : 

	$enroll_shortcode = get_post_meta($post->ID, 'mro_training_enroll_shortcode', true);
	echo apply_filters('the_content', $enroll_shortcode);

elseif ( $enroll_method == 'url' ) :

	$enroll_url = get_post_meta($post->ID, 'mro_training_enroll_url', true); ?>
	<p><a class="expanded button" href="<?php echo $enroll_url; ?>">Inscribirse aquí</a></p>

<?php endif;

