/* 
 * onLoad
 */

$(document).ready(function() {
    $(window).load(function() {
        $('.grid').masonry({
            itemSelector: '.grid-item'
        }).masonry('reloadItems');
    });
});