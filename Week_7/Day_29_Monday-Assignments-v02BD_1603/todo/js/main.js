
var TodoItem = {
	title : "",
	timestamp: "",
	detail : "",
	// addes item to local storage and creates element in DOM
	addItem : function ()
	{
		var maindiv = document.getElementById('itemcontainer');	
		this.title = document.getElementById('title').value;
		this.timestamp = Date.now();
		this.detail = document.getElementById('details').value;
		localStorage.setItem(this.title, JSON.stringify(this));
		maindiv.insertBefore(this.createDivSection(this), maindiv.childNodes[0]);

	},
	// loads All all info fom local storage
	loadItems : function ()
	{
		var maindiv = document.getElementById('itemcontainer');
		for (var key in localStorage){
   			var item = JSON.parse(localStorage.getItem(key));
   			console.log(JSON.parse(localStorage.getItem(key)));
   			var checkifExist = document.getElementsByClassName('item')[0];
   			if (checkifExist === undefined) {
   				console.log("has items");
   				maindiv.appendChild(this.createDivSection(item));
			}else{
				console.log('no items');
				maindiv.insertBefore(this.createDivSection(item), maindiv.childNodes[0]);
			}
		}
	},
	//creates the DOM elements 
	createDivSection : function (item)
	{
		var title = document.createElement("h1");
		title.innerHTML = item.title;
		var detail = document.createElement("h3");
		detail.innerHTML = item.detail;
		var time = document.createElement("p");
		time.innerHTML = item.timestamp;
		var itemdiv = document.createElement("div");
		itemdiv.className = "item";
		var itemtext = document.createElement("div");
		itemtext.className = "item-text";
		var deletewrapper = document.createElement("div");
		deletewrapper.className = "delete-wrapper";
		var horizontalsep = document.createElement("div");
		horizontalsep.className = "horizontal-seprator";
		var deletebtn = document.createElement("button");
		deletebtn.className = "delete";
		deletebtn.innerHTML = "X";
		deletebtn.onclick = this.deleteItem;
		deletewrapper.appendChild(horizontalsep);
		deletewrapper.appendChild(deletebtn);
		itemtext.appendChild(title);
		itemtext.appendChild(time);
		itemtext.appendChild(detail);
		itemdiv.appendChild(itemtext);
		itemdiv.appendChild(deletewrapper);

		return itemdiv;
	},
	//deletes element by surfing throw the dom
	deleteItem : function (event)
	{
		var key = event.target.parentNode.parentNode.firstChild.firstChild.innerHTML;
		localStorage.removeItem(key);
		event.target.parentNode.parentNode.remove();
	}
}
// function that loads items (will trigger on load)
window.onload = TodoItem.loadItems();