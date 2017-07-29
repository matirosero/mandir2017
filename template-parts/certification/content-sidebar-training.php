<?php

$state = get_post_meta($post->ID, 'mro_training_state', true);
$types = get_post_meta($post->ID, 'mro_training_types', true);
$reservation = get_post_meta($post->ID, 'mro_training_reserve', true);
$options  = get_post_meta($post->ID, 'mro_training_payment_options', true);

//Heading
get_template_part( 'template-parts/certification/content', 'sidebar-heading' );
?>

<?php
//Orientation
get_template_part( 'template-parts/certification/content', 'orientation' ); 
?>

<?php
// Types || Duration
if ( count($types) > 0 ) : ?>

	<div class="sidebar-section">
		<h3>Modalidad<?php if ( count($types) > 1 ) { echo 'es'; } ?></h3>

		<?php
		foreach ($types as $type) { ?>
			<p>
				<strong><?php echo $type['title']; ?>:</strong><br />
				<?php echo nl2br($type['description']); ?>
			</p>
		<?php } ?>
	</div><!-- .sidebar-section -->

<?php endif; ?>


<div class="sidebar-section">
	<h3><?php _e('Schedule','mandir'); ?></h3>

	<?php
	$i = 0;
	foreach ($types as $schedule) {
		mro_certificaction_render_schedule($schedule);
		$i++;
	} ?>

</div><!-- .sidebar-section -->


<div class="sidebar-section">
	<h3><?php _e('Cost','mandir'); ?></h3>
	<ul>
	<?php
	foreach ($types as $price) { ?>
		<li>
			$<?php echo $price['price'].' – '.$price['title']; ?>
		</li>
	<?php } ?>
	</ul>
</div><!-- .sidebar-section -->

<div class="sidebar-section">
	<h3>Reserva de cupo</h3>
	<p>
		<strong>$<?php echo $reservation['price']; ?></strong><br />
		<?php echo $reservation['description']; ?>
	</p>
</div><!-- .sidebar-section -->

<div class="sidebar-section">
	<h3>Forma de pago</h3>
	<ul>
	<?php
	//var_dump($options);
	foreach ($options as $option) { ?>
		<li>
			<?php
			$option_title ='';
			$payments = $option['payments'];

			if ( $payments > 1 ) :
				$option_title = '<strong>'.$payments.' pagos adicionales</strong>';
			elseif ( $payments == 1 ):
				$option_title = '<strong>'.$payments.' pago adicional</strong>';
			endif;

			if ( $option['discount'] ) :
				$option_title .= ' <span class="discount">Descuento de $'.$option['discount'].'</span>';
			endif;

			echo $option_title;

			$desc = $option['description'];

			echo '<ul>';

			foreach ($types as $type) {
				$payment = ( $type['price']-$option['discount'] ) / $payments;
				?>
				<?php //var_dump($type); ?>
				<li>
					<?php echo '<strong>'.$type['title'].':</strong> $'.$payment.' '.$desc; ?>
				</li>
			<?php }

			echo '</ul>';

			?>
		</li>

	<?php } ?>
	</ul>
</div><!-- .sidebar-section -->