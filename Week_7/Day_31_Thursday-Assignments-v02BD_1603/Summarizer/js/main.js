
function loaded() {
    document.getElementById('submit').addEventListener("click",
	    function()
	    {
			var url = document.getElementById('target-url').value ;
	    	if (url !== null && url != "" && ValidURL(url)) {	    	
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
			beforeSend: function() {
		        $("#dvloader").fadeIn("slow");
            },
			success: function(resultData) { 
				$("#dvloader").fadeOut("slow");
				document.getElementById('summary').innerHTML = resultData;
			},
			error: function (request, status, error) {
				$("dvloader").fadeOut("slow");
				alert('Something went wrong!!'); 
			}
		});
	}
}

function ValidURL(str) {
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
  '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
  '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
  '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
  '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  if(!pattern.test(str)) {
    alert("Please enter a valid URL.");
    return false;
  } else {
    return true;
  }
}

