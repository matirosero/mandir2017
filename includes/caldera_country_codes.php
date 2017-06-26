<?php
/**
Set intiial country for Caldera Forms phone fields
*/
add_filter( 'caldera_forms_phone_js_options', function( $options){
	//Use ISO_3166-1_alpha-2 formatted country code
	$options[ 'initialCountry' ] = 'CR';
		$options[ 'preferredCountries' ] = array( 'CR', 'NI', 'PA' );

	// $options[ 'autoHideDialCode' ] = TRUE;
	return $options;
});

