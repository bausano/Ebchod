/**
 * JS creating a filter of products, which is processed in Ajax controller
 */

/* Filter data ( name: value ) */
var Filter = { };

if( pattern = getParameterByName('pattern') != '' ) {
	Filter['pattern'] = pattern;
}

if( section = getParameterByName('section') != '' ) {
	Filter['section'] = pattern;
}


$(document).ready(function() {

	/* Optimalization for mobiles */
	$(".ui-slider-handle").draggable();

	/* jQuery UI slider*/
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

	/* Selection section */
	$(".section-container").click(function(e) {

		var li = $(e.target);
		if( $(li).is("i") ) {
			$(".sections").hide();
			return;
		}

		if( $(li).is(".section-option") ) {
			$(this).data('value', $(li).data('option'));
			$(this).find("p span.value").first().html($(li).text());
			buildFilter({ section: $(this).data('value') });
		}

		if(!$(li).is(".section-option-inactive"))
			$(".sections").toggle();
	});

	/* Clearing section */
	$(".section-container i.delete").click(function() {
		$(".section-container p span.value").text('Vyberte kategorii');
		$(".section-container").data('value', '');
		buildFilter({ section: null });
	});
});

/**
 * builds filter from given data
 * @param data data
 */
function buildFilter( data ) {
	Filter = $.extend( Filter , data );
	$(".toggle-autocomplete").trigger("input");
}

/**
 * clears filter
 */
function clearFilter() {
	Filter = {};
	$(".toggle-autocomplete").trigger("input");
}