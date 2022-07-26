jQuery(document).ready(function() {
    jQuery(document).on("scroll", onScroll);
    onepageNavLinks = jQuery('.onepage .t4-navbar .nav-link');

    function onScroll(event){
        var scrollPos = jQuery(document).scrollTop();
        onepageNavLinks.each(function () {
            var currLink = jQuery(this);
            var refElement = jQuery(currLink.attr("href"));
            if (refElement.position().top <= scrollPos /* && refElement.position().top + refElement.height() > scrollPos*/ ) {
                onepageNavLinks.removeClass("active");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }

    // Fix Modal on Acymailing
    if(jQuery('.acym__modal').length > 0) {
        jQuery('.acym__modal').appendTo('body');
    }

    jQuery(document).on('show.bs.modal', '.modal', function () {
      jQuery(this).appendTo('body');
    });
    
    // Isotope
    var $container = jQuery('.view-masonry');
        
    if (!$container.length) return ;
    
    $container.isotope({
        itemSelector: '.item-wrap',
        gutter: 24
    });
    
    // re-order when images loaded
    $container.imagesLoaded(function(){
        $container.isotope();
        
        /* fix for IE-8 */
        setTimeout (function() {
          jQuery('.view-masonry').isotope();
        }, 8000);  
    });
})