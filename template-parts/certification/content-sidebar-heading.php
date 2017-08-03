<?php

$sidebar_title = 'Próxima certificación';

if ( is_page_template( 'page-templates/template-training.php' ) ) :
	$sidebar_title = 'Próximo entrenamiento';
elseif ( get_post_meta($post->ID, 'mro_sidebar_heading', true ) ) :
	$sidebar_title = get_post_meta($post->ID, 'mro_sidebar_heading', true );
endif;

?>

<div class="sidebar-heading">
	<h2><?php echo $sidebar_title; ?></h2>

	<?php $dates = mro_certification_dates(); ?>

	<p><?php echo $dates; ?></p>

</div><!-- .sidebar-heading -->