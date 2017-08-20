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
					// array( 1280, 852, true ),
					// array( 1024, 681, true ),
					array( 640, 426, true ),
					// array( 512, 340, true ),
					array( 290, 193, true ),
					);
				$sizes = '(min-width: 1200px) 570px, (min-width: 640px) 50vw, 100vw';
				$alt = get_the_title();
				$imgsrcset = mandir_srcset($srcset_sizes, $sizes, $alt, $img_id);

				// $imgsrcset = wp_get_attachment_image($img_id, 'full');

				echo '<div class="product-image">'.$imgsrcset.'</div>';
			?>

			<h3><?php echo $product['title']; ?></h3>
			<?php echo wpautop( $product['info'] ); ?>

		</article><!-- .product -->

	<?php } ?>

</div><!-- .store-products -->