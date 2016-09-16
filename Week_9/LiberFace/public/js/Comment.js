
$('#text').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    PostComment.getMessage();
  }
});

var PostComment = {
	
	getMessage : function (){
		$.ajax({
			type:'POST',
			url:'PostComment',
			data:'_token = <?php echo csrf_token() ?>',
			// success:function(data){
			// $("#msg").html(data.msg);
			// }
		});
	},

}

// window.loaded = loaded();
