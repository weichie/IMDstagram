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

	$('.addComment').on('click', function(e){
		e.preventDefault();

		var post_id = $(this).prev('.reactie-plaatsen').prev('.post_id').val();
		var comment = $(this).prev('.reactie-plaatsen').val();
		var name = $(this).attr('data-name');

		$.post(ajax_url+'/comment', {
			'post_id': post_id,
			'comment': comment
		}, function success(data){

			$('.comments_' + post_id).prepend('<li><strong>'+ name +'</strong> '+ comment +'</li>');
			$('.addComment').prev('.reactie-plaatsen').val('');

			console.log(data);
		});
	});

	$('.like').on('click', function(e){
		e.preventDefault();

		var post_id = $(this).attr('data-id');
		var $button = $(this);

		$.post(ajax_url+'/like', {
			'post_id': post_id
		}, function success(data){

			$button.addClass('liked');

			console.log(data);
		});

	})
});