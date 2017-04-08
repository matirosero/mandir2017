<?php

namespace Mandir;

/**
 * Enqueue styles
 */
add_action( 'wp_enqueue_scripts', function() {

	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js', false, '3.0.0', true);
		wp_enqueue_script('jquery');
	}

	wp_enqueue_style(
		'mandir_styles',
		HEISENBERG_URL . '/assets/dist/css/app.css',
		'',
		HEISENBERG_VERSION,
		''
	);

	//Google fonts: Noto Sans & Oswald Regular
	// font-family: 'Noto Sans', sans-serif;
	// font-family: 'Oswald', sans-serif;
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i|Oswald', false );

} );


/**
 * Modify jquery version
 */
// function modify_jquery() {

// }
// add_action('init', 'modify_jquery');


/**
 * Enqueue scripts
 */
add_action( 'wp_enqueue_scripts', function() {

	// Add Foundation JS to footer
	wp_enqueue_script(
		'foundation-js',
		HEISENBERG_URL . '/assets/dist/js/foundation.js',
		['jquery'],
		'6.2.3',
		true
	);

	// Add our main app js file
	wp_enqueue_script(
		'mandir_appjs',
		HEISENBERG_URL . '/assets/dist/js/app.js',
		['jquery'],
		HEISENBERG_VERSION,
		true
	);

	// Add comment script on single posts with comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );