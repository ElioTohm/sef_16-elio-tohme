
function loaded() {
    document.getElementById('submit').addEventListener("click",
	    function()
	    {
			var targeturl = document.getElementById('target-url').value ;
			var text = "";
	    	if (targeturl !== null && targeturl != "" && ValidURL(targeturl)) {	    	
	    		ajaxRequest.getContentRequest(targeturl);
	    	}
	    },
	false);
}

window.loaded = loaded();

var ajaxRequest = {
	apiRequest : function (targeturl,text) 
	{
		$.ajax({
			type: 'POST',
			url: "PostRedirect.php",
			data: {	
				'text' : text,
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
	},
	getContentRequest : function (targeturl)
	{	
		var text = "";
		$.ajax({
			type: 'POST',
			url: "PostRedirect.php",
			data: {'url_page' : targeturl},

			beforeSend: function() {
		        $("#dvloader").fadeIn("slow");
            },
			success: function(resultData) { 
				var paragraphs = getParagraph.get_p(resultData);
				text = paragraphs; /**/
				ajaxRequest.apiRequest(targeturl,text);
			},
			error: function (request, status, error) {
				$("dvloader").fadeOut("slow");
				alert('Something went wrong!!'); 
			}
		});	
		return text;
	}
}

var getParagraph = {
	get_p : function (returnedDocment)
	{
		var fullText = "";
		parser=new DOMParser();
		htmlDoc=parser.parseFromString(returnedDocment, "text/html");
		var p_array = htmlDoc.getElementsByClassName('graf--p');
		for (var i = p_array.length - 1; i >= 0; i--) {
		 	fullText += p_array[i].innerHTML;
		 } 
		return fullText;
	}
}


function ValidURL(str) {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(str);
}

