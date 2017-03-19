<?php
/**
 * Mandir Social Media Accounts in Customizer.
 * Ref: https://www.competethemes.com/blog/social-icons-wordpress-menu-theme-customizer/
 */

function ct_mandir_social_array() {

	$social_sites = array(
		// 'twitter'       => 'mandir_twitter_profile',
		'facebook'      => 'mandir_facebook_profile',
		// 'google-plus'   => 'mandir_googleplus_profile',
		// 'pinterest'     => 'mandir_pinterest_profile',
		// 'linkedin'      => 'mandir_linkedin_profile',
		'youtube'       => 'mandir_youtube_profile',
		// 'instagram'     => 'mandir_instagram_profile',
		// 'flickr'        => 'mandir_flickr_profile',
		// 'whatsapp'      => 'mandir_whatsapp_profile',
		// 'paypal'        => 'mandir_paypal_profile',
	);

	return apply_filters( 'ct_mandir_social_array_filter', $social_sites );
}

function my_add_customizer_sections( $wp_customize ) {

	$social_sites = ct_mandir_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'ct_mandir_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'tribes' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'tribes' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {

		$label = ucfirst( $social_site );

		if ( $social_site == 'google-plus' ) {
			$label = 'Google Plus';
		} elseif ( $social_site == 'whatsapp' ) {
			$label = 'WhatsApp';
		} elseif ( $social_site == 'paypal' ) {
			$label = 'PayPal';
		}
		// setting
		$wp_customize->add_setting( $social_site, array(
			'sanitize_callback' => 'esc_url_raw'
		) );
		// control
		$wp_customize->add_control( $social_site, array(
			'type'     => 'url',
			'label'    => $label,
			'section'  => 'ct_mandir_social_media_icons',
			'priority' => $priority
		) );
		// increment the priority for next site
		$priority = $priority + 5;
	}
}
add_action( 'customize_register', 'my_add_customizer_sections' );


/*
 * Outputs <li>'s for menu'
 */
function mandir_socialmedia_topbar_output() {

	$social_sites = ct_mandir_social_array();

	foreach ( $social_sites as $social_site => $profile ) {

		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {

		foreach ( $active_sites as $key => $active_site ) {
        	$class = 'icon-' . $active_site; ?>
		 	<li class="menu-item show-for-medium">
				<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
					<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
				</a>
			</li>
		<?php }
	}
}

/*
 * Outputs a <ul> with icons and links
 */
function mandir_socialmedia_list_output() {

	$social_sites = ct_mandir_social_array();

	foreach ( $social_sites as $social_site => $profile ) {

		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {

		echo '<ul class="social-media-icons">';
		foreach ( $active_sites as $key => $active_site ) {
        	$class = 'icon-' . $active_site; ?>
		 	<li>
				<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
					<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
				</a>
			</li>
		<?php }
		echo "</ul>";
	}
}