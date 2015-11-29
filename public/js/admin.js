/**
 * Admin JS
 */

var Sections = {};

$(document).ready(function() {

  /* toggling menu */
	$(".admin-menu a").click(function() {
		$(this).next(".admin-submenu").slideToggle();
	});

  /* blog form script */
  $(".add-section").click(function() {
    $(".sections-list").fadeToggle();
  });

  $(".section-option").click(function(){

  	var id = $(this).data('id');
  	if( Sections[id] === undefined ) {

      Sections[id] = 'used';

      $(".sections").append(
        '<div class="tag" data-id="' + id + '">' +
          '<span>' + $(this).text() + '</span>' +
        '</div>'
      );
  	}

 	});

  /* adding data to input on submit */
  $("form.blog").submit(function() {
    $("#sections").val(Object.keys(Sections).join(";"));
  });
});

/* removing tag */
$(document).on('click', '.tag', function() {
  $(this).remove()
  delete Sections[$(this).data("id")];
});