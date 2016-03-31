/**
 * Created by m.soza on 03.03.2016.
 */
define([
    "structures/user/orderTour",
    "vendor/jquery.countdown/jquery.plugin",
    "vendor/jquery.countdown/jquery.countdown",
    "tinymce",
    "tinymce.jquery",
    'validator',
], function(OrderTourView){

    var Index = Backbone.View.extend({

        events: {
            //"click button.edit": "clickEditButton"
        },

        initCountDown: function(){
            $.countdown.regionalOptions['ru'] = {
                labels: ['Лет', 'Месяцев', 'Недель', 'Дней', 'Часов', 'Минут', 'Секунд'],
                labels1: ['Год', 'Месяц', 'Неделя', 'День', 'Час', 'Минута', 'Секунда'],
                labels2: ['Года', 'Месяца', 'Недели', 'Дня', 'Часа', 'Минуты', 'Секунды'],
                compactLabels: ['л', 'м', 'н', 'д'], compactLabels1: ['г', 'м', 'н', 'д'],
                whichLabels: function(amount) {
                    var units = amount % 10;
                    var tens = Math.floor((amount % 100) / 10);
                    return (amount == 1 ? 1 : (units >= 2 && units <= 4 && tens != 1 ? 2 :
                        (units == 1 && tens != 1 ? 1 : 0)));
                },
                digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                timeSeparator: ':', isRTL: false};
            $.countdown.setDefaults($.countdown.regionalOptions['ru']);
        },

        render: function(){

            //countdown time
            this.initCountDown();

            var self = this;
            var date = this.$('.countdown-time').data('date');
            var austDay = new Date(date);
            
            this.$('.countdown-time').countdown({
                until: austDay,
                format: 'DHMS'
            });

            (new OrderTourView({
                el: '#order-tour'
            })).render();
        }
    });

    return Index;
});