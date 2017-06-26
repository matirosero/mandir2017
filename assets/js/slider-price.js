jQuery(document).ready(function($){

	function calculateUnitPrice(qty) {
		var price;
		if ( qty == 100 ) {
			price = 30;
		} else if ( qty >= 60 ) {
			price = qty * 3
		}
	}

	function calculatePrice(qty, unitPrice) {
		var price;
		price = qty * unitPrice;
		return price;
	}

	var qty,
		unitPrice,
		total,
		outputQty,
		outputPrice,
		outputTotal;

		outputQty = $('#bulk-price .bulk-qty');
		outputPrice = $('#bulk-price .bulk-price');
		outputTotal = $('#bulk-price .total-price');


	$('[data-slider]').on('changed.zf.slider', function(){
	    console.log('Changed!')
	    console.log('value is '+$(this).find('.slider-handle').attr('aria-valuenow') );

	    qty = $(this).find('.slider-handle').attr('aria-valuenow');

 		if ( qty >= 6 ) {
	 		if ( qty == 100 ) {
				console.log('price is 30');
				unitPrice = 30;
				total = '3000 por 100'

				qty = '100+';
			} else {

				if ( qty >= 60 ) {
					console.log('price is 35');
					unitPrice = 35;

				} else if ( qty >= 10 ) {
					console.log('price is 40');
					unitPrice = 40;
				} else {
					console.log('price is 45');
					unitPrice = 45;
				}

				total = calculatePrice(qty, unitPrice);
			}

			outputQty.html(qty);
			outputPrice.html(unitPrice);
			outputTotal.html(total);

 		} else {

 		}




  	});
});