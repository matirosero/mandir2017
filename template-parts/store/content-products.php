<?php
$products = get_post_meta($id, 'mro_store_products', true);
// var_dump($products);
?>


<div class="row entry-content medium-up-2" data-equalizer data-equalize-on="medium">
	<?php
	foreach ($products as $product) { ?>
		<article class="column column-block" data-equalizer-watch>

			<h3><?php echo $product['title']; ?></h3>
			<?php echo wpautop( $product['info'] ); ?>

		</article>
	<?php } ?>


</div><!-- .entry-content -->