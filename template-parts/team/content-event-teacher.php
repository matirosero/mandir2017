<?php
/**
 * Template part for displaying teacher in event or certification
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
// var_dump($post);
// setup_postdata( $post );
?>

<div class="teacher-box">
	<div class="row">
		<div class="medium-3 columns">
			<div class="profile-image"><?php the_post_thumbnail(); ?></div>
		</div>
		<div class="medium-9 columns">
			<h2>
				<span class="heading-label"><?php _e('Teacher:','mandir'); ?></span>
				<?php the_title(); ?>
			</h2>
			<?php the_excerpt(); ?>
		</div>
	</div><!-- .row -->
</div><!-- .teacher-box -->