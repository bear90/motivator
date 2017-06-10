define([
    'validator'
], function(){
    return Backbone.View.extend({
        
        events: {
            'click a#task-add-country': "clickAddCountry",
            'change select#childCount': "selectChildCount",
//            'click button': "clickSubmitButton"
        },

        initialize: function(){
            this.$('form').bootstrapValidator({
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    startedAt: {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести предполагаемую дату начала тура!"
                            },
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Необходимо ввести e-mail адрес."
                            }, // notEmpty
                            emailAddress: {
                                message: "E-mail адрес введен неверно!"
                            } // emailAddress
                        } // validators
                    },
                    verifyCode: {
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
            var self = this;
            
            this.$(".datepicker").datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                minDate: new Date,
                onClose: function( selectedDate, calendar, e ) {
                    self.$('form').data('bootstrapValidator').validateField('startedAt');
                }
            });
        },

        render:  function (){

        },

        clickAddCountry:  function (e){
            e.preventDefault();
            var $el = this.$(e.target);

            $el.siblings('select:first').clone().insertBefore($el);
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

        clickSubmitButton: function(e) {
            /*this.$('form').on('success.form.bv', $.proxy(function(){
                //this.$('form').submit();
                console.log();
            }, this));
            this.$('form').data('bootstrapValidator').validate();*/
        }
    });
});