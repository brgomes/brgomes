$(document).ready(function() {

	$('form').submit(function() {
		var submit = $(this).find(':submit');

		if (submit != undefined) {
			submit.html('<span class="fa fa-hourglass-half"></span> Aguarde...');
			submit.prop('disabled', true);
		}
	});

});
