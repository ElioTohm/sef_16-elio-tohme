//delete a sensor
$('[delete=sensor]').click(function ()
	{
		var processor = $(this).attr('processorid');
		var sensor = $('[processorid='+processor+'] option:selected').attr('sensorid');
		var datasent = {"sensor" : sensor};
		var token = $('meta[name="csrf-token"]').attr('content');

		$.ajaxSetup({
	      headers: {
	        'X-CSRF-TOKEN': token
	      }
	    });

		$.ajax(
	    {
	        url : "deletesensor",
	        type: "POST",
	        contentType: "json",
   			processData: false,
	        data: JSON.stringify(datasent),
	        success:function(data) 
	        {
	        	$('[sensorid='+ sensor +']').remove();
	        }
	    });
	}); 