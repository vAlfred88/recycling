$(document).ready(function(){
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
    
//    стилизация select
     $('.region').niceSelect();
    
//    модалка на странице комментариев
     $('.user-not-registered').click(function(){
        $('#wrapper').addClass('blur');
        $('#footer').addClass('blur');
        $('#w-modal').arcticmodal();
     });
});