/**
 * Autocomplete script
 */

 $(document).ready(function() {

 	/**
 	 * activates autocomplete on input focus or change
 	 */
    $(".toggle-autocomplete").on('input focus', function() {

    	/* autcomplete activates only with 3+ chars typed */
    	if( ( string = $(this).val() ).length < 3 ) {
    		$(".autocomplete").hide();
    		return;
    	}

    	/* adding spinner and showing autocomplete*/
    	ac = $(".autocomplete").show();
    	if( !$(ac).has(".progress").length )
	    	$(".autocomplete").append(
	    		'<li class="progress"><i class="fa fa-spinner fa-spin"></i></li>'
	    	)

	    /* building ajax request */
	    $.ajax({
	    	url: '/ajax/loadProducts',
	    	method: 'post',
	    	data: $.extend( Filter , { limit: 5, pattern: string, _token: $(".toggle-autocomplete").next().val() } )
	    }).done(function(data) {
	    	data = jQuery.parseJSON(data);

	    	if( data === '403' )
	    		return false;

	    	/* removing currrent autocomplete including spinner */
	    	$(ac).children().each(function() {
	    		$(this).remove();
	    	});

	    	/* if no products, say it */
	    	if ( data[0] === undefined ) {
	    		$(ac).append(
	    			'<li><strong>Nenalezen žádný produkt</strong></li>'
	    		);
	    	}
	    	else {
	    		/* else parse and print products */
	    		for( key in data ) {
	    			regex = new RegExp('(' + string + ')', 'gi')
	    			print = data[ key ].display_name.replace(regex, '<strong>$1</strong>');
	    			$(ac).append(
	    				'<a href="/products/detail/' + data[ key ].item_id + '"><li>' + print + '</li></a>'
	    			);
	    		}
	    	}
    });
    }).on('blur', function(e) {
    	
    	/* hiding autocomplete on input blur */
    	/*
    	console.log(e);
    	$(".autocomplete").hide();
    	ac = $(e.target);
    	console.log( $(ac).is(".toggle-autocomlete") );
    	if( !$(ac).is(".toggle-autocomplete") )
    		$(".autocomplete").hide();*/
    });

    /* preventing form from submitting */
	$("#search form").submit(function(e) {
		string = $(".toggle-autocomplete").val();

		location.href = "/products/?" + "pattern=" + string 
	});
});