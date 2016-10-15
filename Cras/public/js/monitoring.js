// setup token on first page load

$.ajaxSetup({ headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') } });

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


/*
* manipulation edit/delete/add for processors and sensors
*/

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
					} else {
						$('.close').click();
					    $('.modal-backdrop').remove();
						$.ajax({
							type:'GET',
					        url:'rerendersection',
					        success:function (data)
					        {
					        	$('#sidebar').html(data);
					        }
						});
					}
		        }
		    });
	    } else {
			$("input").addClass('alert alert-danger');
	    }
	});

//ajax request to delete processors
$('button.btn-danger[processorid]').click(function(event) {
    	// this.append wouldn't work
    	var id = $(this).attr("processorid");
    	var datasent = {
    					"id" : id,
					}
			$.ajax({
				type:'POST',
		        url:'deleteprocessor',
				processData: "json",
				contentType: false,
		        data: JSON.stringify(datasent),
		        success: function (data){
		        	alert(data);
		        }
			});
    });

//on edit click
$('button.btn-default[processorid]').click(
	function() {
		var id = $(this).attr("processorid");
		var btncancel = $("button.btn-warning[processorid="+ id +"]").prop('hidden');
		if (btncancel) {
			$("input[processorid="+ id +"]").prop('disabled', false);
			$("button.btn-danger[processorid="+ id +"]").prop('hidden', true);
	        $("button.btn-warning[processorid="+ id +"]").prop('hidden', false);
	        $("button.btn-warning[processorid="+ id +"]").click(function ()
	        	{
	        		$("button.btn-danger[processorid="+ id +"]").prop('hidden', false);
	        		$("input[processorid="+ id +"]").prop('disabled', true);
	        		$("button.btn-warning[processorid="+ id +"]").prop('hidden', true);
	        		$("input[name=processor_name][processorid="+ id +"]").val(
							$(this).attr("processorname")
	        			);
	        		$("input[name=mac][processorid="+ id +"]").val(
	        				$(this).attr("processormac")
	        			);
	        	});
		} else {
			
		}
    });