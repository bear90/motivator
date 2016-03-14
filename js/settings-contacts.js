( function ( $ ) {
    $( document ).ready( function () {
        // Create a new instance of Slidebars
        var controller = new slidebars();

        // Initialize Slidebars
        controller.init();

        // Toggle left
        $( '.toggle-left' ).on( 'click', function ( event ) {
            // Stop default behaviour and propagation
            event.preventDefault();
            event.stopPropagation();

            // Toggle Slidebar
            controller.toggle( 'sb-1' );
        } );
    } );
} ) ( jQuery );

$(document).ready(function() {

    localSettings();

    $(window).resize(function () {
        localSettings();
    });

    $(window).bind('resize', function() {
        //location.reload();
    });

    $('#side-menu a').click(function () {
        $(this).parent().siblings().css('border-color', 'rgba(0, 0, 0, 0.57)');
        $(this).parent().prev().css('border-color', '#ed791a');
    });

    $('.contact-slider').bxSlider({
        auto: this,
        pager: false,
        controls: false,
        minSlides: 2,
        maxSlides: 2,
        moveSlides: 1,
        slideWidth: $('#blank').outerWidth()/2 + 30
    });
});

function localSettings() {
    var hDoc = $(window).height();
    var wDoc = $(window).width();
    var hAddr = $('.address-block').height();
    var deltaLg = hDoc - $('header').outerHeight() - $('footer').outerHeight() - $('#blank').outerHeight() - 20;
    var deltaXs = hDoc - $('header').outerHeight() - $('footer').outerHeight() - ($('#blank').outerWidth()/2 + 120 );

    /*if(wDoc <= 768){
        $('.address-block').height(deltaXs);
    }else{
        $('.address-block').height(hAddr + deltaLg);
    }*/
}
