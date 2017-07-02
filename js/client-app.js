$(document).ready(function() {

	$('select').material_select();

	$('.app-sections-menu .collection-item').click(function() {

		$('.app-section').removeClass('active');

		var activeSection = $(this).attr('app-section');
		$('.app-section-' + activeSection).addClass('active');

	});

	$('#attend-church').click(function() {
		$('.church-name-container').show();
	});

	$('#do-not-attend-church').click(function() {
		$('.church-name-container').hide();
	});

	$('#add-family-member').click(function() {
		$('.new-family-member').show();
	});

	$('#confirm-add-family-member').click(function() {
		$('.app-sections-menu .collection-item[app-section="family-members"]').prepend('<span class="badge">1</span>');
	});

});
