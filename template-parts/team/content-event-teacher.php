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
			<div class="profile-image">
				<?php

				$srcset_sizes = array(
					array( 324, 324, true ),
					array( 162, 162, true ),
					);
				$sizes = '(min-width: 1200px) 162px, (min-width: 640px) 16vw, 150px';
				$alt = get_the_title();
				$srcset = mandir_srcset($srcset_sizes, $sizes, $alt);
				echo $srcset;

				// the_post_thumbnail();
				?>
			</div>
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