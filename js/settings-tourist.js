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

    //Sidebar
    $('.toggle-left').click(function(e) {
        e.preventDefault();
        $(this).toggleClass("toggle-left-animation");
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

    //Accordion
    $('#accordion')
        .on('show.bs.collapse', function(e) {
            $(e.target).prev('.panel-heading').addClass('open-accordion');
        })
        .on('hide.bs.collapse', function(e) {
            $(e.target).prev('.panel-heading').removeClass('open-accordion');
        });

    //Button 'load more' (3rd panel)
    $('#load-more').click(function(){
        $('#agent-list2').toggleClass('hidden-xs');
        $('#agent-list1').toggleClass('single-agent-list');
        $(this).children().toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    });

    //tab click
    $('#wrapper a').click(function() {
        if ($(this).attr('class') != $('#wrapper').attr('class') ) {
            $('#wrapper').attr('class',$(this).attr('class'));
        }
    });

    //Form3 validate
    $('#info-board-issue form').bootstrapValidator({
        message: 'Данные введены неверно',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: "Вам необходимо ввести имя!"
                    }, // notEmpty
                    regexp: {
                        regexp: /^[A-Za-z\s.'-]+$/,
                        message: "Буквенные символы, дефисы и пробелы"
                    }
                } // validators
            },  // firstname
            last_name: {
                validators: {
                    notEmpty: {
                        message: "Вы забыли ввести фамилию!"
                    }, // notEmpty
                    regexp: {
                        regexp: /^[A-Za-z\s.'-]+$/,
                        message: "Буквенные символы, дефисы и пробелы"
                    }
                } // validators
            },  // lastname
            middle_name: {
                validators: {
                    notEmpty: {
                        message: "Вы забыли ввести отчество!"
                    }, // notEmpty
                    regexp: {
                        regexp: /^[A-Za-z\s.'-]+$/,
                        message: "Буквенные символы, дефисы и пробелы"
                    }
                } // validators
            },  // middlename
            email: {
                validators: {
                    notEmpty: {
                        message: "Необходимо ввести e-mail адрес."
                    }, // notEmpty
                    emailAddress: {
                        message: "E-mail адрес введен неверно!"
                    } // emailAddress
                } // validators
            }  // email
        } // fields
    });


    //Button submit form (on modal)
    $('#btn-continue-1').click(function(){
        $('#form-result').removeClass('hidden');
        //Then whatever you actually want to do i.e. submit form and send  email...
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
