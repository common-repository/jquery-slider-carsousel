jQuery(document).ready(function(){
//jQuery.noConflict();
  jQuery(".box1").click(function(){
    jQuery(".box1").animate({height:'400px', width:'40%'});
	jQuery(".box2").animate({height:'50px', width:'20%', left:'40%'});
	jQuery(".box3").animate({height:'50px', width:'20%', left:'60%'});
	jQuery(".box4").animate({height:'50px', width:'20%', left:'80%'});


	jQuery(".box2 .image").css({display:'none'});
	jQuery(".box2 .description").css({display:'none'});
	jQuery(".box2 .more").css({display:'none'});

	jQuery(".box3 .image").css({display:'none'});
	jQuery(".box3 .description").css({display:'none'});
	jQuery(".box3 .more").css({display:'none'});

	jQuery(".box4 .image").css({display:'none'});
	jQuery(".box4 .description").css({display:'none'});
	jQuery(".box4 .more").css({display:'none'});

jQuery(".box1 .image").delay(400);
jQuery(".box1 .image").fadeIn("slow");
jQuery(".box1 .description").delay(400);
jQuery(".box1 .description").fadeIn("slow");
jQuery(".box1 .more").delay(400);
jQuery(".box1 .more").fadeIn("slow");

  });


  jQuery(".box2").click(function(){
    jQuery(".box2").animate({height:'400px', width:'40%', left:'20%'});
	jQuery(".box1").animate({height:'50px', width:'20%'});
	jQuery(".box3").animate({height:'50px', width:'20%', left:'60%'});
	jQuery(".box4").animate({height:'50px', width:'20%', left:'80%'});


	jQuery(".box1 .image").css({display:'none'});
	jQuery(".box1 .description").css({display:'none'});
	jQuery(".box1 .more").css({display:'none'});

	jQuery(".box3 .image").css({display:'none'});
	jQuery(".box3 .description").css({display:'none'});
	jQuery(".box3 .more").css({display:'none'});

	jQuery(".box4 .image").css({display:'none'});
	jQuery(".box4 .description").css({display:'none'});
	jQuery(".box4 .more").css({display:'none'});

jQuery(".box2 .image").delay(400);
jQuery(".box2 .image").fadeIn("slow");
jQuery(".box2 .description").delay(400);
jQuery(".box2 .description").fadeIn("slow");
jQuery(".box2 .more").delay(400);
jQuery(".box2 .more").fadeIn("slow");
  });
  
    jQuery(".box3").click(function(){
    jQuery(".box3").animate({height:'400px', width:'40%', left:'40%' });
jQuery(".box1").animate({height:'50px', width:'20%'});
jQuery(".box2").animate({height:'50px', width:'20%', left:'20%'});
jQuery(".box4").animate({height:'50px', width:'20%', left:'80%'});



jQuery(".box1 .image").css({display:'none'});
jQuery(".box1 .description").css({display:'none'});
jQuery(".box1 .more").css({display:'none'});

jQuery(".box2 .image").css({display:'none'});
jQuery(".box2 .description").css({display:'none'});
jQuery(".box2 .more").css({display:'none'});

jQuery(".box4 .image").css({display:'none'});
jQuery(".box4 .description").css({display:'none'});
jQuery(".box4 .more").css({display:'none'});

jQuery(".box3 .image").delay(400);
jQuery(".box3 .image").fadeIn("slow");
jQuery(".box3 .description").delay(400);
jQuery(".box3 .description").fadeIn("slow");
jQuery(".box3 .more").delay(400);
jQuery(".box3 .more").fadeIn("slow");
  });
	
	    jQuery(".box4").click(function(){
    jQuery(".box4").animate({height:'400px', width:'40%', left:'60%'});
jQuery(".box1").animate({height:'50px', width:'20%'});
jQuery(".box2").animate({height:'50px', width:'20%', left:'20%'});
jQuery(".box3").animate({height:'50px', width:'20%', left:'40%'});



jQuery(".box1 .image").css({display:'none'});
jQuery(".box1 .description").css({display:'none'});
jQuery(".box1 .more").css({display:'none'});

jQuery(".box2 .image").css({display:'none'});
jQuery(".box2 .description").css({display:'none'});
jQuery(".box2 .more").css({display:'none'});

jQuery(".box3 .image").css({display:'none'});
jQuery(".box3 .description").css({display:'none'});
jQuery(".box3 .more").css({display:'none'});

jQuery(".box4 .image").delay(400);
jQuery(".box4 .image").fadeIn("slow");
jQuery(".box4 .description").delay(400);
jQuery(".box4 .description").fadeIn("slow");
jQuery(".box4 .more").delay(400);
jQuery(".box4 .more").fadeIn("slow");
  });

	    jQuery("#banner").mouseleave(function(){

jQuery(".box1").animate({height:'50px', width:'25%'});
jQuery(".box2").animate({height:'50px', width:'25%', left:'25%'});
jQuery(".box3").animate({height:'50px', width:'25%', left:'50%'});
jQuery(".box4").animate({height:'50px', width:'25%', left:'75%'});

jQuery(".image").hide("slow");
jQuery(".description").hide("slow");
jQuery(".more").hide("slow");

});


		
});