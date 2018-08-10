<?php
$c = get_post_meta($post->ID, 'mro_training_currency', true);
$prices = get_post_meta($post->ID, 'mro_training_pricing_options', true);
$pricing_notes = get_post_meta($post->ID, 'mro_training_pricing_notes', true);

if ( !empty($prices[0]['price']) ) : ?>

	<div class="sidebar-section">

		<?php if ( is_english() ) : ?>
			<h3>Cost</h3>
		<?php else : ?>
			<h3><?php _e('Cost','mandir'); ?></h3>
		<?php endif; ?>


		<ul>
		<?php
		foreach ($prices as $price) { ?>
			<li>
				<span class="certification-price"><?php echo $c.$price['price']; ?></span>
				<span class="certification-price-description"><?php echo $price['description']; ?></span>
			</li>
		<?php } ?>
		</ul>

		<?php
		if ( !empty($pricing_notes) ) : ?>
			<p class="certification-pricing-notes"><?php echo $pricing_notes; ?></p>
		<?php endif; ?>

	</div><!-- .sidebar-section -->

<?php endif;