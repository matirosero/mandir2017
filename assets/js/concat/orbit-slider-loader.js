jQuery(document).ready(function($) {
	var mroOrbit = $('.hero-header .orbit-container'),
		mroOrbitImages = mroOrbit.find('.hero-slider-image img');
		mroLoading = $('.hero-header .loading');

	Foundation.onImagesLoaded(mroOrbitImages, function() {
		mroLoading.fadeTo( "slow" , 0, function() {
			mroOrbit.fadeTo( "slow" , 1);
		});

	});

});