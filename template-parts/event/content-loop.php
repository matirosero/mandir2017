<?php
/**
 * Template part for events in event page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('column column-block'); ?>>

	<?php

	if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="event-featured-image">
			<?php //the_post_thumbnail(); ?>
			<?php
			echo ipq_get_theme_image( get_post_thumbnail_id( get_the_id() ), array(
			        array( 620, 324, true ),
			        array( 1000, 524, true ),
			        array( 1200, 628, true ),
			    ),
			    array(
			        'class' => 'event-image'
			    )
			);
			?>
		</a><!-- .featured-image -->
	<?php else: ?>
		<a href="<?php the_permalink(); ?>" class="event-featured-image">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/img/event-placeholder.png" alt="<?php the_title(); ?>" />
		</a><!-- .featured-image -->
	<?php endif; ?>

	<div class="event-info">

		<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

		<span class="event-date"><?php echo mandir_pretty_event_dates(); ?></span>

		<?php if ( is_page_template('page-templates/template-events.php') ) : 
						
			$venue = get_post_meta($post->ID, 'mro_event_location', true);
			if ( $venue == 'mandir' ) :
				echo '<span class="event-venue">Lugar: Yoga Mandir</span>';
			else:
				//
			endif;

		endif; ?>

		<a href="<?php the_permalink(); ?>"><?php _e('More information', 'mandir'); ?></a>

	</div><!-- .event-info -->
</article>
