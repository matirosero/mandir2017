<?php
$directory_url = 'http://www.yoga-mandir.com/certificados/';
?>

<aside class="spotlight expanded collapse row" data-equalizer data-equalize-on="medium">
	<div class="spotlight-image medium-6 columns hide-for-small-only">
		<a href="<?php echo $directory_url; ?>" id="" class="" data-equalizer-watch>
			<img srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/img/spotlight-directory-1280x850.jpg 1280w,
			<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/img/spotlight-directory-1024x680.jpg 1024w,
			<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/img/spotlight-directory-20.jpg 20w" 
			sizes="(min-width: 640px) 50vw, 100vw" 
			src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/img/spotlight-directory-1280x850.jpg" 
			alt="Profesor en clase de yoga" />
		</a>
	</div>
	<div class="medium-6 columns">
		<div class="spotlight-highlight" data-equalizer-watch>
			<h2 class="spotlight-heading">¡Profesores certificados en tu zona!</h2>
			<p>Ingresá a la Red Mandir Certificados y podrás buscar profesores de yoga y masajistas certificados por Yoga Mandir en tu comunidad.</p>
			<a href="<?php echo $directory_url; ?>" class="cta">Ir a Red Mandir Certificados <i class="icon-right-open-small"></i></a>
		</div>
	</div>
</aside>