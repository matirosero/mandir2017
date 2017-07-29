<?php

$recs = get_post_meta($post->ID, 'mro_training_recs', true);

if ( !empty($recs[0]['rec']) ) : ?>

	<?php $rec_count = count($recs); ?>

	<h2>
		<?php echo esc_html( _n( 'Recommendation', 'Recommendations', $rec_count, 'mandir' ) ); ?>
	</h2>

	<?php
	if ( $rec_count > 1 ) : ?>

		<ul>
			<?php
			foreach ( $recs as $rec ) {
				echo '<li>'.$rec['rec'].'</li>';
			} ?>
		</ul>

	<?php else: ?>

		<p><?php echo $recs[0]['rec']; ?></p>

	<?php endif; ?>

<?php endif; ?>