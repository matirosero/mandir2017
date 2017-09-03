<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mandir
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="row">
			<div class="medium-10 medium-centered large-9 columns">

					<header class="entry-header">
						<h1 class="entry-title"><?php esc_html_e( 'The page you\'re looking for something doesn\'t exist.', 'mandir' ); ?></h1>
					</header>

					<div class="entry-content">

						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'mandir' ); ?></p>

						<p>
							<?php get_search_form(); ?>
						</p>


					    <?php
					        global $wp_query;
					        $wp_query->query_vars['is_search'] = true;
					        $s = str_replace("-", " ", $wp_query->query_vars['name']);
					        $loop = new WP_Query('post_type=any&s=' . $s);
					    ?>

					    <h2><?php esc_html_e( 'Here are some suggestions', 'mandir' ); ?></h2>
					    <div class="404-suggestions row">

						    <?php if ($loop->have_posts()): ?>

					    		<div class="medium-6 column">
							        <p><?php esc_html_e( 'We tried finding the matching what you\'re looking for:', 'mandir' ); ?></p>
						            <ul>
						                <?php while ($loop->have_posts()): $loop->the_post(); ?>
						                    <li>
						                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						                        <?php //the_excerpt(); ?>
						                    </li>
						                <?php endwhile; ?>
						            </ul>
						        </div>

						        <div class="medium-6 column">

						    <?php else: ?>

						    	<div class="small-12 column">

						    <?php endif; ?>

						    	<p><?php esc_html_e( 'Try some of our website\'s top pages:', 'mandir' ); ?></p>

						    	<ul>
							    	<li>
							    		<a href="<?php echo get_page_link(10); ?>">Nuestro horario de clases de yoga y tarifas</a>
							    	</li>
							    	<li>
							    		<a href="<?php echo get_page_link(153); ?>">Calendario de actividades</a>
							    	</li>
							    	<li>
							    		<a href="<?php echo get_page_link(12); ?>">Entrenamiento para profesores de yoga</a>
							    	</li>
							    	<li>
							    		<a href="<?php echo get_page_link(14); ?>">Certificación en masaje tailandés</a>
							    	</li>
							    	<li>
							    		<a href="<?php echo get_page_link(469); ?>">Contacto</a>
							    	</li>
						    	</ul>

						    </div>



					    </div>





					</div><!-- .page-content -->

			</div><!-- .columns -->
		</div><!-- .row -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
