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
        location.reload();
    });

    $('#side-menu a').click(function () {
        $(this).parent().siblings().css('border-color', 'rgba(0, 0, 0, 0.57)');
        $(this).parent().prev().css('border-color', '#ed791a');
    });

    //Slider
    $('.tourist-slider').bxSlider({
        auto: this,
        pager: false,
        controls: false,
        minSlides: 2,
        maxSlides: 2,
        moveSlides: 1,
        slideWidth: $('#blank').outerWidth()/2 + 30
    });

    //Input format (forms)
   // $('.money-format').priceFormat();



    //Button 'load more' (3rd panel)
    $('#load-more').click(function(){
        $('#agent-list2').toggleClass('hidden-xs');
        $('#agent-list1').toggleClass('single-agent-list');
        $(this).children().toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    });
    

    //Green button 'place date on the info-board'
    $('#btn-place-date').click(function () {
        var btn = $(this);
        btn.button('loading');
        // Then whatever you actually want to do i.e. placing date on the info-board
        // After that has finished, reset the button state using
        setTimeout(function () {
            btn.button('reset');
        },1000);
        $('#check-place-date').removeClass('hidden');
    });
});

function localSettings() {
    var hDoc = $(window).height();
    var hBlank = $('#blank').height();
    var hSum = $('header').outerHeight() + $('footer').outerHeight() + hBlank;
    var delta1 = hDoc - $('header').outerHeight() - $('footer').outerHeight() - 45;

    if(hDoc >= hSum){
        $('#blank').css('min-height', delta1);
    }
}
