/**
 * Created by m.soza on 25.02.2016.
 */
define([
    'backbone',
    'jqueryui'
], function(Backbone){

    var App = Backbone.View.extend({

        events: {
            "click .input-group-addon.calendar": "clickCalendarIcon"
        },

        clickCalendarIcon: function(e) {
            console.log(e);
            var $el = this.$(e.currentTarget);
            $el.siblings('input').trigger("focus");
        },

        initialize: function () {
            $.datepicker.setDefaults({
                closeText: "Закрыть",
                prevText: "&#x3C;Пред",
                nextText: "След&#x3E;",
                currentText: "Сегодня",
                monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
                    "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
                monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн",
                    "Июл","Авг","Сен","Окт","Ноя","Дек" ],
                dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
                dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
                dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
                weekHeader: "Нед",
                dateFormat: "dd.mm.yy",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: "" });
        },

        start: function(){
            var container = $('section[data-structure]');
            var structure = container.data('structure');

            if(structure) {

                require(['structures/' + structure], function(StructureMainView) {

                    if(StructureMainView) {

                        Session.data = container.data();
                        
                        var view = new StructureMainView({
                            el: container
                        });

                        // Start dispatching
                        view.render();
                    }
                });
            }

            $('.ms_tabs a.tab').on('click', function(e){
                
                var $el = $(e.target);
                var $wrapper = $el.closest('.ms_tabs');
                var prevTab = $wrapper.data('selected');
                var href = $el.attr('href');
                var curTab = href.substr(1);

                if (href[0] == '/')
                {
                    return true;
                }

                e.preventDefault();

                if ($el.hasClass('disabled')) 
                {
                    return false;
                }

                if(prevTab != curTab)
                {
                    $wrapper.find('a.tab').removeClass('active');
                    $wrapper.find('a.tab[href="#' + curTab + '"]').addClass('active');
                    $wrapper
                        .removeClass($wrapper.data('selected'))
                        .addClass(curTab)
                        .data('selected', curTab);
                } else if ($wrapper.data('collapse')) {
                    $wrapper.find('a.tab[href*="#' + prevTab + '"]').removeClass('active');
                    $wrapper
                        .removeClass($wrapper.data('selected'))
                        .data('selected', '');
                }
            });

            //Sidebar
            $('.toggle-left').click(function(e) {
                e.preventDefault();
                $(this).toggleClass("toggle-left-animation");
            });
        }
    });

    return App;
});