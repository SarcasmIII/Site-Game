$(document).ready(function(){
	
  console.log('Структура страницы сформирована, можно приступать!');
  var loginval;
  var passwordval;
	$.fn.snow({ minSize: 15, maxSize: 50, newOn: 500, flakeColor: '#0099FF' });
	$(document).ready( function(){
		$.fn.snow();
	});
  $('.scroll-description').click(function(e){
       $('html, body').animate({scrollTop:$('#description').position().top}, 2000);
	});

  $(".loginButton").click(function(e){
	$("body").addClass( "stop-scrolling");
    $(".main").addClass( "back");
    $(".loginBlock").removeClass( "hidden");
  });

  $(".backstep").click(function(e){
	 $("body").removeClass( "stop-scrolling");
    $(".main").removeClass("back");
    $(".loginBlock").addClass("hidden");
  });

  $(".confirm").click(function(e){
      var login = $('.login-confirm');
      var password = $('.password-confirm');
      loginval = login.val();
	  console.log(login);
      passwordval = password.val();
      if (loginval == "admin") {
        $(".login-confirm").removeClass("wrong");
        if(passwordval == "qwerty") {
          $(".password-confirm").removeClass("wrong");
          console.log("Confirm");
          window.location.href = "http://youtube.com";
        }
        else {
          console.log("password wrong");
          $(".password-confirm").addClass("wrong");
        }
      }
      else {
        console.log("login wrong");
        $(".login-confirm").addClass("wrong");
      }
  });
	$("body").keydown(function(e) {
		var key = e.key;
		if (key == "Enter") {
			var login = $('.login-confirm');
			var password = $('.password-confirm');
			loginval = login.val();
			console.log(login);
			passwordval = password.val();
			if (loginval == "admin") {
				$(".login-confirm").removeClass("wrong");
				if(passwordval == "qwerty") {
					$(".password-confirm").removeClass("wrong");
					console.log("Confirm");
					window.location.href = "file:///D:/!_project/portfolio01/index02.html";
				}
				else {
					console.log("password wrong");
					$(".password-confirm").addClass("wrong");
				}
			}
			else {
				console.log("login wrong");
				$(".login-confirm").addClass("wrong");
			}
		}
    });
  
  $(".skill img").hover(function(){
	  //console.log($(this));
	  $(this).addClass("jqueryhover");
  },
  function(){
	  $(this).removeClass("jqueryhover");
  });
  
  $( "body" ).keydown(function(e) {
	  var a = 0;
	  var key = e.key;
	  
	  if (key == "q") {
		 a = 1;
	  }	
	  else if (key == "w") {
		 a = 2;
	  }	
	  else if (key == "e") {
		 a = 3;
	  }	
	  else if (key == "r") {
		 a = 4;
	  }	
	  else if (key == "Escape") {
		  $("body").removeClass( "stop-scrolling");
		 $(".main").removeClass("back");
		 $(".loginBlock").addClass("hidden");
	  }
	  $(".skill" + a + " img").trigger('mouseenter');
	});
  
  $( "body" ).keyup(function(e) {
	  //e.preventDefault();
	  var a;
	  var key = e.key;
	  if (key == "q") {
		 a = 1;
	  }	
	  else if (key == "w") {
		 a = 2;
	  }	
	  else if (key == "e") {
		 a = 3;
	  }	
	  else if (key == "r") {
		 a = 4;
	  }	
	  $(".skill" + a + " img").trigger('mouseleave');
  });
  
  //set up control-bar for filter hue-rotate
	var $draggable = $('.draggable').draggabilly({
		containment: '.bar-wrap',
		axis: 'y'
	});
	
	$draggable.on('dragMove', function(e, pointer, moveVector) {
		var top = parseInt($(this).css("top"));
		var height = parseInt($(".bar-wrap").css("height"));
		var stringToSplit = $(this).css("transform");
		var arrayOfStrings = stringToSplit.split(" ");
		var lll = parseInt(arrayOfStrings[5].substring(0, arrayOfStrings[5].length - 1));
		var percent = parseInt(((top+lll) / height) * 360);
		//console.log($(this).css("transform"));
		console.log(top);
		console.log(lll);
		//console.log(e);
		//console.log(height);
		console.log(percent);
		$(".hero-example img").css("filter", "hue-rotate(" + percent + "deg)");
		//console.log("filter: hue-rotate(" + percent + "deg)");
	});
	
	$draggable.on( 'dragStart', function( event, pointer ) {
		$(".hero-example img").removeClass("animated");
	});
	
	$draggable.on('dragEnd', function(e, pointer) {
		var top = parseInt($(this).css("top"));
		console.log(top);
		if (top == "315") {
			$(".hero-example img").css("filter", "hue-rotate(0deg)");
			$(".hero-example img").addClass("animated");
			console.log("a");
		}
	});
	
	var sektor = new Sektor('.Sektor', {
		size: 120,
		stroke: 20,
		arc: true,
		angle: 0,
		sectorColor: 'red',
		circleColor: 'white',
		fillCircle: false
	});
	

	/*console.log(sektor.options.angle);*/
	var num = 0;
	$(".Sektor").click(function(e){
		if ( num != "390") {
			sektor.animateTo(num, 300);
			num = num + 30;
			console.log(num);
		}
	});

});
