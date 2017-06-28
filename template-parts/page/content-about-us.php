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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row column">

		<?php 
		the_content( );
		//get_template_part( 'template-parts/page/content', 'header-intro' ); ?>
	</div><!-- .row column -->

	<?php //get_template_part( 'template-parts/store/content', 'spotlight' ); ?>



</article><!-- #post-## -->