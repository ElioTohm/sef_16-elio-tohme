
function loaded() {
    document.getElementById('submit').addEventListener("click",
	    function()
	    {
			var url = document.getElementById('target-url').value ;
	    	if (url !== null && url != "") {	    	
	    		ajaxRequest.apiRequest(url);
	    	}	
	    },
	false);
}

window.loaded = loaded();

var ajaxRequest = {
	apiRequest : function (url) 
	{
		$.ajax({
			type: 'POST',
			url: "PostRedirect.php",
			data: {'url' : url},
			beforeSend  : function() {
		        $("#dvloader").show();
            },
			success: function(resultData) { 
				$("#dvloader").hide();
				document.getElementById('summary').innerHTML = resultData;
			},
			error: function (request, status, error) {
				$('#popup1').toggleClass('overlayhide overlayshow');
				alert('Something went wrong!!'); 
			}
		});
	}
}

