<?php
/**
 * Template part for events in event page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<?php
if ( mandir_redirect_url() ) :
	$url = mandir_redirect_url();
else:
	$url = get_permalink();
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('column column-block'); 
	if ( !is_page_template('page-templates/template-events.php') ) { echo ' data-equalizer-watch'; } ?>>

	<?php

	if ( has_post_thumbnail() ) : ?>
		<a href="<?php echo $url; ?>" class="event-featured-image">
			<?php //the_post_thumbnail(); ?>
			<?php

			if ( is_front_page() ) :
				$sizes = '(min-width: 640px) 33vw, 100vw';
			else:
				$sizes = '(min-width: 1200px) 285px,(min-width: 1024px) 25vw, (min-width: 640px) 33vw, 100vw';
			endif;

			$srcset_sizes = array(
				array( 1280, 669, true ),
				array( 690, 361, true ),
				array( 640, 334, true ),
				// array( 414, 216, true ),
				array( 345, 180, true ), //medium 3
				array( 285, 149, true ), //large 2
				// array( 512, 340, true ),
				);

			$alt = get_the_title();
			$imgsrcset = mandir_srcset($srcset_sizes, $sizes, $alt);
			echo $imgsrcset;

			?>
		</a><!-- .featured-image -->
	<?php else: ?>
		<a href="<?php echo $url; ?>" class="event-featured-image">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/img/event-placeholder.png" alt="<?php the_title(); ?>" />
		</a><!-- .featured-image -->
	<?php endif; ?>

	<div class="event-info">

		<?php the_title( '<h3 class="event-title"><a href="' . esc_url( $url ) . '" rel="bookmark">', '</a></h3>' ); ?>

		<span class="event-date"><?php echo mandir_pretty_event_dates(); ?></span>

		<?php if ( is_page_template('page-templates/template-events.php') ) :

			$venue = get_post_meta($post->ID, 'mro_event_location', true);
			if ( $venue == 'mandir' ) :
				$venue = 'Yoga Mandir';
			else:
				$venue = get_post_meta($post->ID, 'mro_event_location_name', true);
			endif; ?>

			<span class="event-venue">Lugar: <?php echo $venue; ?></span>



		<?php endif; ?>

		<a href="<?php echo $url; ?>"><?php _e('More information', 'mandir'); ?></a>

	</div><!-- .event-info -->
</article>
