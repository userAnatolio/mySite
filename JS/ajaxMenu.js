	$('.elementMenu').hover(function(){
		var get= $(this).attr('href');
		$.ajax({
				type: "GET",
				url: '/pageMenu/compendium.php',
				data: "idParent=" + get,
				success: function(data)
					{
						$('#baner1').html(data);
					}
		});
	
	});


$('body').on('mouseover', '.getPages', function(){
	var get= $(this).attr('myattribute');
		$.ajax({
				type: "GET",
				url: '/pageMenu/compendium.php',
				data: "idParent=" + get + "&getLink=showLink",
				success: function(data)
					{
						$('#baner2').html(data);
						
					}
			});
	
});

