<?php

// If a regular post or page, and not the front page, show the featured image.

?>

<div class="hero-header">
	<?php the_post_thumbnail(); ?>
	<div class="hero-content">
		<h1 class="entry-title"><?php the_title(); echo $subtitle; ?></h1>

		<?php if ( get_post_meta($post->ID, 'mro_lang_alt_url', true) ) :
			if ( is_english() ) :
				echo '<p><a class="button" href="'.get_post_meta($post->ID, 'mro_lang_alt_url', true).'">Lea esta página en español</a></p>';
			else :
				echo '<p><a class="button" href="'.get_post_meta($post->ID, 'mro_lang_alt_url', true).'">Read this page in English</a></p>';
			endif;
		endif;
		?>
	</div>
</div><!-- .hero-header -->