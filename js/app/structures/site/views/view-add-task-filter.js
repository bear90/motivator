define([
    'validator'
], function(){
    return Backbone.View.extend({
        
        events: {
            'click .filter a': 'clickFilter',
            'click button.skip': 'clickSkipFilter',
            "click .input-group-addon.calendar": "clickCalendarIcon"
            /*'click a#task-add-country': "clickAddCountry",
            'change select#task_childCount': "selectChildCount",
            'change input#task_checkbox': "changeCheckbox",
            "click a#gaide-link": "clickGaideLink",*/
        },

        initialize: function(){
            /*this.$('form').bootstrapValidator({
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'task[startedAt]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести предполагаемую дату начала тура!"
                            },
                        }
                    },
                    'task[checkbox]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ознакомиться с правилами сервиса!"
                            },
                        }
                    },
                    'task[email]': {
                        validators: {
                            notEmpty: {
                                message: "Необходимо ввести e-mail адрес."
                            }, // notEmpty
                            emailAddress: {
                                message: "E-mail адрес введен неверно!"
                            } // emailAddress
                        } // validators
                    },
                    'verifyCode': {
                        threshold: 6,
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести проверочный код!"
                            },
                            regexp: {
                                regexp: /^[A-Za-z\s.'-]+$/,
                                message: "Буквенные символы, дефисы и пробелы"
                            },
                            remote: {
                                url: '/site/checkcapture/',
                                type: 'POST',
                                message: "Введите корректный проверочный код"
                            }
                        }
                    },
                }
            });*/

            // Set datapicker
            this.$(".datepicker").datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                /*minDate: new Date,
                onClose: $.proxy(function( selectedDate, calendar, e ) {
                    this.$('form').data('bootstrapValidator').validateField('task[startedAt]');
                }, this),*/
            });
        },

        render:  function (){

        },

        clickCalendarIcon: function(e) {
            var $el = this.$(e.target);
            $el.siblings('.datepicker').datepicker("show");
        },

        clickFilter: function (e) {
            e.preventDefault();
            var $el = this.$(e.target);
            var id = $el.attr('href');

            $el.siblings().removeClass('bold');
            $el.addClass('bold');

            this.$('.block').addClass('hidden');
            this.$(id).removeClass('hidden');
        },

        clickSkipFilter: function(e) {
            e.preventDefault();
            window.location = '/#block-main-table';
        },

        clickCalendarIcon: function(e) {
            var $el = this.$(e.target);
            $el.siblings('input').trigger("focus");
        }
    });
});