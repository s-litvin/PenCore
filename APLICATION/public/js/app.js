$(document).ready(function(){

	$('#myModal').on('opened', function () {
		$(document).foundation();
	});

	$('#sign_in').click(function(){
		$('#myModal').html("<a class=\"close-reveal-modal\" id=\"close_modal\">&#215;</a>");
		$.ajax({
			type: "GET",
			url: "http://pen.loc/login",
			dataType: 'json',
			data: {"is_ajaxed":true},
			success: function(data){
				$('#myModal').append(data).foundation('reveal', 'open');
			}
		});
	});

	$('#close_modal').click(function(){
		$('#myModal').foundation('reveal', 'close').html('');
	});
});