<?php

// If a regular post or page, and not the front page, show the featured image.

$subtitle = '';

if ( is_page_template( 'page-templates/template-thai.php' ) || is_page_template( 'page-templates/template-training.php' ) || is_page_template( 'page-templates/template-certification.php' ) ) :

	$enrollment = get_post_meta($post->ID, 'mro_training_state', true);
	if ( $enrollment == 1 ) : 
		$subtitle = ' <span class="subtitle label">Matrícula abierta</span>';
	endif;
endif;
?>

<div class="hero-header">
	<?php the_post_thumbnail(); ?>
	<div class="hero-content">
		<h1 class="entry-title"><?php the_title(); echo $subtitle; ?></h1>
	</div>
</div><!-- .hero-header -->