<?php
/*
 * Customize Menu Item Classes
 * @author Bill Erickson
 * @link http://www.billerickson.net/customize-which-menu-item-is-marked-active/
 *
 * @param array $classes, current menu classes
 * @param object $item, current menu item
 * @param object $args, menu arguments
 * @return array $classes
 *
 * http://www.billerickson.net/customize-which-menu-item-is-marked-active/
 */
function mro_menu_top_item_classes( $classes, $item, $args ) {

	if( 'primary' !== $args->theme_location )
		return $classes;

	if( is_front_page() && ( 'Clases de Yoga' == $item->title  || 'Clases de yoga' == $item->title  || 'Clases' == $item->title ) )
		$classes[] = 'active';

	if( is_singular( 'mro-team' ) && ( 'Clases de Yoga' == $item->title  || 'Clases de yoga' == $item->title  || 'Clases' == $item->title ) )
		$classes[] = 'current-menu-item active';

	if( is_singular( 'mro-event' ) && 'Actividades' == $item->title )
		$classes[] = 'current-menu-item active';

	if( is_page_template( 'page-templates/template-thai.php' ) && 'Masaje tai' == $item->title )
		$classes[] = 'current-menu-item active';

	// if( ( is_singular( 'code' ) || is_tax( 'code-tag' ) ) && 'Talleres' == $item->title )
		// $classes[] = 'current-menu-item';

	// if( is_singular( 'projects' ) && 'Entrenamiento' == $item->title )
	// 	$classes[] = 'current-menu-item';

	// if( is_singular( 'projects' ) && 'Masaje Tai' == $item->title )
	// 	$classes[] = 'current-menu-item';

	// if( is_singular( 'projects' ) && 'Yoga' == $item->title )
	// 	$classes[] = 'current-menu-item';

	// if( is_singular( 'projects' ) && 'Nosotros' == $item->title )
	// 	$classes[] = 'current-menu-item';

	if( mandir_is_tree(18) && 'Tienda' == $item->title )
		$classes[] = 'current-menu-item';

	// if( is_singular( 'projects' ) && 'Contáctenos' == $item->title )
	// 	$classes[] = 'current-menu-item';

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'mro_menu_top_item_classes', 10, 3 );


//https://stackoverflow.com/questions/26789438/how-to-add-active-class-to-wp-nav-menu-current-menu-item-simple-way
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-ancestor', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);