<?php

// If a regular post or page, and not the front page, show the featured image.

?>

<div class="hero-header">
	<?php the_post_thumbnail(); ?>
	<div class="hero-content">
		<h1 class="entry-title"><?php the_title(); echo $subtitle; ?></h1>
	</div>
</div><!-- .hero-header -->