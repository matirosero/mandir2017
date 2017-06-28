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
	</div>

	<div class="page-section">

		<h2 class="section-title">Yoga mats al por mayor</h2>

		<div class="row product-pricing">

			<div class="medium-7 large-9 columns">
				<div class="slider" data-slider data-initial-start="6" data-end="100">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
					<span class="slider-fill" data-slider-fill></span>
					<input type="hidden">


					<div class="slider-markers">
					<?php

					foreach ($price_points as $price_point) {
						$qty = $price_point['qty'];
						$price = $price_point['price'];
						echo '<span class="slider-marker-'.$qty.'" data-price="'.$price.'" data-quantity="'.$qty.'" style="left:'.$qty.'%">'.$qty.'</span>';
					} ?>
					</div>
				</div>

				<div id="bulk-price">
					<h3><span class="bulk-qty">0</span> mats</h3>
					<p>
						<strong>Precio unitario:</strong> <span class="bulk-price"> </span><br />
						<strong>Precio total:</strong> <span class="total-price"> </span>
					</p>
				</div>
			</div>

			<div class="medium-5 large-3 columns">
				<div class="price-info">
					<h3>Precio unitario</h3>
					<ul>
						<?php

						$i = 0;
						$count = count($price_points);
						foreach ($price_points as $price_point) {
							$lower_range = $price_point['qty'];
							$price = $price_point['price'];
							$i++;

							if ( $i < $count ) : 
								$higher_range = $price_points[$i]['qty'];
								echo '<li><strong>'.$lower_range.' - '.$higher_range.' mats:</strong> $'.$price.'</li>';
							else :
								echo '<li><strong>'.$lower_range.'+ mats:</strong> $'.$price.'</li>';
							endif;
						} ?>
					</ul>
				</div>
			</div>

		</div>

		<?php
		echo apply_filters('the_content', $product['info']);
		?>
	</div><!-- .entry-content -->







</article><!-- #post-## -->