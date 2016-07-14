$(document).ready(function() {
    wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'fadeIn', // default
            offset:       0,          // default
            mobile:       true,       // default
            live:         true        // default
        }
    )
    new WOW().init();
/*  $("#owl-demo1").owlCarousel({
     autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
      navigation:true,
      navigationText:	[" "," "],
      pagination: false,
      responsive:	true,
      responsiveBaseWidth:	window
  });*/


  $("#owl-demo").owlCarousel({
      autoPlay: 3000,
      navigation:false, // Show next and prev buttons
      slideSpeed : 1000,
      paginationSpeed : 1000,
      singleItem:true,
      pagination: true,
      responsive:	true,
      responsiveBaseWidth:	window
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
});
 
  
 
