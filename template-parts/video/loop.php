<div class="column column-block" >
	<article id="post-<?php the_ID(); ?>" <?php post_class(' talk-card'); ?> role="article">

		<div class="responsive-embed widescreen">
			<?php
			$url = esc_url( get_post_meta( get_the_ID(), 'mro_video_youtube', 1 ) );
			echo wp_oembed_get( $url );
			?>
		</div>
	</article>
</div>