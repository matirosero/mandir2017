<?php

$sidebar_title = 'Próxima certificación';

if ( is_page_template( 'page-templates/template-training.php' ) ) :
	$sidebar_title = 'Próximo entrenamiento';
endif;

?>

<div class="sidebar-heading">
	<h2><?php echo $sidebar_title; ?></h2>

	<?php $dates = mro_certification_dates(); ?>

	<p><?php echo $dates; ?></p>

</div><!-- .sidebar-heading -->