<?php
/*
 * Shows the row of links over images
 */
?>

<section class="block-links expanded row small-up-1 medium-up-2 large-up-4 small-collapse" data-equalizer data-equalize-on="small">
	<div class="column column-block">
		<a href="<?php echo get_permalink( get_page_by_path( 'horario' ) ); ?>" id="block-link-classes" class="block-link" data-equalizer-watch>
			<h3>Clases de Yoga</h3>
			<p>Horarios, modalidades y precios</p>
		</a>
	</div>
	<div class="column column-block">
		<a href="<?php echo get_permalink( get_page_by_path( 'entrenamiento' ) ); ?>" id="block-link-training" class="block-link" data-equalizer-watch>
			<h3>Entrenamiento para Profesores</h3>
			<p>Información, fechas y matrícula</p>
		</a>
	</div>
	<div class="column column-block">
		<a href="<?php echo get_permalink( get_page_by_path( 'masaje-tailandes' ) ); ?>" id="block-link-thai" class="block-link" data-equalizer-watch>
			<h3>Masaje tailandés</h3>
			<p>4 niveles de certificación</p>
		</a>
	</div>
	<div class="column column-block">
		<a href="<?php echo get_permalink( get_page_by_path( 'tienda' ) ); ?>" id="block-link-store" class="block-link" data-equalizer-watch>
			<h3>Tienda</h3>
			<p>Mats de yoga y otros productos</p>
		</a>
	</div>
</section><!-- .page-section -->