<?php

//Curriculum
if ( get_post_meta($post->ID, 'mro_training_curriculum', true) ) :
	$curriculum = get_post_meta($post->ID, 'mro_training_curriculum', true);
	?>
	<h2><?php _e('Curriculum','mandir'); ?></h2>
	<ul>
	<?php
	foreach ( $curriculum as $module ) {
		echo '<li><strong>'.$module['title'].':</strong> '.$module['length'].'<br />
			'.$module['description'].'</li>';
	} ?>
	</ul>
<?php endif;