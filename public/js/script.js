$(".people_slider").slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	arrows: true,
	dots:false,
	infinite: true,
	fade: false,
//    variableWidth: true,
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
			autoReinitialise: true,
			showArrows:false
		}); 
});




    var $header = $('#header');  
    var headerHeight;  
    
    function refreshHeaderHeight(){
        headerHeight = $header.outerHeight(true); 
    }
    
    refreshHeaderHeight(); 
    $(window).resize(refreshHeaderHeight);
   
    $('<div class="header-helper"></div>').insertBefore('#header').css('height', headerHeight).hide();
    
    $(window).scroll(function(){
        var winScroll = $(window).scrollTop(); 
        if(winScroll > 200){
            $header.addClass('header-shadow');
            $('.header-helper').show();
            setTimeout(function(){
                $header.addClass('header-shadow_slide');
            }, 100);
           }
        else{
            $header.removeClass('header-shadow_slide'); 
            $('.header-helper').hide();
            $header.removeClass('header-shadow'); 
        } 
    }); 
    

//    модалка на странице комментариев
     $('.user-not-registered').click(function(){
        $('#wrapper').addClass('blur');
        $('#footer').addClass('blur');
        $('#w-modal').arcticmodal();
     });
    
//    фильтр на странице all company filter
    var $filterContainer = $('.filter-container');
    $('.filter-btn').on('click', function(){
        $filterContainer.slideToggle(300);
        $('.filter-btn').toggleClass('filter-active');
    });
    
    
//    tab
    var $tabControlEtems = $('.tab-control-item');
    var $tablEtems = $('.tab-item-wrap'); 
    
    $tabControlEtems.on('click', function(){
        $tabControlEtems.removeClass('tab-control-item_active');
        $(this).addClass('tab-control-item_active');
        
        var currentControlItem = $(this);
        var indexElement = $tabControlEtems.index(currentControlItem); 
        
        $tablEtems.removeClass('tab-item-wrap_show');
        $tablEtems.eq(indexElement).addClass('tab-item-wrap_show');

    });
    
    var migo = $('.scroll_block').width();