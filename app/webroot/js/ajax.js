   
   
   
   
   //<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>




	

$(document).ready(function(){
	

	/*download registration*/
	
	$("#downloadregistrations").on("click",function(){
		var l=location.href;
		var d=l.replace('registrations','download');
		
		window.location.href= d;
	})

});