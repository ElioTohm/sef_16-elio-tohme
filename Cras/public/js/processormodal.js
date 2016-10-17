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

//ajax request to delete processors
$('button.btn-danger[delete="processor"]').click(function() {
    	var id = $(this).attr("processorid");
    	var datasent = {"id" : id};
		var token = $('meta[name="csrf-token"]').attr('content');
	    $.ajaxSetup({
	      headers: {
	        'X-CSRF-TOKEN': token
	      }
	    });

		$.ajax(
	    {
	        url : "deleteprocessor",
	        type: "POST",
	        contentType: "json",
  			processData: false,
	        data: JSON.stringify(datasent),
	        success:function(data) 
	        {
	            $('[processorid='+ id +']').remove();
	            $('[sensors_processor='+ id +']').remove();
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
	        		$("input[name=processorname][processorid="+ id +"]").val(
							$(this).attr("processorname")
	        			);
	        		$("input[name=mac][processorid="+ id +"]").val(
	        				$(this).attr("processormac")
	        			);
	        	});
		} else {
			var id = $(this).attr("processorid");
			var processorname = $("input[name=processorname][processorid="+ id +"]").val();
			var mac = $("input[name=mac][processorid="+ id +"]").val();
	    	var datasent = {
				    		"id" : id,
				    		"mac" : mac,
				    		"processorname" : processorname
				    		};
			var token = $('meta[name="csrf-token"]').attr('content');
		    $.ajaxSetup({
		      headers: {
		        'X-CSRF-TOKEN': token
		      }
		    });

			$.ajax(
		    {
		        url : "updateprocessor",
		        type: "POST",
		        contentType: "json",
      			processData: false,
		        data: JSON.stringify(datasent),
		        success:function(data) 
		        {
		        	$("button.btn-warning[processorid="+ id +"]").attr("processorname", processorname);
		        	$("button.btn-warning[processorid="+ id +"]").prop("processormac", mac);
		            $("button.btn-warning[processorid="+ id +"]").prop('hidden', true);
		            $("button.btn-danger[processorid="+ id +"]").prop('hidden', false);
		        	$("input[processorid="+ id +"]").prop('disabled', true);
		        	$("input[processorid="+ id +"]").val(processorname);
		            $('a[processorid='+ id +']').html(processorname);
		            $('option[value='+id+']').html(processorname);
		        }
		    });
		}
    });
