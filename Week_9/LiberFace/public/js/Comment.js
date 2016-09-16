
$('#text').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    PostComment.getMessage();
  }
});

var PostComment = {
	
	getMessage : function (){
		$.ajaxSetup({
	        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	    });
		$.ajax({
			type:'POST',
			url:'PostComment',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
			// data:,
			// success:function(data){
			// $("#msg").html(data.msg);
			// }
		});
	},

}
