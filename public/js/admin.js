$( document ).ready(function(){
	$( ".menu li" ).click(function() {
		$( this ).next('.scrollable').fadeToggle();
	});

    $( ".close i" ).click(function() {
        $( this ).parent().parent().fadeOut();
    });

    $( "#add_section" ).click(function() {
        $( '#sections' ).fadeIn();
    });

    $( ".section-option" ).click(function(){
    	var id = $(this).attr('id');

    	if( $( '#sections_ids' ).val().search(id) < 0 ) {
	    	var value = $(this).text();
	    	var html = 	$( '.sections' ).html() 			+
	    				'<div class="tag" id="' 			+
	    				id 									+
	    				'"><span class="notselectable">' 	+
	    				value 								+
	    				'</span></div>';

	    	$( '#sections_ids' ).val( $( '#sections_ids' ).val() + ";" + id );

	    	$( '.sections' ).html(html);
    	}
   	});
});
$(document).on('click', '.tag', function() {
	var id = $(this).attr('id');
   	$( '#sections_ids' ).val( $( '#sections_ids' ).val().replace( ";" + id, '') );
   	var del = $(this)[0].outerHTML;
   	$( '.sections' ).html( $( '.sections' ).html().replace(del, '') );
});