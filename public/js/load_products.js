var Filter = {};

var s = window.location.href.split('?')[1].split('&');

for( x = 0 ; x < s.length ; x++ ) {
	param = s[x].split("=");
	Filter[param[0]] = param[1];
}

$(document).ready(function() {
    console.log(Filter);
    $.ajax({
    	url: '/ajax/loadProducts',
    	method: 'post',
    	data: Filter,
        _token: $(".toggle-autocomplete").next().val()
    }).done(function(data) {
    	data = jQuery.parseJSON(data);

            console.log('wtf');
            console.log(data);
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
    })
});
