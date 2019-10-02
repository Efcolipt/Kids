$(document).ready(function () {
	if ($(window).width() > 768) {
			$('.brands ').find('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:false,
		    autoplay:2000,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        
		    }
		});
		$('.carouselUsers ').find('.owl-carousel').owlCarousel({
		    loop:true,
		    dots:false,
		    margin:10,
		    autoplay:1000,
		    nav:false,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        
		    }
		});
	}else{
		$('.brands ').find('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:false,
		    autoplay:2000,
		    responsive:{
		        0:{
		            items:1
		        },
		        
		    }
		});
		$('.carouselUsers ').find('.owl-carousel').owlCarousel({
		    loop:true,
		    dots:false,
		    margin:10,
		    autoplay:1000,
		    nav:false,
		    responsive:{
		        0:{
		            items:1
		        },
		    }
		});
	}

	

	$("a:not(.notHr)").click(function() {
		let elementClick = $(this).attr("href")
		let destination = $(elementClick).offset().top;
		destination -= 60;
		jQuery("html:not(:animated),body:not(:animated)").animate({
			scrollTop: destination
		}, 800);
		return false;
	});

	$('.form ').mouseover(function(event) {
		$(this).find('.about__this__form').stop().slideDown('slow');
	});
	$('.form ').mouseout(function(event) {
		$(this).find('.about__this__form').stop().slideUp('slow');
	});

	$('.change__schedule_Two').click(function(){
		$('.scheldule__still[data-id="2"]').slideDown('slow');
		$('.scheldule__still[data-id="1"]').slideUp('slow');

	});
	$('.change__schedule_One').click(function(){
		$('.scheldule__still[data-id="2"]').slideUp('slow');
		$('.scheldule__still[data-id="1"]').slideDown('slow');

	});
	$(".phM").mask("+7(999)999-99-99");
});