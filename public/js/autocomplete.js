/**
 * Autocomplete script
 */

 $(document).ready(function() {

    $(".toggle-autocomplete").on('keyup focus', function() {
    	if( ( string = $(this).val() ).length < 3 ) {
    		$(".autocomplete").hide();
    		return;
    	}

    	ac = $(".autocomplete").show();
    	if( !$(ac).has(".progress").length )
	    	$(".autocomplete").append(
	    		'<li class="progress"><i class="fa fa-spinner fa-spin"></i></li>'
	    	)

	    $.ajax({
	    	url: '/ajax/autocomplete',
	    	method: 'post',
	    	data: $.extend( Filter , { pattern: string, _token: $(".toggle-autocomplete").next().val() } )
	    }).done(function(data) {
	    	data = jQuery.parseJSON(data);

	    	if( data === '403' )
	    		return false;

	    	$(ac).children().each(function() {
	    		$(this).remove();
	    	});

	    	if ( data[0] === undefined ) {
	    		$(ac).append(
	    			'<li><strong>No products found</strong></li>'
	    		);
	    	}
	    	else {
	    		for( key in data ) {
	    			print = data[ key ].display_name.replace(string, '<strong>' + string + '</strong>');
	    			$(ac).append(
	    				'<a href="/products/detail/' + data[ key ].item_id + '"><li>' + print + '</li></a>'
	    			);
	    		}
	    	}
    });
    }).on('blur', function(e) {
    	ac = $(e.tatget);
    	if( !(ac).is(".autocomlete") )
    		$(ac).hide();
    });

	$("#search form").submit(function(e) {
		e.preventDefault();
	});
});