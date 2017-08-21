<?php
$products = get_post_meta($id, 'mro_store_products', true);
?>

<div class="row store-products page-section medium-up-2" data-equalizer data-equalize-on="medium">

	<h2 class="section-title"><?php _e('Other products', 'mandir'); ?></h2>

	<?php
	foreach ($products as $product) { ?>

		<article class="column column-block product" >

			<?php
				$img_id = $product['image'][0];

				$srcset_sizes = array(
					// array( 1280, 850, true ),
					// array( 1140, 757, true ),
					// array( 828, 550, true ),
					array( 640, 425, true ),
					array( 570, 379, true ),
					array( 414, 275, true ),
					array( 320, 213, true ),
					);
				$sizes = '(min-width: 1200px) 570px, (min-width: 640px) 50vw, 100vw';
				$alt = get_the_title();
				$imgsrcset = mandir_srcset($srcset_sizes, $sizes, $alt, $img_id);

				echo '<div class="product-image">'.$imgsrcset.'</div>';
			?>

			<h3><?php echo $product['title']; ?></h3>
			<?php echo wpautop( $product['info'] ); ?>

		</article><!-- .product -->

	<?php } ?>

</div><!-- .store-products -->