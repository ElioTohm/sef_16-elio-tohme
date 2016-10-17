//pagination handling with ajax and laravel for navbar
$(document).on('click', '#pagination_navbar > .pagination a', function(e) 
	{
		e.preventDefault();
		
		var page = $(this).attr('href').split('page=')[1];

		$.ajax({
			url: 'paging_navprocessor?page=' + page
		}).done(function (data)
		{
			$('#processorslist').html(data);
		});
	});

//pagination handling with ajax and laravel for modal processor
$(document).on('click', '#pagination_modal > .pagination a', function(e) 
	{
		e.preventDefault();
		
		var page = $(this).attr('href').split('page=')[1];

		$.ajax({
			url: 'paging_modalprocessor?page=' + page
		}).done(function (data)
		{
			$('#model_addprocessor').html(data);
		});
	});

//pagination handling with ajax and laravel for modal sensor
$(document).on('click', '#sensorpagination_modal > .pagination a', function(e) 
	{
		e.preventDefault();
		
		var page = $(this).attr('href').split('page=')[1];

		$.ajax({
			url: 'paging_modalsensor?page=' + page
		}).done(function (data)
		{
			$('#sensorprocessor_pagination').html(data);
		});
	});



//animation for side menu
$('#menubtn').click(function () 
	{
		$('#navbar').toggleClass("sidenavclosed sidenav");
		if ($('#navbar').hasClass('sidenavclosed')) {
			$('#main').removeClass("main");
			$('#main').addClass("mainwide");
		} else {
			$('#main').removeClass("mainwide");
			$('#main').addClass("main");
		}
	});


//if input was empty while the user is typing remove alert class
$("input").keypress(function (e)
	{
		if($('input').hasClass('alert alert-danger')){
		   $(this).removeClass('alert alert-danger')
		}
	});
