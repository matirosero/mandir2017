<?php
$featured = get_post_meta($id, 'mro_store_featured', true);

if ( $featured['info'] && count($featured['image']) != 0 ) :

	if ( $featured['__relate_post'][0] !== '' ) :
		$url_id = $featured['__relate_post'][0];
		$url = get_permalink( $url_id );
	endif;

	$title = "Producto destacado";

	if ( $featured['title'] ) :
		$title = $featured['title'];
	elseif ( $featured['__relate_post'][0] !== '' ) :
		$title = $url_id;
	endif;

	$info = $featured['info'];

	if ( $featured['image'][0] !== '' ) :
		$image_id = $featured['image'][0];
		$featured_imgsrcset = wp_get_attachment_image($image_id, 'full');
	endif;

endif;
?>

<aside class="spotlight expanded collapse row" data-equalizer data-equalize-on="medium">

	<div class="spotlight-image medium-6 columns hide-for-small-only">

		<?php
		if ( $featured['__relate_post'][0] !== '' ) : ?>
			<a href="<?php echo $url; ?>" id="" class="" data-equalizer-watch>
		<?php else: ?>
			<div id="" class="" data-equalizer-watch>
		<?php endif; ?>

			<?php echo $featured_imgsrcset; ?>
			
		<?php
		if ( $featured['__relate_post'][0] !== '' ) : ?>
			</a>
		<?php else: ?>
			</div>
		<?php endif; ?>

	</div><!-- .columns .spotlight-image -->

	<div class="medium-6 columns">

		<div class="spotlight-highlight" data-equalizer-watch>

			<h2 class="spotlight-heading"><?php echo $title; ?></h2>

			<?php echo $info; ?>

			<a href="<?php echo $url; ?>" class="cta">Más información <i class="icon-right-open-small"></i></a>

		</div><!-- .spotlight-text -->

	</div><!-- .columns -->

</aside><!-- .spotlight .row -->
