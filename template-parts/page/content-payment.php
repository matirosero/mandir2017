<?php
$mandir_settings = get_option('mandir_fields');
?>

<h2><?php _e('How to pay', 'mandir'); ?></h2>

<p><strong><?php _e('Make local bank transfers to:', 'mandir'); ?></strong></p>

<?php

echo wpautop( $mandir_settings['mro_payment_local'] );

if ( is_page_template( 'page-templates/template-training.php' ) ) : ?>
	<p><strong><?php _e('For international payments:', 'mandir'); ?></strong></p>

	<?php
	echo wpautop( $mandir_settings['mro_payment_international'] );
endif;

