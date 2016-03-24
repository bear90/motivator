define([
    'validator',
    'jqueryui',
], function(){

    var view = Backbone.View.extend({

        events: {
            "click form button[type=button]": "submitTour",
            "click #add-city": "addCity",
            "change #site": "showSite",
            "click .glyphicon-trash": "removeTour"
        },

        initialize: function(){

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

            this.$( "#startDate" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate ) {
                    $("#endDate").datepicker("option", "minDate", selectedDate);
                }
            });
            this.$( "#endDate" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate ) {
                    $("#startDate").datepicker("option", "maxDate", selectedDate);
                }
            });

            this.$('form.addForm').bootstrapValidator({
                //live: 'disabled',
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    touragentId: {
                        validators: {
                            notEmpty: {
                                message: "Выберите турагента!"
                            }
                        }
                    },
                    "city[]": {
                        validators: {
                            notEmpty: {
                                message: "Хотя бы один город должен быть введен!"
                            }
                        }
                    },
                    startDate: {
                        validators: {
                            notEmpty: {
                                message: "Ориентировочная дата начала тура должна быть выбрана!"
                            }
                        }
                    },
                    endDate: {
                        validators: {
                            notEmpty: {
                                message: "Ориентировочная дата окончания тура должна быть выбрана!"
                            }
                        }
                    },
                    "tourist[middleName]": {
                        validators: {
                            notEmpty: {
                                message: "Введите Ваше отчество!"
                            }
                        }
                    },
                    "tourist[phone]": {
                        //threshold: 13,
                        validators: {
                            notEmpty: {
                                message: "Введите Ваш телефон!"
                            },
                            regexp: {
                                regexp: /^\+375[0-9]{9}$/,
                                message: "Номер телефона должен быть в формате +375 XX XX XX XXX"
                            }
                        }
                    },
                }
            });
        },

        addCity: function(e)
        {
            e.preventDefault();

            var $el = this.$(e.target);
            var $container = $el.closest('.inner-block');
            var $lastInput = $container.find('input:last');

            $lastInput.clone().val('').insertAfter($lastInput);
        },

        showSite: function(e)
        {
            var $el = this.$(e.target);

            var win = window.open($el.val(), '_blank');
            win.focus();
        },

        removeTour: function(e)
        {
            if(confirm('Вы уверены что хотите удилить тур?'))
            {
                window.location = this.$(e.target).data('href');
            }
        },

        submitTour: function(e){
            e.preventDefault();

            var validator = this.$('form.addForm').data('bootstrapValidator');
            validator.validate();

            if (validator.isValid() && this.$el.data('first-tour')){
                this.$('.step1').addClass('hidden');
                this.$('.step2').removeClass('hidden');
            }
        },

        render:  function (){

        }
    });

    return view;
});