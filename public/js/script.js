$(".people_slider").slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	arrows: true,
	dots:false,
	infinite: true,
	fade: false,
	responsive: [
    {
      breakpoint: 1250,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2
      }
    }
    ,
    {
      breakpoint: 625,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

$(document).ready(function(){
	$('body').click(function(e){
		if(!$(e.target).parents('.open').length && !$(e.target).hasClass('open')) {
			$('.open').removeClass('open');
		}
	});

//	$('.mobile-menu-trigger').click(function(e){
//		e.preventDefault();
//		$(this).toggleClass('open');
//		$('.main_menu ul').toggleClass('open');
//	});
    $('.mobile-menu-trigger').click(function(e){
		e.preventDefault();
		$(this).toggleClass('open');
		$('.main_menu .main_menu__container').toggleClass('open');
	});
});


$('.about_section .info_block .text_block a').click(function(){
	$(this).hide();
	$(this).parent().css('max-height', '1500px');
});

jQuery(function()
	{
		jQuery('.scroll_block').jScrollPane({
			autoReinitialise: false,
			showArrows:false
		});
});

