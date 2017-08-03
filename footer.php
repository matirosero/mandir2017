<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mandir
 */
?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer expanded row" role="contentinfo">

				<div class="footer-logo large-3 column">
					<a href="<?php esc_attr_e( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/svg/logo-mandir.svg" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</div><!-- .footer-logo -->

				<div class="footer-utility large-8 column end">

					<div class="footer-list-signup">
						<?php echo do_shortcode( '[ctct form="599"]' ); ?>
					</div><!-- .footer-list-signup -->
					<p class="footer-copyright">
						&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>. <?php _e('All rights reserved', 'mandir'); ?>.
					</p>
					<p class="footer-credits">
						<span>Diseño y desarrollo: <a href="https://matilderosero.com">Matilde Rosero</a></span>
						<span>Fotografías encabezados: <a href="https://www.facebook.com/rmontoyaphoto/">Rodrigo Montoya</a></span>
					</p>
				</div><!-- .footer-utility -->


			</footer><!-- #colophon -->

		</div> <!-- .off-canvas-content -->
	</div><!-- .off-canvas-wrapper-inner -->
</div><!-- .off-canvas-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
