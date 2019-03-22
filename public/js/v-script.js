$(document).ready(function(){
    
//    google map
     var metallMap;
//    coordinates
     var location1 = {lat: 55.730528, lng: 37.660474};
     var position1 = {lat: 55.733308, lng: 37.659991}; 
     var position2 = {lat: 55.732228, lng: 37.655312};
     var position3 = {lat: 55.730361, lng: 37.660172};
     
//    markers
    var blackMarker = 'img/black-marker.png'
     var orangMarker2 = 'img/orang-marker.png'
     
      function initMap() {
        metallMap = new google.maps.Map(document.getElementById('map'), {
          center: location1,
          zoom: 16,
        zoomControl: false,
        styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]
        });
          
          var marker1 = new google.maps.Marker({
              position: position1,
              map: metallMap,
              icon: blackMarker
          });
          var marker2 = new google.maps.Marker({
              position: position2,
              map: metallMap,
              icon: orangMarker2
          });
          var marker3 = new google.maps.Marker({
              position: position3,
              map: metallMap,
              icon: blackMarker
          });
      }
    
    //    google map end
    
    
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
    
//    фильтр на странице all company filter
    var $filterContainer = $('.filter-container');
    $('.filter-btn').on('click', function(){
        $filterContainer.slideToggle(300);
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
        
        jQuery('.scroll_block').jScrollPane({
			autoReinitialise: false,
			showArrows:false
		});
    });
    
    var migo = $('.scroll_block').width();
    
    console.log(migo);
    
    
    
});