jQuery(document).ready(function($) {
	var mroOrbit = $('.hero-header .orbit-container'),
		mroOrbitImages = mroOrbit.find('.hero-slider-image img');
		mroLoading = $('.hero-header .loading');

	// mroOrbit.hide();
	// mroLoading.hide();
	// mroOrbitImages.hide();



	Foundation.onImagesLoaded(mroOrbitImages, function() {
		// alert('loaded');
		mroLoading.hide();
		mroOrbit.css('display','block');
	});

//   if ( $('body').hasClass('slider-active') ) {
//     var windowWidth = $(window).width();

//     console.log('width = '+ windowWidth);

//     $(window).on('resize', function(){

//       var win = $(this); //this = window
//       console.log('new width = '+win.width());

//       // if ( windowWidth >= 1024 && win.width() < 1024 ) {
//       //   $('#element').foundation('_reset');
//       // } else if ( windowWidth >= 768 && ( win.width() < 768 || win.width() > 1024 ) ) {
//       //   $('#element').foundation('_reset');
//       // } else if ( windowWidth <= 300 && win.width() >= 768 ) {
//       //   $('#element').foundation('_reset');
//       // }

//       windowWidth = win.width();
//       // if (win.height() >= 820) { /* ... */ }
//       // if (win.width() >= 1280) { /* ... */ }
//     });
//   }
});