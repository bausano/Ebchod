/* 
 * onLoad
 */

$(document).ready(function() {
    $(window).load(function() {
        $('.grid').masonry({
            itemSelector: '.grid-item'
        }).masonry('reloadItems');
    });

    $(".toggle-settings").click( function() {
    	$(".settings").fadeToggle();
    	return false;
    });
});