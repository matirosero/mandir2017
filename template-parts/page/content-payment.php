<?php
$mandir_settings = get_option('mandir_fields');

if ( is_singular( 'mro-event' ) ) :

	$bankinfo = get_post_meta($post->ID, 'mro_event_bankinfo', false);

endif;
?>

<?php if ( is_english() ) : ?>
	<h2>How to pay</h2>
<?php else : ?>
	<h2><?php _e('How to pay', 'mandir'); ?></h2>
<?php endif; ?>



<?php

if ( !is_singular( 'mro-event' ) || ( is_singular( 'mro-event' ) && in_array( 'local', $bankinfo ) ) ) : ?>

	<?php if ( is_english() ) : ?>
		<p><strong>Make local bank transfers to:</strong></p>
	<?php else : ?>
		<p><strong><?php _e('Make local bank transfers to:', 'mandir'); ?></strong></p>
	<?php endif; ?>

	<?php
	echo wpautop( $mandir_settings['mro_payment_local'] );

endif;

if ( is_page_template( 'page-templates/template-thai.php' )  || ( is_singular( 'mro-event' ) && in_array( 'international', $bankinfo ) ) ) : ?>

	<?php if ( is_english() ) : ?>
		<p><strong>For international payments:</strong></p>
	<?php else : ?>
		<p><strong><?php _e('For international payments:', 'mandir'); ?></strong></p>
	<?php endif; ?>

	<?php
	echo wpautop( $mandir_settings['mro_payment_international'] );
endif;

