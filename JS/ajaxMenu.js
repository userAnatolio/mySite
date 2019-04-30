	$('.elementMenu').click(function(){
		var get= $(this).attr('href');
		$.ajax({
				type: "GET",
				url: '/mySite/pageMenu/' + get,
				data: "page=" + get,
				success: function(data)
					{
						$('#baner').html(data);
					}
		});
	
	});