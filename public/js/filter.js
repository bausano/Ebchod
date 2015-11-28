var Filter = {};

$(document).ready(function() {

	$(".ui-slider-handle").draggable();

	$(".price-range").slider({
		range: true,
		min: ( min = parseInt($(".price-range").data('min')) ),
		max: ( max = parseInt($(".price-range").data('max')) ),
		values: [ min, max ],
		create: function() {
			$(".min").html(min + " Kč");
			$(".max").html(max + " Kč");

		},
		stop: function(event, ui) {
			$(".min").html(ui.values[0] + " Kč");
			$(".max").html(ui.values[1] + " Kč");

			buildFilter({ min: ui.values[0], max: ui.values[1]});
		}
	});

	$(".section-container").click(function(e) {
		var li = $(e.target);
		if( $(li).is("i") ) {
			$(".sections").hide();
			return;
		}

		if( $(li).is(".section-option") ) {
			$(this).data('value', $(li).data('option'));
			$(this).find("p span.value").first().html($(li).text());
		}

		$(".sections").toggle();
		buildFilter({ section: $(this).data('value') });
	});

	$(".section-container i.delete").click(function() {
		$(".section-container p span.value").text('Vyberte kategorii');
		$(".section-container").data('value', '');
		buildFilter({ section: null });
	});
});

function buildFilter( data ) {
	Filter = $.extend( Filter , data );
	$(".toggle-autocomplete").trigger("keyup");
}

function clearFilter() {
	Filter = {};
	$(".toggle-autocomplete").trigger("keyup");
}