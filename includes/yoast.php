<?php

/*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');



/*-------------------------------------
 * Enforce HTTP Open Graph URLs in Yoast SEO
 * Credit: stodorovic https://github.com/stodorovic
 * Last Tested: Feb 06 2017 using Yoast SEO 4.2.1 on WordPress 4.7.2
---------------------------------------*/
 
add_filter( 'wpseo_opengraph_url', 'my_opengraph_url' );

function my_opengraph_url( $url ) {
        return str_replace( 'https://', 'http://', $url );
}

