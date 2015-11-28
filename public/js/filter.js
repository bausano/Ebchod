var Filter = {};

$(document).ready(function() {
	$(".price-range").slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 0, 500 ],
		slide: function(event, ui) {
			$(".min").html(ui.values[0]);
			$(".max").html(ui.values[1]);

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
}

function clearFilter() {
	Filter = {};
}