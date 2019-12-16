$(document).ready(function(){


  $(".addpersonlink").click(function(e){
    $(".main").addClass( "back");
    $(".addperson1").removeClass( "hidden");
  });

  /*$(".submit").click(function(e){
    $(".main").removeClass("back");
    $(".addperson1").addClass("hidden");
  });*/

	$( "body" ).keydown(function(e) {
		var key = e.key;
		if (key == "Escape") {
			$(".main").removeClass("back");
			$(".addperson1").addClass("hidden");
		}
	});
});
