$(document).ready(function() {
    $(".button").click(function(e){
        $(".block").toggleClass("scroll-right");
        $(".button-hidden").toggleClass("hidden");
        $(".button-visible").toggleClass("hidden");

    });

    $(".button-hidden").click(function (e ) {
        $( ".os, .dashboard" ).animate({
            width : "95%",
            marginLeft : "5%"
        }, 800, function() {
            // Animation complete.
        });
    });
    $(".button-visible").click(function (e) {
        $( ".os, .dashboard" ).animate({
            width : "80%",
            marginLeft : "20%"
        }, 1000, function() {
            // Animation complete.
        });
    });

    $(".switch").click(function (e) {
        var element = $(this);
        var color = element.css('color');
        console.log(color);
        if(color == 'rgb(170, 170, 170)' ) {
            ($(":root").css({
                    "--main-bg-color":"#bbe2e8",
                    "--spare-bg-color":"#57c8d1",
                    "--text-color":"#000",
                    "--text-color-hover":"#5e58d1",
                    "--button-color-hover":"#8bd6d5"
                })
            )
        }
        else {
            ($(":root").css({
                    "--main-bg-color":"#11343a",
                    "--spare-bg-color":"#122a2f",
                    "--text-color":"#aaa",
                    "--text-color-hover":"#fff",
                    "--button-color-hover":"#236570"
                })
            )
        }


    });


    $("#game").click(function(e){
        $(".game-m").toggleClass("hidden");
    });

    $("#post").click(function(e){
        $(".post-m").toggleClass("hidden");
    });

    $("#heroes").click(function(e){
        $(".heroes-m").toggleClass("hidden");
    });

  /*  $(":root").css("--main-bg-color", "#fff");*/
});