<?php

//Grab all schedule options from DB
$pricing_settings = get_option('mro_class_schedule_prices');
$single_class = $pricing_settings['single_class'];
$signup_fee = $pricing_settings['signup_fee'];
$monthly_prices = $pricing_settings['monthly_prices'];
?>

<section class="pricing">
	<h2><?php _e('Pricing', 'mandir'); ?></h2>

	<ul class="price-list row">
		<li class="medium-3 columns">
			<h3><?php _e('Single class', 'mandir'); ?></h3>
			<p><?php echo $single_class['single_class_description']; ?></p>
			<div class="callout secondary">
				<span class="price"><?php echo $single_class['single_class_price']; ?></span>
				<span class="price-description"><?php _e('1 class', 'mandir'); ?></span>
			</div>
		</li>
		<li class="medium-9 columns">
			<h3><?php _e('Membership', 'mandir'); ?></h3>
			<p><?php echo $signup_fee['signup_description']; ?></p>
			<div class="callout secondary">
				<span class="price"><?php echo $signup_fee['signup_price']; ?></span>
				<span class="price-description"><?php _e('Per year', 'mandir'); ?></span>
			</div>

			<ul>
				<?php
				foreach ($monthly_prices as $monthly_price) { ?>
					<li>
						<h4><?php echo $monthly_price['monthly_title']; ?></h4>
						<?php if ( $monthly_price['monthly_description'] != '' ) : ?>
							<p><?php echo $monthly_price['monthly_description']; ?></p>
						<?php endif; ?>
						<ul>
							<li>
								<div class="callout secondary">
									<span class="price"><?php echo $monthly_price['monthly_1weekly']; ?></span>
									<span class="price-description">
										<?php _e('1 class per week'); ?><br />
										<?php _e('4 classes per week'); ?>
									</span>
								</div>
							</li>

							<li>
								<div class="callout secondary">
									<span class="price"><?php echo $monthly_price['monthly_2weekly']; ?></span>
									<span class="price-description">
										<?php _e('2 classes per week'); ?><br />
										<?php _e('8 classes per week'); ?>
									</span>
								</div>
							</li>

							<li>
								<div class="callout secondary">
									<span class="price"><?php echo $monthly_price['monthly_3weekly']; ?></span>
									<span class="price-description">
										<?php _e('3 classes per week'); ?><br />
										<?php _e('12 classes per week'); ?>
									</span>
								</div>
							</li>

							<li>
								<div class="callout primary">
									<span class="price"><?php echo $monthly_price['monthly_unlimited']; ?></span>
									<span class="price-description">
										<?php _e('Unlimited classes'); ?>
									</span>
								</div>
							</li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</li>

	</ul>
</section><!-- .pricing -->
