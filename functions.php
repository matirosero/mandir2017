<?php
/**
 * Kickoff theme setup and build
 */

namespace Mandir;

define( 'HEISENBERG_VERSION', '2.0.5' );
define( 'HEISENBERG_DIR', __DIR__ );
define( 'HEISENBERG_URL', get_template_directory_uri() );

require_once __DIR__ . '/vendor/aaronholbrook/autoload/autoload.php';

require_once get_stylesheet_directory() . '/assets/vendors/image-processing-queue/image-processing-queue.php';

\AaronHolbrook\Autoload\autoload( __DIR__ . '/includes' );