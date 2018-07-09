$(window).on("load",function(){

	$(".scroll").mCustomScrollbar();

	$(".scroll_x").mCustomScrollbar({
	    axis:"x"
	});

	if( bodyWidth <= 900 ) {

		$(".main-nav").mCustomScrollbar();

	} else {

		$(".main-nav").mCustomScrollbar("destroy");

	}

	if( bodyWidth <= 768 ) {

		$(".main-nav_wrapp").mCustomScrollbar();

	} else {

		$(".main-nav_wrapp").mCustomScrollbar("destroy");

	}

	if( bodyWidth <= 468 ) {

		$("#respsidebar").mCustomScrollbar();

	} else {

		$("#respsidebar").mCustomScrollbar("destroy");

	}

});

$(window).resize(function() {

	if( bodyWidth <= 900 ) {

		$(".main-nav").mCustomScrollbar();

	} else {

		$(".main-nav").mCustomScrollbar("destroy");

	}

	if( bodyWidth <= 768 ) {

		$(".main-nav_wrapp").mCustomScrollbar();

	} else {

		$(".main-nav_wrapp").mCustomScrollbar("destroy");

	}

	if( bodyWidth <= 468 ) {

		$("#respsidebar").mCustomScrollbar();

	} else {

		$("#respsidebar").mCustomScrollbar("destroy");

	}

});

$(document).ready(function() {		

	$(".promo-slider").not(".slick-initialized").slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1200,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true
    });

    $(".slider-2").not(".slick-initialized").slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1200,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $(".testimonial-sl").not(".slick-initialized").slick({
        dots: false,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1200,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
	        {
	          breakpoint: 970,
	          settings: {
	            slidesToShow: 2,
	            slidesToScroll: 1
	          }
	        },
	        {
	          breakpoint: 768,
	          settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1
	          }
	        }
	      ]
	});

	$(".clients-sl").not(".slick-initialized").slick({
        dots: false,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1200,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
	        {
	          breakpoint: 1000,
	          settings: {
	            slidesToShow: 3,
	            slidesToScroll: 1
	          }
	        },
	        {
	          breakpoint: 768,
	          settings: {
	            slidesToShow: 2,
	            slidesToScroll: 1
	          }
	        },
	        {
	          breakpoint: 370,
	          settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1
	          }
	        }
	      ]
	});

	$("#respsidebar").swipe({

        swipe:function(event, direction) {

            if(direction == "left") {

                $("#respsidebar").animate({
                    "left" : -100 + "%"
                }, 300);

            }

        }

    });

    $("select").each(function() {

		$(this).select2({
			minimumResultsForSearch: Infinity
		});

	});

	var indexRating = 0;
	var idRating;
	var el;
	var currentRating;
	var maxRating;
	var myRating;

	if( $(".add-rating").length > 0 )  {

        $(".add-rating").each(function() {

            indexRating++;
            idRating = $(this).attr("id");
            el = document.querySelector("#" + idRating);
            currentRating = $(this).attr("data-rate");
            maxRating= 5;
            myRating = rating(el, currentRating, maxRating);

        });
        
    }

	if( $("#review_rat").length > 0 )  {
    	var rat = document.querySelector('#review_rat');
		rating(rat, 0, 5);		
    }

    if( $(".rate_2").length > 0 )  {

        $(".rate_2").each(function() {
            indexRating++;
            idRating = $(this).attr("id");
            el = document.querySelector("#" + idRating);
            currentRating = $(this).attr("data-rate");
            maxRating= 5;
            myRating = rating(el, currentRating, maxRating);

        });
        
    }

});

