<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mandir
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );	?>
		</header>

		<div class="row">
			<div class="small-12 columns">

				<?php

				get_template_part( 'template-parts/video/filters' );

				if ( have_posts() ) : ?>

					<div id="posts-container">


			    		<div class="row medium-up-2 large-up-3" data-equalizer data-equalize-on="medium" data-equalize-by-row="true"> <!--Begin Grid-->

							<?php while ( have_posts() ) :

								the_post();

								get_template_part( 'template-parts/video/loop' );

							endwhile; ?>

						</div> <!--End Grid -->

						<?php
						the_posts_navigation(); ?>

					</div> <!-- end #posts-container -->

				<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</div>
		</div>

	</main>

</div>


<?php
get_footer();