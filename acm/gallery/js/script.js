(function($){
  $(document).ready(function(){
    var $container = $('.isotope-layout .isotope');

    if (!$container.length) return ;

    $container.isotope({
      itemSelector: '.item',
      masonry: {
        columnWidth: '.grid-sizer',
      }
    });
    
    // re-order when images loaded
    $container.imagesLoaded(function(){
      $container.isotope();
    
      /* fix for IE-8 */
      setTimeout (function() {
        $('.isotope-layout .isotope').isotope();
      }, 8000);  
    });

    // Fix for Container Tabs
    $('.container-tabs-nav .nav-tabs > li > a').click(function() {
    	setTimeout (function() {
        $container.isotope();
      }, 200);  
    });
  });
})(jQuery);