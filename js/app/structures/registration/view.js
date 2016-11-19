define([
    'models/tourist',
    'validator'
], function(TouristModel){
    var view = Backbone.View.extend({

        tourist: null,
        formValidator: null,
        events: {
            "click #btn-continue-1": "renderStep2",
            "click #btn-continue-2": "renderStep3",
            "click #btn-continue-3": "renderStep4",
            "click #btn-continue-4": "renderStep5",
            "click #btn-info-board-issue-2": "register",
            "click #gaide-link": "onClickGaide"
        },

        onClickGaide: function (e) {
            e.preventDefault();

            $('.gaide').toggleClass('hidden');
        },

        initialize: function(){
            var self = this;

            this.tourist = new TouristModel;
            this.$('.step1 form').bootstrapValidator({
                message: 'Данные введены неверно',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести имя!"
                            }, // notEmpty
                            /*regexp: {
                                regexp: /^[A-Za-z\s.'-]+$/,
                                message: "Буквенные символы, дефисы и пробелы"
                            }*/
                        } // validators
                    },  // firstname
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: "Вы забыли ввести фамилию!"
                            }, // notEmpty
                            /*regexp: {
                                regexp: /^[A-Za-z\s.'-]+$/,
                                message: "Буквенные символы, дефисы и пробелы"
                            }*/
                        } // validators
                    },  // lastname
                    middle_name: {
                        validators: {
                            notEmpty: {
                                message: "Вы забыли ввести отчество!"
                            }, // notEmpty
                            regexp: {
                                regexp: /^[A-Za-z\s.'-]+$/,
                                message: "Буквенные символы, дефисы и пробелы"
                            }
                        } // validators
                    },  // middlename
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Необходимо ввести e-mail адрес."
                            }, // notEmpty
                            emailAddress: {
                                message: "E-mail адрес введен неверно!"
                            } // emailAddress
                        } // validators
                    }  // email
                } // fields
            });

            this.$('.step2 form').bootstrapValidator({
                fields: {
                    verifyCode: {
                        threshold: 6,
                        validators: {
                            notEmpty: {
                                message: "Вам необходимо ввести номер личного кабинета!"
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
                        } // validators yovupin
                    },
                } // fields
            });

            this.$('.step3 form').bootstrapValidator({
                fields: {
                    groupCode: {
                        //threshold: 1,
                        validators: {
                            regexp: {
                                regexp: /^[0-9]*$/,
                                message: "Только цифровые символы"
                            },
                            remote: {
                                url: '/site/checkgroupcode/',
                                type: 'POST',
                                message: "Введите корректный номер личного кабинета"
                            }
                        } // validators yovupin
                    }
                } // fields
            });
        },

        renderStep2: function(e){
            e.preventDefault();

            this.$('.step1 form').on('success.form.bv', $.proxy(function(){
                this.tourist.set('lastName', this.$el.find('input[name=last_name]').val());
                this.tourist.set('firstName', this.$el.find('input[name=first_name]').val());
                this.tourist.set('email', this.$el.find('input[name=email]').val());
                this.$('#form-result').removeClass('hidden');
                this.$('.step1').addClass('hidden');
                this.$('.step2').removeClass('hidden');
            }, this));
            this.$('.step1 form').data('bootstrapValidator').validate();
        },

        renderStep3: function(e){
            e.preventDefault();
            
            this.$('.step2 form').on('success.form.bv', $.proxy(function(){
                this.$('.step2').addClass('hidden');
                this.$('.step3').removeClass('hidden');
            }, this));
            this.$('.step2 form').data('bootstrapValidator').validate();
        },

        renderStep4: function(e){
            e.preventDefault();

            this.$('.step3 form').on('success.form.bv', $.proxy(function(){
                this.tourist.set('groupCode', this.$el.find('input[name=groupCode]').val());
                this.$('.step3').addClass('hidden');
                this.$('.step4').removeClass('hidden');
            }, this));
            this.$('.step3 form').data('bootstrapValidator').validate();
        },

        renderStep5: function(e){
            e.preventDefault();

            if (this.$('.step4 form input[name=userGaide]').is(':checked')){
                this.$('.step4').addClass('hidden');
                this.$('.step5').removeClass('hidden');
            }
        },

        register: function(){
            this.tourist.save()
                .then($.proxy(function(){
                    this.$('.step5').addClass('hidden');
                    this.$('.step-success').removeClass('hidden');
                }, this))
                .fail($.proxy(function(){
                    this.$('.step5').addClass('hidden');
                    this.$('.step-fail').removeClass('hidden');
                }, this));
        },

        render:  function (){

        },
    });

    return view;
});