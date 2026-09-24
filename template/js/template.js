


$(document).ready(function(){	

		// home accordion
	    $(function () {
	        $('.st-accordion').accordion({
	        scrolltoCurrentItem: 0,
	        oneOpenedItem: true
	        });       
	    });

		$('#specials-link').click(function () {
			window.location.href = "http://secure.castleknockhotel.com/bookings/grouped_specials";
			return false;
		});
		$('#events-link').click(function () {
			window.location.href = "/leisure-event.html";
			return false;
		});


		// home fade in/out
		$(".PageContent section").hide();

		$(" .PageContent h1 span").click(function () {	 

			if ($(".PageContent h1 span").hasClass("ContentClosedIcon")) {

				$(" .PageContent section").fadeIn();
				$(' .PageContent h1 span').removeClass("ContentClosedIcon").addClass("ContentOpenedIcon");		

			} else if ($(".PageContent h1 span").hasClass("ContentOpenedIcon")) {
				
				$(".PageContent section").fadeOut();
				$('.PageContent h1 span').removeClass("ContentOpenedIcon").addClass("ContentClosedIcon");		
		 
			}
		});

});	



		


		

	
	
	
	
	


	
	
	
	


	

	
