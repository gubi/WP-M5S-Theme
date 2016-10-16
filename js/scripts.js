jQuery(document).ready(function() {
    // jQuery('.fancybox').fancybox();
    jQuery(".owl-carousel").owlCarousel({
        items: 1,
        margin: 10,
        navigation: false,
        pagination: false,
        loop: true,
        autoHeight: true,
        autoWidth: true,
        itemsDesktop: [1174, 1],
        itemsDesktopSmall : [980, 1],
        itemsTablet: [768, 1],
        itemsTabletSmall: false,
        itemsMobile : [479, 1],
        autoPlay: 10000,
        responsive: true,
        responsiveBaseWidth: window
    });
});
