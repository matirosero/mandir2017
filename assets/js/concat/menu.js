jQuery(document).ready(function($){

	var menu = $('#main-menu'),
		menuItem = $('#main-menu .menu-item a');



	menuItem.on('click', function(event){
		event.preventDefault();
		// $(this).parent().siblings('.current-menu-item').children('.sub-menu').css({
		// 	'opacity' : '0',
		// 	'visibility' : 'hidden'
		// })
		// $(this).parent().siblings('.current-menu-item').removeCcurrent-menu-item');
		// $(this).parent().addClass('active-menu-item').siblings().removeClass('active-menu-item');
	});

});