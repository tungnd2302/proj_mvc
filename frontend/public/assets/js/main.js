/*===== Owl Carousel =====*/
$(document).ready(function() {
            $('.owl-one').owlCarousel({
			    loop:true,
			    margin:10,
			    responsiveClass:true,
			    autoplay:true,
			    responsive:{
			        0:{
			            items:1,
			            nav:false,
			            loop:true,
			            dots:false
			        },
			        600:{
			            items:1,
			            nav:false,
			            loop:true,
			            dots:false
			        },
			        1000:{
			            items:1,
			            nav:false,
			            loop:true,
			            dots:false
			        }
			    }
			})

			$('.two-owl').owlCarousel({
			    loop:true,
			    margin:10,
			    responsiveClass:true,
			    autoplay:true,
			    responsive:{
			        0:{
			            items:1,
			            nav:false,
			            loop:true,
			            dots:false
			        },
			        600:{
			            items:3,
			            nav:false,
			            loop:true,
			            dots:false
			        },
			        1000:{
			            items:5,
			            nav:false,
			            loop:true,
			            dots:false
			        }
			    }
			})


			$(window).scroll(function() {
			    if ($(this).scrollTop()) {
			        $('#toTop').fadeIn();
			    } else {
			        $('#toTop').fadeOut();
			    }
			});

			$("#toTop").click(function () {
			   //1 second of animation time
			   //html works for FFX but not Chrome
			   //body works for Chrome but not FFX
			   //This strange selector seems to work universally
			   $("html, body").animate({scrollTop: 0}, 1000);
			});

			// preloading 
			$(window).load(function() {
				$("#loading").delay(2000).fadeOut(500);
				$("#loading-center").click(function() {
					$("#loading").fadeOut(500);
				})
			})

			// Login & Register
			/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 * 
 */


   
    

})