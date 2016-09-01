function loaded() {
    document.getElementById('form').addEventListener("submit",
	    function()
	    {
	    	ajaxRequest.apiRequest();
	    },
	false);
}

window.loaded = loaded();

var ajaxRequest = {
	apiRequest : function () 
	{
        alert("Please type something");
	}
}