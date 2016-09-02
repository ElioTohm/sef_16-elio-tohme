var url = document.getElementById('target-url').value ;

function loaded() {
    document.getElementById('submit').addEventListener("click",
	    function()
	    {
	    	if (url !== null && url != "") {	    	
	    		ajaxRequest.apiRequest();
	    	}	
	    },
	false);
}


window.loaded = loaded();

var ajaxRequest = {
	apiRequest : function () 
	{
		
		alert (url);
		$.ajax({
			type: 'POST',
			url: "PostRedirect.php",
			// data: , 
			beforeSend  : function() {
                $('#popup1').toggleClass('overlayshow overlayhide');
            },
			success: function(resultData) { 
				$('#popup1').toggleClass('overlayhide overlayshow');
				document.getElementById('summary').innerHTML = resultData;
			},
			error: function (request, status, error) {
				$('#popup1').toggleClass('overlayhide overlayshow');
				alert('Something went wrong!!'); 
			}
		});
	}
}

