$(document).ready(function(){
	console.log("Ready!");

	/* Post page */
	$('.fa-plus-circle').on('click', function(){
		$('input[name="userfile_post"]').trigger('click');
	});
	/*************/

	$('input[name="filter"]').on('change', function(){
		$('#baseImage').removeClass()
		$('#baseImage').addClass($(this).val());
	});
});