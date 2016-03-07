define([
    'validator',
    'jqueryui'
], function(){

    var view = Backbone.View.extend({

        events: {
            "click #add-city": "addCity",
            "change #site": "showSite"
        },

        initialize: function(){

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

        render:  function (){

        }
    });

    return view;
});