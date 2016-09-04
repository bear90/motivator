/**
 * Created by m.soza on 25.02.2016.
 */
define(['backbone', 'jqueryui'], function(Backbone){

    var App = Backbone.View.extend({

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

                require(['structures/admin/' + structure], function(StructureMainView) {

                    if(StructureMainView) {

                        var view = new StructureMainView({
                            el: container
                        });

                        // Start dispatching
                        view.render();
                    }
                });
            }
        }
    });

    return App;
});