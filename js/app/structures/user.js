/**
 * Created by m.soza on 03.03.2016.
 */
define([
    "structures/user/orderTour",
    "structures/user/yourTour",
    "vendor/jquery.countdown/jquery.plugin",
    "vendor/jquery.countdown/jquery.countdown",
    "tinymce",
    "tinymce.jquery",
    'validator',
    'jqueryui',
], function(OrderTourView, YourTourView){

    var Index = Backbone.View.extend({

        blinkEffectHandler: null,
        autoRefreshInterval: null,

        events: {
            "click button.reason-list": "clickReasonList",
            "click .custom-list a": "clickReasonItem",
            "click .message a.remove": "clickCloseMessage",
            "click .glyphicon-trash": "removeTour",
            'click .main-content a.more' : 'onClickMore',
            "click .main-content a.show-invited": "onClickShowInvited"
        },

        onClickMore: function(e){
            e.preventDefault();
            
            var $row = $(e.target).closest('.viewBlock');

            this.$el.find('.hidden-row').toggle();
        },

        onClickShowInvited: function(e) {
            e.preventDefault();
            $(e.target).closest('.row').siblings('.invited').toggleClass('hidden');
        },

        clickCloseMessage: function (e) {
            e.preventDefault();

            var $message = $(e.currentTarget).closest('.message');
            var id = $(e.currentTarget).data('id');

            $.ajax('/api/close-message', {
                type: 'POST',
                data: {
                    id: id
                }
            }).done(function () {
                $message.remove();
            })
        },

        initialize: function() {
            this.autoRefreshInterval = setInterval(function(){
                window.location.reload(false);
            }, 5*60*1000);
        },

        stopAuroRefresh: function(){
            clearInterval(this.autoRefreshInterval);
        },

        clickReasonItem: function(e)
        {
            e.preventDefault();

            var $el = this.$(e.target);
            var $title = $el.closest('.inner-block').find('h4');
            var $list = $el.closest('.inner-block').find('ul.custom-list');
            var $bottomBlock = $el.closest('.end-sell').find('.bottom-inner-block');

            switch($el.data('id'))
            {
                case 1:
                    $title.text('До окончания срока внесения аванса осталось:');
                    $bottomBlock.find('label').text('Конечная дата внесения аванса:');
                    break;

                case 2:
                    $title.text('До окончания срока подачи документов осталось:');
                    $bottomBlock.find('label').text('Конечная дата подачи документов:');
                    break;

                case 3:
                    $title.text('До окончания срока оплаты тура осталось:');
                    $bottomBlock.find('label').text('Конечная дата оплаты тура:');
                    break;

                case 4:
                    $title.text('До окончания тура осталось:');
                    $bottomBlock.find('label').text('Дата окончания тура:');
                    break;
            }
            $title.removeClass('hidden');
            $list.addClass('hidden');
            $bottomBlock.removeClass('hidden');

            this.$('form.counterForm input[name=counterReason]').val($el.data('id'));
        },

        clickReasonList: function(e) 
        {
            var $el = this.$(e.target);

            $el.siblings('ul.custom-list').toggleClass('hidden');
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

        startPulseEffect: function (){
            this.blinkEffectHandler = setInterval($.proxy(function(){
                this.$('.end-sell .countdown-time').fadeTo('slow', 0.3).fadeTo('slow', 1.0);
            }, this), 1700);
        },

        stopPulseEffect: function(){
            clearInterval(this.blinkEffectHandler);
        },

        render: function(){

            Session.view.user = this;

            //countdown time
            this.initCountDown();

            var self = this;
            var date = this.$('.countdown-time').data('date');
            var austDay = new Date(date);
            
            this.$('.countdown-time').countdown({
                until: austDay,
                format: 'DHMS'
            });

            if(this.$('.end-sell .top').hasClass('pulse'))
            {
                this.startPulseEffect();
            }

            (new OrderTourView({
                el: '#order-tour'
            })).render();

            (new YourTourView({
                el: '#your-tour'
            })).render();

            this.$("#counterDate").datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function(date) {
                    if (date)
                    {
                        self.$('.end-sell .top').removeClass('pulse');
                        self.$('form.counterForm').submit();
                    }
                }
            });

            if (this.$el.data('managerId')) {
                this.stopAuroRefresh();
            }
        },

        removeTour: function(e)
        {
            if(confirm('Вы уверены что хотите удилить тур?'))
            {
                window.location = this.$(e.target).data('href');
            }
        },
    });

    return Index;
});