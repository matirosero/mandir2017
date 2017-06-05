<?php
/**
 * Template part for displaying teacher training content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/page/content', 'header-intro' ); ?>

	<div class="row entry-content">

		<div class="large-8 columns">

			<?php
			if ( get_post_meta($post->ID, 'mro_training_curriculum', true) ) :
				$curriculum = get_post_meta($post->ID, 'mro_training_curriculum', true);
				?>
				<h2>Curriculum</h2>
				<ul>
				<?php
				foreach ( $curriculum as $module ) {
					echo '<li><strong>'.$module['title'].':</strong> '.$module['length'].'<br />
						'.$module['description'].'</li>';
				} ?>
				</ul>
			<?php endif; ?>

			<?php
			if ( get_post_meta($post->ID, 'mro_training_recs', true) ) :
				$recs = get_post_meta($post->ID, 'mro_training_recs', true);
				?>
				<h2>Recomendaciones</h2>
				<ul>
				<?php
				foreach ( $recs as $rec ) {
					echo '<li>'.$rec['rec'].'</li>';
				} ?>
				</ul>
			<?php endif; ?>

			<?php
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

			<h2>Profesorado</h2>
			<?php
			echo get_post_meta($post->ID, 'mro_training_teachers', true);
			?>



			<?php
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

		<div class="large-4 columns">
			<div class="sidebar">
				<h2>Próximo entrenamiento</h2>

			</div>
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->