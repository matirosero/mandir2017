<?php

// If a regular post or page, and not the front page, show the featured image.
?>

<div class="hero-header">
	<?php the_post_thumbnail(); ?>
	<div class="hero-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>

</div><!-- .hero-header -->