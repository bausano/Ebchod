/* 
 * onLoad
 */

$(document).ready(function() {
    $(window).load(function() {
        $('.grid').masonry({
            itemSelector: '.grid-item'
        }).masonry('reloadItems');
    });

    $(".toggle-filter").click(function() {
    	$(".filter").fadeToggle();
        clearFilter();
    });

    $('.img-header').imageScroll({
        image: null,
        imageAttribute: 'image',
        container: $('.header'),
        windowObject: $(window),
        speed: 0.2,
        coverRatio: 1,
        holderClass: 'img-holder',
        holderMinHeight: 1266,
        holderMaxHeight: null,
        extraHeight: 0,
        mediaWidth: 1600,
        mediaHeight: 1266,
        parallax: true,
        touch: false
    });
    $(".sections-page li").click(function() {
        var id = $(this).data("id");
        $(".sections-page li").each(function() { 
            if($(this).data("parent") == id ) {
                $(this).toggle();
            }
        })
    });

    var id = $("#section-" + Filter.section).css({'background-color': "#eee"}).data("parent");
    while(id !== undefined && id != 0) {

        $(".sections-page li").each(function() {
            if($(this).data("parent") == id ) {
                $(this).show();
            }
        })

        id = $("#section-" + id).data("parent");
    }

    if($.cookie('accepted') != 1) {
        $("#accept-cookies").slideToggle();
    }

    $("#accept-cookies button").click(function(){
        $("#accept-cookies").slideToggle();
        $.cookie('accepted', 1);
    });
});

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$(document).on('mouseenter', '.hover .product', function () {
  $(this).find(".product-desc").fadeIn();
}).on('mouseleave', '.product', function () {
   $(this).find(".product-desc").fadeOut();
});
