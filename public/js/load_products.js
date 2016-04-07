function ajaxload(initial = false, limit = 9, order = "views-desc") {
    st = $(this).scrollTop();
   if ( ((( $(window).scrollTop() >= $(document).height() - $(window).height() - 50 ) &&
        ( st = $(this).scrollTop()  > lastScrollTop )) || initial === true)
        &&
        load === true
         ) {

        lastScrollTop = st;
        var pf = '#product_feed';
        Filter['offset'] = $(pf).children().length;
        Filter['limit'] = limit;
        Filter["order"] = order;
        $.ajax({
            url: '/ajax/loadProducts',
            method: 'post',
            data: $.extend(Filter, { _token: $(".toggle-autocomplete").next().val() })
        }).done(function(data) {
            data = jQuery.parseJSON(data);
            if( data === '403' )
                return false;

            /* if no products, say it */
            if ( data[0] === undefined ) {
                $(pf).append(
                    '<div class="col-12 area-4 grid-item">' +
                        '<p class="center big dark-grey-text italic">' +
                            'Bohužel, nemáme už žádné další zboží odpovídající Vašim požadavkům ...' +
                        '</p>' +
                    '</div>'
                );
                load = false;
            }
            else {
                /* else parse and print products */
                for( key in data ) {
                    $(pf).append(
                        '<div class="col-4 grid-item hover">' +
                        '<div class="area">' +
                        '<a href="/products/detail/' + data[ key ].item_id + '"> ' +
                            '<div class="hover product">' +
                                '<div>' +
                                    '<img src="' + data[ key ].img + '" alt="">' +
                                    '<div class="area-4 product-desc">' +
                                        '<h5 class="uppercase">' + data[ key ].display_name + '</h5>' +
                                        '<p class="left bold big">' + data[ key ].price + ' Kč</p>' +
                                        '<p class="justify small">' + data[ key ].description.substr(0,200) + '...</p>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' + 
                        '</a>' +
                        '</div>' +
                        '</div>'
                    );
                }
            }

            $(pf).imagesLoaded( function() {
                $(pf).masonry('reloadItems');
                $(pf).masonry('layout');
            });
        });
    }
}


var load = true;
var Filter = {limit: 3};

var s = window.location.href.split('?')[1].split('&');

for( x = 0 ; x < s.length ; x++ ) {
    param = s[x].split("=");
    Filter[param[0]] = (param[1]);
}

var lastScrollTop = 0;
var throttled = _.throttle(ajaxload, 500);

$(window).scroll(throttled);


$( document ).ready(function() {
    ajaxload(true, 15);

    $( "#order" ).change(function() {
        $('#product_feed').empty();
        ajaxload(true, 15, this.value);

    });
});