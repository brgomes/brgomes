$(document).ready(function() {
 
	var startLoading = function() {
        $('h1').css('color', '#222222');
        $('body').removeClass('loaded');
	};

	$('form').submit(function() {
		var submit = $(this).find(':submit');

		if (submit != undefined) {
			startLoading();
			//submit.html('<span class="fa fa-hourglass-half"></span> Aguarde...');
			//submit.prop('disabled', true);
		}
	});

});
