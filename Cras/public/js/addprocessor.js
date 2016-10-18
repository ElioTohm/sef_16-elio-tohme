/*
* manipulation edit/delete/add for processors and sensors
*/

//ajax request to create add new processor
$('#btn_addprocessor').click(function () 
	{
		if($("form[name=form_addnewprocessor]")[0].checkValidity()) {
		    var datasent =  {
		    	"processorname" : $('#processorname').val(),
		    	"mac" : $('#mac').val(),
		    };
		    var token = $('meta[name="csrf-token"]').attr('content');
		    $.ajaxSetup({
		      headers: {
		        'X-CSRF-TOKEN': token
		      }
		    });
			$.ajax({
		        type:'POST',
		        url:'addprocessor',
				contentType: "json",
      			processData: false,
		        data: JSON.stringify(datasent),
		        success:function(data){
					if (data == '400') {
						$("input[name=mac][placeholder]").addClass('alert alert-danger');
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
			$("#processorname").addClass('alert alert-danger');
	    }
	});

