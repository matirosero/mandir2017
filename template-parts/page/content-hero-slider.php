<?php
$slider_images = $mandir_settings['hero_slider_images']; 
?>

<!-- <div class="hero-header"> -->
<div class="hero-header">
	<div class="orbit" role="region" aria-label="Fotografías Yoga Mandir" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
		<ul class="orbit-container">
			<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
		    <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

			<?php 

			// $count = count($slider_images);

			foreach ($slider_images as $image) { 

				$i = ! isset( $i ) ? 1 : $i;

				if ($i == 1 ) {
		        	$class = 'first orbit-slide is-active';
		        } else {
		        	$class = 'orbit-slide';
		        }
				?>
				<li class="<?php echo $class; ?>">
					<div class="hero-slider-image">
						<?php echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'lazyload') ); ?>
					</div>
				</li>
			<?php } ?>

		</ul>



	</div><!-- /.orbit -->
	<div class="hero-content">
		<h1><?php echo get_bloginfo( 'description' ); ?></h1>
	</div>
	<div class="loading"><i class="icon-spin6 animate-spin"></i></div>
</div>

<!-- </div> --><!-- .hero-slider -->