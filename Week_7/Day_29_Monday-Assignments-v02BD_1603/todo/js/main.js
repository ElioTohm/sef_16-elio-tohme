
var TodoItem = {
	title : "",
	timestamp: "",
	detail : "",
	addItem : function ()
	{	
		this.title = document.getElementById('title').value;
		this.timestamp = Date.now();
		this.detail = document.getElementById('details').value;
		localStorage.setItem(this.title, JSON.stringify(this));
	},
	loadItems : function ()
	{
		for (var key in localStorage){
   			console.log(key)
		}
	}
}
