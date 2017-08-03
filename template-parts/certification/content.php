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

	<div class="medium-8 columns">

		<?php

		the_content();


		if ( !is_page_template( 'page-templates/template-thai.php' ) ) :

			//Teachers (not thai)
			get_template_part( 'template-parts/certification/content', 'teachers' );

			//Curriculum (not thai)
			get_template_part( 'template-parts/certification/content', 'curriculum' );

		endif;

		//Includes
		get_template_part( 'template-parts/certification/content', 'includes' );
		
		if ( is_page_template( 'page-templates/template-thai.php' ) ) :

			//Daily schedule
			get_template_part( 'template-parts/certification/content', 'daily' );

			//Modules
			get_template_part( 'template-parts/certification/content', 'thai' );

		endif;





		if ( !is_page_template( 'page-templates/template-thai.php' ) ) :

			//Recommendations (not thai)
			get_template_part( 'template-parts/certification/content', 'recs' );

			// Certificate (not thai)
			get_template_part( 'template-parts/certification/content', 'certificate' );

		endif;


		// Enroll
		get_template_part( 'template-parts/certification/content', 'enroll' );

		if ( !is_page_template( 'page-templates/template-india.php' ) ) :
			// Payment
			get_template_part( 'template-parts/page/content', 'payment' );
		endif;

		?>

	</div>

	<div class="medium-4 columns">
		<div id="secondary" class="quick-info" role="complementary">

			<?php
			//Sidebar
			if ( is_page_template( 'page-templates/template-training.php' ) ) :
				get_template_part( 'template-parts/certification/content', 'sidebar-training' );
			elseif ( is_page_template( 'page-templates/template-india.php' ) ) :
				get_template_part( 'template-parts/certification/content', 'sidebar-india' );
			else:
				get_template_part( 'template-parts/certification/content', 'sidebar' );
			endif;
			?>

		</div>
	</div>

</div><!-- .entry-content -->

