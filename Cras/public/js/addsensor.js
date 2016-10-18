//add sensors to database
$('#btn_addsensor').click(function ()
	{
		if($("form[name=form_addnewsensor]")[0].checkValidity()) {
			var processor = $('[processorselect] option:selected').attr('processorid');
			var type = $('#sensor_type').val();	

			var datasent = {
								"processor" : processor,
								"type" : type
							};
			var token = $('meta[name="csrf-token"]').attr('content');

			$.ajaxSetup({
		      headers: {
		        'X-CSRF-TOKEN': token
		      }
		    });

			$.ajax(
		    {
		        url : "addsensor",
		        type: "POST",
		        contentType: "json",
      			processData: false,
		        data: JSON.stringify(datasent),
		        success:function(data) 
		        {
		        	if (data == '201') {
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
			$("#sensor_type").addClass('alert alert-danger');
		}
	});
