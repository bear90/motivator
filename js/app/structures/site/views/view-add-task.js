define([
    'validator',
    'jquery',
    'jqueryui',
    'jquery-combobox'
], function(){
    return Backbone.View.extend({
        
        events: {
            'click a#task-add-country': "clickAddCountry",
            'change select#task_childCount': "selectChildCount",
            'change input#task_checkbox': "changeCheckbox",
            "click a#gaide-link": "clickGaideLink",
        },

        initialize: function(){
            var self = this;

            this.$(".filtered-select").combobox({
                change: function( e, ui ) {
                    var $el = $(e.target);
                    
                    self.$('form').bootstrapValidator('revalidateField', $el.attr('name'));
                },
                select: function(e, ui) {
                    var $el = $(e.target);
                    var name = $el.attr('name');

                    if (ui.item.value) {
                        switch (true) {
                            case (name == '_task[name1]' || name == '_task[name2]'):
                                self.skipSiblingName($el);
                                break;

                            case (e.type == 'comboboxselect'):
                                self.$('form').bootstrapValidator('revalidateField', "_" + $el.attr('name'));
                                break;
                        }
                    }

                }
            });

            this.$('form').bootstrapValidator({
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    '_task[name1]': {
                        trigger: "blur",
                        validators: {
                            callback: {
                                message: "Вам необходимо выбрать имя!",
                                callback: function (value, validator, $field) {
                                    var val1 = self.$('[name="task[name1]"]').val();
                                    var val2 = self.$('[name="task[name2]"]').val();
                                    return (val1 != '0' && !!val1) || (val2 != '0' && !!val2);
                                }
                            },
                        }
                    },
                    '_task[name2]': {
                        trigger: "blur",
                        validators: {
                            callback: {
                                message: "Вам необходимо выбрать имя!",
                                callback: function (value, validator, $field) {
                                    var val1 = self.$('[name="task[name2]"]').val();
                                    var val2 = self.$('[name="task[name1]"]').val();
                                    return (val1 != '0' && !!val1) || (val2 != '0' && !!val2);
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
                    '_task[country][]': {
                        trigger: "blur",
                        validators: {
                            callback: {
                                message: "Вам необходимо выбрать страну тура!",
                                callback: function (value, validator, $field) {
                                    var val = $field.parent().siblings('select').val();
                                    return val != '0' && !!val;
                                }
                            }
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
            var $clone = $el.siblings('select:first').clone();

            $clone.insertBefore($el).combobox()
        },

        skipSiblingName:  function ($el){
            var $row = $el.closest('#add-task');
            switch($el.attr('name')) {
                case "_task[name1]":
                    $row.find('input[name="_task[name2]"]').val("");
                    $row.find('select[name="task[name2]"]').val("");
                    break;

                case "_task[name2]":
                    $row.find('input[name="_task[name1]"]').val("");
                    $row.find('select[name="task[name1]"]').val("");
                    break;
            }

            this.$('form').bootstrapValidator('revalidateField', '_task[name1]');
            this.$('form').bootstrapValidator('revalidateField', '_task[name2]');
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
