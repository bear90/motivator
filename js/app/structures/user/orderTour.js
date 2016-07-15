define([
    'backbone',
    'text!structures/user/tmpl/new_offer.html',
    'validator'
], function(Backbone, newOfferTmpl){

    var view = Backbone.View.extend({

        events: {
            "click form.addForm button[type=button]": "submitTour",
            "click #add-city": "addCity",
            "change #site": "showSite",
            "click .glyphicon-trash": "removeTour",
            "click button.edit": "editOffer",
            "click button.confirm": "confirmOffer",
            "click a.addOffer": "renderNewOffer",
            "click a.deleteOffer": "deleteOffer",
        },

        templateNewOffer: _.template(newOfferTmpl),

        initialize: function(){

            this.initOffer();

            this.initOrderTour();
        },

        renderNewOffer: function(e) {
            var $item = this.$(e.target).closest('.item');
            var number = this.$(e.target).closest('form.offerForm').find('> .item').size();

            $item.find('button.save').addClass('hidden');
            $item.find('a.addOffer').addClass('hidden');
            
            $newItem = $item.after(this.templateNewOffer({num: number+1})).next();

            this.initOfferComponents($newItem);
            
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.country'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.city'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.price'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.startDate'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('input.endDate'));
            $('form.offerForm').bootstrapValidator('addField', $newItem.find('textarea.description'));
        },

        deleteOffer: function(e) {
            var $item = this.$(e.target).closest('.item');
            var $form = $item.closest('form.offerForm');

            $form.bootstrapValidator('removeField', $item.find('input.country'));
            $form.bootstrapValidator('removeField', $item.find('input.city'));
            $form.bootstrapValidator('removeField', $item.find('input.price'));
            $form.bootstrapValidator('removeField', $item.find('input.startDate'));
            $form.bootstrapValidator('removeField', $item.find('input.endDate'));
            $form.bootstrapValidator('removeField', $item.find('textarea.description'));

            $item.prev().find('button.save').removeClass('hidden');
            $item.prev().find('a.addOffer').removeClass('hidden');
            $item.remove();

            $form.data('bootstrapValidator').validate();
        },

        confirmOffer: function (e) {
            if(confirm("Вы уверены что хотите выбрать это предложение?"))
            {
                var offerId = this.$(e.target).closest('.item').data('id');
                window.location = '/user/confirmoffer/' + offerId;
            }
        },

        initOrderTour: function() {

            if (!this.$('form.addForm').size()) 
            {
                return false;
            }

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

        initOfferComponents: function($context){

            $context.find( ".startDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    /*var $item = calendar.input.closest('.item');
                    $item.find(".endDate").datepicker("option", "minDate", selectedDate);
*/
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'startDate');
                }
            });

            $context.find( ".endDate" ).datepicker({
                changeMonth: true,
                dateFormat: "dd.mm.yy",
                onClose: function( selectedDate, calendar ) {
                    /*var $item = calendar.input.closest('.item');
                    $item.find(".startDate").datepicker("option", "maxDate", selectedDate);
*/
                    var $form = calendar.input.closest('form');
                    $form.bootstrapValidator('revalidateField', 'endDate');
                }
            });

            $context.find('textarea.description').tinymce({
                menubar: false,
                statusbar: false,
                plugins: [
                  'autolink link image'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image',
                setup: function(editor) {
                    
                    /**/
                    editor.on('init', function(ed) {
                       /*if($(ed.target.targetElm).hasClass('hidden'))
                        {
                            tinymce.get(ed.target.id).hide();
                        }*/
                    });

                    editor.on('change', function(e) {
                        var $form = $(e.target.editorContainer).closest('form');

                        if($form.data('changed'))
                        {
                            return false;
                        }

                        $form.find('.info').text('Предложение от турагента');
                        $form.data('changed', true);
                    });
                    editor.on('keyup', function(e, a, b) {
                        var $form = $(editor.editorContainer).closest('form');
                        $form.bootstrapValidator('revalidateField', 'description');
                    });
                }
            });
        },


        initOffer: function(){
            if (!this.$('form.offerForm').size()) 
            {
                return false;
            }

            this.initOfferComponents(this.$el);

            this.$('form.offerForm').bootstrapValidator({
                excluded: [':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    country: {
                        selector: 'input.country',
                        validators: {
                            notEmpty: {
                                message: "Страна должена быть заполнена!"
                            }
                        }
                    },
                    city: {
                        selector: 'input.city',
                        validators: {
                            notEmpty: {
                                message: "Город/Регион должен быть заполнен!"
                            }
                        }
                    },
                    price: {
                        selector: 'input.price',
                        validators: {
                            notEmpty: {
                                message: "Исходная стоимость тура должна быть заполнена!"
                            }
                        }
                    },
                    startDate: {
                        selector: 'input.startDate',
                        validators: {
                            notEmpty: {
                                message: "Дата начала тура должна быть выбрана!"
                            }
                        }
                    },
                    endDate: {
                        selector: 'input.endDate',
                        validators: {
                            notEmpty: {
                                message: "Дата окончания тура должна быть выбрана!"
                            }
                        }
                    },
                    description: {
                        selector: 'textarea.description',
                        validators: {
                            callback: {
                                message: 'Введите текст преложения. Он должен быть не менее 5 символов',
                                callback: function(value, validator, $field) {
                                    
                                    // Get the plain text without HTML
                                    var text = tinyMCE.get($field.attr('id')).getContent({
                                        format: 'text'
                                    });

                                    return text.length >= 5;
                                }
                            }
                        }
                    }
                }
            });
        },

        editOffer: function(e)
        {
            var $item = this.$(e.target).closest('.item');

            switch (true) {
                case $item.hasClass('view'):
                    $item.removeClass('view').addClass('edit');
                    break;

                case $item.hasClass('edit'):
                    $item.removeClass('edit').addClass('view');
                    break;
            }
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