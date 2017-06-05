<?php

// If a regular post or page, and not the front page, show the featured image.


echo '<div class="hero-header">';
the_post_thumbnail();
echo '</div><!-- .hero-header -->';