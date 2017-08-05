<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mandir
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php
if ( is_front_page() ) :

	global $mandir_settings;
	$mandir_settings = get_option('mandir_fields');
	$slider_active = $mandir_settings['hero_slider_enable'];

endif;

if ( is_front_page() && $slider_active == 1 ) : ?>
	<body <?php body_class('no-js slider-active'); ?>>
<?php else: ?>
	<body <?php body_class('no-js'); ?>>
<?php endif;?>


<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
<!--     <div class="title-bar show-for-small-only">
      <div class="title-bar-left">
        <button class="menu-icon" type="button" data-toggle="offCanvasLeft"></button>
        <span class="title-bar-title"><?php bloginfo( 'name' ); ?></span>
      </div>
    </div><!-- .title-bar -->
    <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
			<button class="close-button" aria-label="Close menu" type="button" data-close>
				<span aria-hidden="true">&times;</span>
			</button>
			<?php
			 $args = array (
				 'theme_location' 	=> 'mobile',
				 'container' 		=> 'nav',
				 'container_class'	=> 'offcanvas-navigation',
				 'menu_class' 		=> 'mobile-menu',
			 );
				wp_nav_menu( $args );
			?>
    </div><!-- #offCanvasLeft -->
    <div class="off-canvas-content" data-off-canvas-content>

			<?php
			//Action to insert things at the top (i.e. announcement bar from plugin)
			do_action('mro_body_top'); ?>

			<header id="masthead" class="" role="banner">

				<nav id="site-navigation" class="top-bar" data-topbar role="navigation">
					<section class="top-bar-title">
						<h1 class="site-title">
							<a href="<?php esc_attr_e( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/svg/logo-mandir.svg" alt="<?php bloginfo( 'name' ); ?>" />
							</a>
						</h1><!-- .site-title -->
					</section><!-- .top-bar-title -->
					<section id="main-menu" class="top-bar-left">
						<?php
						wp_nav_menu(
							array(
								'theme_location' 	=> 'primary',
								'container_class'	=> 'show-for-large',
								'menu_id'			=> 'main-menu-large',
								'depth'				=> 2,
							)
						);

						wp_nav_menu(
							array(
								'theme_location' 	=> 'primary-medium',
								'container_class'	=> 'show-for-medium hide-for-large',
								'depth'				=> 1,
							)
						);

						wp_nav_menu(
							array(
								'theme_location' 	=> 'primary-small',
								'container_class'	=> 'show-for-small-only',
								'depth'				=> 1,
							)
						);
						?>
					</section><!-- .top-bar-left -->
					<section id="utility-menu" class="top-bar-right">
						<ul class="menu">
							<?php mandir_socialmedia_topbar_output(); ?>
							<li class="menu-item hide-for-large">
								<a href="#" data-toggle="offCanvasLeft"><i class="icon-menu"></i></a>
							</li>
						</ul>
					</section><!-- .top-bar-right -->
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->

	<?php
	//Get frontpage settings if it's frontpage
	if ( is_front_page() && $slider_active == 1 ) :
		include(locate_template('template-parts/page/content-hero-slider.php'));
	elseif ( has_post_thumbnail() && ! is_singular( array( 'mro-team', 'mro-event' ) ) && ( is_single() || is_page() ) ) :
		get_template_part( 'template-parts/page/content', 'header-image' );
	endif;
	?>

			<div id="content" class="site-content">