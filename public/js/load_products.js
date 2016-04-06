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
        data: $.extend(Filter, { _token: $(".toggle-autocomplete").next().val() })
    }).done(function(data) {
        data = jQuery.parseJSON(data);

        console.log(data)

        if( data === '403' )
            return false;

        var ac = '#product_feed';
        /* if no products, say it */
        if ( data[0] === undefined ) {
            $(ac).append(
                'něco ve smyslu že víc nenalezeno ... dát kurzívou a doprostřed'
            );
        }
        else {
            /* else parse and print products */
            for( key in data ) {
                $(ac).append(
                    '<div class="col-4 grid-item">' +
                    '<div class="area">' +
                    '<a href="/products/detail/' + data[ key ].item_id + '"> ' +
                        '<div class="product">' +
                            '<div>' +
                                '<img src="' + data[ key ].img + '" alt="">' +
                                '<div class="area-4 product-desc">' +
                                    '<h5 class="uppercase">' + data[ key ].display_name + '</h5>' +
                                    '<p class="left bold big">' + data[ key ].price + ' Kč</p>' +
                                    '<p class="justify">' + data[ key ].description + '</p>' +
                                '</div>' +
                            '</div>' +
                        '</div>' + 
                    '</a>' +
                    '</div>' +
                    '</div>'
                );
                $(ac).masonry( 'reload' );
                $(ac).masonry('reloadItems');
                $(ac).masonry( 'layout' );
            }
        }
    })
});
