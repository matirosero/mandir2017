<?php
/**
 * Template part for displaying certification content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<?php
$state = get_post_meta($post->ID, 'mro_training_state', true);
?>

<div class="entry-content">

	<div class="medium-4 medium-push-8 columns">
		<div id="secondary" class="quick-info" role="complementary">

			<?php
			//Sidebar
			if ( is_page_template( 'page-templates/template-training.php' ) ) :
				get_template_part( 'template-parts/certification/content', 'sidebar-training' );
			else:
				get_template_part( 'template-parts/certification/content', 'sidebar' );
			endif;
			?>

		</div>
	</div>
	<div class="medium-8 medium-pull-4 columns">

		<?php

		the_content();

		//Teachers
		get_template_part( 'template-parts/certification/content', 'teachers' );

		//Curriculum
		get_template_part( 'template-parts/certification/content', 'curriculum' );

		//Recommendations
		get_template_part( 'template-parts/certification/content', 'includes' );

		//Recommendations
		get_template_part( 'template-parts/certification/content', 'recs' );

		// Certificate
		get_template_part( 'template-parts/certification/content', 'certificate' );

		// Certificate
		get_template_part( 'template-parts/certification/content', 'enroll' );

		?>

	</div>

</div><!-- .entry-content -->

