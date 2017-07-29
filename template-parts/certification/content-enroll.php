<?php

$items = get_post_meta($post->ID, 'mro_training_howtoenroll', true);
// var_dump($items);

if ( !empty($items[0]['point']) ) : ?>

	<?php $count = count($items); ?>

	<h2><?php _e('Enrollment process', 'mandir'); ?></h2>

	<?php
	if ( $count > 1 ) : ?>

		<ol>
			<?php
			foreach ( $items as $item ) {
				echo '<li>'.$item['point'].'</li>';
			} ?>
		</ol>

	<?php else: ?>

		<p><?php echo $items[0]['point']; ?></p>

	<?php endif; ?>

<?php endif; ?>