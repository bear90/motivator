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
