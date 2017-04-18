<?php
/**
 * Template part for events in event page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('column column-block'); ?> data-equalizer-watch>

	<?php

	if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="featured-image">
			<?php the_post_thumbnail(); ?>
		</a><!-- .featured-image -->
	<?php endif; ?>

	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

	<span class="event-date"><?php echo mandir_pretty_event_dates(); ?></span>

	<a href="<?php the_permalink(); ?>"><?php _e('More information', 'mandir'); ?></a>
</article>
