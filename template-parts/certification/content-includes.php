<?php
$items = get_post_meta($post->ID, 'mro_training_includes', true);
// var_dump($items);

if ( !empty($items[0]['point']) ) : ?>

	<?php $count = count($items); ?>

	<?php if ( is_page_template( 'page-templates/template-thai.php' ) ) : ?>
	<?php if ( is_english() ) : ?>
		<h2>Each level includes</h2>
	<?php else : ?>
		<h2><?php _e('Each level includes', 'mandir'); ?></h2>
	<?php endif; ?>

	<?php else: ?>
		<h2><?php _ex('Includes', 'Certification includes', 'mandir'); ?></h2>
	<?php endif; ?>

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