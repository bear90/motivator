define([
    'validator'
], function(){
    return Backbone.View.extend({
        
        events: {
            'click a#task-add-country': "clickAddCountry",
            'change select#task_childCount': "selectChildCount",
            'change select#task_name1': "selectName",
            'change select#task_name2': "selectName",
            'change input#task_checkbox': "changeCheckbox",
            "click a#gaide-link": "clickGaideLink",
        },

        initialize: function(){
            var self = this;

            this.$('form').bootstrapValidator({
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'task[name1]': {
                        validators: {
                            callback: {
                                message: "Вам необходимо выбрать имя!",
                                callback: function (value, validator, $field) {
                                    var $el = self.$('select[name="task[name2]"]');
                                    return $el.val() != '0' || value != '0';
                                }
                            },
                        }
                    },
                    'task[name2]': {
                        validators: {
                            callback: {
                                message: "Вам необходимо выбрать имя!",
                                callback: function (value, validator, $field) {
                                    var $el = self.$('select[name="task[name1]"]');
                                    return $el.val() != '0' || value != '0';
                                }
                            },
                        }
                    },
                    'task[startedAt]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести предполагаемую дату начала тура!"
                            },
                        }
                    },
                    'task[country][]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать страну тура!"
                            },
                        }
                    },
                    'task[tourType]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать вид тура!"
                            },
                        }
                    },
                    'task[adultCount]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать количество взрослых туристов!"
                            },
                        }
                    },
                    'task[childCount]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать количество детей!"
                            },
                        }
                    },
                    'task[childAge][]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать возраст ребёнка!"
                            },
                        }
                    },
                    'task[days]': {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо выбрать продолжительность тура!"
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
            });

            // Set datapicker
            this.$(".datepicker").datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                minDate: new Date,
                onClose: $.proxy(function( selectedDate, calendar, e ) {
                    this.$('form').bootstrapValidator('revalidateField', 'task[startedAt]');
                }, this),
            });
        },

        render:  function (){

        },

        clickAddCountry:  function (e){
            e.preventDefault();
            var $el = this.$(e.target);

            $el.siblings('select:first').clone().insertBefore($el);
        },

        selectName:  function (e){
            this.$('form').bootstrapValidator('revalidateField', 'task[name1]');
            this.$('form').bootstrapValidator('revalidateField', 'task[name2]');
        },

        selectChildCount:  function (e){
            var $el = this.$(e.target);
            var $next = $el.closest('.form-group').next();
            var childCount = parseInt($el.val());

            if (childCount) {
                $next.removeClass('hidden');
                var $firstSelect = $next.find('select:first');
                var needed = childCount - $next.find('select').size()

                // Remove not needed selects
                if (needed < 0) {
                    $next.find('select:gt(' + (childCount-1) + ')').remove();
                    needNew = false;
                }

                // Render the count of needed inputs
                for (var i=0; i<needed; i++){
                    $firstSelect.clone().insertAfter($firstSelect);
                }

            } else {
                $next.addClass('hidden');
            }
        },

        changeCheckbox:  function (e){
            this.$('form').bootstrapValidator('revalidateField', 'task[checkbox]');
        },

        clickGaideLink: function(e) {
            e.preventDefault();
            this.$('.gaide').toggleClass('hidden');
        },
    });
});
