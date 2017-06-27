<?php
/**
 * Template part for displaying teacher training content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<?php
$product = get_post_meta($id, 'mro_product_bulk', true);
$price_points = $product['price_points'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row column'); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

		<h2>Yoga mats al por mayor</h2>

		<div class="small-10 columns">
			<div class="slider" data-slider data-initial-start="6">
				<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
				<span class="slider-fill" data-slider-fill></span>

				<div class="slider-markers">
				<?php

				foreach ($price_points as $price_point) {
					$qty = $price_point['qty'];
					$price = $price_point['price'];
					echo '<span class="slider-marker-'.$qty.'" data-price="'.$price.'" data-quantity="'.$qty.'" style="left:'.$qty.'%">'.$qty.'</span>';
				} ?>
				</div>
			</div>


		</div>
		<div class="small-2 columns">
		  <!-- <input type="number" id="sliderOutput1"> -->
		</div>

			<p id="bulk-price">
				<span class="bulk-qty">0</span> mats<br />
				<strong>Precio unitario:</strong> <span class="bulk-price"> </span><br />
				<strong>Precio total:</strong> <span class="total-price"> </span>
			</p>

		<?php
		echo wpautop( $product['info'] );
		echo do_shortcode( '[caldera_form id="CF593c379405e69"]' );
		?>
	</div><!-- .entry-content -->





	

</article><!-- #post-## -->