<?php
$mandir_settings = get_option('mandir_fields');

if ( is_singular( 'mro-event' ) ) :

	$bankinfo = get_post_meta($post->ID, 'mro_event_bankinfo', false);

endif;
?>

<h2><?php _e('How to pay', 'mandir'); ?></h2>

<?php

if ( is_page_template( 'page-templates/template-thai.php' ) || in_array( 'local', $bankinfo ) ) : ?>

	<p><strong><?php _e('Make local bank transfers to:', 'mandir'); ?></strong></p>

	<?php
	echo wpautop( $mandir_settings['mro_payment_local'] );

endif;

if ( is_page_template( 'page-templates/template-thai.php' )  || in_array( 'international', $bankinfo ) ) : ?>

	<p><strong><?php _e('For international payments:', 'mandir'); ?></strong></p>

	<?php
	echo wpautop( $mandir_settings['mro_payment_international'] );
endif;

