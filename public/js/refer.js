// detail.blade.php

$( document ).ready(function() {
    $( ".go" ).click(function() {
        var data = {id: $("#product_id").val()};
        $.ajax({
            url: '/ajax/eshopRefer',
            method: 'post',
            data:  $.extend(data, { _token: $("#product_id").next().val() })
        });
    });
});