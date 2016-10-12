// setup token on first page load
$.ajaxSetup({ headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') } });

//animation for side menu
$('#menubtn').click(function () 
	{
		$('#navbar').toggleClass("sidenavclosed sidenav");
		$('#main').toggleClass("mainwide main");
	});

//ajax request to create add new processor
$('#btn_addprocessor').click(function () 
	{
		if($("form[name=form_addnewprocessor]")[0].checkValidity()) {
	        var form = document.forms.namedItem("form_addnewprocessor");
		    var formdata = new FormData(form);
			$.ajax({
		        type:'POST',
		        url:'addprocessor',
				processData: false,
				contentType: false,
		        data:formdata,
		        success:function(data){
		          if (data == '400') {
		          	$("input[name=mac]").addClass('alert alert-danger');
		          }
		        }
		    });
	    } else {
			  $("input").addClass('alert alert-danger');
	    }
	});

//if input was empty while the user is typing remove alert class
$("input").keypress(function (e)
	{
		if($('input').hasClass('alert alert-danger')){
		   $(this).removeClass('alert alert-danger')
		}
	});

