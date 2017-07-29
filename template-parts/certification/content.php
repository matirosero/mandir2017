<?php
/**
 * Template part for displaying teacher training content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<?php
$state = get_post_meta($post->ID, 'mro_training_state', true);
?>

<?php
/*
 TO DO:
 Move main and side column into their own template part
 Training folder?
*/
?>

<div class="entry-content">

	<div class="medium-4 medium-push-8 columns">
		<div id="secondary" class="quick-info" role="complementary">

			<?php
			//Sidebar
			get_template_part( 'template-parts/certification/content', 'sidebar' );
			?>

		</div>
	</div>
	<div class="medium-8 medium-pull-4 columns">

		<?php

		the_content();

		//Curriculum
		get_template_part( 'template-parts/certification/content', 'curriculum' );

		//Recommendations
		get_template_part( 'template-parts/certification/content', 'recs' );


		// Certification
		if ( get_post_meta($post->ID, 'mro_training_certification', true) ) :
			$certification_list = get_post_meta($post->ID, 'mro_training_certification', true);
			?>
			<h2>Reconocimiento</h2>
			<ul>
			<?php
			foreach ( $certification_list as $li ) {
				echo '<li>'.$li['point'].'</li>';
			} ?>
			</ul>
		<?php endif; ?>

		<?php
		// Teachers
		if ( get_post_meta($post->ID, 'mro_training_teachers', true) ) :
			?>
			<h2>Profesorado</h2>

			<?php if ( get_post_meta($post->ID, 'mro_training_teachers_image', true) ) : ?>

				<?php
				$teachers_img_id = get_post_meta($post->ID, 'mro_training_teachers_image', true);
				$teachers_imgsrcset = wp_get_attachment_image($teachers_img_id, 'medium');
				?>

				<div class="row">


					<div class="medium-8 medium-push-4 large-9 large-push-3 columns">

						<?php echo wpautop( get_post_meta($post->ID, 'mro_training_teachers', true) );
						?>
					</div>

					<div class="medium-4 medium-pull-8 large-3 large-pull-9 columns">

						<div class="profile-image"><?php echo $teachers_imgsrcset; ?></div>
					</div>

				</div><!-- .row -->

			<?php else :
				echo wpautop( get_post_meta($post->ID, 'mro_training_teachers', true) );
			endif; ?>

		<?php endif; ?>


		<?php
		// How to enroll
		if ( get_post_meta($post->ID, 'mro_training_howtoenroll', true) ) :
			$steps = get_post_meta($post->ID, 'mro_training_howtoenroll', true);
			?>
			<h2>Proceso de matrícula</h2>
			<ol>
			<?php
			foreach ( $steps as $step ) {
				echo '<li>'.$step['point'].'</li>';
			} ?>
			</ol>
		<?php endif; ?>

	</div>

</div><!-- .entry-content -->

