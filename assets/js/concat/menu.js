jQuery(document).ready(function($){

	var menu = $('#main-menu'),
		menuItem = $('#main-menu .menu-item-has-children > a');



	menuItem.on('click', function(event){
		event.preventDefault();

		$(this).parent().addClass('active');

		$(this).parent().siblings().removeClass('active');

	});

});