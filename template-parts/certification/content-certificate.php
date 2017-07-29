<?php

$items = get_post_meta($post->ID, 'mro_training_certification', true);
// var_dump($items);

if ( !empty($items[0]['point']) ) : ?>

	<?php $count = count($items); ?>

	<h2><?php _ex('Certificate', 'Heading for certificate info in template', 'mandir'); ?></h2>

	<?php
	if ( $count > 1 ) : ?>

		<ul>
			<?php
			foreach ( $items as $item ) {
				echo '<li>'.$item['point'].'</li>';
			} ?>
		</ul>

	<?php else: ?>

		<p><?php echo $items[0]['point']; ?></p>

	<?php endif; ?>

<?php endif; ?>