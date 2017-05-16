<?php

//Grab all schedule options from DB
$pricing_settings = get_option('mro_class_schedule_prices');
$single_class = $pricing_settings['single_class'];
$signup_fee = $pricing_settings['signup_fee'];
$monthly_prices = $pricing_settings['monthly_prices'];

?>



<section id="tarifas" class="pricing">
	<h2 class="entry-title"><?php _e('Pricing', 'mandir'); ?></h2>

<?php /*
	<nav class="pricing-nav">
		<ul class="menu simple">

		<?php
		$i = 0;
		foreach ($monthly_prices as $monthly_price) {
			$id_name = mandir_convert_to_lowercase_dash($monthly_price['monthly_title']);
			$monthly_prices[$i]['id_name'] = $id_name;
			$i++;
			?>
			<li><a href="#<?php echo $id_name; ?>"><?php echo $monthly_price['monthly_title']; ?></a></li>
		<?php } ?>


			<li><a href="#clase-suelta"><?php _e('Drop-in class', 'mandir'); ?></a></li>
			<li><a href="#matricula"><?php _e('Membership', 'mandir'); ?></a></li>
		</ul>
	</nav>
*/ ?>

	<?php
	foreach ($monthly_prices as $monthly_price) { ?>

		<div id="<?php echo $monthly_price['id_name']; ?>" class="row column">

			<h3><?php echo $monthly_price['monthly_title']; ?></h3>

			<?php if ( $monthly_price['monthly_description'] != '' ) : ?>
				<p><?php echo $monthly_price['monthly_description']; ?></p>
			<?php endif; ?>

			<ul class="price-list row small-up-1 medium-up-2 large-up-4" data-equalizer data-equalize-on="medium">
				<li class="column column-block">
					<div class="price-info" data-equalizer-watch>
						<span class="price">₡<?php echo $monthly_price['monthly_1weekly']; ?></span>
						<span class="price-description">
							<?php _e('1 class per week', 'mandir'); ?><br />
							<?php _e('4 classes per month', 'mandir'); ?>
						</span>
					</div>
				</li>
				<li class="column column-block">
					<div class="price-info" data-equalizer-watch>
						<span class="price">₡<?php echo $monthly_price['monthly_2weekly']; ?></span>
						<span class="price-description">
							<?php _e('2 classes per week', 'mandir'); ?><br />
							<?php _e('8 classes per month', 'mandir'); ?>
						</span>
					</div>
				</li>
				<li class="column column-block">
					<div class="price-info" data-equalizer-watch>
						<span class="price">₡<?php echo $monthly_price['monthly_3weekly']; ?></span>
						<span class="price-description">
							<?php _e('3 classes per week', 'mandir'); ?><br />
							<?php _e('12 classes per month', 'mandir'); ?>
						</span>
					</div>
				</li>
				<li class="column column-block">
					<div class="price-info special" data-equalizer-watch>
						<span class="price">₡<?php echo $monthly_price['monthly_unlimited']; ?></span>
						<span class="price-description">
							<?php _e('Unlimited classes', 'mandir'); ?>
						</span>
					</div>
				</li>
			</ul>
		</div>
	<?php } ?>

	<div class="row column">
		<ul class="price-list row small-up-1 medium-up-2 large-up-4" data-equalizer data-equalize-on="medium">
			<li class="column column-block">
				<h3><?php _e('Single class', 'mandir'); ?></h3>
				<p><?php echo $single_class['single_class_description']; ?></p>
				<div class="price-info" data-equalizer-watch>
					<span class="price">₡<?php echo $single_class['single_class_price']; ?></span>
					<span class="price-description"><?php _e('1 class', 'mandir'); ?></span>
				</div>
			</li>
			<li class="column column-block">
				<h3><?php _e('Membership', 'mandir'); ?></h3>
				<p><?php echo $signup_fee['signup_description']; ?></p>
				<div class="price-info" data-equalizer-watch>
					<span class="price">₡<?php echo $signup_fee['signup_price']; ?></span>
					<span class="price-description"><?php _e('Per year', 'mandir'); ?></span>
				</div>				
			</li>	
		</ul>
	</div>




</section><!-- .pricing -->
