<?php
/**
 * Template part for displaying general information about featured products.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */
?>

<?php
if ( !has_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
<?php endif; ?>

<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->







